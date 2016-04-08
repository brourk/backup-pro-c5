<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php 
Loader::packageElement('_errors', 'backup_pro', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper));
echo '<p>'.$engine_desc.'</p>';
Loader::packageElement('settings/_settings_nav', 'backup_pro', array('context' => $this, 'view_helper' => $view_helper, 'active_tab' => $section));
?>

<br />

<div class="panel">
	<?php 
	$options = array(
	    'context' => $this, 
	    'view_helper' => $view_helper, 
	    'available_storage_engines' => $available_storage_engines, 
	    'bp_static_path' => $bp_static_path
	);
	Loader::packageElement('storage/_submenu', 'backup_pro', $options); ?>
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
$token->output('bp3_new_storage_form');
$vars = array(
    'form' => $form, 
    '_form_template' => $_form_template,
    'form_data' => $form_data,
    'form_errors' => $form_errors,
    'engine_desc' => $engine_desc,
    'view_helper' => $view_helper,
);

Loader::packageElement('storage/_form', 'backup_pro', $vars);
?>
        <input type="submit" name="ccm-submit-m62_settings_submit" id="m62_settings_submit" value="<?php echo t($view_helper->m62Lang('add_storage_location')); ?>" class="btn btn-primary">
</form>

</div>