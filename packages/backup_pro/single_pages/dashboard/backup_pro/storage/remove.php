<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php 
$view_helper->partial('_includes/_errors', array('bp_errors' => $bp_errors), $this);  
$view_helper->partial('settings/_settings_nav', array('active_tab' => $section), $this);
$form = Core::make('helper/form');
$ui = Loader::helper('concrete/ui');
?>
<br />

<div class="panel">

<form name="new_storage_form" method="POST" action="" class="defaultForm form-horizontal " >
    <?php 
    $token = Loader::helper('validation/token');
    $token->output('bp3_remove_storage_form');
    ?>
	
    <p><?php echo $view_helper->m62Lang('delete_storage_confirm'); ?></p>
    <p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?></p>   
    <p><?php echo $storage_details['storage_location_name']; ?></p> 

	<div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
		<?php echo $ui->submit(t($view_helper->m62Lang('remove_storage_location')), 'mail-settings-form','right','btn-primary')?>
        </div>
	</div>                    
</form>		
</div>