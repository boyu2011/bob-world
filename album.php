<?php

include_once 'output_fns.php';

do_html_header();

do_html_menu();


$album_dir = $_GET['album'];
$thumbs_dir = "data/thumbs";
$x = 0;


if ( !is_dir($album_dir) )
{
	echo "Album doesn't exist.";
}
else
{
	$handle = opendir($album_dir);
	while ( $file = readdir($handle) )
	{
		if ( $file != "." && $file != ".." )
		{
			
			echo "<table style='display:inline;'><tr><td><a href='$album_dir/$file' rel='lightbox' ><img src='$thumbs_dir/$file' width='100px' height='100px'></a></td></tr></table>";
			$x++;
			
			if ( $x == 2 )
			{
				echo "<br />";
				$x = 0;
			}
		}
	}
}

do_html_footer();