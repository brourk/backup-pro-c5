<?php
namespace Concrete\Package\BackupPro\Controller\SinglePage\Dashboard;
use \Concrete\Package\BackupPro\Controller\SinglePage\Dashboard\BackupPro\Dashboard;

class BackupPro extends Dashboard
{
    public function view()
    {
        parent::view();
        $this->render('/dashboard/backup_pro/dashboard');
    }
}