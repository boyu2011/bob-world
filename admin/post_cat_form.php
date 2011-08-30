<?php
include_once 'output_fns.php';
include_once '../post_categories_fns.php';

do_admin_html_header();

display_admin_main_menu();


if (isset($_POST['post_cat_name']))
{
	if ( empty($_POST['post_cat_name']) )
		echo '<br />You must submit a name.'; 
	else 
		add_post_cat($_POST['post_cat_name']);
}

// show post categories.

if ( $post_cat_array = get_post_categories() )
{
	display_post_categories($post_cat_array);
}

display_add_post_cat_form();

do_html_footer();