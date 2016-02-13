<fieldset>
<legend><?php echo $view_helper->m62Lang('rcf_connection_details'); ?></legend>  

    <div class="row">
    	<div class="form-group <?php if($form_errors['rcf_username']): ?>has-error<?php endif; ?>">
    		<label for="rcf_username" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('rcf_username'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('rcf_username', $form_data['rcf_username'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('rcf_username_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['rcf_username']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['rcf_api']): ?>has-error<?php endif; ?>">
    		<label for="rcf_api" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('rcf_api'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->password('rcf_api', $form_data['rcf_api'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('rcf_api_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['rcf_api']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['rcf_container']): ?>has-error<?php endif; ?>">
    		<label for="rcf_container" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('rcf_container'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('rcf_container', $form_data['rcf_container'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('rcf_container_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['rcf_container']); ?>
    		</div>
    	</div>
    </div>

</fieldset>
    
<fieldset>
<legend><?php echo $view_helper->m62Lang('advanced_options'); ?></legend>    
    <div class="row">
    	<div class="form-group <?php if($form_errors['rcf_optional_prefix']): ?>has-error<?php endif; ?>">
    		<label for="rcf_optional_prefix" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('rcf_optional_prefix'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('rcf_optional_prefix', $form_data['rcf_optional_prefix'])?>
    			<span class="input-group-addon"><?php echo t($view_helper->m62Lang('path_to_prefix_example')); ?></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('rcf_optional_prefix_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['rcf_optional_prefix']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['rcf_location']): ?>has-error<?php endif; ?>">
    		<label for="rcf_location" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('rcf_location'))?></label>
    		<div class="col-sm-7">
    		<?php
    		$cf_location_options = array('us' => 'US', 'uk' => 'UK');
    		echo $form->select('rcf_location', $cf_location_options, $form_data['rcf_location']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('rcf_location_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['rcf_location']); ?>
    		</div>
    	</div>
    </div>
</fieldset>    