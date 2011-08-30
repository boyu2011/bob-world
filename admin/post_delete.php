<?php

include_once '../posts_fns.php';
include_once 'output_fns.php';

do_admin_html_header();
display_admin_main_menu();

$post_id = $_GET['id'];

try 
{
	$result = delete_post ($post_id);
} 
catch (Exception $e) 
{
	echo $e->getMessage();
}

if ( $result )
	echo 'Delete successfully!<br>';
else 
	echo 'Delete failed!<br>';

do_html_footer();