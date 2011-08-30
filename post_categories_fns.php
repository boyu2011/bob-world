<?php
include_once 'db_fns.php';

function get_post_categories ()
{
	$conn = db_connect();
	
	$result = $conn->query("SELECT * FROM post_categories");
	
	if ( ! $result )
		return false;
		
	$post_cat_array = array();
	
	while ( $row = $result->fetch_assoc() )
	{
		$post_cat_array[] = $row;
	}
	
	return $post_cat_array;
}

// add new post category to the database

function add_post_cat ($new_post_cat)
{
	$new_post_cat = mysql_escape_string($new_post_cat);
	
	$conn = db_connect();
	
	// check not a repeat category
	$result = $conn->query("SELECT * FROM post_categories WHERE name ='".$new_post_cat."'");
	if ( $result && ($result->num_rows>0))
	{
		throw new Exception("Post category already exists.");
	}
	
	// insert the new category.
	if (!$conn->query("INSERT INTO post_categories SET name = '".$new_post_cat."'"))
	{
		throw new Exception("Post category could not be inserted.");
	}
	
	return true;
}
