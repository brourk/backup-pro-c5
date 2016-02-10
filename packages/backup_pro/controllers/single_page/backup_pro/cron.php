<?php
namespace Concrete\Package\BackupPro\Controller\SinglePage\BackupPro;

use \mithra62\BackupPro\Platforms\Controllers\Concrete5Front;

class Cron extends Concrete5Front
{
    public function view()
    {

        if( $this->platform->getPost('backup_pro') != $this->settings['cron_query_key'] )
        {
            exit;
        }
        
        @session_write_close();
        $error = $this->services['errors'];
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        $errors = $error->clearErrors()->checkStorageLocations($this->settings['storage_details'])->checkBackupDirs($backup->getStorage())->getErrors();
    
        if( $error->totalErrors() == '0' )
        {
            ini_set('memory_limit', -1);
            set_time_limit(0);
    
            $backup_type = $this->platform->getPost('type');
            $backup_paths = array();
            switch($backup_type)
            {
                case 'db':
                    $db_info = $this->platform->getDbCredentials();
                    $backup_paths['database'] = $backup->setDbInfo($db_info)->database($db_info['database'], $this->settings, $this->services['shell']);
                    break;
    
                case 'file':
                    $backup_paths['files'] = $backup->files($this->settings, $this->services['files'], $this->services['regex']);
                    break;
            }
            
            $backups = $this->services['backups']->setBackupPath($this->settings['working_directory'])
                                                 ->getAllBackups($this->settings['storage_details']);
            $backup->getStorage()->getCleanup()->setStorageDetails($this->settings['storage_details'])
                                               ->setBackups($backups)
                                               ->setDetails($this->services['backups']->getDetails())
                                               ->autoThreshold($this->settings['auto_threshold'])
                                               ->counts($this->settings['max_file_backups'], 'files')
                                               ->duplicates($this->settings['allow_duplicates']);            
    
            //now send the notifications (if any)
            if(count($backup_paths) >= 1 && (is_array($this->settings['cron_notify_emails']) && count($this->settings['cron_notify_emails']) >= 1))
            {
                $notify = $this->services['notify']; 
                $notify->getMail()->setConfig($this->platform->getEmailConfig());
                foreach($backup_paths As $type => $path)
                {
                    $cron = array($type => $path);
                    $notify->setBackup($backup)->sendBackupCronNotification($this->settings['cron_notify_emails'], $cron, $type);
                }
            }
        }
        else
        {
            $this->logDebug($error->getError());
            throw new BackupException($error->getError());
        }
    
        exit;
    }
}