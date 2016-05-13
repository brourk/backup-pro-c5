<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php 
\View::element('_errors', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper), 'backup_pro');
\View::element('settings/_settings_nav', array('context' => $this, 'view_helper' => $view_helper, 'active_tab' => $section), 'backup_pro');
?>
<br />

<div class="panel">

<form name="new_storage_form" method="POST" action="" class="defaultForm form-horizontal " >
    <?php 
    $app = \Concrete\Core\Support\Facade\Application::getFacadeApplication();
    $token = $app->make('helper/validation/token');
    $token->output('bp3_remove_storage_form');
    ?>
	
    <p><?php echo $view_helper->m62Lang('delete_storage_confirm'); ?></p>
    <p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?></p>   
    <p><?php echo $storage_details['storage_location_name']; ?></p> 
		<input type="submit" name="ccm-submit-m62_settings_submit" id="m62_settings_submit" value="<?php echo t($view_helper->m62Lang('remove_storage_location')); ?>" class="btn btn-primary">
                   
</form>		
</div>