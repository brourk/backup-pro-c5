<?php
/**
 * mithra62 - Backup Pro for Concrete5
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2016, mithra62, Eric Lamb.
 * @link		http://mithra62.com/
 * @version		3.0
 * @filesource 	./packages/backup_pro/controller.php
 */
 
namespace Concrete\Package\BackupPro;

defined('C5_EXECUTE') or die('Access Denied.');

use \Concrete\Core\Package\Package;
use \Concrete\Core\Page\Single as SinglePage;
use \Concrete\Core\Asset\AssetList;

/**
 * mithra62 - Concrete5 Package Controller Object
 *
 * Outlines what we're doing
 *
 * @package Concrete5
 * @author Eric Lamb <eric@mithra62.com>
 */
class Controller extends Package
{

    /**
     * Shortname for the package
     * @var string
     */
    protected $pkgHandle = 'backup_pro';
    
    /**
     * Minimum version of Concrete5 Backuop Pro supports
     * @var string
     */
    protected $appVersionRequired = '5.7.4.3b1';
    
    /**
     * Versoin of Backup Pro 
     * @var string
     */
    protected $pkgVersion = '1.0';

    /**
     * (non-PHPdoc)
     * @see \Concrete\Core\Package\Package::getPackageDescription()
     */
    public function getPackageDescription()
    {
        return t('The complete backup solution for Concrete5. Redundancy, Automated Backup Integrity, 8 Built-in Storage Locations, and so much more ');
    }

    /**
     * (non-PHPdoc)
     * @see \Concrete\Core\Package\Package::getPackageName()
     */
    public function getPackageName()
    {
        return t('Backup Pro');
    }

    /**
     * (non-PHPdoc)
     * @see \Concrete\Core\Package\Package::install()
     */
    public function install()
    {
        if (version_compare(phpversion(), '5.4.0', '<')) {
            throw new \Exception('You must be run PHP 5.4 or greater to use this package.');
        }
        
        $pkg = parent::install();
        $page = SinglePage::add('/dashboard/backup_pro', $pkg);
        $page->updateCollectionName(t('Backup Pro'));
        SinglePage::add('/dashboard/backup_pro/dashboard', $pkg);
        SinglePage::add('/dashboard/backup_pro/backup_database', $pkg);
        SinglePage::add('/dashboard/backup_pro/backup_files', $pkg);
        SinglePage::add('/dashboard/backup_pro/settings', $pkg);
        
        $sp = SinglePage::add('/dashboard/backup_pro/backup', $pkg);
        $sp->setAttribute('exclude_nav', true);
        
        $sp = SinglePage::add('/dashboard/backup_pro/manage', $pkg);
        $sp->setAttribute('exclude_nav', true);
        
        $sp = SinglePage::add('/backup_pro', $pkg);
        $sp->setAttribute('exclude_page_list', true);
        $sp->setAttribute('exclude_sitemapxml', true);
        $sp->setAttribute('exclude_search_index', true);
        $sp->setAttribute('exclude_nav', true);
        
        $sp = SinglePage::add('/backup_pro/cron', $pkg);
        $sp->setAttribute('exclude_page_list', true);
        $sp->setAttribute('exclude_sitemapxml', true);
        $sp->setAttribute('exclude_search_index', true);
        $sp->setAttribute('exclude_nav', true);
        return $pkg;
        
    }
    
    /**
     * (non-PHPdoc)
     * @see \Concrete\Core\Package\Package::upgrade()
     */
    public function upgrade() {
        parent::upgrade();
    }
    
    /**
     * (non-PHPdoc)
     * @todo add drop settings table
     * @see \Concrete\Core\Package\Package::uninstall()
     */
    public function uninstall()
    {
        parent::uninstall();
    } 
    
    /**
     * Load up the composer libraries
     */
    public function on_start()
    {
        //load up composer goodies
        require $this->getPackagePath() . '/vendor/autoload.php';
        
        //setup the view paths
        \Config::set('backup_pro.partial_path', __DIR__);
        \Config::set('backup_pro.static_assets.url_base', '/packages/backup_pro/assets/');
        
        
        //setup the static assets
        $al = AssetList::getInstance();
        $al->register('javascript', 'bp3_chosen', 'assets/js/chosen.jquery.js', array(), $this->pkgHandle);
        $al->register('javascript', 'bp3_global', 'assets/js/global.js', array(), $this->pkgHandle);
        $al->register('javascript', 'bp3_dashboard', 'assets/js/dashboard.js', array(), $this->pkgHandle);
        $al->register('javascript', 'bp3_backup', 'assets/js/backup.js', array(), $this->pkgHandle);
        $al->register('javascript', 'bp3_restore', 'assets/js/restore.js', array(), $this->pkgHandle);
        $al->register('javascript', 'bp3_settings', 'assets/js/settings.js', array(), $this->pkgHandle);
        $al->register('javascript', 'bp3_c5', 'assets/js/c5/backup_pro.js', array(), $this->pkgHandle);
        
        $al->register('css', 'bp3_general_css', 'assets/css/backup_pro.css', array(), $this->pkgHandle);      
        $al->register('css', 'bp3_chosenl_css', 'assets/css/chosen.css', array(), $this->pkgHandle);  
        
        $al->registerGroup('b3_ui_assets', array(
            array('css', 'bp3_chosenl_css'),
            array('css', 'bp3_general_css'),
            array('javascript', 'bp3_chosen'),
            array('javascript', 'bp3_global'),
            array('javascript', 'bp3_dashboard'),
            array('javascript', 'bp3_backup'),
            array('javascript', 'bp3_restore'),
            array('javascript', 'bp3_settings'),
            array('javascript', 'bp3_c5')
        ));        
    }
}