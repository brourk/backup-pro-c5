<?php
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro;

use \Concrete\Core\Page\Controller\DashboardPageController;

class Dashboard extends DashboardPageController
{
    public function view()
    {
        $this->set('message', 'My regular message');
    
    }
}