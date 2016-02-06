<?php 
$tabs = array();
$tabs[] = array($view->action('view'), 'Dashboard', ($active_tab == 'dashboard' ? true : false));
$tabs[] = array($view->action('db_backups'), 'Database Backups', ($active_tab == 'db_backups' ? true : false));
$tabs[] = array($view->action('file_backups'), 'File Backups', ($active_tab == 'file_backups' ? true : false));
echo Loader::helper('concrete/ui')->tabs($tabs, false); ?>