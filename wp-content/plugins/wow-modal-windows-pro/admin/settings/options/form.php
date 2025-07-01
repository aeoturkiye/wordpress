<?php

use ModalWindowPro\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region Fields
	'form_name' => [
		'type'  => 'text',
		'title' => [
			'label'  => __( 'Name', 'wow-modal-windows-pro' ),
			'name'   => 'include_form_name',
			'toggle' => true,
			'val'    => 1
		],
		'val'   => __( 'Your Name', 'wow-modal-windows-pro' ),
	],

	'form_email' => [
		'type'  => 'text',
		'title' => [
			'label'  => __( 'Email', 'wow-modal-windows-pro' ),
			'name'   => 'include_form_email',
			'toggle' => true,
			'val'    => 1
		],
		'val'   => __( 'Your Email', 'wow-modal-windows-pro' ),
	],

	'form_text' => [
		'type'  => 'text',
		'title' => [
			'label'  => __( 'Textarea', 'wow-modal-windows-pro' ),
			'name'   => 'include_form_text',
			'toggle' => true,
			'val'    => 1
		],
		'val'   => __( 'Write a Comment', 'wow-modal-windows-pro' ),
	],

	'form_button' => [
		'type'  => 'text',
		'title' => __( 'Button text', 'wow-modal-windows-pro' ),
		'val'   => __( 'Send', 'wow-modal-windows-pro' ),
	],
	//endregion

	//region Form Style

	'form_width' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Width', 'wow-modal-windows-pro' ),
		'val' => '100%',
	],

	'form_padding' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Padding', 'wow-modal-windows-pro' ),
		'val' => '10px',
	],

	'form_margin' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Margin', 'wow-modal-windows-pro' ),
		'val' => '0 auto',
	],

	'form_border' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Border width', 'wow-modal-windows-pro' ),
		'val' => '1px',
	],

	'form_radius' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Border radius', 'wow-modal-windows-pro' ),
		'val' => '0px',
	],

	'form_background' => [
		'type'  => 'text',
		'title' => __( 'Background', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'form_border_color' => [
		'type'  => 'text',
		'title' => __( 'Border color', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion

	//region Field Style
	'field_border' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Border width', 'wow-modal-windows-pro' ),
		'val' => '1px',
	],
	'field_radius' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Border radius', 'wow-modal-windows-pro' ),
		'val' => '0px',
	],
	'form_text_size' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Text size', 'wow-modal-windows-pro' ),
		'val' => '16px',
	],
	'form_input_height' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Input height', 'wow-modal-windows-pro' ),
		'val' => '36px',
	],

	'form_textarea_height' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Textarea height', 'wow-modal-windows-pro' ),
		'val' => '72px',
	],
	'field_background' => [
		'type'  => 'text',
		'title' => __( 'Background', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	'field_border_color' => [
		'type'  => 'text',
		'title' => __( 'Border color', 'wow-modal-windows-pro' ),
		'val'   => '#383838',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	'form_text_color' => [
		'type'  => 'text',
		'title' => __( 'Text color', 'wow-modal-windows-pro' ),
		'val'   => '#383838',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion
	//region Button Style
	'form_button_size' => [
		'type' => 'text',
		'title'   => esc_attr__( 'Text size', 'wow-modal-windows-pro' ),
		'val' => '16px',
	],
	'form_button_text_color' => [
		'type'  => 'text',
		'title' => __( 'Text color', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	'button_background_color' => [
		'type'  => 'text',
		'title' => __( 'Background', 'wow-modal-windows-pro' ),
		'val'   => '#e95645',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	'button_hover_color' => [
		'type'  => 'text',
		'title' => __( 'Background on hover', 'wow-modal-windows-pro' ),
		'val'   => '#d45041',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion

	//region Email Settings

	'mail_send_text' => [
		'type'  => 'text',
		'title' => __( 'Text', 'wow-modal-windows-pro' ),
		'val'   => esc_attr__( 'Thank you. We will contact you shortly.', 'wow-modal-windows-pro' ),
	],

	'mail_send_text_size' => [
		'type'  => 'number',
		'title' => __( 'Font size', 'wow-modal-windows-pro' ),
		'val'   => '16',
		'addon' => 'px',
		'atts' => [
			'min' => 0,
		],
	],

	'mail_send_text_color' => [
		'type'  => 'text',
		'title' => __( 'Color', 'wow-modal-windows-pro' ),
		'val'   => '#48c774',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'emsi' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'EMS_Integration', 'wow-modal-windows-pro' ),
		'label' => esc_attr__( 'Enabled', 'wow-modal-windows-pro' ),
	],
	//endregion

	//region Admin Email
	'send_to_admin' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'Email to Admin', 'wow-modal-windows-pro' ),
		'label' => esc_attr__( 'Enabled', 'wow-modal-windows-pro' ),
	],

	'mail_send_admin_mail' => [
		'type' => 'email',
		'title'   => esc_attr__( 'Send to', 'wow-modal-windows-pro' ),
		'val' => get_option( 'admin_email' ),
	],

	'mail_send_mail_subject' => [
		'type'  => 'text',
		'title' => __( 'Subject', 'wow-modal-windows-pro' ),
		'val'   => esc_attr__( 'Letter from the site.', 'wow-modal-windows-pro' ),
	],

	'admincontent'        => [
		'type'  => 'editor',
		'class' => 'is-full',
		'val'   => '',
		'atts'  => [
			'class' => 'wpie-fulleditor',
		]
	],
	//endregion

	//region User Email

	'send_to_user' => [
		'type' => 'checkbox',
		'title'   => esc_attr__( 'Email to User', 'wow-modal-windows-pro' ),
		'label' => esc_attr__( 'Enabled', 'wow-modal-windows-pro' ),
	],

	'mail_send_from_mail' => [
		'type' => 'email',
		'title'   => esc_attr__( 'From', 'wow-modal-windows-pro' ),
		'val' => get_option( 'admin_email' ),
	],

	'mail_send_user_subject' => [
		'type'  => 'text',
		'title' => __( 'Subject', 'wow-modal-windows-pro' ),
		'val'   => esc_attr__( 'Letter from the site.', 'wow-modal-windows-pro' ),
	],

	'mail_send_from_text' => [
		'type'  => 'text',
		'title' => __( 'Text', 'wow-modal-windows-pro' ),
		'val'   => get_option( 'blogname' ),
	],

	'usercontent'        => [
		'type'  => 'editor',
		'class' => 'is-full',
		'val'   => '',
		'atts'  => [
			'class' => 'wpie-fulleditor',
		]
	],
	//endregion

];