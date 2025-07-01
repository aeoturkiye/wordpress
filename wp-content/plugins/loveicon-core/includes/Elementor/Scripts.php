<?php
namespace Loveicon\Helper\Elementor;
/**
 * The Menu handler class
 */

class Scripts {

	private $prefix = 'loveicon';

	public function __construct() {
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'loveicon_core_required_script' ) );
		add_action( 'wp_head', array( $this, 'widget_assets_css' ) );
		add_action( 'wp_footer', array( $this, 'widget_scripts' ) );
		add_action( 'elementor/editor/after_enqueue_scripts', array( $this, 'widget_editor_scripts' ) );
	}

	public function loveicon_core_required_script( $screen ) {

	}
	public function widget_assets_css() {
	//	wp_enqueue_style( 'elementor-custom-style', LOVEICON_CORE_ASSETS . '/elementor/css/style.css', true, time() );
	}

	public function widget_scripts() {

	wp_enqueue_script( 'bannerslider', LOVEICON_CORE_ASSETS . '/elementor/js/bannerslider.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'partnercarouseltwo', LOVEICON_CORE_ASSETS . '/elementor/js/partner-carousel-2.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'partnercarouselthree', LOVEICON_CORE_ASSETS . '/elementor/js/partner-carousel-three.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'testimonial', LOVEICON_CORE_ASSETS . '/elementor/js/testimonial.js', array( 'jquery' ), time(), true );
	wp_enqueue_script( 'themecarousel', LOVEICON_CORE_ASSETS . '/elementor/js/theme_carousel.js', array( 'jquery' ), time(), true );

	}
	public function widget_editor_scripts() {
	}
}