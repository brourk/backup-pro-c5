<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<div class="panel">
    <table class="table" border="0" cellspacing="0" cellpadding="0">
    <thead>
    	<tr>
    		<th width='50%'></th>
    		<th width='30%'><?php echo $view_helper->m62Lang('cron_commands'); ?></th>
    		<th width='20%'><?php echo $view_helper->m62Lang('test'); ?></th>
    	</tr>
    </thead>
    <tbody>
    <?php foreach($ia_cron_commands AS $key => $cron): ?>
    <tr class="even">
    	<td width='50%' style="width:50%;"><?php echo $view_helper->m62Lang($key); ?></td>
    	<td style="width:50%;">
    		<div class="select_all">0 * * * * * curl <?php echo $context->url($cron['url']); ?></div>
    	</td>
    	<td style="width:50%;">
    		<a href="<?php echo $context->url($cron['url']); ?>" class="test_cron" rel="<?php echo $key; ?>" id="integrity_cmd_<?php echo $key?>">
    			<img src="<?php echo $bp_static_path; ?>/images/test.png" />
    		</a> <img src="<?php echo $bp_static_path; ?>/images/indicator.gif" id="animated_<?php echo $key; ?>" style="display:none" />
    	</td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    </table>			
</div>

<fieldset>
    <legend><?php echo t($view_helper->m62Lang('configure_integrity_agent_verification'))?></legend>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['db_verification_db_name']): ?>has-error<?php endif; ?>">
    		<label for="db_verification_db_name" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('db_verification_db_name'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('db_verification_db_name', $form_data['db_verification_db_name'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('db_verification_db_name_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['db_verification_db_name']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['total_verifications_per_execution']): ?>has-error<?php endif; ?>">
    		<label for="total_verifications_per_execution" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('total_verifications_per_execution'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('total_verifications_per_execution', $form_data['total_verifications_per_execution'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('total_verifications_per_execution_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['total_verifications_per_execution']); ?>
    		</div>
    	</div>
    </div>
            
</fieldset> 

<fieldset>
    <legend><?php echo t($view_helper->m62Lang('configure_integrity_agent_backup_missed_schedule'))?></legend>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['backup_missed_schedule_notify_email_interval']): ?>has-error<?php endif; ?>">
    		<label for="backup_missed_schedule_notify_email_interval" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('backup_missed_schedule_notify_email_interval'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('backup_missed_schedule_notify_email_interval', $form_data['backup_missed_schedule_notify_email_interval'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_interval_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['backup_missed_schedule_notify_email_interval']); ?>
    		</div>
    	</div>
    </div>  
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['backup_missed_schedule_notify_emails']): ?>has-error<?php endif; ?>">
    		<label for="backup_missed_schedule_notify_emails" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('backup_missed_schedule_notify_emails'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('backup_missed_schedule_notify_emails', $form_data['backup_missed_schedule_notify_emails']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_emails_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['backup_missed_schedule_notify_emails']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['backup_missed_schedule_notify_email_mailtype']): ?>has-error<?php endif; ?>">
    		<label for="backup_missed_schedule_notify_email_mailtype" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('backup_missed_schedule_notify_email_mailtype'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->select('backup_missed_schedule_notify_email_mailtype', $view_helper->m62Options('email_type'), $form_data['backup_missed_schedule_notify_email_mailtype']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_mailtype_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['backup_missed_schedule_notify_email_mailtype']); ?>
    		</div>
    	</div>
    </div>    
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['backup_missed_schedule_notify_email_subject']): ?>has-error<?php endif; ?>">
    		<label for="backup_missed_schedule_notify_email_subject" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('backup_missed_schedule_notify_email_subject'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('backup_missed_schedule_notify_email_subject', $form_data['backup_missed_schedule_notify_email_subject'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_subject_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['backup_missed_schedule_notify_email_subject']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['backup_missed_schedule_notify_email_message']): ?>has-error<?php endif; ?>">
    		<label for="backup_missed_schedule_notify_email_message" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('backup_missed_schedule_notify_email_message'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('backup_missed_schedule_notify_email_message', $form_data['backup_missed_schedule_notify_email_message']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('backup_missed_schedule_notify_email_message_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['backup_missed_schedule_notify_email_message']); ?>
    		</div>
    	</div>
    </div>
    
          
</fieldset>       