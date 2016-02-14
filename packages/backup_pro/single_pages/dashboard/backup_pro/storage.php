<?php 
defined('C5_EXECUTE') or die('Access Denied.');
$view_helper->partial('_includes/_errors', array('bp_errors' => $bp_errors), $this);  
$view_helper->partial('settings/_settings_nav', array('active_tab' => $section), $this);
?>

<br />

<div class="panel">

	<?php $view_helper->partial('storage/_submenu', array('available_storage_engines' => $available_storage_engines), $this); ?>

	<table border="0" cellspacing="0" cellpadding="0" class="table"  width="100%" >
	<thead>
	<tr>
		<th><div style="float:left"><?php echo $view_helper->m62Lang('storage_location_name'); ?></div></th>
		<th><div style="float:right"><?php echo $view_helper->m62Lang('type'); ?></div></th>
		<th><div style="float:right"><?php echo $view_helper->m62Lang('status'); ?></div></th>
		<th><div style="float:right"><?php echo $view_helper->m62Lang('created_date'); ?></div></th>
		<th></th>
	</tr>
	</thead>
	<tbody>
	
	<?php if(count($storage_details) == 0): ?>
		<tr>
			<td colspan="5"><div class="no_backup_found"><?php echo $view_helper->m62Lang('no_storage_locations_created_yet')?></div></td>
		</tr>
	<?php else: ?>
        <?php foreach($storage_details AS $key => $storage): ?>
		<tr>
			<td><a href="<?php echo $this->action('edit_storage', $key); ?>"><?php echo $view_helper->m62Escape($storage['storage_location_name']); ?></a></td>
			<td><div style="float:right"><img src="<?php echo $bp_static_path.'/images/storage/'.$view_helper->m62Escape($storage['storage_location_driver']); ?>.png" class="" title="<?php echo $view_helper->m62Escape($storage['storage_location_name']); ?>"></div></td>
			<td><div style="float:right"><?php if ($storage['storage_location_status'] == '1'):?>Active<?php else: ?>Inactive<?php endif;?></div></td>
			<td><div style="float:right"><?php echo $view_helper->m62DateTime($storage['storage_location_create_date']); ?></div></td>
			<td><div style="float:right">
			<?php if($can_remove): ?>
			<a href="<?php echo $this->action('remove_storage', $key); ?>" class="delete icon" title="Delete" role="button">Delete</a>
			<?php endif; ?>
			</div></td>
		</tr>
		<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
	</table>	
</div>