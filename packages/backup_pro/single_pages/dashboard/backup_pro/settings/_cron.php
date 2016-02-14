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
        <?php foreach($backup_cron_commands AS $key => $cron): ?>
        <tr class="even">
        	<td width='50%' style="width:50%;"><?php echo $view_helper->m62Lang($key); ?></td>
        	<td style="width:50%;">
        		<div class="select_all"><?php echo 'curl '.$context->url($cron['url']); ?></div>
        	</td>
        	<td style="width:50%;">
        		<a href="<?php echo $context->url($cron['url']); ?>" class="test_cron" rel="<?php echo $key; ?>">
        			<img src="<?php echo $bp_static_path; ?>/images/test.png" />
        		</a> <img src="<?php echo $bp_static_path; ?>/images/indicator.gif" id="animated_<?php echo $key; ?>" style="display:none" />
        	</td>
        </tr>
        <?php endforeach; ?>
		</tbody>
		</table>
			
</div>

<fieldset>
    <legend><?php echo t($view_helper->m62Lang('configure_cron_notification'))?></legend>
    <div class="row">
    	<div class="form-group <?php if($form_errors['cron_notify_emails']): ?>has-error<?php endif; ?>">
    		<label for="cron_notify_emails" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('cron_notify_emails'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('cron_notify_emails', $form_data['cron_notify_emails']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('cron_notify_emails_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['cron_notify_emails']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['cron_notify_email_mailtype']): ?>has-error<?php endif; ?>">
    		<label for="cron_notify_email_mailtype" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('cron_notify_email_mailtype'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->select('cron_notify_email_mailtype', $view_helper->m62Options('email_type'), $form_data['cron_notify_email_mailtype']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('cron_notify_email_mailtype_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['cron_notify_email_mailtype']); ?>
    		</div>
    	</div>
    </div>    
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['cron_notify_email_subject']): ?>has-error<?php endif; ?>">
    		<label for="cron_notify_email_subject" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('cron_notify_email_subject'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('cron_notify_email_subject', $form_data['cron_notify_email_subject'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('cron_notify_email_subject_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['cron_notify_email_subject']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['cron_notify_email_message']): ?>has-error<?php endif; ?>">
    		<label for="cron_notify_email_message" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('cron_notify_email_message'))?></label>
    		<div class="col-sm-7">
    		<?php echo $form->textarea('cron_notify_email_message', $form_data['cron_notify_email_message']); ?>
    		<div class="help-block small"><?php echo $view_helper->m62Lang('cron_notify_email_message_instructions'); ?></div>
    		<?php echo $view_helper->m62FormErrors($form_errors['cron_notify_email_message']); ?>
    		</div>
    	</div>
    </div>

</fieldset>