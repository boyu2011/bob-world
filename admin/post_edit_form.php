<?php
include_once '../posts_fns.php';
include_once 'output_fns.php';

do_admin_html_header();
display_admin_main_menu();

$post_id = $_GET['id'];

$post = get_post($post_id);

display_edit_post($post);

do_html_footer();