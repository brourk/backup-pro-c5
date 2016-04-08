<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<fieldset>
<legend><?php echo $view_helper->m62Lang('sftp_connection_details'); ?></legend>
    <div class="row">
    	<div class="form-group <?php if($form_errors['sftp_host']): ?>has-error<?php endif; ?>">
    		<label for="sftp_host" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('sftp_host'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('sftp_host', $form_data['sftp_host'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('sftp_host_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['sftp_host']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['sftp_username']): ?>has-error<?php endif; ?>">
    		<label for="sftp_username" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('sftp_username'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('sftp_username', $form_data['sftp_username'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('sftp_username_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['sftp_username']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['sftp_password']): ?>has-error<?php endif; ?>">
    		<label for="sftp_password" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('sftp_password'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->password('sftp_password', $form_data['sftp_password'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('sftp_password_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['sftp_password']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['sftp_private_key']): ?>has-error<?php endif; ?>">
    		<label for="sftp_private_key" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('sftp_private_key'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('sftp_private_key', $form_data['sftp_private_key'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('sftp_private_key_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['sftp_private_key']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['sftp_root']): ?>has-error<?php endif; ?>">
    		<label for="sftp_root" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('sftp_root'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('sftp_root', $form_data['sftp_root'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('sftp_root_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['sftp_root']); ?>
    		</div>
    	</div>
    </div>
    
    
<fieldset>
<legend><?php echo $view_helper->m62Lang('advanced_options'); ?></legend> 

    <div class="row">
    	<div class="form-group <?php if($form_errors['sftp_port']): ?>has-error<?php endif; ?>">
    		<label for="sftp_port" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('sftp_port'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('sftp_port', $form_data['sftp_port'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('sftp_port_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['sftp_port']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['sftp_timeout']): ?>has-error<?php endif; ?>">
    		<label for="sftp_timeout" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('sftp_timeout'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('sftp_timeout', $form_data['sftp_timeout'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('sftp_timeout_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['sftp_timeout']); ?>
    		</div>
    	</div>
    </div>