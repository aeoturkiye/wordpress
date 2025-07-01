<?php


use ModalWindowPro\Settings_Helper;

defined( 'ABSPATH' ) || exit;

$show = [
	'general_start' => __( 'General', 'wow-modal-windows-pro' ),
	'everywhere'    => __( 'Everywhere', 'wow-modal-windows-pro' ),
	'shortcode'     => __( 'Shortcode', 'wow-modal-windows-pro' ),
	'general_end'   => __( 'General', 'wow-modal-windows-pro' ),
	'post_start'    => __( 'Posts', 'wow-modal-windows-pro' ),
	'post_all'      => __( 'All posts', 'wow-modal-windows-pro' ),
	'post_selected' => __( 'Selected posts', 'wow-modal-windows-pro' ),
	'post_category' => __( 'Post has category', 'wow-modal-windows-pro' ),
	'post_tag'      => __( 'Post has tag', 'wow-modal-windows-pro' ),
	'post_end'      => __( 'Posts End', 'wow-modal-windows-pro' ),
	'page_start'    => __( 'Pages', 'wow-modal-windows-pro' ),
	'page_all'      => __( 'All pages', 'wow-modal-windows-pro' ),
	'page_selected' => __( 'Selected pages', 'wow-modal-windows-pro' ),
	'page_type'     => __( 'Page type', 'wow-modal-windows-pro' ),
	'page_end'      => __( 'Pages End', 'wow-modal-windows-pro' ),
	'archive_start' => __( 'Archives', 'wow-modal-windows-pro' ),
	'is_archive'    => __( 'All Archives', 'wow-modal-windows-pro' ),
	'is_category'   => __( 'All Categories', 'wow-modal-windows-pro' ),
	'is_tag'        => __( 'All Tags', 'wow-modal-windows-pro' ),
	'is_author'     => __( 'All Authors', 'wow-modal-windows-pro' ),
	'is_date'       => __( 'All Dates', 'wow-modal-windows-pro' ),
	'_is_category'  => __( 'Category', 'wow-modal-windows-pro' ),
	'_is_tag'       => __( 'Tag', 'wow-modal-windows-pro' ),
	'_is_author'    => __( 'Author', 'wow-modal-windows-pro' ),
	'archive_end'   => __( 'Archives End', 'wow-modal-windows-pro' ),
	'url_start'     => __( 'URL', 'wow-modal-windows-pro' ),
	'url_contains'  => __( 'URL contains', 'wow-modal-windows-pro' ),
	'url_referrer'  => __( 'Referrer URL', 'wow-modal-windows-pro' ),
	'url_end'       => __( 'Custom URL End', 'wow-modal-windows-pro' ),


];

$post_types = get_post_types( [ 'public' => true, '_builtin' => false, ], 'objects' );

foreach ( $post_types as $key => $post_type ) {
	$taxonomies = get_object_taxonomies( $post_type->name, 'names' );

	$show[ $key . '_start' ]                = __( 'Custom Post:',
			'wow-modal-windows-pro' ) . ' ' . $post_type->labels->singular_name;
	$show[ 'custom_post_all_' . $key ]      = __( 'All', 'wow-modal-windows-pro' ) . ' ' . $post_type->labels->name;
	$show[ 'custom_post_selected_' . $key ] = __( 'Selected', 'wow-modal-windows-pro' ) . ' ' . $post_type->labels->name;

	if ( ! empty( $taxonomies ) && is_array( $taxonomies ) ) {
		foreach ( $taxonomies as $taxonomy ) {
			$show[ 'custom_post_tax_' . $key . '|' . $taxonomy ] = $post_type->labels->singular_name . ' has ' . $taxonomy;
		}
	}

	$show[ 'custom_post_taxonomy_' . $key ] = $post_type->labels->name . ' ' . __( 'taxonomy', 'wow-modal-windows-pro' );
	if ( $post_type->has_archive ) {
		$show[ 'custom_post_archive_' . $key ] = __( 'Archive', 'wow-modal-windows-pro' ) . ' ' . $post_type->labels->archives;
	}
	$show[ $key . '_end' ] = __( 'Custom Post:', 'wow-modal-windows-pro' ) . ' ' . $post_type->labels->singular_name;
}

$pages_type = [
	'is_front_page' => __( 'Home Page', 'wow-modal-windows-pro' ),
	'is_home'       => __( 'Posts Page', 'wow-modal-windows-pro' ),
	'is_search'     => __( 'Search Pages', 'wow-modal-windows-pro' ),
	'is_404'        => __( '404 Pages', 'wow-modal-windows-pro' ),
];

$operator = [
	'1' => 'is',
	'0' => 'is not',
];

$weekdays = [
	'none' => __( 'Everyday', 'wow-modal-windows-pro' ),
	'1'    => __( 'Monday', 'wow-modal-windows-pro' ),
	'2'    => __( 'Tuesday', 'wow-modal-windows-pro' ),
	'3'    => __( 'Wednesday', 'wow-modal-windows-pro' ),
	'4'    => __( 'Thursday', 'wow-modal-windows-pro' ),
	'5'    => __( 'Friday', 'wow-modal-windows-pro' ),
	'6'    => __( 'Saturday', 'wow-modal-windows-pro' ),
	'7'    => __( 'Sunday', 'wow-modal-windows-pro' ),
];

$args = [
	//region Display Rules
	'show' => [
		'type'  => 'select',
		'title' => __( 'Display', 'wow-modal-windows-pro' ),
		'val'   => 'everywhere',
		'atts'  => $show,
	],

	'operator' => [
		'type'  => 'select',
		'title' => __( 'Match', 'wow-modal-windows-pro' ),
		'atts'  => $operator,
		'val'   => '1',
		'class' => 'is-hidden',
	],

	'ids' => [
		'type'  => 'text',
		'title' => __( 'Enter ID\'s', 'wow-modal-windows-pro' ),
		'atts'  => [
			'placeholder' => __( 'Enter IDs, separated by comma.', 'wow-modal-windows-pro' )
		],
		'class' => 'is-hidden',
	],

	'page_type'      => [
		'type'  => 'select',
		'title' => __( 'Page type', 'wow-modal-windows-pro' ),
		'atts'  => $pages_type,
		'class' => 'is-hidden',
	],

	'custom_url' => [
		'type'  => 'text',
		'title' => __( 'Content', 'wow-modal-windows-pro' ),
		'atts'  => [
			'placeholder' => __( 'Enter URL', 'wow-modal-windows-pro' )
		],
		'class' => 'is-hidden',
	],

	//endregion

	//region Users
	'users'          => [
		'type'  => 'select',
		'title' => __( 'Users', 'wow-modal-windows-pro' ),
		'atts'  => [
			1 => __( 'All users', 'wow-modal-windows-pro' ),
			2 => __( 'Authorized Users', 'wow-modal-windows-pro' ),
			3 => __( 'Unauthorized Users', 'wow-modal-windows-pro' ),
		],
	],
	//endregion

	//region Other
	'open_popup_url' => [
		'type'  => 'text',
		'title' => [
			'label'  => esc_attr__( 'URL has param', 'wow-modal-windows-pro' ),
			'name'   => 'check_popup_url',
			'val'    => 0,
			'toggle' => true,
		],
		'val'   => '',
		'atts'  => [
			'placeholder' => 'Set the URL like: modal=active'
		],
	],

	'open_hash_url' => [
		'type'  => 'text',
		'title' => [
			'label'  => esc_attr__( 'URL has Hash', 'wow-modal-windows-pro' ),
			'name'   => 'open_hash_url_on',
			'val'    => 0,
			'toggle' => true,
		],
		'val'   => '',
		'atts'  => [
			'placeholder' => 'Set the URL like: #example'
		],
	],

	'popup' => [
		'type'  => 'select',
		'title' => [
			'label'  => esc_attr__( 'Show after popup', 'wow-modal-windows-pro' ),
			'name'   => 'after_popup',
			'val'    => 0,
			'toggle' => true,
		],
		'val'   => '',
		'atts'  => Settings_Helper::modals( $id ),
	],

	'language' => [
		'type'  => 'select',
		'title' => [
			'label'  => __( 'Enable for specific language', 'wow-modal-windows-pro' ),
			'name'   => 'language_on',
			'toggle' => true,
		],
		'val'   => 'en_US',
		'atts'  => Settings_Helper::languages(),
	],

	'locale' => [
		'type'  => 'text',
		'title' => __( 'Locale', 'wow-modal-windows-pro' ),
		'val'   => '',
		'atts'  => [
			'placeholder' => 'for example: en_US',
		],
	],

	'geotargeting' => [
		'type'  => 'text',
		'title' => [
			'label'   => __( 'Geotargeting', 'wow-modal-windows-pro' ),
			'name'    => 'geotargeting_on',
			'toggle'  => true,
			'tooltip' => __( 'Country codes separated by comma', 'wow-modal-windows-pro' ),
		],
		'atts'  => [
			'placeholder' => __( 'Ex: US,CA,GB,UA', 'wow-modal-windows-pro' )
		],

	],
	//endregion

	//region Responsive Visibility
	'screen'       => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Hide on smaller screens', 'wow-modal-windows-pro' ),
			'name'   => 'include_mobile',
			'toggle' => true,
		],
		'val'   => 480,
		'addon' => 'px',
	],

	'screen_more' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Hide on larger screens', 'wow-modal-windows-pro' ),
			'name'   => 'include_more_screen',
			'toggle' => true,
		],
		'val'   => 1024,
		'addon' => 'px'
	],

	'remove_mobile' => [
		'type'  => 'checkbox',
		'title' => __( 'Remove on Mobile', 'wow-modal-windows-pro' ),
		'label' => __( 'Enable', 'wow-modal-windows-pro' ),
	],

	'remove_desktop' => [
		'type'  => 'checkbox',
		'title' => __( 'Remove on Desktop', 'wow-modal-windows-pro' ),
		'label' => __( 'Enable', 'wow-modal-windows-pro' ),
	],
	//endregion

	//region Browsers
	'browser_opera'  => [
		'type'  => 'checkbox',
		'title' => __( 'Opera', 'wow-modal-windows-pro' ),
		'label' => __( 'Disable', 'wow-modal-windows-pro' ),
	],

	'browser_edge' => [
		'type'  => 'checkbox',
		'title' => __( 'Microsoft Edge', 'wow-modal-windows-pro' ),
		'label' => __( 'Disable', 'wow-modal-windows-pro' ),
	],

	'browser_chrome' => [
		'type'  => 'checkbox',
		'title' => __( 'Chrome', 'wow-modal-windows-pro' ),
		'label' => __( 'Disable', 'wow-modal-windows-pro' ),
	],

	'browser_safari' => [
		'type'  => 'checkbox',
		'title' => __( 'Safari', 'wow-modal-windows-pro' ),
		'label' => __( 'Disable', 'wow-modal-windows-pro' ),
	],

	'browser_firefox' => [
		'type'  => 'checkbox',
		'title' => __( 'Firefox', 'wow-modal-windows-pro' ),
		'label' => __( 'Disable', 'wow-modal-windows-pro' ),
	],

	'browser_ie' => [
		'type'  => 'checkbox',
		'title' => __( 'Internet Explorer', 'wow-modal-windows-pro' ),
		'label' => __( 'Disable', 'wow-modal-windows-pro' ),
	],

	'browser_other' => [
		'type'  => 'checkbox',
		'title' => __( 'Other', 'wow-modal-windows-pro' ),
		'label' => __( 'Disable', 'wow-modal-windows-pro' ),
	],

	//endregion

	//region Schedule
	'weekday'       => [
		'type'  => 'select',
		'title' => __( 'Weekday', 'wow-modal-windows-pro' ),
		'atts'  => $weekdays,
	],

	'time_start' => [
		'type'  => 'time',
		'title' => __( 'Start time', 'wow-modal-windows-pro' ),
	],

	'time_end' => [
		'type'  => 'time',
		'title' => __( 'End time', 'wow-modal-windows-pro' ),
	],

	'dates' => [
		'type'  => 'select',
		'title' => __( 'Define Dates', 'wow-modal-windows-pro' ),
		'atts'  => [
			'disabled' => __( 'Disabled', 'wow-modal-windows-pro' ),
			'enabled'  => __( 'Enabled', 'wow-modal-windows-pro' ),
		],
	],

	'date_start' => [
		'type'  => 'date',
		'title' => __( 'Date From', 'wow-modal-windows-pro' ),
	],

	'date_end' => [
		'type'  => 'date',
		'title' => __( 'Date To', 'wow-modal-windows-pro' ),
	],
	//endregion

];

foreach ( Settings_Helper::user_roles() as $key => $value ) {
	$args[ $key ] = $value;
}

return $args;
