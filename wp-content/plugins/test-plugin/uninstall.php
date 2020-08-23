<?php

/*
* Trigger to uninstall the plugin
*/

//security to restrict outside users to uninstall the plugin
if ( ! defined('WP_UNINSTALL_PLUGIN') ) {
	die;
}


// Clear database store data

/*this is good if your deleting one custom post type and one custom taxonomy and the related data*/
$books = get_posts( array('post_type' => 'book', 'numberposts' => -1) );

foreach ($books as $book) {
	wp_delete_post($book->ID, true);
}


// if you want to delete all related to posts like meta boxes
//use the wpdb

//access the database via SQL
global wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'book' ");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id from wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id from wp_posts)");

