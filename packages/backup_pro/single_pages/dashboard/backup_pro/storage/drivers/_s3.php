<input type="hidden" value="0" name="s3_reduced_redundancy" />

<div class="row">
	<div class="form-group <?php if($form_errors['s3_access_key']): ?>has-error<?php endif; ?>">
		<label for="s3_access_key" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('s3_access_key'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('s3_access_key', $form_data['s3_access_key'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('s3_access_key_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['s3_access_key']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['s3_secret_key']): ?>has-error<?php endif; ?>">
		<label for="s3_secret_key" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('s3_secret_key'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->password('s3_secret_key', $form_data['s3_secret_key'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('s3_secret_key_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['s3_secret_key']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['s3_bucket']): ?>has-error<?php endif; ?>">
		<label for="s3_bucket" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('s3_bucket'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('s3_bucket', $form_data['s3_bucket'])?>
			<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('s3_bucket_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['s3_bucket']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['s3_region']): ?>has-error<?php endif; ?>">
		<label for="s3_region" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('s3_region'))?></label>
		<div class="col-sm-7">
		<?php
		echo $form->select('s3_region', $view_helper->m62Options('s3_regions', false), $form_data['s3_region']); ?>
		<div class="help-block small"><?php echo $view_helper->m62Lang('s3_region_instructions'); ?></div>
		<?php echo $view_helper->m62FormErrors($form_errors['s3_region']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['s3_optional_prefix']): ?>has-error<?php endif; ?>">
		<label for="s3_optional_prefix" class="control-label col-sm-3"><?php echo t($view_helper->m62Lang('s3_optional_prefix'))?></label>
		<div class="col-sm-7">
			<div class="input-group">
			<?php echo $form->text('s3_optional_prefix', $form_data['s3_optional_prefix'])?>
			<span class="input-group-addon">/path/to/prefix</span>
			</div>
			<div class="help-block small"><?php echo $view_helper->m62Lang('s3_optional_prefix_instructions'); ?></div>
			<?php echo $view_helper->m62FormErrors($form_errors['s3_optional_prefix']); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="form-group <?php if($form_errors['s3_reduced_redundancy']): ?>has-error<?php endif; ?>">
    	<label class="control-label col-sm-3" for="s3_reduced_redundancy"><?php echo t($view_helper->m62Lang('s3_reduced_redundancy'))?></label>
    	<div class="col-sm-7">
            <?php echo $form->checkbox('s3_reduced_redundancy', 1, $form_data['s3_reduced_redundancy'])?>
            <span class="small"><?php echo $view_helper->m62Lang('s3_reduced_redundancy_instructions'); ?></span>
            <?php echo $view_helper->m62FormErrors($form_errors['s3_reduced_redundancy']); ?>
        </div>
    </div>
</div>