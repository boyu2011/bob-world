<?php

include_once '../post_categories_fns.php';

function do_admin_html_header ()
{
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
    <html>
	<head>
	<title>Administrator.</title>
	</head>
	<body>
	<h1>Administrator</h1>
<?php 
}

function do_html_footer ()
{
?>
	</body>
	</html>
<?php 
}

function display_admin_main_menu ()
{
?>
	<a href="index.php">Home</a>
	<a href="post_cat_form.php">Post Category</a>
	<a href="post_list_form.php">Posts</a>
	<br />
<?php
}

function display_post_categories ( $post_categories )
{
	echo "<h2>Post Category List</h2>";
	if ( (is_array($post_categories)) && (count($post_categories)>0) )
	{
		foreach ( $post_categories as $post_cat )
		{
			echo $post_cat['name'] . "<br>";
		}
	}
	else 
	{
		echo 'No Post Categories.' . "<br>";
	}

}

function display_add_post_cat_form()
{
?>
	<h2>Add New Post Category</h2>
	<form name="post_cat_table" action="post_cat_form.php" method="post">
	Post Category Name : <input type="text" name="post_cat_name" /><br />
	<input type="submit" value="Add Post Category" />
	</form>
<?php
}

function display_post_list ($post_array)
{
	echo '<h2>Post List</h2>';
	if ( is_array($post_array) && (count($post_array)>0) )
	{
		foreach ( $post_array as $post )
		{
			echo '<label>'.$post['title'].'</label><br />';
			echo '<a href="post_edit_form.php?id=' . $post['id'] . '">Edit</a>';
			echo '<a href="post_delete.php?id=' . $post['id'] . '" onclick="return confirm(\'are you sure to delete this post?\')">Delete</a><br />';
		}
	}
}

function display_posts ($post_array)
{
	
	if ( is_array($post_array) && (count($post_array)>0) )
	{
		foreach ( $post_array as $post )
		{	
			echo '<form action="post_list_form.php" method="post">';
			echo '<label>Title</label><br />';
			echo '<input type="text" name="title" value="' . $post['title'] . '"><br />';
			//echo '<label>Category</label><br />';
			echo '<label>Contents</label><br />';
			echo '<textarea name="contents">' . $post['contents'] . '</textarea><br />';
			echo '<input type="submit" value="Update">';
			echo '</form>';
			
		}
	}
}

function display_edit_post ($post)
{
	echo '<form action="post_edit.php?id='.$post['id'].'" method="post">';
	echo '<label>Title</label><br />';
	echo '<input type="text" name="title" value="' . $post['title'] . '"><br />';
	//echo '<label>Category</label><br />';
	echo '<label>Contents</label><br />';
	echo '<textarea name="contents">' . $post['contents'] . '</textarea><br />';
	echo '<input type="submit" value="Update">';
	echo '</form>';
}

function display_create_new_post ()
{
	echo '<h2>Create new post</h2>';
	echo '<form action="post_create.php" method="post">';
	echo '<label>Title</label><br />';
	echo '<input type="text" name="title"><br />';
	echo '<label>Category</label><br />';
	echo '<select name = "category">';
	foreach ( get_post_categories() as $cat )
	{
		echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
	}
	echo '</select><br>';
	echo '<label>Contents</label><br />';
	echo '<textarea name="contents"rows="10", cols="55"></textarea><br />';
	echo '<input type="submit" value="Post">';
	echo '</form>';
}

