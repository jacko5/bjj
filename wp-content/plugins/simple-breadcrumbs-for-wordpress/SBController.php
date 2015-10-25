<?php
/*
 Plugin Name: Simple Breadcrumbs For WordPress
 Plugin URI: http://www.davidswordpressplugins.com/simple-breadcrumbs-for-wordpress/
 Description: Enables breadcrumb navigation for your wordpress site.  Very simple to use!
 Author: David Nelson
 Version: 1.1
 Author URI: http://www.davidswordpressplugins.com/
 License: GPL2
 */

add_filter('the_title', 'simpleBreadcrumbsForWordpressShowBreadcrumbs', 0, 1);

function simpleBreadcrumbsForWordpressShowBreadcrumbs($titleText)
{
	if(in_the_loop())
	{
		global $post;
		return get_root_parent($post->ID, array());
	}
	return $titleText;
}
function get_root_parent($page_id, $listOfPostInfo) {
	global $wpdb;
	$row = $wpdb->get_row("SELECT post_parent, post_title, ID FROM $wpdb->posts " . 
						  "WHERE ID = '$page_id' and (post_type = 'page' or post_type" . 
						  " = 'post')", OBJECT);
	
	$listOfPostInfo[] = new PostInfoForBreadcrumbs($row->ID, $row->post_title);
	
	if ($row->post_parent == 0) 
	{
		return convertListOfPostInfoIntoBreadcrumbs($listOfPostInfo);
	}
	else 
	{
		return get_root_parent($row->post_parent, $listOfPostInfo);
	}
}

function convertListOfPostInfoIntoBreadcrumbs($listOfPostInfo)
{
	$breadcrumbHtml = '';
	$listOfPostInfo = array_reverse($listOfPostInfo);
	$postTreeDepth = count($listOfPostInfo);
	for($i = 0; $i < $postTreeDepth; $i++)
	{
		if($postTreeDepth - 1 == $i)
		{
			$breadcrumbHtml .= $listOfPostInfo[$i]->getPostTitle();
		}
		else 
		{
			$breadcrumbHtml .= getLink($listOfPostInfo[$i]->getPostId(), 
				$listOfPostInfo[$i]->getPostTitle());
		}
		unset($listOfPostInfo[$i]);
	}
	return $breadcrumbHtml;
}

function getLink($rowId, $text)
{
	return sprintf('<a href="%s">%s</a> &gt; ', get_permalink($rowId), $text);
}

class PostInfoForBreadcrumbs
{
	private $postId;
	private $postTitle;
	public function __construct($postId, $postTitle)
	{
		$this->postId = $postId;
		$this->postTitle = $postTitle;
	}
	public function getPostId()
	{
		return $this->postId;
	}
	public function getPostTitle()
	{
		return $this->postTitle;
	}
}

?>
