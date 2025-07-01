<?php
namespace Loveicon\Helper\Posttype;
class Destinations {

	/**
	 * Initialize the class
	 */
	function __construct() {
		// Register the post type
		add_action( 'init', array( $this, 'destinations_post_type' ), 0 );

	}

	function destinations_post_type() {
		$labels = array(
			'name'               => 'Destinations',
			'singular_name'      => 'Destinations',
			'add_new'            => 'Add Destinations',
			'add_new_item'       => 'New Destinations',
			'all_items'          => 'All Destinations',
			'edit_item'          => 'Edit Destinations',
			'view_item'          => 'View Destinations',
			'search_item'        => 'Search Destinations',
			'not_found'          => 'No Destinationss found',
			'not_found_in_trash' => 'No Destinationss found in trash',
			'parent_item_colon'  => 'Parent Destinations',
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'plugin-name' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'destinations' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'category', 'editor', 'thumbnail', 'comments', 'excerpt' ),
			'menu_position'      => 6,
		);
		register_post_type( 'destinations', $args );
	}
}