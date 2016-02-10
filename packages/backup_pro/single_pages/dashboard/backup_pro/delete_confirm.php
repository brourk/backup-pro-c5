<div id="container" class="row">

<?php 
$view_helper->partial('_includes/_errors', array('bp_errors' => $bp_errors), $this);
$view_helper->partial('_includes/_dashboard_nav', array('active_tab' => 'db_backups'), $this);
?>
    <div class="panel">
		<h3><?php echo $view_helper->m62Lang('delete_backup'); ?> ( <?php echo count($backups); ?> )</h3>
		
		<p><?php echo $view_helper->m62Lang('delete_backup_confirm'); ?></p>
		
		<p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?></p>
			<br /><br />
			<form name="remove_backups" action="<?php echo $this->url('/dashboard/backup_pro/manage/delete_backups'); ?>" method="POST"  >
            <?php 
            $token = Loader::helper('validation/token');
            $token->output('bp3_remove_backups_confirmed');
            ?>			
			<input type="hidden" value="<?php echo $backup_type; ?>" name="type" />
			<?php 
			$options = array('enable_type' => 'yes', 'enable_editable_note' => 'no', 'enable_actions' => 'no', 'enable_delete' => 'no');
			extract($options);
			include '_includes/_backup_table.php'; ?>
			
			
			<div class="panel-footer"><button name="submit_button" class="btn btn-primary pull-right" value="1" id="_remove_backup_button" type="submit">
                <?php echo $view_helper->m62Lang('delete'); ?>
            </button>
			</div>
			</form>

	</div>
</div>