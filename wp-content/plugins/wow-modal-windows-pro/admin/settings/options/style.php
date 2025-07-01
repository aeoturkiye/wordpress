<?php

use ModalWindowPro\Settings_Helper;

defined( 'ABSPATH' ) || exit;

return [
	//region General Style

	//region Properties
	'modal_width'  => [
		'type'  => 'number',
		'title' => __( 'Width', 'wow-modal-windows-pro' ),
		'val'   => '662',
		'addon' => [
			'type' => 'select',
			'name' => 'modal_width_par',
			'val'  => 'px',
			'atts' => [
				'px' => __( 'px', 'wow-modal-windows-pro' ),
				'pr' => __( '%', 'wow-modal-windows-pro' ),
			],
		],
	],
	'modal_height' => [
		'type'  => 'number',
		'title' => __( 'Height', 'wow-modal-windows-pro' ),
		'val'   => 350,
		'addon' => [
			'type' => 'select',
			'name' => 'modal_height_par',
			'val'  => 'auto',
			'atts' => [
				'auto' => __( 'auto', 'wow-modal-windows-pro' ),
				'px'   => __( 'px', 'wow-modal-windows-pro' ),
				'pr'   => __( '%', 'wow-modal-windows-pro' ),
			],
		],
	],

	'modal_zindex' => [
		'type'  => 'number',
		'title' => __( 'Z-index', 'wow-modal-windows-pro' ),
		'val'   => '999999'
	],

	'modal_position' => [
		'type'  => 'select',
		'title' => __( 'Block page', 'wow-modal-windows-pro' ),
		'val'   => 'fixed',
		'atts'  => [
			'fixed'    => __( 'Yes', 'wow-modal-windows-pro' ),
			'absolute' => __( 'No', 'wow-modal-windows-pro' ),
		],
	],

	//endregion

	//region Border
	'border_radius'  => [
		'type'  => 'number',
		'title' => __( 'Radius', 'wow-modal-windows-pro' ),
		'val'   => 5,
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'border_style' => [
		'type'  => 'select',
		'title' => __( 'Style', 'wow-modal-windows-pro' ),
		'val'   => 'none',
		'atts'  => [
			'none'   => __( 'None', 'wow-modal-windows-pro' ),
			'solid'  => __( 'Solid', 'wow-modal-windows-pro' ),
			'dotted' => __( 'Dotted', 'wow-modal-windows-pro' ),
			'dashed' => __( 'Dashed', 'wow-modal-windows-pro' ),
			'double' => __( 'Double', 'wow-modal-windows-pro' ),
			'groove' => __( 'Groove', 'wow-modal-windows-pro' ),
			'inset'  => __( 'Inset', 'wow-modal-windows-pro' ),
			'outset' => __( 'Outset', 'wow-modal-windows-pro' ),
			'ridge'  => __( 'Ridge', 'wow-modal-windows-pro' ),
		],
	],

	'border_width' => [
		'type'  => 'number',
		'title' => __( 'Thickness', 'wow-modal-windows-pro' ),
		'val'   => 0,
		'atts'  => [
			'min' => '0',
		],
		'addon' => 'px',
	],

	'border_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Color', 'wow-modal-windows-pro' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Shadow
	'shadow'       => [
		'type'  => 'select',
		'title' => __( 'Shadow', 'wow-modal-windows-pro' ),
		'val'   => 'none',
		'atts'  => [
			'none'   => __( 'None', 'wow-modal-windows-pro' ),
			'outset' => __( 'Yes', 'wow-modal-windows-pro' ),
			'inset'  => __( 'Inset', 'wow-modal-windows-pro' ),
		],
	],

	'shadow_h_offset' => [
		'type'  => 'number',
		'title' => __( 'Horizontal Position', 'wow-modal-windows-pro' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_v_offset' => [
		'type'  => 'number',
		'title' => __( 'Vertical Position', 'wow-modal-windows-pro' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_blur' => [
		'type'  => 'number',
		'title' => __( 'Blur', 'wow-modal-windows-pro' ),
		'addon' => 'px',
		'val'   => 3,
	],

	'shadow_spread' => [
		'type'  => 'number',
		'title' => __( 'Spread', 'wow-modal-windows-pro' ),
		'addon' => 'px',
		'val'   => 0,
	],

	'shadow_color'  => [
		'type'  => 'text',
		'val'   => '#020202',
		'title' => __( 'Color', 'wow-modal-windows-pro' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion

	//region Content
	'modal_padding' => [
		'type'  => 'number',
		'title' => __( 'Padding', 'wow-modal-windows-pro' ),
		'addon' => 'px',
		'val'   => 10,
		'atts'  => [
			'min' => '0',
		],
	],

	'content_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'wow-modal-windows-pro' ),
		'addon' => 'px',
		'val'   => 16,
		'atts'  => [
			'min' => '0',
		],
	],

	'content_font'  => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'wow-modal-windows-pro' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'wow-modal-windows-pro' ),
			'Sans-Serif'      => 'Sans-Serif',
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'scrollbar_width' => [
		'type' => 'select',
		'title' => __('Scrollbar Thickness', 'wow-modal-windows-pro'),
		'val' => 'thin',
		'atts' => [
			'thin' => __('Thin', 'wow-modal-windows-pro'),
			'auto' => __('Default', 'wow-modal-windows-pro'),
			'none' => __('No shown', 'wow-modal-windows-pro'),
		],
	],

	'scrollbar_color' => [
		'type'  => 'text',
		'val'   => '#4F4F4F',
		'title' => __( 'Scrollbar Color', 'wow-modal-windows-pro' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'scrollbar_background' => [
		'type'  => 'text',
		'val'   => 'rgba(255,255,255, 0)',
		'title' => __( 'Scrollbar Background', 'wow-modal-windows-pro' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],
	//endregion

	//region Background
	'overlay_color' => [
		'type'  => 'text',
		'val'   => 'rgba(0,0,0,.7)',
		'title' => [
			'label'  => __( 'Overlay', 'wow-modal-windows-pro' ),
			'name'   => 'include_overlay',
			'toggle' => true,
			'val'    => 1
		],
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'bg_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'title' => __( 'Background', 'wow-modal-windows-pro' ),
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'modal_background_img' => [
		'type'  => 'text',
		'val'   => '',
		'title' => __( 'Background Image', 'wow-modal-windows-pro' ),
		'class' => 'wpie-image-download',
		'atts'  => [
			'placeholder' => __( 'Enter image URL', 'wow-modal-windows-pro' ),
		],
		'addon' => ' ',
	],
	//endregion


	//endregion

	//region Location
	'modal_top'            => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Top', 'wow-modal-windows-pro' ),
			'name'   => 'include_modal_top',
			'toggle' => true,
			'val'    => 1
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_top_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'wow-modal-windows-pro' ),
				'px' => __( 'px', 'wow-modal-windows-pro' ),
			],
		],
	],

	'modal_bottom' => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Bottom', 'wow-modal-windows-pro' ),
			'name'   => 'include_modal_bottom',
			'toggle' => true,
			'val'    => 0
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_bottom_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'wow-modal-windows-pro' ),
				'px' => __( 'px', 'wow-modal-windows-pro' ),
			],
		],
	],

	'modal_left' => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Left', 'wow-modal-windows-pro' ),
			'name'   => 'include_modal_left',
			'toggle' => true,
			'val'    => 1
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_left_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'wow-modal-windows-pro' ),
				'px' => __( 'px', 'wow-modal-windows-pro' ),
			],
		],
	],

	'modal_right' => [
		'type'  => 'number',
		'val'   => 10,
		'title' => [
			'label'  => __( 'Right', 'wow-modal-windows-pro' ),
			'name'   => 'include_modal_right',
			'toggle' => true,
			'val'    => 1
		],
		'addon' => [
			'type' => 'select',
			'name' => 'modal_right_unit',
			'val'  => '%',
			'atts' => [
				'%'  => __( '%', 'wow-modal-windows-pro' ),
				'px' => __( 'px', 'wow-modal-windows-pro' ),
			],
		],
	],



	//endregion

	//region Title

	'popup_title' => [
		'type'  => 'checkbox',
		'title' => __( 'Used title as Modal Title.', 'wow-modal-windows-pro' ),
		'label' => __( 'Enable', 'wow-modal-windows-pro' ),
	],

	'title_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'wow-modal-windows-pro' ),
		'val'   => '32',
		'addon' => 'px',
		'atts'  => [
			'min' => 0,
		],
	],

	'title_line_height' => [
		'type'  => 'number',
		'title' => __( 'Line Height', 'wow-modal-windows-pro' ),
		'val'   => '36',
		'addon' => 'px',
		'atts'  => [
			'min' => 0,
		],
	],

	'title_font' => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'wow-modal-windows-pro' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'wow-modal-windows-pro' ),
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'title_font_weight' => [
		'type'  => 'select',
		'title' => __( 'Font Weight', 'wow-modal-windows-pro' ),
		'val'   => '400',
		'atts'  => [
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900',
		],
	],

	'title_font_style' => [
		'type'  => 'select',
		'title' => __( 'Font Style', 'wow-modal-windows-pro' ),
		'val'   => 'normal',
		'atts'  => [
			'normal' => 'Normal',
			'italic' => 'Italic',
		],
	],

	'title_align' => [
		'type'  => 'select',
		'title' => __( 'Align', 'wow-modal-windows-pro' ),
		'val'   => 'left',
		'atts'  => [
			'left'   => 'Left',
			'center' => 'Center',
			'right'  => 'Right',
		],
	],

	'title_color' => [
		'type'  => 'text',
		'title' => __( 'Color', 'wow-modal-windows-pro' ),
		'val'   => '#14102C',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'title_background' => [
		'type'  => 'text',
		'title' => __( 'Background', 'wow-modal-windows-pro' ),
		'val'   => 'rgba(255,255,255,0)',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Close Button
	'close_location' => [
		'type'  => 'select',
		'title' => __( 'Location', 'wow-modal-windows-pro' ),
		'val'   => 'topRight',
		'atts'  => [
			'topRight'    => __( 'Top Right', 'wow-modal-windows-pro' ),
			'topLeft'     => __( 'Top Left', 'wow-modal-windows-pro' ),
			'bottomRight' => __( 'Bottom Right', 'wow-modal-windows-pro' ),
			'bottomLeft'  => __( 'Bottom Left', 'wow-modal-windows-pro' ),
		],
	],

	'close_top_position' => [
		'type'  => 'number',
		'title' => __( 'Top', 'wow-modal-windows-pro' ),
		'val'   => '0',
		'addon' => 'px',
	],

	'close_bottom_position' => [
		'type'  => 'number',
		'title' => __( 'Bottom', 'wow-modal-windows-pro' ),
		'val'   => '0',
		'addon' => 'px',
	],

	'close_left_position' => [
		'type'  => 'number',
		'title' => __( 'Left', 'wow-modal-windows-pro' ),
		'val'   => '0',
		'addon' => 'px',
	],

	'close_right_position' => [
		'type'  => 'number',
		'title' => __( 'Right', 'wow-modal-windows-pro' ),
		'val'   => '0',
		'addon' => 'px',
	],


	'close_type'            => [
		'type'  => 'select',
		'title' => __( 'Button type', 'wow-modal-windows-pro' ),
		'val'   => 'text',
		'atts'  => [
			'text' => __( 'Text', 'wow-modal-windows-pro' ),
			'image' => __( 'Icon', 'wow-modal-windows-pro' ),
		],
	],

	'close_box_size' => [
		'type'  => 'number',
		'title' => __( 'Box Size', 'wow-modal-windows-pro' ),
		'val'   => '24',
		'addon' => 'px',
		'atts' => [
			'min'   => '0',
			'step'  => '0.01',
		],
	],

	'close_content' => [
		'type'  => 'text',
		'title' => __( 'Text', 'wow-modal-windows-pro' ),
		'val'   => __( 'Close', 'wow-modal-windows-pro' ),
	],

	'close_padding' => [
		'type'  => 'text',
		'title' => __( 'Padding', 'wow-modal-windows-pro' ),
		'val'   => __( '6px 12px', 'wow-modal-windows-pro' ),
	],

	'close_border_radius' => [
		'type'  => 'number',
		'title' => __( 'Border Radius', 'wow-modal-windows-pro' ),
		'val'   => '0',
		'addon' => 'px',
		'atts' => [
			'min'   => '0',
		],
	],


	'close_font' => [
		'type'  => 'select',
		'title' => __( 'Font Family', 'wow-modal-windows-pro' ),
		'val'   => 'inherit',
		'atts'  => [
			'inherit'         => __( 'Use Your Themes', 'wow-modal-windows-pro' ),
			'Tahoma'          => 'Tahoma',
			'Georgia'         => 'Georgia',
			'Comic Sans MS'   => 'Comic Sans MS',
			'Arial'           => 'Arial',
			'Lucida Grande'   => 'Lucida Grande',
			'Times New Roman' => 'Times New Roman',
		],
	],

	'close_weight' => [
		'type'  => 'select',
		'title' => __( 'Font Weight', 'wow-modal-windows-pro' ),
		'val'   => '400',
		'atts'  => [
			'100' => '100',
			'200' => '200',
			'300' => '300',
			'400' => '400',
			'500' => '500',
			'600' => '600',
			'700' => '700',
			'800' => '800',
			'900' => '900',
		],
	],

	'close_font_style' => [
		'type'  => 'select',
		'title' => __( 'Font Style', 'wow-modal-windows-pro' ),
		'val'   => 'normal',
		'atts'  => [
			'normal' => 'Normal',
			'italic' => 'Italic',
		],
	],

	'close_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'wow-modal-windows-pro' ),
		'val'   => '12',
		'addon' => 'px',
		'atts' => [
			'min'   => '0',
		],
	],


	'close_content_color' => [
		'type'  => 'text',
		'title' => __( 'Text', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'close_content_color_hover' => [
		'type'  => 'text',
		'title' => __( 'Hover', 'wow-modal-windows-pro' ),
		'val'   => '#000000',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'close_background_color' => [
		'type'  => 'text',
		'title' => __( 'Background', 'wow-modal-windows-pro' ),
		'val'   => '#000000',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	'close_background_hover' => [
		'type'  => 'text',
		'title' => __( 'Background Hover', 'wow-modal-windows-pro' ),
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
	],

	//endregion

	//region Mobile Rules
	'screen_size'      => [
		'type'  => 'number',
		'title'  => __( 'Mobile screen', 'wow-modal-windows-pro' ),
		'val'   => '480',
		'addon' => 'px',
	],

	'mobile_width' => [
		'type'  => 'number',
		'title' => __( 'Width', 'wow-modal-windows-pro' ),
		'val'   => '100',
		'addon' => [
			'type' => 'select',
			'name' => 'mobile_width_par',
			'atts' => [
				'px' => __( 'px', 'wow-modal-windows-pro' ),
				'pr' => __( '%', 'wow-modal-windows-pro' ),
			],
		],
	],
	//endregion

];