<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<p><?=$view_helper->m62Lang('rest_api_instructions')?></p>
<h3 class="title"><?=$view_helper->m62Lang('rest_api_details')?></h3>
<input type="hidden" value="0" name="enable_rest_api" />

<fieldset>
    <div class="row">
    	<div class="form-group">
    		<label for="rest_api_route_entry" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('rest_api_route_entry'))?></label>
    		<div class="col-sm-7">
    			<a href="<?php echo $context->url($rest_api_route_entry);; ?>" target="_blank"><?php echo $context->url($rest_api_route_entry); ?></a>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="form-group <?php if($form_errors['enable_rest_api']): ?>has-error<?php endif; ?>">
        	<label class="control-label col-sm-3" for="enable_rest_api"><?php echo t($view_helper->m62Lang('enable_rest_api'))?></label>
        	<div class="col-sm-7">
                <?php echo $form->checkbox('enable_rest_api', 1, $form_data['enable_rest_api'])?>
                <span class="small"><?php echo $view_helper->m62Lang('enable_rest_api_instructions'); ?></span>
                <?php echo $view_helper->m62FormErrors($form_errors['enable_rest_api']); ?>
            </div>
        </div>
    </div>

</fieldset>   

<div class="panel" id="rest_api_wrap" style="display:none; ">
<h3 class="title"><?=$view_helper->m62Lang('rest_api_credentials')?></h3>
<p><?=$view_helper->m62Lang('rest_api_credentials_instructions')?></p>

<fieldset>

    <div class="row">
    	<div class="form-group <?php if($form_errors['api_key']): ?>has-error<?php endif; ?>">
    		<label for="api_key" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('api_key'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('api_key', $form_data['api_key'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('api_key_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['api_key']); ?>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="form-group <?php if($form_errors['api_secret']): ?>has-error<?php endif; ?>">
    		<label for="api_secret" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('api_secret'))?></label>
    		<div class="col-sm-7">
    			<div class="input-group">
    			<?php echo $form->text('api_secret', $form_data['api_secret'])?>
    			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
    			</div>
    			<div class="help-block small"><?php echo $view_helper->m62Lang('api_secret_instructions'); ?></div>
    			<?php echo $view_helper->m62FormErrors($form_errors['api_secret']); ?>
    		</div>
    	</div>
    </div>

</fieldset>
</div>