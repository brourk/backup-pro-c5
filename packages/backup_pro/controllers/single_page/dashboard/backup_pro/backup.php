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
use mithra62\BackupPro\Exceptions\BackupException;

/**
 * mithra62 - Concrete5 Package Settings Controller
 *
 * Contains all the controller actions for configuring Backup Pro 
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Backup extends Abstractcontroller
{
    /**
     * Manually execute a database backup
     */
    public function exec_backup_database()
    {
        $val = $this->getApp()->make('helper/validation/form');
        $val->addRequiredToken('bp3_backup_form');
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || !$val->test() ) {
            $this->redirect('/dashboard/backup_pro/backup_database');
            exit;
        }
        
        @session_write_close();
        $error = $this->services['errors'];
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        $error->clearErrors()->checkStorageLocations($this->settings['storage_details'])
                             ->checkWorkingDirectory($this->settings['working_directory'])
                             ->checkBackupDirs($backup->getStorage());
        if( $error->totalErrors() == '0' )
        {
            ini_set('memory_limit', -1);
            set_time_limit(0);
    
            $db_info = $this->platform->getDbCredentials();
            if( $backup->setDbInfo($db_info)->database($db_info['database'], $this->settings, $this->services['shell']) )
            {
                $backups = $this->services['backups']->setBackupPath($this->settings['working_directory'])
                                                     ->getAllBackups($this->settings['storage_details']);
    
                $backup->getStorage()->getCleanup()->setStorageDetails($this->settings['storage_details'])
                                     ->setBackups($backups)
                                     ->setDetails($this->services['backups']->getDetails())
                                     ->autoThreshold($this->settings['auto_threshold'])
                                     ->counts($this->settings['max_db_backups'])
                                     ->duplicates($this->settings['allow_duplicates']);
    
			    $this->redirect('/dashboard/backup_pro/dashboard/database_backups/?backup_complete=yes');
			    exit;
            }
        }
        else
        {
		    throw new BackupException( print_r($error->getErrors(), true) );
        }
    
        exit;
    }
    
    /**
     * Manually execute a file backup
     */
    public function exec_backup_files()
    {
        $val = $this->getApp()->make('helper/validation/form');
        $val->addRequiredToken('bp3_backup_form');
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || !$val->test() ) {
            $this->redirect('/dashboard/backup_pro/backup_files');
            exit;
        }
        
        @session_write_close();
        $error = $this->services['errors'];
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        $error->clearErrors()->checkStorageLocations($this->settings['storage_details'])
              ->checkBackupDirs($backup->getStorage())
              ->checkWorkingDirectory($this->settings['working_directory'])
              ->checkFileBackupLocations($this->settings['backup_file_location']);
        if( $error->totalErrors() == 0 )
        {
            ini_set('memory_limit', -1);
            set_time_limit(0);
            if( $backup->files($this->settings, $this->services['files'], $this->services['regex']) )
            {
                $backups = $this->services['backups']->setBackupPath($this->settings['working_directory'])
                                                     ->getAllBackups($this->settings['storage_details']);
    
                $backup->getStorage()->getCleanup()->setStorageDetails($this->settings['storage_details'])
                                     ->setBackups($backups)
                                     ->setDetails($this->services['backups']->getDetails())
                                     ->autoThreshold($this->settings['auto_threshold'])
                                     ->counts($this->settings['max_file_backups'], 'files')
                                     ->duplicates($this->settings['allow_duplicates']);
    
			    $this->redirect('/dashboard/backup_pro/dashboard/file_backups/?backup_complete=yes');
			    exit;
            }
        }
        else
        {
            throw new BackupException( print_r($error->getErrors(), true) );
        }
    }
    
    
    
    public function view($type = 'files')
    {   
        $proc_url = FALSE;
        $backup = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        switch($type)
        {
            case 'database':
                $proc_url = 'exec_backup_database';
                $errors = $this->services['errors']->clearErrors()->checkWorkingDirectory($this->settings['working_directory'])
                                                   ->checkStorageLocations($this->settings['storage_details'])
                                                   ->getErrors();
                break;
            case 'files':
                $proc_url = 'exec_backup_files';
                $errors = $this->services['errors']->clearErrors()->checkWorkingDirectory($this->settings['working_directory'])
                                                   ->checkStorageLocations($this->settings['storage_details'])
                                                   ->checkFileBackupLocations($this->settings['backup_file_location'])
                                                   ->getErrors();
                break;
        }
    
        if(!$proc_url)
        {
            throw new BackupException( $this->services['lang']->__('can_not_backup') );
        }
    
        $vars = array('proc_url' => $proc_url);
        $vars['errors'] = $this->errors;
        $vars['pre_backup_errors'] = $errors;
        $vars['proc_url'] = $proc_url;
        $vars['url_base'] = $this->url_base;
        $vars['backup_type'] = $type;
        $vars['method'] = '';
        $vars['pageTitle'] = $this->services['lang']->__('backup_'.$type);
        $this->prepView('backup', $vars);
    }
}