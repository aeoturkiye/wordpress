<?php
function loveicon_post_thumbnail_image($size = 'full')
{
	$loveicon_featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'loveicon_galleries_home');
?>
	<picture>
		<source type="image/jpeg" srcset="<?php echo esc_url($loveicon_featured_image_url); ?>">
		<img src="<?php echo esc_url($loveicon_featured_image_url); ?>" alt="<?php esc_attr_e('Img', 'leganic'); ?>">
	</picture>
<?php
}
/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function loveicon_kses_basic($string = '')
{
	return wp_kses($string, loveicon_get_allowed_html_tags('basic'));
}
/**
 * Strip all the tags except allowed html tags
 *
 * The name is based on inline editing toolbar name
 *
 * @param  string $string
 * @return string
 */
function loveicon_kses_intermediate($string = '')
{
	return wp_kses($string, loveicon_get_allowed_html_tags('intermediate'));
}

function loveicon_get_allowed_html_tags($level = 'basic')
{
	$allowed_html = array(
		'b'      => array(),
		'i'      => array(),
		'u'      => array(),
		'em'     => array(),
		'br'     => array(),
		'abbr'   => array(
			'title' => array(),
		),
		'span'   => array(
			'class' => array(),
		),
		'strong' => array(),
	);

	if ($level === 'intermediate') {
		$allowed_html['a'] = array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
			'id'    => array(),
		);
	}

	return $allowed_html;
}


function videocafe_sc_heading($atts, $content = null)
{
	extract(
		shortcode_atts(
			array(
				'title_text' => '',
			),
			$atts,
			'heading'
		)
	);

	return '<h4 class="widget_title">' . $title_text . '</h4>';
}
add_shortcode('heading', 'videocafe_sc_heading');


add_shortcode('videocafe-category-checklist', 'videocafe_category_checklist');
function videocafe_category_checklist($atts)
{
	// process passed arguments or assign WP defaults
	$atts = shortcode_atts(
		array(
			'post_id'              => 0,
			'descendants_and_self' => 0,
			'selected_cats'        => false,
			'popular_cats'         => false,
			'checked_ontop'        => true,
		),
		$atts,
		'videocafe-category-checklist'
	);

	// string to bool conversion, so the bool params work as expected
	$atts['selected_cats'] = to_bool($atts['selected_cats']);
	$atts['popular_cats']  = to_bool($atts['popular_cats']);
	$atts['checked_ontop'] = to_bool($atts['checked_ontop']);

	// load template.php from admin, where wp_category_checklist() is defined
	include_once ABSPATH . '/wp-admin/includes/template.php';

	// generate the checklist
	ob_start();
?>
	<div class="categorydiv">
		<ul class="category-tabs">
			<div id="taxonomy-category" class="categorydiv">
				<div id="category-all" class="tabs-panel">
					<ul id="categorychecklist" data-wp-lists="list:category" class="categorychecklist form-no-clear">
						<?php
						wp_category_checklist(
							$atts['post_id'],
							$atts['descendants_and_self'],
							$atts['selected_cats'],
							$atts['popular_cats'],
							null,
							$atts['checked_ontop']
						);
						?>
					</ul>
				</div>
			</div>
		</ul>
	</div>

<?php
	return ob_get_clean();
}
function to_bool($bool)
{
	return (is_bool($bool) ? $bool : (is_numeric($bool) ? ((bool) intval($bool)) : $bool !== 'false'));
}
if (!function_exists('loveicon_options')) :

	function cameron_options()
	{
		global $cameron_options;
		$opt_pref = 'cameron_';
		if (empty($cameron_options)) {
			$cameron_options = get_option($opt_pref . 'options');
		}
		return $cameron_options;
	}
endif;

if (!function_exists('loveicon_public_tagline_control')) {
	function loveicon_public_tagline_control($obj)
	{
		$obj->start_controls_section(
			'public_tagline_typography',
			array(
				'label' => __('Tagline', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_control(
			'public_tagline_tag',
			array(
				'label'   => __('Header Tag', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
				),
				'default' => 'h2',
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_tagline_typography',
				'label'    => __('Tagline', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .typo-tagline-text',
			)
		);

		$obj->add_control(
			'public_tagline_color',
			array(
				'label'     => __('Tagline Color', 'loveicon-core'),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-tagline-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}

if (!function_exists('loveicon_public_header_control')) {
	function loveicon_public_header_control($obj, $dflt)
	{
		$obj->start_controls_section(
			'public_title_typography',
			array(
				'label' => __('Title', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_control(
			'public_title_tag',
			array(
				'label'   => __('Header Tag', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
				),
				'default' => $dflt,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_title_typography',
				'label'    => __('Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .typo-title-text',
			)
		);

		$obj->add_control(
			'public_title_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-title-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}


if (!function_exists('loveicon_public_content_control')) {
	function loveicon_public_content_control($obj)
	{
		$obj->start_controls_section(
			'public_desc_typography',
			array(
				'label' => __('Content', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_desc_typography',
				'label'    => __('Description', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .typo-content-text',
			)
		);

		$obj->add_control(
			'public_desc_color',
			array(
				'label'     => __('Description Color', 'loveicon-core'),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-content-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}


if (!function_exists('loveicon_public_item_control')) {
	function loveicon_public_item_control($obj)
	{
		$obj->start_controls_section(
			'public_item_typography',
			array(
				'label' => __('Items', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_item_title_typography',
				'label'    => __('Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .typo-item_title-text',
			)
		);

		$obj->add_control(
			'public_item_title_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-item_title-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_item_content_typography',
				'label'    => __('Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .typo-item_content-text',
			)
		);

		$obj->add_control(
			'public_item_content_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-item_content-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}


function loveicon_images_size()
{
	add_image_size('loveicon-blog-home', 370, 290, true);
	add_image_size('loveicon-blog-image-size', 370, 317, true);
}

add_action('after_setup_theme', 'loveicon_images_size');

if (!function_exists('get_elementor_library')) {
	function get_elementor_library()
	{
		$pageslist = get_posts(
			array(
				'post_type'      => 'elementor_library',
				'posts_per_page' => -1,
			)
		);
		$pagearray = array();
		if (!empty($pageslist)) {
			foreach ($pageslist as $page) {
				$pagearray[$page->ID] = $page->post_title;
			}
		}
		return $pagearray;
	}
}
if (!function_exists('loveicon_public_header_control')) {
	function loveicon_public_header_control($obj)
	{
		$obj->start_controls_section(
			'public_title_typography',
			array(
				'label' => __('Title', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$obj->add_control(
			'public_title_tag',
			array(
				'label'   => __('Header Tag', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1'   => 'H1',
					'h2'   => 'H2',
					'h3'   => 'H3',
					'h4'   => 'H4',
					'h5'   => 'H5',
					'h6'   => 'H6',
					'div'  => 'div',
					'span' => 'span',
				),
				'default' => 'h2',
			)
		);

		$obj->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'public_title_typography',
				'label'    => __('Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .typo-title-text',
			)
		);

		$obj->add_control(
			'public_title_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'after',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .typo-title-text' => 'color: {{VALUE}} !important',
				),
			)
		);

		$obj->end_controls_section();
	}
}

// css individual Load
add_filter('combine_vc_ele_css_pb_build_css_assets_css_path', 'loveicon_css_list');
function loveicon_css_list($product_css_path)
{
	$product_css_path = plugin_dir_path(__DIR__) . '/assets/elementor/css/';
	return $product_css_path;
}

add_filter('combine_vc_ele_css_pb_build_css_assets_css_url', 'loveicon_css_list_url');
function loveicon_css_list_url()
{
	$product_css_path = plugin_dir_url(__DIR__) . '/assets/elementor/css/';
	return $product_css_path;
}

add_filter('combine_vc_ele_css_pb_sc_list_array', 'loveicon_array_list');
function loveicon_array_list($product_css_array)
{
	$product_css_array = array(
		'loveicon_banner' => array(
			'css'      => array('banner-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_features' => array(
			'css'      => array('features-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_team' => array(
			'css'      => array('team-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_partner' => array(
			'css'      => array('partner-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_testimonials' => array(
			'css'      => array('testimonial-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_fact_counter' => array(
			'css'      => array('fact-counter-section','cause-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_about_two' => array(
			'css'      => array('about-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_team_two' => array(
			'css'      => array('team-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_team_three' => array(
			'css'      => array('team-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_contact' => array(
			'css'      => array('contact-page'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_faq' => array(
			'css'      => array('faq-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
		'loveicon_about_three' => array(
			'css'      => array('about-section'),
			'js'       => array(),
			'external' => array(
				'css' => array(),
				'js'  => array(),
			),
		),
	);	
	return $product_css_array;
}