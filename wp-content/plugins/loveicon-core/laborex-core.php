<?php
/*
  Plugin Name: Loveicon Core
  Plugin URI: http://smartdatasoft.com/
  Description: Helping for the Loveicon theme.
  Author: SmartDataSoft Team
  Version: 1.7
  Author URI: http://smartdatasoft.com/
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/combine-vc-ele-css/combine-vc-ele-css.php';
require_once __DIR__ . '/page-option/page-option.php';

/**
 * The main plugin class
 */
final class Loveicon_Helper {

	/**
	 * Plugin version
	 *
	 * @var string
	 */
	const version = '1.0';


	/**
	 * Plugin Version
	 *
	 * @since 1.2.0
	 * @var   string The plugin version.
	 */
	const VERSION = '1.2.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.2.0
	 * @var   string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.2.0
	 * @var   string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '7.0';

	/**
	 * Constructor
	 *
	 * @since  1.0.0
	 * @access public
	 */

	/**
	 * Class construcotr
	 */
	private function __construct() {
		$this->define_constants();
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}

	/**
	 * Initializes a singleton instance
	 *
	 * @return \Loveicon
	 */
	public static function init() {
		 static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}


	/**
	 * Define the required plugin constants
	 *
	 * @return void
	 */
	public function define_constants() {
		define( 'LOVEICON_CORE_VERSION', self::version );
		define( 'LOVEICON_CORE_FILE', __FILE__ );
		define( 'LOVEICON_CORE_PATH', __DIR__ );
		define( 'LOVEICON_CORE_URL', plugin_dir_url( __FILE__ ) );
		define( 'LOVEICON_CORE_ASSETS_DEPENDENCY_CSS', LOVEICON_CORE_URL . '/assets/elementor/css/' );
		define( 'LOVEICON_CORE_ASSETS', LOVEICON_CORE_URL . 'assets' );
		$theme = wp_get_theme();
		define( 'THEME_VERSION_CORE', $theme->Version );
	}

	/**
	 * Initialize the plugin
	 *
	 * @return void
	 */
	public function init_plugin() {
		 $this->checkElementor();
		load_plugin_textdomain( 'loveicon-core', false, basename( dirname( __FILE__ ) ) . '/languages' );
		new Loveicon\Helper\Posttype();
		new \Loveicon\Helper\Hooks();
		// sidebar generator

		new \Loveicon\Helper\Widgets();
		if ( did_action( 'elementor/loaded' ) ) {
			new \Loveicon\Helper\Elementor();
		}

		if ( is_admin() ) {
			new \Loveicon\Helper\Admin();
		}
	}

	public function checkElementor() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_missing_main_plugin' ) );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_elementor_version' ) );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', array( $this, 'admin_notice_minimum_php_version' ) );
			return;
		}
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = '<p>If you want to use Elementor Version of "<strong>loveicon</strong>" Theme, Its requires "<strong>Elementor</strong>" to be installed and activated.</p>';

		// $message = sprintf(
		// * translators: 1: Plugin name 2: Elementor */
		// esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-hello-world'), '<strong>' . esc_html__('Elementor ChildIt', 'elementor-hello-world') . '</strong>', '<strong>' . esc_html__('Elementor', 'elementor-hello-world') . '</strong>'
		// esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-hello-world'), '<strong>' . esc_html__('If you want to use Elementor Version of Theme, ', 'elementor-hello-world') . '</strong>', '<strong>' . esc_html__('Elementor', 'elementor-hello-world') . '</strong>'
		// );

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-hello-world' ),
			'<strong>' . esc_html__( 'Elementor ChildIt', 'elementor-hello-world' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-hello-world' ) . '</strong>',
			self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since  1.0.0
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'loveicon-core' ),
			'<strong>' . esc_html__( 'Elementor ChildIt', 'loveicon-core' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'loveicon-core' ) . '</strong>',
			self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
	}


	/**
	 * Do stuff upon plugin activation
	 *
	 * @return void
	 */
	public function activate() {
		$installer = new Loveicon\Helper\Installer();
		$installer->run();
	}
}

/**
 * Initializes the main plugin
 *
 * @return \Loveicon
 */
function Loveicon() {
	 return Loveicon_Helper::init();
}

// kick-off the plugin
Loveicon();

require_once __DIR__ . '/post-type/addons.php';



function loveicon_get_contact_form_7_posts() {
	$args    = array(
		'post_type'      => 'wpcf7_contact_form',
		'posts_per_page' => -1,
	);
	$catlist = array();

	if ( $categories = get_posts( $args ) ) {
		foreach ( $categories as $category ) {
			(int) $catlist[ $category->ID ] = $category->post_title;
		}
	} else {
		(int) $catlist['0'] = esc_html__( 'No contect From 7 form found', 'loveicon-core' );
	}
	return $catlist;
}


// Get The Menu List
function loveicon_get_menu_list() {
	$menulist = array();
	$menus    = get_terms( 'nav_menu' );
	foreach ( $menus as $menu ) {
		$menulist[ $menu->name ] = $menu->name;
	}
	return $menulist;
}


// Enqueue Style During Editing
add_action(
	'elementor/editor/before_enqueue_styles',
	function () {
		wp_enqueue_style( 'elementor-stylesheet', plugins_url() . '/loveicon-core/assets/elementor/stylesheets.css', true, time() );
	}
);

/**
 * Passing Classes to Menu
 */
add_action(
	'wp_nav_menu_item_custom_fields',
	function ( $item_id, $item ) {
		if ( $item->menu_item_parent == '0' ) {
			$show_as_megamenu = get_post_meta( $item_id, '_show-as-megamenu', true ); ?>
		<p class="description-wide">
			<label for="megamenu-item-<?php echo $item_id; ?>"> <input type="checkbox" id="megamenu-item-<?php echo $item_id; ?>" name="megamenu-item[<?php echo $item_id; ?>]" <?php checked( $show_as_megamenu, true ); ?> /><?php _e( 'Mega menu', 'sds' ); ?>
			</label>
		</p>
			<?php
		}
	},
	10,
	2
);

add_action(
	'wp_update_nav_menu_item',
	function ( $menu_id, $menu_item_db_id ) {
		$button_value = ( isset( $_POST['megamenu-item'][ $menu_item_db_id ] ) && $_POST['megamenu-item'][ $menu_item_db_id ] == 'on' ) ? true : false;
		update_post_meta( $menu_item_db_id, '_show-as-megamenu', $button_value );
	},
	10,
	2
);

add_filter(
	'nav_menu_css_class',
	function ( $classes, $menu_item ) {
		if ( $menu_item->menu_item_parent == '0' ) {
			$show_as_megamenu = get_post_meta( $menu_item->ID, '_show-as-megamenu', true );
			if ( $show_as_megamenu ) {
				$classes[] = 'megamenu';
			}
		}
		return $classes;
	},
	10,
	2
);

// Hook called when the plugin is activated.
add_action( 'plugins_loaded', 'lovecion_elem_cpt_support' );
function lovecion_elem_cpt_support() {
	$cpt_support = get_option( 'elementor_cpt_support' );
	if ( ! $cpt_support ) {
		// First check if the option is not available already in the database. It not then create the array with all default post types including yours and save the settings.
		$cpt_support = array( 'page', 'post', 'tribe_events' );
		update_option( 'elementor_cpt_support', $cpt_support );
	} elseif ( ! in_array( 'tribe_events', $cpt_support ) ) {
		// If the option is available then just append the array and update the settings.
		$cpt_support[] = 'tribe_events';
		update_option( 'elementor_cpt_support', $cpt_support );
	}
}
