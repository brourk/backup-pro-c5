<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<fieldset>
<legend><?php echo $view_helper->m62Lang('dropbox_details'); ?></legend>

<div class="row">
	<div class="form-group <?php if($form_errors['dropbox_access_token']): ?>has-error<?php endif; ?>">
		<label for="dropbox_access_token" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('dropbox_access_token'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('dropbox_access_token', $form_data['dropbox_access_token'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('dropbox_access_token_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['dropbox_access_token']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['dropbox_app_secret']): ?>has-error<?php endif; ?>">
		<label for="dropbox_app_secret" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('dropbox_app_secret'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('dropbox_app_secret', $form_data['dropbox_app_secret'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('dropbox_app_secret_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['dropbox_app_secret']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['dropbox_prefix']): ?>has-error<?php endif; ?>">
		<label for="dropbox_prefix" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('dropbox_prefix'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('dropbox_prefix', $form_data['dropbox_prefix'])?>
			<span class="input-group-addon"><?php echo t($view_helper->m62Lang('path_to_prefix_example')); ?></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('dropbox_prefix_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['dropbox_prefix']); ?>
		</div>
	</div>
</div>

</fieldset>