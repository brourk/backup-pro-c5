<?php
namespace Concrete\Package\BackupPro;

defined('C5_EXECUTE') or die('Access Denied.');

use \Concrete\Core\Package\Package;

class Controller extends Package
{

    protected $pkgHandle = 'backup_pro';
    protected $appVersionRequired = '5.7.4.3b1';
    protected $pkgVersion = '1.0';

    public function getPackageDescription()
    {
        return t('Adds a searchable file library to a page.');
    }

    public function getPackageName()
    {
        return t('Backup Pro');
    }

    public function install()
    {
        if (version_compare(phpversion(), '5.4.0', '<')) {
            throw new \Exception('You must be run PHP 5.4 or greater to use this package.');
        }
        $pkg = parent::install();
        
    }
}