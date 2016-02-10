<?php
/**
 * mithra62 - Backup Pro for Concrete5
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2016, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./packages/backup_pro/controllers/single_page/dashboard/backup_pro/dashboard.php
 */
 
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro;

use Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro\Abstractcontroller;

/**
 * mithra62 - Concrete5 Package Dashboard Controller
 *
 * Contains all the controller actions for viewing backups for Backup Pro
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Dashboard extends Abstractcontroller
{
    /**
     * Dashboard View Action
     */
    public function view()
    {
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
        
        $backup_meta = $backup->getBackupMeta($backups);
        $available_space = $backup->getAvailableSpace($this->settings['auto_threshold'], $backups);
        
        $backups = $backups['database'] + $backups['files'];
        krsort($backups, SORT_NUMERIC);
        
        if(count($backups) > $this->settings['dashboard_recent_total'])
        {
            //we have to remove a few
            $filtered_backups = array();
            $count = 1;
            foreach($backups AS $time => $backup)
            {
                $filtered_backups[$time] = $backup;
                if($count >= $this->settings['dashboard_recent_total'])
                {
                    break;
                }
                $count++;
            }
            $backups = $filtered_backups;
        }
        
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'available_space' => $available_space,
            'selected_tab' => 'dashboard',
            'tab_set' => 'dashboard',
            'pageTitle' => $this->services['lang']->__('dashboard')
        );
        
        $this->prepView('dashboard', $variables);
    
    }
    
    /**
     * Database View Action
     */
    public function database_backups()
    {
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
        $backup_meta = $backup->getBackupMeta($backups);
         
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'errors' => $this->errors,
            'method' => $this->platform->getPost('method'),
            'pageTitle' => $this->services['lang']->__('database_backups')
        );  
        
        $this->prepView('database_backups', $variables);
    }
    
    /**
     * File Backup Action
     */
    public function file_backups()
    {
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
        $backup_meta = $backup->getBackupMeta($backups);
         
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'errors' => $this->errors,
            'method' => $this->platform->getPost('method'),
            'pageTitle' => $this->services['lang']->__('file_backups')
        );  
        
        $this->prepView('file_backups', $variables);
    } 
    
    /**
     * Delete Backup Confirmation Action
     */
    public function delete_backups()
    {
        $delete_backups = $this->platform->getPost('backups');
        $val = \Loader::helper('validation/form');
        $val->addRequiredToken('bp3_remove_backups_confirm');
        
        if( !$delete_backups  )
        {
		    $this->redirect('/dashboard/backup_pro/dashboard?backups_not_found=yes');
		    exit;
        }
        
        if( !$val->test() )
        {
            $this->redirect('/dashboard/backup_pro/dashboard?token_fail=yes');
            exit;            
        }
    
        $type = $this->platform->getPost('type');
        $backups = $this->validateBackups($delete_backups, $type);
        $variables = array(
            'settings' => $this->settings,
            'backups' => $backups,
            'backup_type' => $type,
            'method' => $this->platform->getPost('method'),
            'errors' => $this->errors,
            'pageTitle' => $this->services['lang']->__('delete_backup')
        );
    
        if( $type == 'files' )
        {
            //$breadcrumbs[ee('CP/URL', 'addons/settings/backup_pro/file_backups')->compile()] = $this->services['lang']->__('file_backups');
        }
        else
        {
            //$breadcrumbs[ee('CP/URL', 'addons/settings/backup_pro/db_backups')->compile()] = $this->services['lang']->__('database_backups');
        }
    
        $this->prepView('delete_confirm', $variables);
    }
}