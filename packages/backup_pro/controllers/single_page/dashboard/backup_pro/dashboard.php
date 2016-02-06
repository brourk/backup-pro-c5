<?php
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro;

use mithra62\BackupPro\Platforms\Controllers\Concrete5Admin;

class Dashboard extends Concrete5Admin
{
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
            'tab_set' => 'dashboard'
        );
        
        $this->prepView($variables);
        
        //$this->set('message', 'My regular message');
        $this->set('pageTitle', $this->services['lang']->__('dashboard'));
    
    }
    
    public function db_backups()
    {
        echo __METHOD__;
        exit;
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
        $backup_meta = $backup->getBackupMeta($backups);
         
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'errors' => $this->errors,
            'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => $this->platform->getPost('method')
        );        
    }
    
    public function file_backups()
    {
        echo __METHOD__;
        exit;
        $backup = $this->services['backups'];
        $backups = $backup->setBackupPath($this->settings['working_directory'])->getAllBackups($this->settings['storage_details']);
        $backup_meta = $backup->getBackupMeta($backups);
         
        $variables = array(
            'settings' => $this->settings,
            'backup_meta' => $backup_meta,
            'backups' => $backups,
            'errors' => $this->errors,
            'menu_data' => ee()->backup_pro->get_dashboard_view_menu(),
            'method' => $this->platform->getPost('method')
        );        
    }
    
    public function on_before_render() {
        $tabs = array();
        $tabs[] = array('/fdsa', 'Dashboard', true);
        $tabs[] = array('/fdsa', 'Database Backups', false);
        $tabs[] = array('/fdsa', 'File Backups', false);
        $this->set('tabs', $tabs);
        parent::on_before_render();
    }    
}