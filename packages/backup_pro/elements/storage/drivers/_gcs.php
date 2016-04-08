<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<fieldset>
<legend><?php echo $view_helper->m62Lang('gcs_connection_details'); ?></legend>      
    <div class="row">
    	<div class="form-group <?php if($form_errors['gcs_access_key']): ?>has-error<?php endif; ?>">
    		<label for="gcs_access_key" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('gcs_access_key'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('gcs_access_key', $form_data['gcs_access_key'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('gcs_access_key_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['gcs_access_key']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['gcs_secret_key']): ?>has-error<?php endif; ?>">
    		<label for="gcs_secret_key" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('gcs_secret_key'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('gcs_secret_key', $form_data['gcs_secret_key'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('gcs_secret_key_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['gcs_secret_key']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['gcs_bucket']): ?>has-error<?php endif; ?>">
    		<label for="gcs_bucket" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('gcs_bucket'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('gcs_bucket', $form_data['gcs_bucket'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('gcs_bucket_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['gcs_bucket']); ?>
    		</div>
    	</div>
    </div>
</fieldset>    

<fieldset>
<legend><?php echo $view_helper->m62Lang('advanced_options'); ?></legend>
    <div class="row">
    	<div class="form-group <?php if($form_errors['gcs_optional_prefix']): ?>has-error<?php endif; ?>">
    		<label for="gcs_optional_prefix" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('gcs_optional_prefix'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('gcs_optional_prefix', $form_data['gcs_optional_prefix'])?>
    			<span class="input-group-addon"><?php echo t($view_helper->m62Lang('path_to_prefix_example')); ?></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('gcs_optional_prefix_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['gcs_optional_prefix']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['gcs_reduced_redundancy']): ?>has-error<?php endif; ?>">
        	<label class="control-label col-sm-3" for="gcs_reduced_redundancy"><?php echo t($view_helper->m62Lang('gcs_reduced_redundancy'))?></label>
        	<div class="col-sm-7">
                <?php echo $form->checkbox('gcs_reduced_redundancy', 1, $form_data['gcs_reduced_redundancy'])?>
                <span class="small"><?php echo $view_helper->m62Lang('gcs_reduced_redundancy_instructions'); ?></span>
                <?php echo $view_helper->m62FormErrors($form_errors['gcs_reduced_redundancy']); ?>
            </div>
        </div>
    </div>
</fieldset>
