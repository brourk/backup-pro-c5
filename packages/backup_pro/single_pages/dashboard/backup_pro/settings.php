<?php 
defined('C5_EXECUTE') or die('Access Denied.');
$view_helper->partial('_includes/_errors', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta), $this);  ?>



<?php if( $form_has_errors ): ?>
	<div class="alert alert-danger">Woops! Looks like we have an issue...</div>
<?php endif; ?>  

<?php 
$view_helper->partial('settings/_settings_nav', array('active_tab' => $section), $this);
$form = Core::make('helper/form');
$ui = Loader::helper('concrete/ui');
?>

<br />

<form name="backup_pro_settings" method="POST" action="" class="defaultForm form-horizontal " >
<?php 
$token = Loader::helper('validation/token');
$token->output('bp3_settings_form');
$vars = array(
    'form_errors' => $form_errors, 
    'form_data' => $form_data, 
    'threshold_options' => $threshold_options,
    'form' => $form,
    'ia_cron_commands' => $ia_cron_commands,
    'backup_cron_commands' => $backup_cron_commands,
    'db_tables' => $db_tables,
    'rest_api_route_entry' => $rest_api_route_entry
);
switch($section)
{
	case 'cron':
	case 'db':
	case 'files':
	case 'license':
	case 'api':
	case 'integrity_agent':
	    $view_helper->partial('settings/_'.$section, $vars, $this);
		break;

	default:
		$view_helper->partial('settings/_general', $vars, $this);
		break;
}

?>

        <input type="submit" name="ccm-submit-m62_settings_submit" id="m62_settings_submit" value="<?php echo t($view_helper->m62Lang('update_settings')); ?>" class="btn btn-primary">

</form>