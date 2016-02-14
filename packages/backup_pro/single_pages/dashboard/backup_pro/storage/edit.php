<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php 
$view_helper->partial('_includes/_errors', array('bp_errors' => $bp_errors), $this);  
echo '<p>'.$engine_desc.'</p>';
$view_helper->partial('settings/_settings_nav', array('active_tab' => $section), $this);
?>

<br />

<div class="panel">
<?php $view_helper->partial('storage/_submenu', array('available_storage_engines' => $available_storage_engines), $this); ?>
<br clear="all" />
<?php if( $form_has_errors ): ?>
	<div class="alert alert-danger">Woops! Looks like we have an issue...</div>
<?php endif; ?>  

<?php
$form = Core::make('helper/form');
$ui = Loader::helper('concrete/ui');
?>

<br />

<form name="backup_pro_settings" method="POST" action="" class="defaultForm form-horizontal " >
<?php 
$token = Loader::helper('validation/token');
$token->output('bp3_edit_storage_form');
$vars = array(
    'form' => $form, 
    '_form_template' => $_form_template,
    'form_data' => $form_data,
    'form_errors' => $form_errors
);

$view_helper->partial('storage/_form', $vars, $this); 
?>

    <input type="submit" name="m62_settings_submit" id="m62_settings_submit" value="<?php echo t($view_helper->m62Lang('edit_storage_location')); ?>" class="btn btn-primary">
</form>

</div>