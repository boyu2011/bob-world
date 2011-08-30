<?php

function do_html_header ()
{

 	echo '<html>';
	echo '<head>';
	echo '<link rel="stylesheet" type="text/css" href="mystyle.css" />';
	echo '<script type="text/javascript" src="lightbox.js"></script>';
	echo '<title>Bob World.</title>';
	echo '</head>';
	echo '<h1>Welcome to Bob World.</h1>';
	//echo '<embed src="resources/bg.mp3" hidden="true" autostart="true" loop="true" />';
}

function do_html_footer ()
{
	echo '</body>';
	echo '</html>'; 
}

function do_html_menu()
{
	echo '<ul class="main_menu">';
	echo '<li class="main_menu"><a href="index.php" class="main_menu">Home</a></li>';
	echo '<li class="main_menu"><a href="posts.php" class="main_menu">Posts</a></li>';
	echo '<li class="main_menu"><a href="albums.php" class="main_menu">album</a></li>';
	echo '<li class="main_menu"><a href="chat/index.php" class="main_menu">Chat</a></li>';
	echo '<li class="main_menu"><a href="about.php" class="main_menu">About</a></li>';
	echo '</ul>';
}

function display_posts ($post_array)
{
	if ( is_array($post_array) && (count($post_array)>0) )
	{
		foreach ( $post_array as $post )
		{	
			echo '<form action="" method="post">';
			echo '<h2>'.$post['title'].'</h2>';
			//echo '<label>Category</label><br />';
			//echo '<label>Contents</label><br />';
			echo '<textarea name="contents" readonly="readonly" rows="10" cols="55">' . $post['contents'] . '</textarea><br />';
			echo '<label>Posted at ' . $post['date_posted'] . '</label>';
			echo '</form>';
		}
	}
}



