<fieldset>
<input type="hidden" name="regex_file_exclude" value="0" />
    <div class="row">
    	<div class="form-group <?php if($form_errors['max_file_backups']): ?>has-error<?php endif; ?>">
    		<label for="max_file_backups" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('max_file_backups'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('max_file_backups', $form_data['max_file_backups'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('max_file_backups_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['max_file_backups']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['file_backup_alert_threshold']): ?>has-error<?php endif; ?>">
    		<label for="file_backup_alert_threshold" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('file_backup_alert_threshold'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('file_backup_alert_threshold', $form_data['file_backup_alert_threshold'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('file_backup_alert_threshold_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['file_backup_alert_threshold']); ?>
    		</div>
    	</div>
    </div>  
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['backup_file_location']): ?>has-error<?php endif; ?>">
    		<label for="backup_file_locations" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('backup_file_location'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('backup_file_location', $form_data['backup_file_location']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('backup_file_location_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['backup_file_location']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['exclude_paths']): ?>has-error<?php endif; ?>">
    		<label for="exclude_paths" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('exclude_paths'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('exclude_paths', $form_data['exclude_paths']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('exclude_paths_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['exclude_paths']); ?>
    		</div>
    	</div>
    </div>  
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['regex_file_exclude']): ?>has-error<?php endif; ?>">
        	<label class="control-label col-sm-3" for="regex_file_exclude"><?php echo t($view_helper->m62Lang('regex_file_exclude'))?></label>
        	<div class="col-sm-7">
                <?php echo $form->checkbox('regex_file_exclude', 1, $form_data['regex_file_exclude'])?>
                <span class="small"><?php echo $view_helper->m62Lang('regex_file_exclude_instructions'); ?></span>
                <?php echo $view_helper->m62FormErrors($form_errors['regex_file_exclude']); ?>
            </div>
        </div>
    </div>    
</fieldset>