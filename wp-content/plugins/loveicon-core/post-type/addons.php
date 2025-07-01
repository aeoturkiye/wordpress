<?php
function loveicon_init_widgets() {
	if ( is_plugin_active( 'charitable/charitable.php' ) ) {
		include_once __DIR__ . '/Loveicon_Causes.php';
		include_once __DIR__ . '/Loveicon_Causes_Item.php';
		include_once __DIR__ . '/Loveicon_Causes_Slider.php';
	}
	if ( is_plugin_active( 'the-events-calendar/the-events-calendar.php' ) ) {
		include_once __DIR__ . '/Loveicon_Event_List.php';
		include_once __DIR__ . '/Loveicon_Event_Slider.php';
	}
	include_once __DIR__ . '/Loveicon_Blog.php';
}
add_action( 'elementor/widgets/widgets_registered', 'loveicon_init_widgets' );

function loveicon_widget_scripts() {
	wp_register_script( 'loveicon-cause-slider', plugins_url( 'assets/js/charity.js', __FILE__ ), array( 'jquery' ), time(), true );
}
add_action( 'elementor/frontend/after_register_scripts', 'loveicon_widget_scripts' );

function loveicon_charity_setup() {
	add_image_size( 'loveicon-chariti-1', 380, 370, true );
	add_image_size( 'loveicon-chariti-single-2', 600, 525, true );
	add_image_size( 'loveicon-chariti-slider-3', 429, 414, true );
}
add_action( 'after_setup_theme', 'loveicon_charity_setup' );



add_filter( 'template_include', 'campaign_template_fun', 99 );
function campaign_template_fun( $campaign_template ) {

	if ( ( get_post_type() == 'campaign' ) && is_single() ) {
		$campaign_template_file_path = __DIR__ . '/layouts/single-campaign.php';
		$campaign_template           = $campaign_template_file_path;
	}
	if ( ( get_post_type() == 'tribe_events' ) && is_single() ) {
		$campaign_template_file_path = __DIR__ . '/layouts/single-event.php';
		$campaign_template           = $campaign_template_file_path;
	}

	if ( ! $campaign_template ) {
		return $campaign_template;
	}
	return $campaign_template;
}
