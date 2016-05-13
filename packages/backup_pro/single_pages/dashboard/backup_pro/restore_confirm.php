<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<div id="container" class="row">
<?php 
\View::element('_errors', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper), 'backup_pro'); 
\View::element('_dashboard_nav', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper, 'active_tab' => 'db_backups'), 'backup_pro');
?>
	
	<div class="panel">
		<h3><?php echo $view_helper->m62Lang('restore_db'); ?></h3>
		
		<div id="_restore_details_table">
		
			<p><?php echo $view_helper->m62Lang('restore_db_question'); ?></p>
			
			<p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?> <?php echo $view_helper->m62Lang('restore_double_speak'); ?></p>
			<table border="0" cellspacing="0" cellpadding="0" class="table"  width="100%" >
			<thead>
			<tr>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
        	<?php if( $backup['note'] != '' ): ?>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('note'); ?>:</strong></td>
        		<td><?php echo $view_helper->m62Escape($backup['note']); ?></td>
        	</tr>
        	
        	<?php endif; ?>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('taken'); ?>:</strong></td>
        		<td><?php echo $view_helper->m62DateTime($backup['created_date']); ?></td>
        	</tr>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('backup_type'); ?>:</strong></td>
        		<td><?php echo $view_helper->m62Lang($backup['database_backup_type']); ?></td>
        	</tr>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('verified'); ?>:</strong></td>
        		<td>
        		<?php if( $backup['verified'] === 'success'): ?>
        			<span class=""><?php echo $view_helper->m62Lang('yes'); ?></span>
        		<?php else: ?>
        			<span style="color:red"><?php echo $view_helper->m62Lang('no'); ?></span>
        		<?php endif; ?>		
        		</td>
        	</tr>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('time_taken'); ?>:</strong></td>
        		<td><?php echo $view_helper->m62TimeFormat($backup['time_taken']); ?></td>
        	</tr>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('max_memory'); ?>:</strong></td>
        		<td><?php echo $view_helper->m62FileSize($backup['max_memory']); ?></td>
        	</tr>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('uncompressed_sql_size'); ?>:</strong></td>
        		<td><?php echo $view_helper->m62FileSize($backup['uncompressed_size']); ?></td>
        	</tr>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('total_tables'); ?>:</strong></td>
        		<td><?php echo $backup['item_count']; ?></td>
        	</tr>
        	<tr>
        		<td><strong><?php echo $view_helper->m62Lang('md5_hash'); ?>:</strong></td>
        		<td><?php echo $backup['hash']; ?></td>
        	</tr>
			</tbody>
			</table>
		</div>
			
		<div id="restore_running_details"  style="display:none" >
			<div id="backup_instructions">
				<?php echo $view_helper->m62Lang('restore_in_progress_instructions'); ?>
			</div>			
			<br /><?php echo $view_helper->m62Lang('restore_in_progress'); ?>
			<img src="<?php echo $bp_static_path; ?>/images/indicator.gif" id="animated_image" />
		</div>
		
		<form name="remove_backups" action="<?php echo $this->url('/dashboard/backup_pro/manage/restore_database'); ?>" method="POST"  >
            <?php 
            $token = Loader::helper('validation/token');
            $token->output('bp3_restore_db_confirm');
            ?>		
			<input type="hidden" name="id" value="<?php echo urlencode($view_helper->m62Encode($backup['details_file_name'])); ?>" />
			<div ><button name="submit_button" class="btn btn-primary" value="1" id="_restore_direct" type="submit">
				<?php echo $view_helper->m62Lang('restore_db'); ?>
			</button>
			</div>			
		</form>	
	</div>
</div>