<fieldset>
<?php 
$db_backup_methods = array('php' => 'PHP', 'mysqldump' => 'MySQLDUMP');
$db_restore_methods = array('php' => 'PHP', 'mysql' => 'MySQL');
?>
<div class="row">
	<div class="form-group <?php if($form_errors['max_db_backups']): ?>has-error<?php endif; ?>">
		<label for="max_db_backups" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('max_db_backups'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('max_db_backups', $form_data['max_db_backups'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('max_db_backups_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['max_db_backups']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['db_backup_alert_threshold']): ?>has-error<?php endif; ?>">
		<label for="db_backup_alert_threshold" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_alert_threshold'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('db_backup_alert_threshold', $form_data['db_backup_alert_threshold'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_alert_threshold_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['db_backup_alert_threshold']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['db_backup_method']): ?>has-error<?php endif; ?>">
		<label for="db_backup_method" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_method'))?></label>
		<div class="col-sm-7">
		<?php echo $form->select('db_backup_method', $db_backup_methods, $form_data['db_backup_method']); ?>
		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_method_instructions'); ?></div>
		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_method']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['php_backup_method_select_chunk_limit']): ?>has-error<?php endif; ?>">
		<label for="php_backup_method_select_chunk_limit" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('php_backup_method_select_chunk_limit'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('php_backup_method_select_chunk_limit', $form_data['php_backup_method_select_chunk_limit'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('php_backup_method_select_chunk_limit_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['php_backup_method_select_chunk_limit']); ?>
		</div>
	</div>
</div>

</fieldset>