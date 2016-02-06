<?php
/**
 * mithra62 - Backup Pro for Concrete5
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2016, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./packages/backup_pro/controllers/single_page/dashboard/backup_pro.php
 */
 
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard;
use \Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro\Dashboard;

/**
 * mithra62 - Concrete5 Package Dashboard Wrap
 *
 * Contains all the controller actions for viewing backups for Backup Pro
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class BackupPro extends Dashboard
{
    /**
     * (non-PHPdoc)
     * @see \Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro\Dashboard::view()
     */
    public function view()
    {
        parent::view();
        $this->render('/dashboard/backup_pro/dashboard');
    }
}