<?php defined('C5_EXECUTE') or die('Access Denied.');
\View::element('_errors', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper), 'backup_pro');
echo '<p>'.$engine_desc.'</p>';
\View::element('settings/_settings_nav', array('context' => $this, 'view_helper' => $view_helper, 'active_tab' => $section), 'backup_pro');
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
	\View::element('storage/_submenu', $options, 'backup_pro'); ?>
<br clear="all" />
<?php if( $form_has_errors ): ?>
	<div class="alert alert-danger"  style="margin-right:20px;"><?php echo t($view_helper->m62Lang('fix_form_errors')); ?></div>
<?php endif; ?>  

<br />

<form name="backup_pro_settings" method="POST" action="" class="defaultForm form-horizontal " >
<?php 
$app = \Concrete\Core\Support\Facade\Application::getFacadeApplication();

$form = $app->make('helper/form');
$token = $app->make('helper/validation/token');

$token->output('bp3_edit_storage_form');
$vars = array(
    'form' => $form, 
    '_form_template' => $_form_template,
    'form_data' => $form_data,
    'view_helper' => $view_helper,
    'form_errors' => $form_errors
);

\View::element('storage/_form', $vars, 'backup_pro');
?>

    <input type="submit" name="m62_settings_submit" id="m62_settings_submit" value="<?php echo t($view_helper->m62Lang('edit_storage_location')); ?>" class="btn btn-primary">
</form>

</div>