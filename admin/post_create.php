<?php

include_once '../posts_fns.php';
include_once 'output_fns.php';

do_admin_html_header();
display_admin_main_menu();

$post_cat_id = $_POST['category'];
$post_title = $_POST['title'];
$post_contents = $_POST['contents'];

if ( !$post_cat_id || !$post_title || !$post_contents )
{
	echo 'You have not entered all the required details.<br />'
		 .'Please go back and try again.';
	
	exit;
}

try 
{
	$result = add_post ( $post_cat_id, $post_title, $post_contents );
} 
catch (Exception $e) 
{
	echo $e->getMessage();
}

if ( $result )
	echo 'Post successfully!<br>';
else 
	echo 'Post failed!<br>';
	
	
do_html_footer();
	
