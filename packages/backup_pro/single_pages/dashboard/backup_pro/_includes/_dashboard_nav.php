<?php 
$tabs = array();
$tabs[] = array($context->action('view'), $view_helper->m62Lang('home_bp_dashboard_menu'), ($active_tab == 'dashboard' ? true : false));
$tabs[] = array($context->action('database_backups'), $view_helper->m62Lang('db_bp_dashboard_menu'), ($active_tab == 'db_backups' ? true : false));
$tabs[] = array($context->action('file_backups'), $view_helper->m62Lang('files_bp_dashboard_menu'), ($active_tab == 'file_backups' ? true : false));
echo Loader::helper('concrete/ui')->tabs($tabs, false); 