<?php

use ModalWindowPro\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region Triggers
	'modal_show' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Trigger Types', 'wow-modal-windows-pro' ),
		'value' => 'auto',
		'atts' => [
			'click'        => esc_attr__('Click', 'wow-modal-windows-pro'),
			'load'         => esc_attr__('Auto', 'wow-modal-windows-pro'),
			'hover'        => esc_attr__('Hover', 'wow-modal-windows-pro'),
			'close'        => esc_attr__('Exit', 'wow-modal-windows-pro'),
			'scroll'       => esc_attr__('Scrolled', 'wow-modal-windows-pro'),
			'rightclick'   => esc_attr__('Right Click', 'wow-modal-windows-pro'),
			'selectedtext' => esc_attr__('Selected Text', 'wow-modal-windows-pro'),
		],
	],

	'modal_timer' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Delay time', 'wow-modal-windows-pro' ),
		'val' => 0,
		'atts' => [
			'min'   => '0',
			'step'        => '0.1',
		],
		'addon'   => 'sec',
	],

	'reach_window' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Scroll distance', 'wow-modal-windows-pro' ),
		'val' => 0,
		'atts' => [
			'min'   => '0',
		],
		'addon'   => [
			'type' => 'select',
			'val' => 'px',
			'name' => 'reach_window_unit',
			'atts' => [
				'px' => esc_attr__( 'px', 'wow-modal-windows-pro' ),
				'%' => esc_attr__( '%', 'wow-modal-windows-pro' ),
			]
		],
	],

	'use_cookies' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Show only once', 'wow-modal-windows-pro' ),
		'val' => 'no',
		'atts' => [
			'no' => esc_attr__( 'no', 'wow-modal-windows-pro' ),
			'yes' => esc_attr__( 'yes', 'wow-modal-windows-pro' ),
		],
	],

	'set_cookies' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Timing', 'wow-modal-windows-pro' ),
		'val' => 'no',
		'atts' => [
			'open' => esc_attr__( 'After Open', 'wow-modal-windows-pro' ),
			'close' => esc_attr__( 'After Close', 'wow-modal-windows-pro' ),
		],
	],

	'modal_cookies' => [
		'type' => 'number',
		'title' => __( 'Reset', 'wow-modal-windows-pro' ),
		'val' => '1',
		'atts' => [
			'min'   => '0',
			'step'   => '0.01',
		],
		'addon' => 'days',
	],

	'open_selectors' => [
		'type' => 'text',
		'title' => __( 'Custom Selectors', 'wow-modal-windows-pro' ),
	],

	//endregion

	//region CLose Popup
	'close_button_remove' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'Remove Close Button', 'wow-modal-windows-pro' ),
		'val' => 0,
		'label' => esc_attr__( 'Enable', 'wow-modal-windows-pro' ),
	],

	'close_button_overlay' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'Overlay', 'wow-modal-windows-pro' ),
		'val' => 1,
		'label' => esc_attr__( 'Enable', 'wow-modal-windows-pro' ),
	],

	'close_button_esc' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'Esc', 'wow-modal-windows-pro' ),
		'val' => 1,
		'label' => esc_attr__( 'Enable', 'wow-modal-windows-pro' ),
	],

	'close_delay' => [
		'type' => 'number',
		'title'    => esc_attr__( 'Delay', 'wow-modal-windows-pro' ),
		'val' => 0,
		'addon'    => 'sec',
		'atts' => [
			'min'   => '0',
			'step'  => '0.1',
		],
	],

	'auto_close_delay' => [
		'type' => 'number',
		'title' => [
			'label'    => esc_attr__( 'Auto close', 'wow-modal-windows-pro' ),
			'name'  => 'modal_auto_close',
			'val' => 0,
			'toggle' => true,
		],
		'val' => 5,
		'addon'    => 'sec',
	],

	'close_redirect' => [
		'type' => 'text',
		'title' => [
			'label'    => esc_attr__( 'Redirect after close', 'wow-modal-windows-pro' ),
			'name'  => 'close_redirect_checkbox',
			'val' => 0,
			'toggle' => true,
		],
		'atts' => [
			'placeholder' => esc_attr__( 'Enter URL', 'wow-modal-windows-pro' ),
		],
	],

	'close_redirect_target' => [
		'type' => 'select',
		'title' => esc_attr__( 'Redirect Target', 'wow-modal-windows-pro' ),
		'val' => '_blank',
		'atts' => [
			'_blank' => esc_attr__( 'New tab', 'wow-modal-windows-pro' ),
			'_self'  => esc_attr__( 'Same tab', 'wow-modal-windows-pro' ),
		],
	],

	'mail_send_timer' => [
		'type' => 'number',
		'title'   => esc_attr__( 'Form Submission', 'wow-modal-windows-pro' ),
		'val' => 3,
		'atts' => [
			'min' => 0,
		],
		'addon' => 'sec',
	],

	'close_selectors' => [
		'type' => 'text',
		'title' => __( 'Custom Selectors', 'wow-modal-windows-pro' ),
	],
	//endregion

	//region Animation
	'window_animate' => [
		'type' => 'select',
		'title'   => esc_attr__( 'AnimateIn', 'wow-modal-windows-pro' ),
		'val' => 'fade',
		'atts' => Settings_Helper::animation(),
	],

	'speed_window' => [
		'type' => 'number',
		'title' => esc_attr__( 'AnimateIn Speed', 'wow-modal-windows-pro' ),
		'val' => '400',
		'addon'    => 'ms',
		'atts' => [
			'step' => 1
		],
	],

	'window_animate_out' => [
		'type' => 'select',
		'title'   => esc_attr__( 'AnimateOut', 'wow-modal-windows-pro' ),
		'val' => 'fade',
		'atts' => Settings_Helper::animation(),
	],

	'speed_window_out' => [
		'type' => 'number',
		'title' => esc_attr__( 'AnimateOut Speed', 'wow-modal-windows-pro' ),
		'val' => '400',
		'addon'    => 'ms',
		'atts' => [
			'step' => 1
		],
	],

	//endregion

	//region Video Support
	'video_support' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Video support', 'wow-modal-windows-pro' ),
		'val' => '1',
		'atts' => [
			'1' => esc_attr__( 'no', 'wow-modal-windows-pro' ),
			'2' => esc_attr__( 'yes', 'wow-modal-windows-pro' ),
		],
	],

	'video_autoplay' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Video autoplay', 'wow-modal-windows-pro' ),
		'val' => '1',
		'atts' => [
			'1' => esc_attr__( 'no', 'wow-modal-windows-pro' ),
			'2' => esc_attr__( 'yes', 'wow-modal-windows-pro' ),
		],
	],

	'video_close' => [
		'type' => 'select',
		'title'   => esc_attr__( 'Stop on close', 'wow-modal-windows-pro' ),
		'val' => '1',
		'atts' => [
			'1' => esc_attr__( 'no', 'wow-modal-windows-pro' ),
			'2' => esc_attr__( 'yes', 'wow-modal-windows-pro' ),
		],
	],


	//endregion

	//region Google Event Tracking
	'enable_tracking_open' => [
		'type'  => 'checkbox',
		'title' => __( 'Event Tracking', 'wow-modal-windows-pro' ),
		'label' => __( 'Enable', 'wow-modal-windows-pro' ),
	],

	'event_category_open' => [
		'type'  => 'text',
		'title' => __( 'Category', 'wow-modal-windows-pro' ),
		'val'   => 'Modal Window',
	],

	'event_action_open' => [
		'type'  => 'text',
		'title' => __( 'Action', 'wow-modal-windows-pro' ),
		'val'   => 'Modal Open',
	],

	'event_label_open' => [
		'type'  => 'text',
		'title' => [
			'label'  => __( 'Label', 'wow-modal-windows-pro' ),
			'name'   => 'enable_event_label_open',
			'toggle' => '1',
		],
		'val' => 'modal_open'
	],

	'event_value_open' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Value', 'wow-modal-windows-pro' ),
			'name'   => 'enable_event_value_open',
			'toggle' => '1',
		],
		'val'   => 5,
		'atts'  => [
			'min' => 0,
		]
	],

	'enable_tracking_close' => [
		'type'  => 'checkbox',
		'title' => __( 'Event Tracking', 'wow-modal-windows-pro' ),
		'label' => __( 'Enable', 'wow-modal-windows-pro' ),
	],

	'event_category_close' => [
		'type'  => 'text',
		'title' => __( 'Category', 'wow-modal-windows-pro' ),
		'val'   => 'Modal Window',
	],

	'event_action_close' => [
		'type'  => 'text',
		'title' => __( 'Action', 'wow-modal-windows-pro' ),
		'val'   => 'Modal Close',
	],

	'event_label_close' => [
		'type'  => 'text',
		'title' => [
			'label'  => __( 'Label', 'wow-modal-windows-pro' ),
			'name'   => 'enable_event_label_close',
			'toggle' => '1',
		],
		'val' => 'modal_close'
	],

	'event_value_close' => [
		'type'  => 'number',
		'title' => [
			'label'  => __( 'Value', 'wow-modal-windows-pro' ),
			'name'   => 'enable_event_value_close',
			'toggle' => '1',
		],
		'val'   => 5,
		'atts'  => [
			'min' => 0,
		]
	],

	//endregion

];