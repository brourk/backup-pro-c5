<fieldset>
<p><?php echo $view_helper->m62Lang('license_details_instructions'); ?></p>
    <div class="row">
    	<div class="form-group <?php if($form_errors['license_number']): ?>has-error<?php endif; ?>">
    		<label for="license_number" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('license_number'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('license_number', $form_data['license_number'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('license_number_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['license_number']); ?>
    		</div>
    	</div>
    </div>
</fieldset>    