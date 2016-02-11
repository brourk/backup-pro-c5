<?php

if(count($bp_errors) >= 1)
{
	foreach($bp_errors AS $key => $_error)
	{
	    echo '<div class="alert alert-warning" style="margin-right:20px;">';
	    //echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	    echo $view_helper->m62Lang($_error);
	    
	    if( $key == 'no_storage_locations_setup' )
	    {
	        echo ' <a href="'.$context->url('/dashboard/backup_pro/settings/new_storage', 'local').'">'.$view_helper->m62Lang('setup_storage_location').'</a>';
	    }
	    elseif( $key == 'license_number' )
	    {
	        echo ' <a href="'.$context->url('/dashboard/backup_pro/settings/license').'">'.$view_helper->m62Lang('enter_license').'</a> or <a href="https://mithra62.com/projects/view/backup-pro">'.$view_helper->m62Lang('purchase_a_license').'</a>';
	    }
	    elseif( $_error == 'invalid_working_directory' )
	    {
	        echo ' <a href="'.$context->url('/dashboard/backup_pro/settings/general').'">'.$view_helper->m62Lang('check_working_dir').'</a>';
	    }
	    elseif( $_error == 'no_db_backups_exist_yet' )
	    {
	        echo ' <a href="'.$context->url('/dashboard/backup_pro/backup_database').'">'.$view_helper->m62Lang('would_you_like_to_backup_database_now').'</a>';
	    }
	    elseif( $_error == 'no_file_backups_exist_yet' )
	    {
	        echo ' <a href="'.$context->url('/dashboard/backup_pro/backup_files').'">'.$view_helper->m62Lang('would_you_like_to_backup_files_now').'</a>';
	    }
	    elseif( $_error == 'no_backup_file_location' )
	    {
	        echo ' <a href="'.$context->url('/dashboard/backup_pro/settings/files').'">Set File Backup Locations</a>';
	    }
	    elseif( $_error == 'db_backup_past_expectation_stub' || $_error == 'file_backup_past_expectation_stub' )
	    {
	        if( $_error == 'db_backup_past_expectation_stub' )
	        {
	            $lang = sprintf(
	                $view_helper->m62Lang('db_backup_past_expectation'),
	                $view_helper->getRelativeDateTime($backup_meta['database']['newest_backup_taken_raw'], false),
	                $context->url('/dashboard/backup_pro/backup_database')
	            );
	        }
	        else if ( $error == 'file_backup_past_expectation_stub' )
	        {
	            $lang = sprintf(
	                $view_helper->m62Lang('files_backup_past_expectation'),
	                $view_helper->getRelativeDateTime($backup_meta['files']['newest_backup_taken_raw'], false),
	                $context->url('/dashboard/backup_pro/backup_files')
	            );
	        }
	        echo $lang;
	    }	    
	    echo '</div>';
	    
	}
}	