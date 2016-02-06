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

use mithra62\BackupPro\Platforms\Controllers\Concrete5Admin;

/**
 * mithra62 - Concrete5 Package Dashboard Controller
 *
 * Contains all the controller actions for viewing backups for Backup Pro
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Dashboard extends Concrete5Admin
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
            //'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => $this->platform->getPost('method')
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
            //'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => $this->platform->getPost('method')
        );  
        
        $this->prepView('file_backups', $variables);
    } 
}