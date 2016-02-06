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

use mithra62\BackupPro\Platforms\Controllers\Concrete5Admin;

/**
 * mithra62 - Concrete5 Package Settings Controller
 *
 * Contains all the controller actions for configuring Backup Pro 
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Settings extends Concrete5Admin
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
            if (! $settings_errors) {
                if ($this->services['settings']->update($data)) {
                    $this->platform->redirect($this->context->link->getAdminLink('AdminBackupProSettings') . '&section=' . $section . '&update=yes');
                }
            } else {
                $variables['form_has_errors'] = true;
                $variables['form_errors'] = array_merge($variables['form_errors'], $settings_errors);
            }
        }
        
        $variables['section'] = $section;
        $variables['update'] = $update;
        $variables['db_tables'] = $this->services['db']->getTables();
        //$variables['backup_cron_commands'] = $this->platform->setPrestaContext($this->context)->getBackupCronCommands($this->settings);
        //$variables['ia_cron_commands'] = $this->platform->setPrestaContext($this->context)->getIaCronCommands($this->settings);
        $variables['errors'] = $this->errors;
        $variables['threshold_options'] = $this->services['settings']->getAutoPruneThresholdOptions();
        $variables['available_db_backup_engines'] = $this->services['backup']->getDataBase()->getAvailableEnginesOptions();
        
        $this->prepView('settings', $variables);
    }
   
}