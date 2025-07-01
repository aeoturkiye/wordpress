<?php

use ModalWindowPro\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region General
	'umodal_button' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Show button', 'wow-modal-windows-pro' ),
		'val' => 'no',
		'atts' => [
			'no'  => __( 'no', 'wow-modal-windows-pro' ),
			'yes' => __( 'yes', 'wow-modal-windows-pro' ),
		],
	],

	'button_type' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Appearance', 'wow-modal-windows-pro' ),
		'val' => '1',
		'atts' => [
			'1' => __( 'Only Text', 'wow-modal-windows-pro' ),
			'2' => __( 'Text and icon', 'wow-modal-windows-pro' ),
			'3' => __( 'Only Icon', 'wow-modal-windows-pro' ),
		],
	],

	'umodal_button_text' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Text', 'wow-modal-windows-pro' ),
		'val' => __('Feedback', 'wow-modal-windows-pro' ),
	],

	//endregion

	//region Button Icon

	'button_icon' => [
		'type'  => 'select',
		'title' => __( 'Icon', 'wow-modal-windows-pro' ),
		'val'   => '',
		'class' => 'wpie-icon-box',
		'atts'  => Settings_Helper::icons(),
	],

	'rotate_icon' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Rotate icon', 'wow-modal-windows-pro' ),
		'val' => '',
		'atts' => [
			''              => esc_attr__( 'none', 'wow-modal-windows-pro' ),
			'fa-rotate-90'  => esc_attr__( '90&deg;', 'wow-modal-windows-pro' ),
			'fa-rotate-180' => esc_attr__( '180&deg;', 'wow-modal-windows-pro' ),
			'fa-rotate-270' => esc_attr__( '270&deg;', 'wow-modal-windows-pro' ),
		],
	],

	'button_icon_after' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Text location', 'wow-modal-windows-pro' ),
		'val' => '0',
		'atts' => [
			'0' => esc_attr__( 'Before Icon', 'wow-modal-windows-pro' ),
			'1' => esc_attr__( 'After Icon', 'wow-modal-windows-pro' ),
		],
	],

	'button_shape' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Shape', 'wow-modal-windows-pro' ),
		'val' => '',
		'class' => 'wpie-icon-box',
		'atts' => [
			''                   => 'none',
			'fas fa-circle'      => 'fas fa-circle',
			'far fa-circle'      => 'far fa-circle',
			'fas fa-square'      => 'fas fa-square',
			'far fa-square'      => 'far fa-square',
			'fas fa-bookmark'    => 'fas fa-bookmark',
			'far fa-bookmark'    => 'far fa-bookmark',
			'fas fa-calendar'    => 'fas fa-calendar',
			'far fa-calendar'    => 'far fa-calendar',
			'fas fa-certificate' => 'fas fa-certificate',
			'fas fa-ban'         => 'fas fa-ban',
		],
	],

	//endregion

	//region Location
	'umodal_button_position' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Location', 'wow-modal-windows-pro' ),
		'val' => 'wow_modal_button_right',
		'atts' => [
			'wow_modal_button_right'  => __( 'Right', 'wow-modal-windows-pro' ),
			'wow_modal_button_left'   => __( 'Left', 'wow-modal-windows-pro' ),
			'wow_modal_button_top'    => __( 'Top', 'wow-modal-windows-pro' ),
			'wow_modal_button_bottom' => __( 'Bottom', 'wow-modal-windows-pro' ),
		],
	],

	'button_position' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Offset', 'wow-modal-windows-pro' ),
		'val' => '50',
		'atts' => [
			'min'   => '0',
		],
		'addon' => '%',
	],

	'button_margin' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Margin', 'wow-modal-windows-pro' ),
		'val' => '-4',
		'atts' => [
			'step'  => '0.1',
		],
		'addon' => 'px',
	],
	//endregion

	//region Animation
	'button_animate' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Type', 'wow-modal-windows-pro' ),
		'val' => 'no',
		'atts' => [
			'no'         => esc_attr__( 'no', 'wow-modal-windows-pro' ),
			'bounce'     => esc_attr__( 'bounce', 'wow-modal-windows-pro' ),
			'flash'      => esc_attr__( 'flash', 'wow-modal-windows-pro' ),
			'pulse'      => esc_attr__( 'pulse', 'wow-modal-windows-pro' ),
			'rubberBand' => esc_attr__( 'rubberBand', 'wow-modal-windows-pro' ),
			'shake'      => esc_attr__( 'shake', 'wow-modal-windows-pro' ),
			'swing'      => esc_attr__( 'swing', 'wow-modal-windows-pro' ),
			'tada'       => esc_attr__( 'tada', 'wow-modal-windows-pro' ),
			'wobble'     => esc_attr__( 'wobble', 'wow-modal-windows-pro' ),
			'jello'      => esc_attr__( 'jello', 'wow-modal-windows-pro' ),
		],
	],

	'button_animate_duration' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Duration', 'wow-modal-windows-pro' ),
		'val' => '5',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => 'sec',
	],

	'button_animate_time' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Iteration Count', 'wow-modal-windows-pro' ),
		'val' => '5',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => 'sec',
	],

	'button_animate_pause' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Pause', 'wow-modal-windows-pro' ),
		'val' => '5',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => 'sec',
	],
	//endregion

	//region Style
	'button_text_size' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Text size', 'wow-modal-windows-pro' ),
		'val' => '1.2',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
		'addon' => [
			'type' => 'select',
			'name' => 'button_text_size_unit',
			'val' => 'em',
			'atts' => [
				'em' => esc_attr__( 'em', 'wow-modal-windows-pro' ),
				'px' => esc_attr__( 'px', 'wow-modal-windows-pro' ),
			],

		],
	],
	'button_padding' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Padding', 'wow-modal-windows-pro' ),
		'val' => '14px 14px',
	],

	'button_radius' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Radius', 'wow-modal-windows-pro' ),
		'val' => '4',
		'atts' => [
			'min'   => '0',
		],
		'addon' => 'px',
	],

	'button_text_color' => [
		'type'  => 'text',
		'title' => __( 'Text color', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'button_text_hcolor' => [
		'type'  => 'text',
		'title' => __( 'Text hover color', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'umodal_button_color' => [
		'type'  => 'text',
		'title' => __( 'Background', 'wow-modal-windows-pro' ),
		'val'   => '#383838',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'umodal_button_hover' => [
		'type'  => 'text',
		'title' => __( 'Hover Background', 'wow-modal-windows-pro' ),
		'val'   => '#797979',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion
];