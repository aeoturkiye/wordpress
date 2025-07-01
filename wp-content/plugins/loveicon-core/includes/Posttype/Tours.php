<?php
namespace Loveicon\Helper\Posttype;
class Tours {

	/**
	 * Initialize the class
	 */
	function __construct() {
		// Register the post type
		add_action( 'init', array( $this, 'tour_post_type' ), 0 );
		add_action( 'init', array( $this, 'tours_location' ), 0 );
		add_action( 'init', array( $this, 'tours_type' ), 0 );
		add_action( 'init', array( $this, 'tours_durations' ), 0 );
		add_action( 'init', array( $this, 'tours_category' ), 0 );
		add_filter( 'rwmb_meta_boxes', array( $this, 'tour_metabox' ) );

	}

	function tour_post_type() {
		$labels = array(
			'name'               => 'Tour',
			'singular_name'      => 'Tour',
			'add_new'            => 'Add Tour',
			'add_new_item'       => 'New Tour',
			'all_items'          => 'All Tours',
			'edit_item'          => 'Edit Tour',
			'view_item'          => 'View Tour',
			'search_item'        => 'Search Tour',
			'not_found'          => 'No Tours found',
			'not_found_in_trash' => 'No Tours found in trash',
			'parent_item_colon'  => 'Parent Tour',
		);

		$args = array(
			'labels'             => $labels,
			'description'        => __( 'Description.', 'plugin-name' ),
			'public'             => true,
			// 'show_in_rest'          => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'tour' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'category', 'editor', 'thumbnail', 'comments', 'excerpt' ),
			'menu_position'      => 6,
		);

		register_post_type( 'tour', $args );
	}



	// custom tours_location taxonomy

	function tours_location() {
		$labels = array(
			'name'              => _x( 'Location', 'taxonomy general name' ),
			'singular_name'     => _x( 'Location', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Locations' ),
			'all_items'         => __( 'All Locations' ),
			'parent_item'       => __( 'Parent Location' ),
			'parent_item_colon' => __( 'Parent Location:' ),
			'edit_item'         => __( 'Edit Location' ),
			'update_item'       => __( 'Update Location' ),
			'add_new_item'      => __( 'Add New Location' ),
			'new_item_name'     => __( 'New Tour Name' ),
			'menu_name'         => __( 'Location' ),
		);
		$args   = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'tour_location' ),
		);
		register_taxonomy( 'location', array( 'tour' ), $args );
	}

	// custom tours_type taxonomy

	function tours_type() {
		$labels = array(
			'name'              => _x( 'Type', 'taxonomy general name' ),
			'singular_name'     => _x( 'Type', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Types' ),
			'all_items'         => __( 'All Types' ),
			'parent_item'       => __( 'Parent Type' ),
			'parent_item_colon' => __( 'Parent Type:' ),
			'edit_item'         => __( 'Edit Type' ),
			'update_item'       => __( 'Update Type' ),
			'add_new_item'      => __( 'Add New Type' ),
			'new_item_name'     => __( 'New Tour Name' ),
			'menu_name'         => __( 'Type' ),
		);
		$args   = array(
			'hierarchical'      => false,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'tour_type' ),
		);

		register_taxonomy( 'type', array( 'tour' ), $args );
	}
	// custom tours_durations taxonomy

	function tours_durations() {
		$labels = array(
			'name'              => _x( 'Durations', 'taxonomy general name' ),
			'singular_name'     => _x( 'Durations', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Durations' ),
			'all_items'         => __( 'All Durations' ),
			'parent_item'       => __( 'Parent Durations' ),
			'parent_item_colon' => __( 'Parent Durations:' ),
			'edit_item'         => __( 'Edit Durations' ),
			'update_item'       => __( 'Update Durations' ),
			'add_new_item'      => __( 'Add New Durations' ),
			'new_item_name'     => __( 'New Tour Durations' ),
			'menu_name'         => __( 'Durations' ),
		);
		$args   = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'tour_durations' ),
		);

		register_taxonomy( 'durations', array( 'tour' ), $args );
	}

	// custom tours_category taxonomy

	function tours_category() {
		$labels = array(
			'name'              => _x( 'Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Category' ),
			'all_items'         => __( 'All Category' ),
			'parent_item'       => __( 'Parent Category' ),
			'parent_item_colon' => __( 'Parent Category:' ),
			'edit_item'         => __( 'Edit Category' ),
			'update_item'       => __( 'Update Category' ),
			'add_new_item'      => __( 'Add New Category' ),
			'new_item_name'     => __( 'New Tour Category' ),
			'menu_name'         => __( 'Categories' ),
		);
		$args   = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'tour_category' ),
		);

		register_taxonomy( 'categories', array( 'tour' ), $args );
	}

	/*
	================================
	Custom Post Type Metabox - Tours
	================================
	*/

	function tour_metabox( $meta_boxes ) {
		$prefix = 'loveicon_metabox_';

		$meta_boxes[] = array(
			'id'         => 'loveicon_tour_info',
			'title'      => esc_html__( 'Tour Information' ),
			'post_types' => array( 'tour' ),
			'context'    => 'after_editor',
			'priority'   => 'default',
			'autosave'   => 'false',
			'fields'     => array(
				array(
					'id'          => $prefix . 'package_price',
					'type'        => 'text',
					'name'        => esc_html__( 'Tour Package Price' ),
					'placeholder' => '1200',
					'std'         => '1200',
				),
				array(
					'id'          => $prefix . 'tour_package_member',
					'type'        => 'text',
					'name'        => esc_html__( 'Tour Package Member' ),
					'placeholder' => 'Per person',
					'std'         => 'Per person',
				),
				array(
					'id'          => $prefix . 'package_day',
					'type'        => 'text',
					'name'        => esc_html__( 'Package Day' ),
					'placeholder' => '5 Days',
					'std'         => '5 Days',
				),
				array(
					'id'          => $prefix . 'package_location',
					'type'        => 'text',
					'name'        => esc_html__( 'Package Location' ),
					'placeholder' => 'G87P, Birmingham',
					'std'         => 'G87P, Birmingham',
				),
				array(
					'id'               => $prefix . 'tour_details_banner',
					'type'             => 'image_advanced',
					'name'             => esc_html__( 'Tour Details Banner' ),
					'max_file_uploads' => 1,
					'image_size'       => 'full',
				),
			),
		);

		return $meta_boxes;
	}
}