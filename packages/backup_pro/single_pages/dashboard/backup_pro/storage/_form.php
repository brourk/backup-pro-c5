<input type="hidden" value="0" name="storage_location_status" />
<input type="hidden" value="0" name="storage_location_file_use" />
<input type="hidden" value="0" name="storage_location_db_use" />
<input type="hidden" value="0" name="storage_location_include_prune" />

<div class="row">
	<div class="form-group <?php if($form_errors['storage_location_name']): ?>has-error<?php endif; ?>">
		<label for="max_db_backups" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('storage_location_name'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('storage_location_name', $form_data['storage_location_name'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('storage_location_name_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['storage_location_name']); ?>
		</div>
	</div>
</div>

<?php 
$vars = array(
    'form' => $form,
    '_form_template' => $_form_template,
    'form_data' => $form_data,
    'form_errors' => $form_errors
);
$view_helper->partial($_form_template, $vars, $context); ?>

<div class="row">
	<div class="form-group <?php if(is_array($form_errors['storage_location_status'])): ?>has-error<?php endif; ?>">
    	<label class="control-label col-sm-3" for="storage_location_status"><?php echo t($view_helper->m62Lang('storage_location_status'))?></label>
    	<div class="col-sm-7">
            <?php echo $form->checkbox('storage_location_status', 1, $form_data['storage_location_status'])?>
            <span class="small"><?php echo $view_helper->m62Lang('storage_location_status_instructions'); ?></span>
        </div>
    </div>
</div>

<div class="row">
	<div class="form-group <?php if(is_array($form_errors['storage_location_file_use'])): ?>has-error<?php endif; ?>">
    	<label class="control-label col-sm-3" for="storage_location_file_use"><?php echo t($view_helper->m62Lang('storage_location_file_use'))?></label>
    	<div class="col-sm-7">
            <?php echo $form->checkbox('storage_location_file_use', 1, $form_data['storage_location_file_use'])?>
            <span class="small"><?php echo $view_helper->m62Lang('storage_location_file_use_instructions'); ?></span>
        </div>
    </div>
</div>

<div class="row">
	<div class="form-group <?php if(is_array($form_errors['storage_location_db_use'])): ?>has-error<?php endif; ?>">
    	<label class="control-label col-sm-3" for="storage_location_db_use"><?php echo t($view_helper->m62Lang('storage_location_db_use'))?></label>
    	<div class="col-sm-7">
            <?php echo $form->checkbox('storage_location_db_use', 1, $form_data['storage_location_db_use'])?>
            <span class="small"><?php echo $view_helper->m62Lang('storage_location_db_use_instructions'); ?></span>
        </div>
    </div>
</div>

<div class="row">
	<div class="form-group <?php if(is_array($form_errors['storage_location_include_prune'])): ?>has-error<?php endif; ?>">
    	<label class="control-label col-sm-3" for="storage_location_include_prune"><?php echo t($view_helper->m62Lang('storage_location_include_prune'))?></label>
    	<div class="col-sm-7">
            <?php echo $form->checkbox('storage_location_include_prune', 1, $form_data['storage_location_include_prune'])?>
            <span class="small"><?php echo $view_helper->m62Lang('storage_location_include_prune_instructions'); ?></span>
        </div>
    </div>
</div>