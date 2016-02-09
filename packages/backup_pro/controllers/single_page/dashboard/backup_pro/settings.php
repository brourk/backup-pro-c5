<?php
/**
 * mithra62 - Backup Pro for Concrete5
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2016, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./packages/backup_pro/controllers/single_page/dashboard/backup_pro/settings.php
 */
 
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro;

use Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro\Abstractcontroller;

/**
 * mithra62 - Concrete5 Package Settings Controller
 *
 * Contains all the controller actions for configuring Backup Pro 
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Settings extends Abstractcontroller
{
    /**
     * The default Storage form field values
     *
     * @var array
     */
    public $storage_form_data_defaults = array(
        'storage_location_name' => '',
        'storage_location_file_use' => '1',
        'storage_location_status' => '1',
        'storage_location_db_use' => '1',
        'storage_location_include_prune' => '1'
    );
    
    /**
     * Default view
     * @param string $section The settings section we're working on
     */
    public function view($section = 'general')
    {
        $update = $this->platform->getPost('update', 'no');
        $variables = array(
            'form_data' => $this->settings,
            'form_errors' => $this->returnEmpty($this->settings)
        );
        $variables['form_data']['cron_notify_emails'] = implode("\n", $this->settings['cron_notify_emails']);
        $variables['form_data']['exclude_paths'] = implode("\n", $this->settings['exclude_paths']);
        $variables['form_data']['backup_file_location'] = implode("\n", $this->settings['backup_file_location']);
        $variables['form_data']['db_backup_archive_pre_sql'] = implode("\n", $this->settings['db_backup_archive_pre_sql']);
        $variables['form_data']['db_backup_archive_post_sql'] = implode("\n", $this->settings['db_backup_archive_post_sql']);
        $variables['form_data']['db_backup_execute_pre_sql'] = implode("\n", $this->settings['db_backup_execute_pre_sql']);
        $variables['form_data']['db_backup_execute_post_sql'] = implode("\n", $this->settings['db_backup_execute_post_sql']);
        $variables['form_data']['backup_missed_schedule_notify_emails'] = implode("\n", $this->settings['backup_missed_schedule_notify_emails']);
        $variables['form_has_errors'] = false;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            //verify csrf 
            $val = \Loader::helper('validation/form');
            $val->addRequiredToken('bp3_settings_form');
            
            $data = $_POST;
            
            $variables['form_data'] = array_merge(array(
                'db_backup_ignore_tables' => '',
                'db_backup_ignore_table_data' => ''
            ), $data);
            $backup = $this->services['backups'];
            $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
            $data['meta'] = $backup->getBackupMeta($backups);
            $extra = array(
                'db_creds' => $this->platform->getDbCredentials()
            );
            
            $settings_errors = $this->services['settings']->validate($data, $extra);
            if (! $settings_errors && $val->test() ) {
                if ($this->services['settings']->update($data)) {
                    
				    $this->redirect('/dashboard/backup_pro/settings/'.$section . '?update=yes');
				    exit;
                }
            } else {
                $variables['form_has_errors'] = true;
                $variables['form_errors'] = array_merge($variables['form_errors'], $settings_errors);
            }
        }
        
        if( $this->platform->getPost('update') == 'yes' )
        {
            $variables['message'] = $this->services['lang']->__('settings_updated');
        }

        $variables['section'] = $section;
        $variables['update'] = $update;
        $variables['db_tables'] = $this->services['db']->getTables();
        $variables['backup_cron_commands'] = array(); //$this->platform->setPrestaContext($this->context)->getBackupCronCommands($this->settings);
        $variables['ia_cron_commands'] = array(); //$this->platform->setPrestaContext($this->context)->getIaCronCommands($this->settings);
        $variables['errors'] = $this->errors;
        $variables['threshold_options'] = $this->services['settings']->getAutoPruneThresholdOptions();
        $variables['available_db_backup_engines'] = $this->services['backup']->getDataBase()->getAvailableEnginesOptions();
        $variables['pageTitle'] = $this->services['lang']->__($variables['section'].'_bp_settings_menu').' Settings';
        
        $this->prepView('settings', $variables);
    }
    
    /**
     * View all the storage entries 
     * @return string
     */
    public function storage_locations()
    {
        $variables = array();
        $variables['can_remove'] = true;
        if( count($this->settings['storage_details']) <= 1 )
        {
            $variables['can_remove'] = false;
        }
    
        $variables['available_storage_engines'] = $this->services['backup']->getStorage()->getAvailableStorageDrivers();
        $variables['storage_details'] = $this->settings['storage_details'];
        //$variables['menu_data'] = ee()->backup_pro->get_settings_view_menu();
        $variables['section'] = 'storage_locations';
        $variables['pageTitle'] = $this->services['lang']->__('storage_bp_settings_menu');  
        $this->prepView('storage', $variables);     
    }
    
    /**
     * Add a storage entry
     * @return string
     */
    public function new_storage($engine = 'local')
    {
        $variables = array();
        $variables['available_storage_engines'] = $this->services['backup']->getStorage()->getAvailableStorageDrivers();
    
        if( !isset($variables['available_storage_engines'][$engine]) )
        {
            $engine = 'local';
        }
        
        $variables['storage_details'] = $this->settings['storage_details'];    
        $variables['storage_engine'] = $variables['available_storage_engines'][$engine];
        $variables['form_data'] = array_merge($this->settings, $variables['storage_engine']['settings'], $this->storage_form_data_defaults);
        $variables['form_errors'] = array_merge($this->returnEmpty($this->settings), $this->returnEmpty($variables['storage_engine']['settings']), $this->storage_form_data_defaults);
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $val = \Loader::helper('validation/form');
            $val->addRequiredToken('bp3_new_storage_form');
            
            $data = $_POST;
            
            $variables['form_data'] = $data;
            $settings_errors = $this->services['backup']->getStorage()->validateDriver($this->services['validate'], $engine, $data, $this->settings['storage_details']);
            if( !$settings_errors && $val->test() )
            {
                if( $this->services['backup']->getStorage()->getLocations()->setSetting($this->services['settings'])->create($engine, $variables['form_data']) )
                {
				    $this->redirect('/dashboard/backup_pro/settings/storage_locations' . '?storage_added=yes');
				    exit;
                }
            }
            else
            {
                $variables['form_errors'] = array_merge($variables['form_errors'], $settings_errors);
            }
        }
    
        $variables['errors'] = $this->errors;
        $variables['_form_template'] = false;
        if( $variables['storage_engine']['obj']->hasSettingsView() )
        {
            $variables['_form_template'] = 'storage/drivers/_'.$engine;
        }

        $variables['section'] = 'storage_locations';
        $variables['engine'] = $engine;
        $variables['pageTitle'] = $this->services['lang']->__('add_storage_location').' ('.$this->services['lang']->__($variables['storage_engine']['name']).')';
        $this->prepView('storage/new', $variables);  
    }
    
    /**
     * Edit a storage entry
     * @return string
     */    
    public function edit_storage($storage_id)
    {
        if( empty($this->settings['storage_details'][$storage_id]) )
        {
		    $this->redirect('/dashboard/backup_pro/settings/storage_locations' . '?storage_invalid_id=yes');
		    exit;
        }
    
        $storage_details = $this->settings['storage_details'][$storage_id];
    
        $variables = array();
        $variables['storage_details'] = $storage_details;
        $variables['form_data'] = array_merge($this->storage_form_data_defaults, $storage_details);
        $variables['form_errors'] = $this->returnEmpty($storage_details); //array_merge($storage_details, $this->form_data_defaults);
        $variables['errors'] = $this->errors;
        $variables['available_storage_engines'] = $this->services['backup']->getStorage()->getAvailableStorageOptions();
        $variables['storage_engine'] = $variables['available_storage_engines'][$storage_details['storage_location_driver']];
        $variables['_form_template'] = 'storage/drivers/_'.$storage_details['storage_location_driver'];
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $val = \Loader::helper('validation/form');
            $val->addRequiredToken('bp3_edit_storage_form');
            
            $data = $_POST;
            $variables['form_data'] = $data;
            $data['location_id'] = $storage_id;
            $settings_errors = $this->services['backup']->getStorage()->validateDriver($this->services['validate'], $storage_details['storage_location_driver'], $data, $this->settings['storage_details']);
            if( !$settings_errors && $val->test() )
            {
                if( $this->services['backup']->getStorage()->getLocations()->setSetting($this->services['settings'])->update($storage_id, $variables['form_data']) )
                {
				    $this->redirect('/dashboard/backup_pro/settings/storage_locations' . '?storage_updated=yes');
				    exit;
                }
            }
            else
            {
                $variables['form_errors'] = array_merge($variables['form_errors'], $settings_errors);
            }
        }

        $variables['section'] = 'storage_locations';
        $variables['storage_id'] = $storage_id;
        $variables['pageTitle'] = $this->services['lang']->__('edit_storage_location').' ('.$this->services['lang']->__($variables['storage_engine']['name']).')';
        $this->prepView('storage/edit', $variables);  
    }
    
    /**
     * Remove a storage entry
     * @return string
     */    
    public function remove_storage($storage_id)
    {
        if( count($this->settings['storage_details']) <= 1 )
        {
		    $this->redirect('/dashboard/backup_pro/settings/storage_locations' . '?storage_min_needed_fail=yes');
		    exit;
        }
    
        if( empty($this->settings['storage_details'][$storage_id]) )
        {
		    $this->redirect('/dashboard/backup_pro/settings/storage_locations' . '?storage_invalid_id=yes');
		    exit;
        }
    
        $storage_details = $this->settings['storage_details'][$storage_id];
    
        $variables = array();
        $variables['form_data'] = array('remove_remote_files' => '0');
        $variables['form_errors'] = array('remove_remote_files' => false);
        $variables['errors'] = $this->errors;
        $variables['available_storage_engines'] = $this->services['backup']->getStorage()->getAvailableStorageDrivers();
        $variables['storage_engine'] = $variables['available_storage_engines'][$storage_details['storage_location_driver']];
        $variables['storage_details'] = $storage_details;
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $val = \Loader::helper('validation/form');
            $val->addRequiredToken('bp3_remove_storage_form');
            
            if( $val->test() )
            {
                $data = $_POST;
                $backups = $this->services['backups']->setBackupPath($this->settings['working_directory'])
                                                      ->getAllBackups($this->settings['storage_details'], $this->services['backup']->getStorage()->getAvailableStorageDrivers());
        
                if( $this->services['backup']->getStorage()->getLocations()->setSetting($this->services['settings'])->remove($storage_id, $data, $backups) )
                {
				    $this->redirect('/dashboard/backup_pro/settings/storage_locations' . '?storage_removed=yes');
				    exit;
                }
                else
                {
                    $variables['form_errors'] = array_merge($variables['form_errors'], $settings_errors);
                }
            }
            else
            {
                $variables['form_errors'] = array_merge($variables['form_errors'], $settings_errors);
            }
        }

        $variables['section'] = 'storage_locations';
        $variables['storage_id'] = $storage_id;
        $variables['pageTitle'] = $this->services['lang']->__('remove_storage_location').' ('.$this->services['lang']->__($variables['storage_engine']['name']).')';
        $this->prepView('storage/remove', $variables);
    }
   
}