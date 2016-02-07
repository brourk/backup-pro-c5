<fieldset>
<div class="row">
	<div class="form-group <?php if($form_errors['working_directory']): ?>has-error<?php endif; ?>">
		<label for="working_directory" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('working_directory'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('working_directory', $form_data['working_directory'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('working_directory_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['working_directory']); ?>
		</div>
	</div>
</div>
</fieldset>