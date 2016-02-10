<?php
/**
 * mithra62 - Backup Pro for Concrete5
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2016, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./packages/backup_pro/controllers/single_page/dashboard/backup_pro/abstractcontroller.php
 */
 
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro;

use mithra62\BackupPro\Platforms\Controllers\Concrete5Admin;

/**
 * mithra62 - Concrete5 Package Abstract Controller
 *
 * Sets up the variables needed
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
abstract class Abstractcontroller extends Concrete5Admin
{
   public function __construct(\Concrete\Core\Page\Page $c)
   {
       parent::__construct($c);
   }


   /**
    * Validates the POST'd backup data and returns the clean array
    * @param array $delete_backups
    * @param string $type
    * @return multitype:array
    */
   protected function validateBackups($delete_backups, $type)
   {
       if(!$delete_backups || count($delete_backups) == 0)
       {
           ee()->session->set_flashdata('message_error', $this->services['lang']->__('backups_not_found'));
           $this->platform->redirect($this->url_base.'index');
       }
   
       $encrypt = $this->services['encrypt'];
       $backups = array();
   
       $locations = $this->settings['storage_details'];
       $drivers = $this->services['backup']->getStorage()->getAvailableStorageDrivers();
       foreach($delete_backups AS $file_name)
       {
           $file_name = $encrypt->decode(urldecode($file_name));
           if( $file_name != '' )
           {
               $path = rtrim($this->settings['working_directory'], DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$type;
               $file_data = $this->services['backup']->getDetails()->getDetails($file_name, $path);
               $file_data = $this->services['backups']->getBackupStorageData($file_data, $locations, $drivers);
               $backups[] = $file_data;
           }
       }
   
       if(count($backups) == 0)
       {
           ee()->session->set_flashdata('message_error', $this->services['lang']->__('backups_not_found'));
           $this->platform->redirect($this->url_base.'index');
       }
   
       return $backups;
   }
}