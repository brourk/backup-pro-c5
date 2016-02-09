<?php 
$view_helper->partial('_includes/_errors', array('bp_errors' => $bp_errors), $this);
$view_helper->partial('_includes/_dashboard_nav', array('active_tab' => 'file_backups'), $this);
?>

    <div class="panel">
	<table class="table" width="100%"  border="0" cellpadding="0" cellspacing="0">
	<thead>
		<tr class="even">
			<th><?php echo $view_helper->m62Lang('total_backups'); ?></th>
			<th style="width:65%"><?php echo $view_helper->m62Lang('total_space_used'); ?></th>
			<th><div style="float:right"><?php echo $view_helper->m62Lang('last_backup_taken'); ?></div></th>
			<th><div style="float:right"><?php echo $view_helper->m62Lang('first_backup_taken'); ?></div></th>
		</tr>
	</thead>
	<tbody>
		<tr class="odd">
			<td><?php echo $backup_meta['files']['total_backups']; ?></td>
			<td><?php echo $backup_meta['files']['total_space_used']; ?></td>
			<td><div style="float:right"><?php echo ($backup_meta['files']['newest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['files']['newest_backup_taken']) : $view_helper->m62Lang('na')); ?></div></td>
			<td><div style="float:right"><?php echo ($backup_meta['files']['oldest_backup_taken'] != '' ? $view_helper->m62DateTime($backup_meta['files']['oldest_backup_taken']) : $view_helper->m62Lang('na')); ?></div></td>
		</tr>
	</tbody>
	</table>
	</div>    
	
	<div class="row panel">
	
    <h3  class="accordion"><?php echo $view_helper->m62Lang('file_backups').' ('.count($backups['files']).')'?></h3>
	<?php if(count($backups['files']) == 0): ?>
		<div class="no_backup_found"><?php echo $view_helper->m62Lang('no_file_backups')?> <a href="<?php echo $url_base; ?>confirm_backup_files"><?php echo $view_helper->m62Lang('would_you_like_to_backup_files_now')?></a></div>
	<?php else: ?>
	
	
		<form name="remove_backups" action="<?php echo $url_base; ?>confirm_remove_backup" method="post">
        <?php echo wp_nonce_field( 'remove_bp_backups' ); ?>
        <?php 
        $options = array('enable_type' => 'no', 'enable_editable_note' => 'yes', 'enable_actions' => 'yes', 'enable_delete' => 'yes');
        extract($options);
        $backups = $backups['files'];
        include '_includes/_backup_table.php';
        ?>	
		<input type="hidden" name="type" id="hidden_backup_type" value="files" />	
		
        <div class="buttons right" style="float:right">
            <?php submit_button($view_helper->m62Lang('delete_backups'), 'primary', '_remove_backup_button');?>
        </div>
		
		</form>
							
	<?php endif; ?>
	
	</div>