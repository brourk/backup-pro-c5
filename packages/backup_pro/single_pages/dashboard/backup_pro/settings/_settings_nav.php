<?php 
$ui = Loader::helper('concrete/ui');
$tabs = array();
$active_tab = $section;
$tabs[] = array($view->action('general'), $view_helper->m62Lang('general_bp_settings_menu'), ($active_tab == 'general' ? true : false));
$tabs[] = array($view->action('db'), $view_helper->m62Lang('db_bp_settings_menu'), ($active_tab == 'db' ? true : false));
$tabs[] = array($view->action('files'), $view_helper->m62Lang('files_bp_settings_menu'), ($active_tab == 'files' ? true : false));
$tabs[] = array($view->action('cron'), $view_helper->m62Lang('cron_bp_settings_menu'), ($active_tab == 'cron' ? true : false));
$tabs[] = array($view->action('storage_locations'), $view_helper->m62Lang('storage_location_bp_settings_menu'), ($active_tab == 'storage_locations' ? true : false));
$tabs[] = array($view->action('integrity_agent'), $view_helper->m62Lang('integrity_agent_bp_settings_menu'), ($active_tab == 'integrity_agent' ? true : false));
$tabs[] = array($view->action('license'), $view_helper->m62Lang('license_bp_settings_menu'), ($active_tab == 'license' ? true : false));
echo $ui->tabs($tabs, false); ?>