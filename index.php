<?php

include_once 'output_fns.php';
include_once 'posts_fns.php';

do_html_header();


do_html_menu();

$post_array = get_posts();
display_posts($post_array);

do_html_footer();