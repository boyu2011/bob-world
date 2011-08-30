<?php

include_once '../posts_fns.php';
include_once 'output_fns.php';

do_admin_html_header();
display_admin_main_menu();

if (isset($_POST['title'], $_POST['contents']))
{
	echo $_POST['contents'];
}

// get posts

$posts = get_posts();
display_post_list($posts);

// create new post
display_create_new_post();


do_html_footer();