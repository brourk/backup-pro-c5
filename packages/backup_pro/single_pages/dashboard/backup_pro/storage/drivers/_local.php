<div class="row">
	<div class="form-group <?php if($form_errors['backup_store_location']): ?>has-error<?php endif; ?>">
		<label for="backup_store_location" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('backup_store_location'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('backup_store_location', $form_data['backup_store_location'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('backup_store_location_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['backup_store_location']); ?>
		</div>
	</div>
</div>