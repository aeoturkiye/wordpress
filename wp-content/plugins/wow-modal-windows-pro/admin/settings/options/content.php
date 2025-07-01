<?php

use ModalWindowPro\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	'content' => [
		'type'  => 'editor',
		'class' => 'is-full',
		'val'   => __( 'Welcome to Modal Window plugin', 'wow-modal-windows-pro' ),
		'atts'  => [
			'class' => 'wpie-fulleditor',
		]
	],

	'aria_live' => [
		'type'  => 'select',
		'title' => __( 'Aria Live', 'wow-modal-windows-pro' ),
		'val'   => 'off',
		'atts'  => [
			'off'       => 'off',
			'polite'    => 'polite',
			'assertive' => 'assertive',
		]
	],

	'shortcode_type' => [
		'type'  => 'select',
		'title' => __( 'Shortcode Type', 'wow-modal-windows-pro' ),
		'val'   => 'button',
		'atts'  => [
			'button'  => __( 'Button', 'wow-modal-windows-pro' ),
			'video'   => __( 'Video', 'wow-modal-windows-pro' ),
			'iframe'  => __( 'Iframe', 'wow-modal-windows-pro' ),
			'icon'    => __( 'Icon', 'wow-modal-windows-pro' ),
			'content' => __( 'Content', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_video_from' => [
		'type'  => 'select',
		'title' => __( 'Video Hosting', 'wow-modal-windows-pro' ),
		'atts'  => [
			'youtube' => __( 'YouTube', 'wow-modal-windows-pro' ),
			'vimeo'   => __( 'Vimeo', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_video_id' => [
		'title' => __( 'Video ID', 'wow-modal-windows-pro' ),
		'type'  => 'text',
		'atts'  => [
			'placeholder' => __( 'Enter video ID', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_video_width' => [
		'title' => __( 'Video Width', 'wow-modal-windows-pro' ),
		'type'  => 'number',
		'val'   => '560',
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
		'addon' => 'px',
	],

	'shortcode_video_height' => [
		'title' => __( 'Video Height', 'wow-modal-windows-pro' ),
		'type'  => 'number',
		'val'   => '315',
		'atts'  => [
			'min'  => '0',
			'step' => '1',
		],
		'addon' => 'px',
	],

	'shortcode_btn_type' => [
		'type'  => 'select',
		'title' => __( 'Button Type', 'wow-modal-windows-pro' ),
		'val'   => 'close',
		'atts'  => [
			'close' => __( 'Popup Close Button', 'wow-modal-windows-pro' ),
			'link'  => __( 'Button with Link', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_btn_size' => [
		'type'  => 'select',
		'title' => __( 'Button Size', 'wow-modal-windows-pro' ),
		'val'   => 'normal',
		'atts'  => [
			'small'  => __( 'Small', 'wow-modal-windows-pro' ),
			'normal' => __( 'Normal', 'wow-modal-windows-pro' ),
			'medium' => __( 'Medium', 'wow-modal-windows-pro' ),
			'large'  => __( 'Large', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_btn_fullwidth' => [
		'type'  => 'select',
		'title' => __( 'Full Width', 'wow-modal-windows-pro' ),
		'val'   => '',
		'atts'  => [
			''    => __( 'No', 'wow-modal-windows-pro' ),
			'yes' => __( 'Yes', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_btn_text' => [
		'type'  => 'text',
		'title' => __( 'Button Text', 'wow-modal-windows-pro' ),
		'val'   => __( 'Close Popup', 'wow-modal-windows-pro' ),
	],

	'shortcode_btn_color' => [
		'title' => __( 'Text Color', 'wow-modal-windows-pro' ),
		'type'  => 'text',
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'shortcode_btn_bgcolor' => [
		'title' => __( 'Background Color', 'wow-modal-windows-pro' ),
		'type'  => 'text',
		'val'   => '#00d1b2',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'shortcode_btn_link' => [
		'title' => __( 'Link', 'wow-modal-windows-pro' ),
		'type'  => 'text',
		'val'   => '',
		'atts'  => [
			'placeholder' => __( 'Enter URL', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_btn_target' => [
		'type'  => 'select',
		'title' => __( 'Target', 'wow-modal-windows-pro' ),
		'val'   => '_blank',
		'atts'  => [
			'_blank' => __( 'New tab', 'wow-modal-windows-pro' ),
			'_self'  => __( 'Same tab', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_btn_class' => [
		'title' => __( 'Extra class', 'wow-modal-windows-pro' ),
		'type'  => 'text',
		'val'   => '',
	],


	'iframe_link' => [
		'type'  => 'text',
		'title' => __( 'Iframe link', 'wow-modal-windows-pro' ),
		'val'   => '',
		'atts'  => [
			'placeholder' => 'https://',
		],
	],

	'iframe_width' => [
		'title' => __( 'Width', 'wow-modal-windows-pro' ),
		'type'  => 'number',
		'val'   => '600',
		'atts'  => [
			'min' => '0',
		],
		'addon' => [
			'type' => 'select',
			'name' => 'iframe_width_unit',
			'atts' => [
				''  => __( 'px', 'wow-modal-windows-pro' ),
				'%' => __( '%', 'wow-modal-windows-pro' ),
			],
		],
	],

	'iframe_height' => [
		'title' => __( 'Height', 'wow-modal-windows-pro' ),
		'type'  => 'number',
		'val'   => '450',
		'atts'  => [
			'min' => '0',
		],
		'addon' => [
			'type' => 'select',
			'name' => 'iframe_height_unit',
			'atts' => [
				''  => __( 'px', 'wow-modal-windows-pro' ),
				'%' => __( '%', 'wow-modal-windows-pro' ),
			],
		],
	],

	'iframe_id' => [
		'title' => __( 'ID', 'wow-modal-windows-pro' ),
		'type'  => 'text',
	],

	'iframe_class' => [
		'title' => __( 'Class', 'wow-modal-windows-pro' ),
		'type'  => 'text',
	],

	'iframe_style' => [
		'title' => __( 'Style', 'wow-modal-windows-pro' ),
		'type'  => 'text',
	],

	//region Icon

	'shortcode_icon' => [
		'type'  => 'select',
		'title' => __( 'Select Icon', 'wow-modal-windows-pro' ),
		'val'   => '',
		'class' => 'wpie-icon-box',
		'atts'  => Settings_Helper::icons(),
	],

	'icon_color' => [
		'title' => __( 'Color', 'wow-modal-windows-pro' ),
		'type'  => 'text',
		'val'   => '#797979',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'icon_size' => [
		'title' => __( 'Size', 'wow-modal-windows-pro' ),
		'type'  => 'number',
		'val'   => '24',
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'icon_link' => [
		'title' => __( 'Link', 'wow-modal-windows-pro' ),
		'type'  => 'text',
		'val'   => '',
		'atts'  => [
			'placeholder' => __( 'Enter URL', 'wow-modal-windows-pro' ),
		],
	],

	'icon_target' => [
		'type'  => 'select',
		'title' => __( 'Target', 'wow-modal-windows-pro' ),
		'val'   => '_blank',
		'atts'  => [
			'_blank' => __( 'New tab', 'wow-modal-windows-pro' ),
			'_self'  => __( 'Same tab', 'wow-modal-windows-pro' ),
		],
	],

	'shortcode_content_title' => [
		'type'  => 'checkbox',
		'title' => __( 'Include Title', 'wow-modal-windows-pro' ),
		'label' => __( 'Enabled', 'wow-modal-windows-pro' ),
		'val'   => 0,
	],

	'shortcode_content_post_type' => [
		'type'  => 'text',
		'title' => __( 'Post Type', 'wow-modal-windows-pro' ),
		'atts'  => [
			'placeholder' => __( 'post', 'wow-modal-windows-pro' ),
		],
	],


	//endregion

];