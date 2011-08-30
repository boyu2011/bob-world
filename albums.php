<?php

include_once 'output_fns.php';

do_html_header();

do_html_footer();

do_html_menu();


// find each album and display as links
$base = "data";
$handle = opendir($base);

echo '<form>';
while ($dir = readdir($handle))
{
	if ( $dir != "." && $dir != ".." && $dir != "thumbs" )
	{
		echo '<h2>';
		echo '<a href="album.php?album='.$base.'/'.$dir.'">'.$dir.'</a><br />';
	}
}
echo '</form>';
closedir($handle);