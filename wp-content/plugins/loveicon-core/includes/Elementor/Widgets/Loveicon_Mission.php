<?php

namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Mission extends Widget_Base
{


	public function get_name()
	{
		return 'loveicon_mission';
	}

	public function get_title()
	{
		return esc_html__('Loveicon Mission', 'loveicon');
	}

	public function get_icon()
	{
		return 'sds-widget-ico';
	}

	public function get_categories()
	{
		return array('Loveicon');
	}

protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__('General', 'loveicon'),
			)
		);

		$this->add_control(
			'sub_heading',
			array(
				'label'   => esc_html__('Sub Heading', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('We Change Your Life & World', 'loveicon'),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__('Heading', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Our Mission & Goals', 'loveicon'),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => esc_html__('Image', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'bg_shape_one',
			array(
				'label'   => esc_html__('BG Shape One', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'bg_shape_two',
			array(
				'label'   => esc_html__('BG Shape Two', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'left_image',
			array(
				'label'   => esc_html__('Left Image', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'title_image',
			array(
				'label'   => esc_html__('Title Image', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__('Title', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Small Donations Make Bigger Impact On Someone’s Life, Act Today!', 'loveicon'),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__('Description', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Excepteur sint occaecat dui cupidatat non proident sunt culpa officia deserunt mollit anim id est laborum. Sed ut dui persic iatis unde oms ipsum dolor sed iste natus sit voluptatem.', 'loveicon'),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__('item', 'loveicon'),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__('Title', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Home Shelter', 'loveicon'),
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__('Icon', 'loveicon'),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'item_shape',
			array(
				'label'   => esc_html__('Shape', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => esc_html__('Repeater List', 'loveicon'),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__('Title #1', 'loveicon'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
					),
					array(
						'list_title'   => esc_html__('Title #2', 'loveicon'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
					),
				),
			)
		);

		$this->end_controls_section();
		
		//Typography Section

		$this->start_controls_section(
			'typography_section',
			array(
				'label' => __('Typography Section', 'loveicon-core'),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'heading_typography',
				'label'    => __('Heading', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title h2',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_heading_typography',
				'label'    => __('Sub Heading', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __('Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .mission-goals-content .text-holder .top .title h3',
			)
		);

		$this->end_controls_section();

		//Color Section

		$this->start_controls_section(
			'color_section',
			array(
				'label' => __('Color Section', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'heading_color',
			array(
				'label'     => __('Heading Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'sub_heading_color',
			array(
				'label'     => __('Sub Heading Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title .inner h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .mission-goals-content .text-holder .top .title h3' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_section();
	}
	protected function render()
	{
		$settings         = $this->get_settings_for_display();
		$sub_heading      = $settings['sub_heading'];
		$img_urls         = $settings['title_image'];
		$heading          = $settings['heading'];
		$image            = ($settings['image']['id'] != '') ? wp_get_attachment_image($settings['image']['id'], 'full') : $settings['image']['url'];
		$image_alt        = get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true);
		$bg_shape_one     = ($settings['bg_shape_one']['id'] != '') ? wp_get_attachment_image($settings['bg_shape_one']['id'], 'full', '', array('class' => 'rotate-me')) : $settings['bg_shape_one']['url'];
		$bg_shape_one_alt = get_post_meta($settings['bg_shape_one']['id'], '_wp_attachment_image_alt', true);
		$bg_shape_two     = ($settings['bg_shape_two']['id'] != '') ? wp_get_attachment_image($settings['bg_shape_two']['id'], 'full') : $settings['bg_shape_two']['url'];
		$bg_shape_two_alt = get_post_meta($settings['bg_shape_two']['id'], '_wp_attachment_image_alt', true);
		$left_image       = ($settings['left_image']['id'] != '') ? wp_get_attachment_image_url($settings['left_image']['id'], 'full') : $settings['left_image']['url'];
		$title_image      = ($settings['title_image']['id'] != '') ? wp_get_attachment_image($settings['title_image']['id'], 'full') : $settings['title_image']['url'];
		$title_image_alt  = get_post_meta($settings['title_image']['id'], '_wp_attachment_image_alt', true);
		$title            = $settings['title'];
		$description      = $settings['description'];
?>
		<!--Start mission and goals Area-->
		<section class="mission-and-goals-area">
			<div class="container">
				<div class="sec-title text-center">
					<div class="sub-title">
						<div class="inner">
							<h3><?php echo $sub_heading; ?></h3>
						</div>
						<div class="outer">
							<?php
							if (wp_http_validate_url($image)) {
							?>
								<img src="<?php echo esc_url($image); ?>" alt="<?php esc_url($image_alt); ?>">
							<?php
							} else {
								echo $image;
							}
							?>
						</div>
					</div>
					<h2><?php echo $heading; ?></h2>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="mission-goals-content clearfix">
							<div class="thm-shape1 wow slideInRight" data-wow-delay="0ms" data-wow-duration="3500ms">
								<?php
								if (wp_http_validate_url($bg_shape_one)) {
								?>
									<img src="<?php echo esc_url($bg_shape_one); ?>" alt="<?php esc_url($bg_shape_one_alt); ?>">
								<?php
								} else {
									echo $bg_shape_one;
								}
								?>
							</div>
							<div class="thm-shape2">
								<?php
								if (wp_http_validate_url($bg_shape_two)) {
								?>
									<img src="<?php echo esc_url($bg_shape_two); ?>" alt="<?php esc_url($bg_shape_two_alt); ?>">
								<?php
								} else {
									echo $bg_shape_two;
								}
								?>
							</div>
							<div class="mission-goals-image-box" style="background-image: url(<?php echo $left_image; ?>);"></div>
							<div class="text-holder text-right-rtl">
								<div class="top">
									<div class="icon">
										<img src="<?php echo esc_url($img_urls['url']); ?>" alt="over">
									</div>
									<div class="title">
										<h3><?php echo $title; ?></h3>
									</div>
								</div>
								<div class="text">
									<?php echo $description; ?>
								</div>
								<ul class="clearfix">
									<?php
									$i = 1;
									foreach ($settings['items'] as $item) {
										$item_title     = $item['item_title'];
										$item_icon      = $item['item_icon'];
										$item_shape     = ($item['item_shape']['id'] != '') ? wp_get_attachment_image($item['item_shape']['id'], 'full') : $item['item_shape']['url'];
										$item_shape_alt = get_post_meta($item['item_shape']['id'], '_wp_attachment_image_alt', true);
									?>
										<li>
											<div class="icon">
											<?php \Elementor\Icons_Manager::render_icon( $item_icon, [ 'aria-hidden' => 'true' ] ); ?>
												<div class="shape">
													<?php
													if (wp_http_validate_url($item_shape)) {
													?>
														<img src="<?php echo esc_url($item_shape); ?>" alt="<?php esc_url($item_shape_alt); ?>">
													<?php
													} else {
														echo $item_shape;
													}
													?>
												</div>
											</div>
											<div class="title">
												<h3><?php echo $item_title; ?></h3>
											</div>
										</li>
									<?php
										$i++;
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php
	}
}
