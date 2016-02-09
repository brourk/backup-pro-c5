
<?php if( count($errors) != '0'): ?>
	<h3><?php echo $view_helper->m62Lang('pre_backup_setting_issue_blurb'); ?>:</h3>
	<?php $view_helper->partial('_includes/_errors', array('bp_errors' => $pre_backup_errors), $this);  ?>
<?php else: ?>

	<form name="new_storage_form" method="POST" action="" class="defaultForm form-horizontal " >
		<div id="backup_instructions">
			<?php echo $view_helper->m62Lang('backup_in_progress_instructions'); ?>
		</div>	
		<div id="backup_running_details"  style="display:none" ><br /><br />
		<?php echo $view_helper->m62Lang('backup_in_progress'); ?>
		<img src="<?php echo $bp_static_path; ?>/images/indicator.gif" id="animated_image" />
		</div><br />
					
			<button type="submit" value="1"	id="_backup_direct" name="submitAddprofile" class="btn btn-primary">
			<?php echo $view_helper->m62Lang('start_backup'); ?>
			</button>
	</form>	

<?php endif; ?>
