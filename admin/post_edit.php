<?php

include_once '../posts_fns.php';
include_once 'output_fns.php';

do_admin_html_header();
display_admin_main_menu();

$post_id = $_GET['id'];
$post_title = $_POST['title'];
$post_contents = $_POST['contents'];

try 
{
	$result = update_post($post_id, $post_title, $post_contents);
} 
catch (Exception $e) 
{
	echo $e->getMessage();
}

if ( $result )
	echo 'Updated successfully!<br>';
else 
	echo 'Update failed!<br>';
	
	
do_html_footer();
	
