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
}