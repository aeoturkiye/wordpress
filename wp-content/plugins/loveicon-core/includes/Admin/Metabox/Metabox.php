<?php
namespace loveicon\Helper\Admin\Metabox;
class Metabox {
	/**
	 * Initialize the class
	 */
	function __construct() {
		// Register the post type
		add_filter( 'rwmb_meta_boxes', array( $this, 'loveicon_register_framework_post_meta_box' ) );
	}


	/**
	 * Register meta boxes
	 *
	 * Remember to change "your_prefix" to actual prefix in your project
	 *
	 * @return void
	 */
	function loveicon_register_framework_post_meta_box( $meta_boxes ) {

		global $wp_registered_sidebars;

		/**
		 * prefix of meta keys (optional)
		 * Use underscore (_) at the beginning to make keys hidden
		 * Alt.: You also can make prefix empty to disable it
		 */
		// Better has an underscore as last sign

		$sidebars = array();

		foreach ( $wp_registered_sidebars as $key => $value ) {
			$sidebars[ $key ] = $value['name'];
		}

		$opacities = array();
		for ( $o = 0.0, $n = 0; $o <= 1.0; $o += 0.1, $n++ ) {
			$opacities[ $n ] = $o;
		}
		$prefix     = 'loveicon_core';
		$posts_page = get_option( 'page_for_posts' );
		if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {
			$meta_boxes[] = array(
				'id'       => $prefix . '_page_wiget_meta_box',
				'title'    => esc_html__( 'Page Settings', 'loveicon' ),
				'pages'    => array(
					'page',
				),
				'context'  => 'normal',
				'priority' => 'core',
				'fields'   => array(
					array(
						'name'    => 'Enable Sidebar',
						'id'      => "{$prefix}_page_col",
						'desc'    => '',
						'type'    => 'radio',
						'std'     => 'off',
						'options' => array(
							'on'  => 'on',
							'off' => 'off',
						),
					),
					array(
						'name'            => 'Left widget for page',
						'id'              => "{$prefix}_page_widget_left",
						'type'            => 'select',
						'options'         => loveicon_sidebar_list(),
						'multiple'        => false,
						'placeholder'     => 'Select an Item',
						'select_all_none' => false,
					),
					array(
						'id'      => "{$prefix}_page_widget_left_right",
						'name'    => esc_html__( 'Page widget left or right', 'loveicon' ),
						'desc'    => '',
						'type'    => 'radio',
						'std'     => 'left',
						'options' => array(
							'left'  => 'Left',
							'right' => 'right',
						),
					),
				),
			);
			$meta_boxes[] = array(
				'id'        => $prefix . '_campaign_cariable',
				'title'     => esc_html__( 'Design Settings', 'goodsoul-core' ),
				'pages'     => array(
					'campaign',
				),
				'context'   => 'normal',
				'priority'  => 'high',
				'tab_style' => 'left',
				'fields'    => array(
					array(
						'name'             => esc_html__( 'Main Image', 'goodsoul-core' ),
						'id'               => "{$prefix}_campaign_meta_image",
						'desc'             => '',
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
				),
			);
			$meta_boxes[] = array(
				'id'        => $prefix . '_event_settings',
				'title'     => esc_html__( 'Event Settings', 'citygovt-core' ),
				'pages'     => array(
					'tribe_events',
				),
				'context'   => 'normal',
				'priority'  => 'high',
				'tab_style' => 'left',
				'fields'    => array(
					array(
						'name'             => esc_html__( 'Main Image', 'goodsoul-core' ),
						'id'               => "{$prefix}_event_meta_image",
						'desc'             => '',
						'type'             => 'image_advanced',
						'max_file_uploads' => 1,
					),
					array(
						'name' => 'allow people',
						'id'   => "{$prefix}_event_age_person",
						'type' => 'text',
					),
					array(
						'name' => 'event url',
						'id'   => "{$prefix}_event_url",
						'type' => 'text',
					),
				),
			);
		}
		return $meta_boxes;
	}
}