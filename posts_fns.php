<?php
include_once 'db_fns.php';

function get_posts ()
{
	$conn = db_connect();
	
	$result = $conn->query("SELECT * FROM posts ORDER BY date_posted DESC");
	
	if ( ! $result )
		return false;
		
	$post_array = array();

	while ( $row = $result->fetch_assoc() )
	{
		$post_array[] = $row;
	}
	
	return $post_array;
} 

function get_post ($post_id)
{
	$post_id = (int) $post_id;
	
	$conn = db_connect();
	
	$result = $conn->query("SELECT * FROM posts WHERE id = '".$post_id."'");
	
	if (!$result)
		return false;
		
	$post = $result->fetch_assoc();
	
	return $post;
}

function update_post ($id, $title, $contents)
{
	$id = (int) $id;
	$title 		= mysql_escape_string($title);
	$contents 	= mysql_escape_string($contents);
	
	$conn = db_connect();
	
	$result = $conn->query("UPDATE posts SET title = '$title', contents = '$contents' WHERE id = '$id'");
	
	if (!$result)
		return false;
		
	return true;
}

function add_post ( $post_cat_id, $title, $contents )
{
	$post_cat_id = (int) $post_cat_id;
	$title 		= mysql_escape_string($title);
	$contents 	= mysql_escape_string($contents);
	
	$conn = db_connect();
	
	$result = $conn->query("INSERT INTO posts SET 
							cat_id = '$post_cat_id',
							title = '$title',
							contents = '$contents',
							date_posted = NOW()");
	
	if ( !$result )
		return false;
	else 
		return true;
}

function delete_post ( $post_id )
{
	$post_id = (int)$post_id;
	
	$conn = db_connect();
	
	$result = $conn->query("DELETE FROM posts WHERE id = '$post_id'");
	
	if ( !$result )
		return false;
	else 
		return true;
}




