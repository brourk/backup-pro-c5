<?php
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro;

use mithra62\BackupPro\Platforms\Controllers\Concrete5Admin;

class Dashboard extends Concrete5Admin
{
    public function view()
    {
        $this->set('message', 'My regular message');
        $this->set('pageTitle', 'fdsafdsa');
    
    }
    
    public function db_backups()
    {
        echo __METHOD__;
        exit;
    }
    
    public function file_backups()
    {
        echo __METHOD__;
        exit;
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