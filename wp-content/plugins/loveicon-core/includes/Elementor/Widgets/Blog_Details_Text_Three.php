<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
 use Elementor\Group_Control_Typography;
class Blog_Details_Text_Three extends Widget_Base {


	public function get_name() {
		return 'blog_details_text_three';
	}

	public function get_title() {
		return esc_html__( 'Blog Details Text Three', 'loveicon-core' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'Loveicon' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'general', 'loveicon-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'loveicon-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'No One Has Ever Become Poor<br> By Giving, Feed the Poor &amp; Hungry', 'loveicon-core' ),
			)
		);

		$this->add_control(
			'name',
			array(
				'label'   => esc_html__( 'Name', 'loveicon-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'John T. Smith', 'loveicon-core' ),
			)
		);

		$this->add_control(
			'icon',
			array(
				'label' => esc_html__( 'Icon', 'loveicon-core' ),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$this->add_control(
			'url',
			array(
				'label'         => esc_html__( 'URL', 'loveicon-core' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'loveicon-core' ),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				),

			)
		);

		$this->end_controls_section();

		// Typography Section

		$this->start_controls_section(
			'typography_section',
			array(
				'label' => __( 'Typography Section', 'loveicon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title', 'loveicon-core' ),
				'selector' => '{{WRAPPER}} .blog-details-text-3 .blog-style3-text-holder .blog-title',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'name_typography',
				'label'    => __( 'Name ', 'loveicon-core' ),
				'selector' => '{{WRAPPER}} .blog-style3-text-holder .name h5',
			)
		);

		$this->end_controls_section();

		// Color Section

		$this->start_controls_section(
			'color_section',
			array(
				'label' => __( 'Color Section', 'loveicon-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'loveicon-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style3-text-holder .blog-title a' => 'color: {{VALUE}}!important',
				),
			)
		);

		$this->add_control(
			'name_color',
			array(
				'label'     => __( 'Name Color', 'loveicon-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-style3-text-holder .name h5' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings     = $this->get_settings_for_display();
		$title        = $settings['title'];
		$name         = $settings['name'];
		$icon         = $settings['icon'];
		$url          = $settings['url']['url'];
		$url_external = $settings['url']['is_external'] ? 'target="_blank"' : '';
		$url_nofollow = $settings['url']['nofollow'] ? 'rel="nofollow"' : '';
		?>
		<!--Start Blog Details Text 3-->
		<div class="blog-details-text-3">
			<div class="blog-style3-text-holder">
				<div class="quote-icon"><span class="<?php echo $icon['value']; ?>"></span></div>
				<h2 class="blog-title">
					<a href="<?php echo esc_url( $url ); ?>" <?php echo $url_external; ?> <?php echo $url_nofollow; ?>><?php echo $title; ?></a>
				</h2>
				<div class="name">
					<h5><?php echo $name; ?></h5>
				</div>
			</div>
		</div>
		<!--End Blog Details Text 3-->
		<?php
	}
}
