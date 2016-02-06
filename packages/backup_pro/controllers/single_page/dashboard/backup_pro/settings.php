<?php
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro;

use \Concrete\Core\Page\Controller\DashboardPageController;

class Settings extends DashboardPageController
{
    public function view($section = 'general')
    {
        $this->set('message', __FILE__);
        //$this->set('title', __FILE__);
        
    
    }
   
}