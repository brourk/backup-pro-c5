<?php include '../_includes/_errors.php'; ?>



<?php if( $form_has_errors ): ?>
	<div class="alert alert-danger">Woops! Looks like we have an issue...</div>
<?php endif; ?>  

<?php include 'settings/_settings_nav.php'; 
$form = Core::make('helper/form');
?>

<br />

<form name="backup_pro_settings" method="POST" action="" class="defaultForm form-horizontal " >
<?php 
$token = Loader::helper('validation/token');
$token->output('bp3_new_storage_form');
?>
<?php include '_form.php'; ?>
	<div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
		<?php echo $ui->submit(t('Save'), 'mail-settings-form','right','btn-primary')?>
        </div>
	</div>
</form>