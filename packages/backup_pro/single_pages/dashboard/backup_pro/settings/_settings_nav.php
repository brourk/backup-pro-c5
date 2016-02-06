<?php 
$ui = Loader::helper('concrete/ui');
$tabs = array();
$active_tab = $section;
$tabs[] = array($view->action('general'), 'General', ($active_tab == 'general' ? true : false));
$tabs[] = array($view->action('database_backup'), 'Database Backup', ($active_tab == 'database_backup' ? true : false));
$tabs[] = array($view->action('file_backup'), 'File Backup', ($active_tab == 'file_backup' ? true : false));
$tabs[] = array($view->action('cron_backup'), 'Cron Backup', ($active_tab == 'cron_backup' ? true : false));
$tabs[] = array($view->action('storage_locations'), 'Storage Locations', ($active_tab == 'storage_locations' ? true : false));
$tabs[] = array($view->action('integrity_agent'), 'Integriy Agent', ($active_tab == 'integrity_agent' ? true : false));
$tabs[] = array($view->action('license'), 'License', ($active_tab == 'license' ? true : false));
echo $ui->tabs($tabs, false); ?>