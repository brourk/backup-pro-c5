<fieldset>
<legend>Email Inbox Details</legend>    
    <input type="hidden" value="0" name="ftp_passive" />
    <input type="hidden" value="0" name="ftp_ssl" />
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['ftp_hostname']): ?>has-error<?php endif; ?>">
    		<label for="ftp_hostname" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('ftp_hostname'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('ftp_hostname', $form_data['ftp_hostname'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('ftp_hostname_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['ftp_hostname']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['ftp_username']): ?>has-error<?php endif; ?>">
    		<label for="ftp_username" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('ftp_username'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('ftp_username', $form_data['ftp_username'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('ftp_username_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['ftp_username']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['ftp_password']): ?>has-error<?php endif; ?>">
    		<label for="ftp_password" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('ftp_password'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->password('ftp_password', $form_data['ftp_password'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('ftp_password_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['ftp_password']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['ftp_port']): ?>has-error<?php endif; ?>">
    		<label for="ftp_port" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('ftp_port'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('ftp_port', $form_data['ftp_port'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('ftp_port_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['ftp_port']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['ftp_store_location']): ?>has-error<?php endif; ?>">
    		<label for="ftp_store_location" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('ftp_store_location'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('ftp_store_location', $form_data['ftp_store_location'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('ftp_store_location_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['ftp_store_location']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if(is_array($form_errors['ftp_passive'])): ?>has-error<?php endif; ?>">
        	<label class="control-label col-sm-3" for="ftp_passive"><?php echo t($view_helper->m62Lang('ftp_passive'))?></label>
        	<div class="col-sm-7">
                <?php echo $form->checkbox('ftp_passive', 1, $form_data['ftp_passive'])?>
                <span class="small"><?php echo $view_helper->m62Lang('ftp_passive_instructions'); ?></span>
                <?php echo $view_helper->m62FormErrors($form_errors['ftp_passive']); ?>
            </div>
        </div>
    </div>

</fieldset>
<fieldset>
<legend>Email Inbox Details</legend>      
    <div class="row">
    	<div class="form-group <?php if(is_array($form_errors['ftp_ssl'])): ?>has-error<?php endif; ?>">
        	<label class="control-label col-sm-3" for="ftp_ssl"><?php echo t($view_helper->m62Lang('ftp_ssl'))?></label>
        	<div class="col-sm-7">
                <?php echo $form->checkbox('ftp_ssl', 1, $form_data['ftp_ssl'])?>
                <span class="small"><?php echo $view_helper->m62Lang('ftp_ssl_instructions'); ?></span>
                <?php echo $view_helper->m62FormErrors($form_errors['ftp_ssl']); ?>
            </div>
        </div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['ftp_timeout']): ?>has-error<?php endif; ?>">
    		<label for="ftp_timeout" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('ftp_timeout'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('ftp_timeout', $form_data['ftp_timeout'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('ftp_timeout_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['ftp_timeout']); ?>
    		</div>
    	</div>
    </div>
</fieldset>    