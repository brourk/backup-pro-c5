<?php
/**
 * mithra62 - Backup Pro for Concrete5
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2016, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./packages/backup_pro/controllers/single_page/backup_pro/cron.php
 */
 
namespace Concrete\Package\BackupPro\Controller\SinglePage\BackupPro;

use \mithra62\BackupPro\Platforms\Controllers\Concrete5Front;

/**
 * mithra62 - Concrete5 Package Cron Controller
 *
 * Contains all the controller actions for executing Backup Pro through URL requests
 *
 * @package Concrete5 
 * @author Eric Lamb <eric@mithra62.com>
 */
class Api extends Concrete5Front
{
    /**
     * Executes the cron routing
     * @throws BackupException
     */
    public function view()
    {
        $_SERVER['REQUEST_URI'] = '/backup_pro/api'.$this->platform->getPost('bp_method');
        $this->services['rest']->setPlatform($this->platform)->getServer()->run();
        exit;
    }
}