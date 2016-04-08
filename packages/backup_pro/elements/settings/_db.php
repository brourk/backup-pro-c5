<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<fieldset>
<?php 
$db_backup_methods = array('php' => 'PHP', 'mysqldump' => 'MySQLDUMP');
$db_restore_methods = array('php' => 'PHP', 'mysql' => 'MySQL');
?>
    <div class="row">
    	<div class="form-group <?php if($form_errors['max_db_backups']): ?>has-error<?php endif; ?>">
    		<label for="max_db_backups" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('max_db_backups'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('max_db_backups', $form_data['max_db_backups'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('max_db_backups_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['max_db_backups']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_alert_threshold']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_alert_threshold" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_alert_threshold'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('db_backup_alert_threshold', $form_data['db_backup_alert_threshold'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_alert_threshold_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['db_backup_alert_threshold']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_method']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_method" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_method'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->select('db_backup_method', $db_backup_methods, $form_data['db_backup_method']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_method_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_method']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row" id="mysqldump_command_wrap" style="display:none;">
    	<div class="form-group <?php if($form_errors['mysqldump_command']): ?>has-error<?php endif; ?>">
    		<label for="mysqldump_command" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('mysqldump_command'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('mysqldump_command', $form_data['mysqldump_command'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('mysqldump_command_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['mysqldump_command']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row" id="php_backup_method_select_chunk_limit_wrap" style="display:none;">
    	<div class="form-group <?php if($form_errors['php_backup_method_select_chunk_limit']): ?>has-error<?php endif; ?>">
    		<label for="php_backup_method_select_chunk_limit" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('php_backup_method_select_chunk_limit'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('php_backup_method_select_chunk_limit', $form_data['php_backup_method_select_chunk_limit'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('php_backup_method_select_chunk_limit_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['php_backup_method_select_chunk_limit']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_restore_method']): ?>has-error<?php endif; ?>">
    		<label for="db_restore_method" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_restore_method'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->select('db_restore_method', $db_restore_methods, $form_data['db_restore_method']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_restore_method_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_restore_method']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row" id="mysqlcli_command_wrap" style="display:none;">
    	<div class="form-group <?php if($form_errors['mysqlcli_command']): ?>has-error<?php endif; ?>">
    		<label for="mysqlcli_command" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('mysqlcli_command'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('mysqlcli_command', $form_data['mysqlcli_command'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('mysqlcli_command_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['mysqlcli_command']); ?>
    		</div>
    	</div>
    </div>

</fieldset>

<fieldset>
    <legend><?php echo t($view_helper->m62Lang('config_ignore_sql'))?></legend>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_ignore_tables']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_ignore_tables" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_ignore_tables'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->selectMultiple('db_backup_ignore_tables', $db_tables, $form_data['db_backup_ignore_tables']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_ignore_tables_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_ignore_tables']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_ignore_table_data']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_ignore_table_data" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_ignore_table_data'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->selectMultiple('db_backup_ignore_table_data', $db_tables, $form_data['db_backup_ignore_table_data']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_ignore_table_data_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_ignore_table_data']); ?>
    		</div>
    	</div>
    </div>

</fieldset>

<fieldset>
    <legend><?php echo t($view_helper->m62Lang('config_extra_archive_sql'))?></legend>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_archive_pre_sql']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_archive_pre_sql" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_archive_pre_sql'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('db_backup_archive_pre_sql', $form_data['db_backup_archive_pre_sql']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_archive_pre_sql_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_archive_pre_sql']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_archive_post_sql']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_archive_post_sql" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_archive_post_sql'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('db_backup_archive_post_sql', $form_data['db_backup_archive_post_sql']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_archive_post_sql_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_archive_post_sql']); ?>
    		</div>
    	</div>
    </div>
</fieldset>

<fieldset>
    <legend><?php echo t($view_helper->m62Lang('config_execute_sql'))?></legend>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_execute_pre_sql']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_execute_pre_sql" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_execute_pre_sql'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('db_backup_execute_pre_sql', $form_data['db_backup_execute_pre_sql']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_execute_pre_sql_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_execute_pre_sql']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_backup_execute_post_sql']): ?>has-error<?php endif; ?>">
    		<label for="db_backup_execute_post_sql" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_backup_execute_post_sql'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('db_backup_execute_post_sql', $form_data['db_backup_execute_post_sql']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('db_backup_execute_post_sql_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['db_backup_execute_post_sql']); ?>
    		</div>
    	</div>
    </div>
</fieldset>