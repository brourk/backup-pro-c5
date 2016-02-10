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
class Manage extends Abstractcontroller
{

    /**
     * Download a backup action
     */
    public function download()
    {
        $encrypt = $this->services['encrypt'];
        $file_name = $encrypt->decode($this->platform->getPost('id'));
        $type = $this->platform->getPost('type');
        $storage = $this->services['backup']->setStoragePath($this->settings['working_directory']);
        if($type == 'files')
        {
            $file = $storage->getStorage()->getFileBackupNamePath($file_name);
        }
        else
        {
            $file = $storage->getStorage()->getDbBackupNamePath($file_name);
        }
    
    
        $backup_info = $this->services['backups']->setLocations($this->settings['storage_details'])->getBackupData($file);
        $download_file_path = false;
        if( !empty($backup_info['storage_locations']) && is_array($backup_info['storage_locations']) )
        {
            foreach($backup_info['storage_locations'] AS $storage_location)
            {
                if( $storage_location['obj']->canDownload() )
                {
                    $download_file_path = $storage_location['obj']->getFilePath($backup_info['file_name'], $backup_info['backup_type']); //next, get file path
                    break;
                }
            }
        }
    
        if($download_file_path && file_exists($download_file_path))
        {
            //$new_name = $backup->getStorage()->makePrettyFilename($file_name, $type, craft()->config->get('siteName'));
            $this->services['files']->fileDownload($download_file_path);
            exit;
        }
        else
        {
            ee()->session->set_flashdata('message_error', $this->services['lang']->__('db_backup_not_found'));
            $this->platform->redirect( ee('CP/URL', 'addons/settings/backup_pro/index') );
        }
    }
    
    /**
     * AJAX Action for updating a backup note
     */
    public function update_backup_note()
    {
        $encrypt = $this->services['encrypt'];
        $file_name = $encrypt->decode($this->platform->getPost('backup'));
        $backup_type = $this->platform->getPost('backup_type');
        $note_text = $this->platform->getPost('note_text');
        if($note_text && $file_name)
        {
            $path = rtrim($this->settings['working_directory'], DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$backup_type;
            $this->services['backup']->getDetails()->addDetails($file_name, $path, array('note' => $note_text));
            echo json_encode(array('success'));
        }
        exit;
    }
    
    /**
     * Delete Backup Action
     */
    public function delete_backups()
    {
        $delete_backups = $this->platform->getPost('backups');
        $type = $this->platform->getPost('type');
        $backups = $this->validateBackups($delete_backups, $type);
        if( $this->services['backups']->setBackupPath($this->settings['working_directory'])->removeBackups($backups) )
        {
		    $this->redirect('/dashboard/backup_pro/dashboard?backups_deleted=yes');
		    exit;
        }
        else
        {
		    $this->redirect('/dashboard/backup_pro/dashboard?backups_delete_fail=yes');
		    exit;
        }
    }

    /**
     * Restore database action
     */
    public function restore_database()
    {
        $val = \Loader::helper('validation/form');
        $val->addRequiredToken('bp3_restore_db_confirm');
        if(!$val->test())
        {
            $this->redirect('/dashboard/backup_pro/dashboard?restore_db_xss_fail=yes');
            exit;
        }
        
        $encrypt = $this->services['encrypt'];
        $file_name = $encrypt->decode(urldecode($this->platform->getPost('id')));
        $file = $this->getDbBackupMetaName($file_name);
        $backup_info = $this->services['backups']->setLocations($this->settings['storage_details'])->getBackupData($file);
        $restore_file_path = false;
        foreach($backup_info['storage_locations'] AS $storage_location)
        {
            if( $storage_location['obj']->canRestore() )
            {
                $restore_file_path = $storage_location['obj']->getFilePath($backup_info['file_name'], $backup_info['backup_type']); //next, get file path
                break;
            }
        }
    
        if($restore_file_path && file_exists($restore_file_path))
        {
            $db_info = $this->platform->getDbCredentials();
            $options = $this->settings;
            $options['file_name'] = $restore_file_path;
            if( $this->services['restore']->setDbInfo($db_info)->setBackupInfo($backup_info)->database($db_info['database'], $options, $this->services['shell']) )
            {
                $this->redirect('/dashboard/backup_pro/dashboard?db_restored=yes');
                exit;
            }
        }
        else
        {
            $this->redirect('/dashboard/backup_pro/dashboard?db_restore_not_found=yes');
            exit;
        }
    }    
}