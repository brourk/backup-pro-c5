<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<div id="container" class="row">

<?php 
\View::element('_errors', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper), 'backup_pro');
\View::element('_dashboard_nav', array('bp_errors' => $bp_errors, 'backup_meta' => $backup_meta, 'context' => $this, 'view_helper' => $view_helper, 'active_tab' => 'db_backups'), 'backup_pro');
?>
    <div class="panel">
		<h3><?php echo $view_helper->m62Lang('delete_backup'); ?> ( <?php echo count($backups); ?> )</h3>
		
		<p><?php echo $view_helper->m62Lang('delete_backup_confirm'); ?></p>
		
		<p class="notice"><?php echo $view_helper->m62Lang('action_can_not_be_undone'); ?></p>
			<br /><br />
			<form name="remove_backups" action="<?php echo $this->url('/dashboard/backup_pro/manage/delete_backups'); ?>" method="POST"  >
            <?php 
            $app = \Concrete\Core\Support\Facade\Application::getFacadeApplication();
            $token = $app->make('helper/validation/token');
            $token->output('bp3_remove_backups_confirmed');
            ?>			
			<input type="hidden" value="<?php echo $backup_type; ?>" name="type" />
			<?php 
			$options = array(
			    'enable_type' => 'yes', 
			    'enable_editable_note' => 'no', 
			    'enable_actions' => 'no', 
			    'enable_delete' => 'no', 
			    'backups' => $backups,
			    'context' => $this,
			    'view_helper' => $view_helper,
			    'bp_static_path' => $bp_static_path
			);
			\View::element('_backup_table', $options, 'backup_pro'); ?>
			
			
			<div><button name="submit_button" class="btn btn-primary pull-right" value="1" id="_remove_backup_button" type="submit">
                <?php echo $view_helper->m62Lang('delete'); ?>
            </button>
			</div>
			</form>

	</div>
</div>