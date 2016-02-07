<fieldset>
<input type="hidden" name="allow_duplicates" value="0" />
<input type="hidden" name="relative_time" value="0" />
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

<div class="row">
	<div class="form-group <?php if($form_errors['cron_query_key']): ?>has-error<?php endif; ?>">
		<label for="cron_query_key" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('cron_query_key'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('cron_query_key', $form_data['cron_query_key'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('cron_query_key_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['cron_query_key']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['dashboard_recent_total']): ?>has-error<?php endif; ?>">
		<label for="dashboard_recent_total" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('dashboard_recent_total'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('dashboard_recent_total', $form_data['dashboard_recent_total'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('dashboard_recent_total_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['dashboard_recent_total']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['auto_threshold']): ?>has-error<?php endif; ?>">
		<label for="auto_threshold" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('auto_threshold'))?></label>
		<div class="col-sm-7">
		<?php echo $form->select('auto_threshold', $threshold_options, $form_data['auto_threshold']); ?>
		<div class="help-block small"><?php echo $view_helper->m62Lang('auto_threshold_instructions'); ?></div>
		<?php echo $view_helper->m62FormErrors($form_errors['auto_threshold']); ?>
		</div>
	</div>
</div>

<div class="row" id="auto_threshold_custom_wrap" style="display:none;">
	<div class="form-group <?php if($form_errors['auto_threshold_custom']): ?>has-error<?php endif; ?>">
		<label for="auto_threshold_custom" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('auto_threshold_custom'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('auto_threshold_custom', $form_data['auto_threshold_custom'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('auto_threshold_custom_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['auto_threshold_custom']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['allow_duplicates']): ?>has-error<?php endif; ?>">
    	<label class="control-label col-sm-3" for="allow_duplicates"><?php echo t($view_helper->m62Lang('allow_duplicates'))?></label>
    	<div class="col-sm-7">
            <?php echo $form->checkbox('allow_duplicates', 1, $form_data['allow_duplicates'])?>
            <span class="small"><?php echo $view_helper->m62Lang('allow_duplicates_instructions'); ?></span>
        </div>
    </div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['date_format']): ?>has-error<?php endif; ?>">
		<label for="date_format" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('date_format'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('date_format', $form_data['date_format'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('date_format_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['date_format']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['relative_time']): ?>has-error<?php endif; ?>">
    	<label class="control-label col-sm-3" for="relative_time"><?php echo t($view_helper->m62Lang('relative_time'))?></label>
    	<div class="col-sm-7">
            <?php echo $form->checkbox('relative_time', 1, $form_data['relative_time'])?>
            <span class="small"><?php echo $view_helper->m62Lang('relative_time_instructions'); ?></span>
        </div>
    </div>
</div>
</fieldset>