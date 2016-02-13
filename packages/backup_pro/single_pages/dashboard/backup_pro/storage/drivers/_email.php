<fieldset>
<legend><?php echo $view_helper->m62Lang('email_inbox_details'); ?></legend>    
    <div class="row">
    	<div class="form-group <?php if($form_errors['email_storage_emails']): ?>has-error<?php endif; ?>">
    		<label for="email_storage_emails" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('email_storage_emails'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('email_storage_emails', $form_data['email_storage_emails']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('email_storage_emails_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['email_storage_emails']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['email_storage_attach_threshold']): ?>has-error<?php endif; ?>">
    		<label for="email_storage_attach_threshold" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('email_storage_attach_threshold'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('email_storage_attach_threshold', $form_data['email_storage_attach_threshold'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('email_storage_attach_threshold_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['email_storage_attach_threshold']); ?>
    		</div>
    	</div>
    </div>
</fieldset>    