<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Features extends Widget_Base
{


	public function get_name()
	{
		return 'loveicon_features';
	}

	public function get_title()
	{
		return esc_html__('Loveicon Features', 'loveicon');
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
			'layout_style',
			array(
				'label'   => __('Layout Style', 'plugin-domain'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __('One', 'plugin-domain'),
					'2' => __('Two', 'plugin-domain'),
					'3' => __('Three', 'plugin-domain'),
					'4' => __('Four', 'plugin-domain'),
					'5' => __('Five', 'plugin-domain'),
				),
			)
		);

		$this->add_control(
			'col_style',
			array(
				'label'   => __('Column Style', 'plugin-domain'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-xl-4',
				'options' => array(
					'col-xl-6' => __('Two', 'plugin-domain'),
					'col-xl-4' => __('Three', 'plugin-domain'),
					'col-xl-3' => __('Four', 'plugin-domain'),
				),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__('Title', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Charity With Difference', 'loveicon'),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'   => esc_html__('Sub Title', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('We Change Your Life & World', 'loveicon'),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'      => esc_html__('Image', 'loveicon'),
				'type'       => Controls_Manager::MEDIA,
				'default'    => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '1',
						),
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '4',
						),
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '5',
						),
					),
				),
			)
		);

		$this->add_control(
			'bg_image',
			array(
				'label'   => esc_html__('BG Image', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label'      => esc_html__('Item', 'loveicon'),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '1',
						),
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '4',
						),
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '5',
						),
					),
				),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_image_one',
			array(
				'label'   => esc_html__('Image One', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'item_image_two',
			array(
				'label'   => esc_html__('Image Two', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'item_image_three',
			array(
				'label'   => esc_html__('Image Three', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'item_heading',
			array(
				'label'   => esc_html__('Heading', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Get Inspire And Help', 'loveicon'),
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__('Description', 'loveicon'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __('Nostrud temp exercitation duis laboris nisi utm aliquip sed duis aute.', 'loveicon'),
				'placeholder' => esc_html__('Type your description here', 'loveicon'),
			)
		);

		$repeater->add_control(
			'item_button_title',
			array(
				'label'   => esc_html__('Button Title', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('read more', 'loveicon'),
			)
		);

		$repeater->add_control(
			'item_button_url',
			array(
				'label'         => esc_html__('Button URL', 'loveicon'),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__('https://your-link.com', 'loveicon'),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
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

		$this->start_controls_section(
			'item1',
			array(
				'label'     => esc_html__('Item', 'loveicon'),
				'condition' => array('layout_style' => '2'),
			)
		);

		$repeater1 = new Repeater();

		$repeater1->add_control(
			'item_image_one',
			array(
				'label'   => esc_html__('Image One', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater1->add_control(
			'item_image_two',
			array(
				'label'   => esc_html__('Image Two', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater1->add_control(
			'item_image_three',
			array(
				'label'   => esc_html__('Image Three', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater1->add_control(
			'item_heading',
			array(
				'label'   => esc_html__('Heading', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Get Inspire And Help', 'loveicon'),
			)
		);

		$repeater1->add_control(
			'item_heading_url',
			array(
				'label'         => esc_html__('Heading URL', 'loveicon'),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__('https://your-link.com', 'loveicon'),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				),
			)
		);

		$repeater1->add_control(
			'item_description',
			array(
				'label'       => esc_html__('Description', 'loveicon'),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __('Nostrud temp exercitation duis laboris nisi utm aliquip sed duis aute.', 'loveicon'),
				'placeholder' => esc_html__('Type your description here', 'loveicon'),
			)
		);

		$this->add_control(
			'items1',
			array(
				'label'   => esc_html__('Repeater List', 'loveicon'),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater1->get_controls(),
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

		$this->start_controls_section(
			'item2',
			array(
				'label'     => esc_html__('Item', 'loveicon'),
				'condition' => array('layout_style' => '3'),
			)
		);

		$repeater2 = new Repeater();

		$repeater2->add_control(
			'bg_image',
			array(
				'label'   => esc_html__('BG Image', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater2->add_control(
			'item_image_one',
			array(
				'label'   => esc_html__('Image One', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater2->add_control(
			'item_image_two',
			array(
				'label'   => esc_html__('Image Two', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater2->add_control(
			'item_image_three',
			array(
				'label'   => esc_html__('Image Three', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater2->add_control(
			'item_heading',
			array(
				'label'   => esc_html__('Heading', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Get Inspire And Help', 'loveicon'),
			)
		);

		$repeater2->add_control(
			'item_description',
			array(
				'label'       => esc_html__('Description', 'loveicon'),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __('Nostrud temp exercitation duis laboris nisi utm aliquip sed duis aute.', 'loveicon'),
				'placeholder' => esc_html__('Type your description here', 'loveicon'),
			)
		);

		$this->add_control(
			'items2',
			array(
				'label'   => esc_html__('Repeater List', 'loveicon'),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater2->get_controls(),
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
				'name'     => 'title_typography',
				'label'    => __('Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title h2',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_title_typography',
				'label'    => __('Sub Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'heading_typography',
				'label'    => __('Heading', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .features-style1_single .text-holder h3,{{WRAPPER}} .features-style3_single .img-holder .inner-content h2 ,{{WRAPPER}} .features-style2_single .text-holder h3,{{WRAPPER}} .features-style5_single .inner-box .text-holder h3',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_title_typography',
				'label'    => __('Button Title ', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .btn-one',
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
			'title_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'sub_title_color',
			array(
				'label'     => __('Sub Title Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title .inner h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'heading_color',
			array(
				'label'     => __('Heading Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .features-style1_single .text-holder h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .features-style3_single .img-holder .inner-content h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} .features-style2_single .text-holder h3 a' => 'color: {{VALUE}}',
					'{{WRAPPER}} .features-style5_single .inner-box .text-holder h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_title_color',
			array(
				'label'     => __('Button Title Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .features-style1_single .text-holder .btns-box a' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_hover_bg_color',
			array(
				'label'     => __('Button  Hover BG Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .btn-one:before' => 'background: {{VALUE}}!important',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render()
	{
		$settings     = $this->get_settings_for_display();
		$layout_style = $settings['layout_style'];
		$col_style    = $settings['col_style'];

		if ($layout_style == '1') {
			$title     = $settings['title'];
			$sub_title = $settings['sub_title'];
			$image     = ($settings['image']['id'] != '') ? wp_get_attachment_image_url($settings['image']['id'], 'full') : $settings['image']['url'];
			$bg_image  = ($settings['bg_image']['id'] != '') ? wp_get_attachment_image_url($settings['bg_image']['id'], 'full') : $settings['bg_image']['url'];
?>
			<section class="features-style1-area">
				<div class="container">
					<div class="sec-title text-center">
						<div class="sub-title">
							<div class="inner">
								<h3><?php echo $sub_title; ?></h3>
							</div>
							<?php if(!empty($image)): ?>
							<div class="outer"><img src="<?php echo $image; ?>" alt="loveicon"></div>
							<?php endif; ?>
						</div>
						<h2><?php echo $title; ?></h2>
					</div>
					<div class="row">
						<!--Start Features Style1 Single-->
						<div class="col-xl-12">
							<div class="features-style1_box">
								<div class="thm-shape1 wow slideInRight" data-wow-delay="0ms" data-wow-duration="3500ms">
									<img class="rotate-me" src="<?php echo $bg_image; ?>" alt="loveicon">
								</div>
								<div class="row">
									<!--Start Features Style1 Single-->
									<?php
									$i = 1;
									foreach ($settings['items'] as $item) {
										$item_image_one           = ($item['item_image_one']['id'] != '') ? wp_get_attachment_image_url($item['item_image_one']['id'], 'full') : $item['item_image_one']['url'];
										$item_image_one_alt       = get_post_meta($item['item_image_one']['id'], '_wp_attachment_image_alt', true);
										$item_image_two           = ($item['item_image_two']['id'] != '') ? wp_get_attachment_image_url($item['item_image_two']['id'], 'full') : $item['item_image_two']['url'];
										$item_image_two_alt       = get_post_meta($item['item_image_two']['id'], '_wp_attachment_image_alt', true);
										$item_image_three         = ($item['item_image_three']['id'] != '') ? wp_get_attachment_image_url($item['item_image_three']['id'], 'full') : $item['item_image_three']['url'];
										$item_image_three_alt     = get_post_meta($item['item_image_three']['id'], '_wp_attachment_image_alt', true);
										$item_heading             = $item['item_heading'];
										$item_description         = $item['item_description'];
										$item_button_title        = $item['item_button_title'];
										$item_button_url          = $item['item_button_url']['url'];
										$item_button_url_external = $item['item_button_url']['is_external'] ? 'target="_blank"' : '';
										$item_button_url_nofollow = $item['item_button_url']['nofollow'] ? 'rel="nofollow"' : '';

										if ($i == 1) {
											$class = 'features-style1_single';
										} else {
											$class = 'features-style1_single style' . $i;
										}
									?>
										<div class="<?php echo $col_style; ?> col-lg-4 text-center" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="500">

											<div class="<?php echo $class; ?>">
												<div class="icon-holder">
													<div class="inner">
														<?php
														if (wp_http_validate_url($item_image_one)) {
														?>
															<img src="<?php echo esc_url($item_image_one); ?>" alt="<?php echo $item_image_one_alt; ?>">
														<?php
														} else {
															echo $item_image_one;
														}
														?>
													</div>
													<div class="shape1 zoominout">
														<?php
														if (wp_http_validate_url($item_image_two)) {
														?>
															<img src="<?php echo esc_url($item_image_two); ?>" alt="<?php echo $item_image_two_alt; ?>">
														<?php
														} else {
															echo $item_image_two;
														}
														?>
													</div>
													<div class="shape-bg">
														<?php
														if (wp_http_validate_url($item_image_three)) {
														?>
															<img src="<?php echo esc_url($item_image_three); ?>" alt="<?php echo $item_image_three_alt; ?>">
														<?php
														} else {
															echo $item_image_three;
														}
														?>
													</div>
												</div>
												<div class="text-holder">
													<h3><?php echo $item_heading; ?></h3>
													<?php echo $item_description; ?>
													<div class="btns-box">
														<?php if ($item_button_title) { ?>
															<a class="btn-one" href=" <?php echo esc_url($item_button_url); ?>" <?php echo $item_button_url_external; ?> <?php echo $item_button_url_nofollow; ?>><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_title; ?></span></a>
														<?php } ?>

													</div>
												</div>
											</div>
										</div>
									<?php
										$i++;
									}
									?>
									<!--End Features Style1 Single-->
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php
		} elseif ($layout_style == '2') {
			$bg_image     = ($settings['bg_image']['id'] != '') ? wp_get_attachment_image_url($settings['bg_image']['id'], 'full') : $settings['bg_image']['url'];
			$bg_image     = ($settings['bg_image']['id'] != '') ? wp_get_attachment_image_url($settings['bg_image']['id'], 'full') : $settings['bg_image']['url'];
			$bg_image_alt = get_post_meta($settings['bg_image']['id'], '_wp_attachment_image_alt', true);
		?>

			<!--Start Features Style2 Arae-->
			<section class="features-style2-area">
				<div class="shape1">
					<?php
					if (wp_http_validate_url($bg_image)) {
					?>
						<img src="<?php echo esc_url($bg_image); ?>" alt="<?php echo $bg_image_alt; ?>">
					<?php
					} else {
						echo $bg_image;
					}
					?>
				</div>
				<div class="container">
					<div class="row">
						<?php
						$i = 1;
						foreach ($settings['items1'] as $item) {
							$item_image_one            = ($item['item_image_one']['id'] != '') ? wp_get_attachment_image_url($item['item_image_one']['id'], 'full') : $item['item_image_one']['url'];
							$item_image_one_alt        = get_post_meta($item['item_image_one']['id'], '_wp_attachment_image_alt', true);
							$item_image_two            = ($item['item_image_two']['id'] != '') ? wp_get_attachment_image_url($item['item_image_two']['id'], 'full') : $item['item_image_two']['url'];
							$item_image_two_alt        = get_post_meta($item['item_image_two']['id'], '_wp_attachment_image_alt', true);
							$item_image_three          = ($item['item_image_three']['id'] != '') ? wp_get_attachment_image_url($item['item_image_three']['id'], 'full') : $item['item_image_three']['url'];
							$item_image_three_alt      = get_post_meta($item['item_image_three']['id'], '_wp_attachment_image_alt', true);
							$item_heading              = $item['item_heading'];
							$item_description          = $item['item_description'];
							$item_heading_url          = $item['item_heading_url']['url'];
							$item_heading_url_external = $item['item_heading_url']['is_external'] ? 'target="_blank"' : '';
							$item_heading_url_nofollow = $item['item_heading_url']['nofollow'] ? 'rel="nofollow"' : '';
						?>
							<!--Start Single Features Style2-->
							<div class="<?php echo $col_style; ?> col-lg-3">
								<div class="features-style2_single style<?php echo $i; ?> text-center">
									<div class="icon-holder">
										<div class="inner">
											<?php
											if (wp_http_validate_url($item_image_one)) {
											?>
												<img src="<?php echo esc_url($item_image_one); ?>" alt="<?php echo $item_image_one_alt; ?>">
											<?php
											} else {
												echo $item_image_one;
											}
											?>
										</div>
										<div class="shape-bg">
											<?php
											if (wp_http_validate_url($item_image_two)) {
											?>
												<img src="<?php echo esc_url($item_image_two); ?>" alt="<?php echo $item_image_two_alt; ?>">
											<?php
											} else {
												echo $item_image_two;
											}
											?>
										</div>
										<div class="shape1 zoominout">
											<?php
											if (wp_http_validate_url($item_image_three)) {
											?>
												<img src="<?php echo esc_url($item_image_three); ?>" alt="<?php echo $item_image_three_alt; ?>">
											<?php
											} else {
												echo $item_image_three;
											}
											?>
										</div>
									</div>
									<div class="text-holder">
										<h3><a href=" <?php echo esc_url($item_heading_url); ?>" <?php echo $item_heading_url_external; ?> <?php echo $item_heading_url_nofollow; ?>><?php echo $item_heading; ?></a></h3>
										<p><?php echo $item_description; ?></p>
									</div>
								</div>
							</div>
							<!--End Single Features Style2-->
						<?php
							$i++;
						}
						?>
					</div>
				</div>
			</section>
			<!--End Features Style2 Arae-->
		<?php
		} elseif ($layout_style == '3') {
		?>
			<!--Start  Features Style3 Arae-->
			<section class="features-style3-area">
				<div class="auto-container">
					<div class="row">
						<?php
						$i = 1;
						foreach ($settings['items2'] as $item) {
							$item_image_one       = ($item['item_image_one']['id'] != '') ? wp_get_attachment_image_url($item['item_image_one']['id'], 'full') : $item['item_image_one']['url'];
							$item_image_one_alt   = get_post_meta($item['item_image_one']['id'], '_wp_attachment_image_alt', true);
							$item_image_two       = ($item['item_image_two']['id'] != '') ? wp_get_attachment_image_url($item['item_image_two']['id'], 'full') : $item['item_image_two']['url'];
							$item_image_two_alt   = get_post_meta($item['item_image_two']['id'], '_wp_attachment_image_alt', true);
							$item_image_three     = ($item['item_image_three']['id'] != '') ? wp_get_attachment_image_url($item['item_image_three']['id'], 'full') : $item['item_image_three']['url'];
							$item_image_three_alt = get_post_meta($item['item_image_three']['id'], '_wp_attachment_image_alt', true);
							$bg_image             = ($item['bg_image']['id'] != '') ? wp_get_attachment_image_url($item['bg_image']['id'], 'full') : $item['bg_image']['url'];
							$bg_image_alt         = get_post_meta($item['bg_image']['id'], '_wp_attachment_image_alt', true);
							$item_heading         = $item['item_heading'];
							$item_description     = $item['item_description'];

							if ($i % 2 != 0) {
								$class = 'single';
							} else {
								$class = 'single middle';
							}
						?>
							<!--Start Features Style3 Single-->
							<div class="<?php echo $col_style; ?> col-lg-4">
								<div class="features-style3_<?php echo $class; ?>">
									<div class="shape-1 zoom-fade">
										<?php
										if (wp_http_validate_url($item_image_one)) {
										?>
											<img src="<?php echo esc_url($item_image_one); ?>" alt="<?php echo $item_image_one_alt; ?>">
										<?php
										} else {
											echo $item_image_one;
										}
										?>
									</div>
									<div class="shape-2 zoominout">
										<?php
										if (wp_http_validate_url($item_image_two)) {
										?>
											<img src="<?php echo esc_url($item_image_two); ?>" alt="<?php echo $item_image_two_alt; ?>">
										<?php
										} else {
											echo $item_image_two;
										}
										?>
									</div>
									<div class="img-holder">
										<?php
										if (wp_http_validate_url($item_image_three)) {
										?>
											<img src="<?php echo esc_url($item_image_three); ?>" alt="<?php echo $item_image_three_alt; ?>">
										<?php
										} else {
											echo $item_image_three;
										}
										?>
										<div class="inner-content">
											<div class="title">
												<div class="features-style3_title-bg" style="background-image: url(<?php echo $bg_image; ?>);"></div>
												<h2><?php echo $item_heading; ?></h2>
												<p><?php echo $item_description; ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--End Features Style3 Single-->
						<?php
							$i++;
						}
						?>
					</div>
				</div>
			</section>
			<!--End Features Style3 Arae-->
		<?php
		} elseif ($layout_style == '4') {
			$image     = ($settings['image']['id'] != '') ? wp_get_attachment_image_url($settings['image']['id'], 'full') : $settings['image']['url'];
			$image_alt = get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true);
		?>
			<!--Start Features Style4 Arae-->
			<section class="features-style4-area">
				<div class="shape1">
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
				<div class="container">
					<div class="row">
						<?php
						$i = 1;
						foreach ($settings['items'] as $item) {
							$item_image_one           = ($item['item_image_one']['id'] != '') ? wp_get_attachment_image_url($item['item_image_one']['id'], 'full') : $item['item_image_one']['url'];
							$item_image_one_alt       = get_post_meta($item['item_image_one']['id'], '_wp_attachment_image_alt', true);
							$item_image_two           = ($item['item_image_two']['id'] != '') ? wp_get_attachment_image_url($item['item_image_two']['id'], 'full') : $item['item_image_two']['url'];
							$item_image_two_alt       = get_post_meta($item['item_image_two']['id'], '_wp_attachment_image_alt', true);
							$item_image_three         = ($item['item_image_three']['id'] != '') ? wp_get_attachment_image_url($item['item_image_three']['id'], 'full') : $item['item_image_three']['url'];
							$item_image_three_alt     = get_post_meta($item['item_image_three']['id'], '_wp_attachment_image_alt', true);
							$item_heading             = $item['item_heading'];
							$item_description         = $item['item_description'];
							$item_button_title        = $item['item_button_title'];
							$item_button_url          = $item['item_button_url']['url'];
							$item_button_url_external = $item['item_button_url']['is_external'] ? 'target="_blank"' : '';
							$item_button_url_nofollow = $item['item_button_url']['nofollow'] ? 'rel="nofollow"' : '';

						?>
							<!--Start Single Features Style4-->
							<div class="<?php echo $col_style; ?>">
								<div class="features-style4_single style<?php echo $i; ?> text-center">
									<div class="icon-holder">
										<div class="inner">
											<?php
											if (wp_http_validate_url($item_image_one)) {
											?>
												<img src="<?php echo esc_url($item_image_one); ?>" alt="<?php echo $item_image_one_alt; ?>">
											<?php
											} else {
												echo $item_image_one;
											}
											?>
										</div>
										<div class="shape-bg">
											<?php
											if (wp_http_validate_url($item_image_two)) {
											?>
												<img src="<?php echo esc_url($item_image_two); ?>" alt="<?php echo $item_image_two_alt; ?>">
											<?php
											} else {
												echo $item_image_two;
											}
											?>
										</div>
										<div class="shape1">
											<?php
											if (wp_http_validate_url($item_image_three)) {
											?>
												<img src="<?php echo esc_url($item_image_three); ?>" alt="<?php echo $item_image_three_alt; ?>">
											<?php
											} else {
												echo $item_image_three;
											}
											?>
										</div>
									</div>
									<div class="text-holder">
										<h3><a href="<?php echo esc_url($item_button_url); ?>" <?php echo $item_button_url_external; ?> <?php echo $item_button_url_nofollow; ?>><?php echo $item_heading; ?></a></h3>
										<p><?php echo $item_description; ?></p>
										<div class="btn-box">
											<a class="btn-one" href="<?php echo esc_url($item_button_url); ?>" <?php echo $item_button_url_external; ?> <?php echo $item_button_url_nofollow; ?>>
												<span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_title; ?></span>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!--End Single Features Style4-->
						<?php
							$i++;
						}
						?>
					</div>
				</div>
			</section>
			<!--End Features Style3 Arae-->
		<?php
		} elseif ($layout_style == '5') {
			$image        = ($settings['image']['id'] != '') ? wp_get_attachment_image_url($settings['image']['id'], 'full') : $settings['image']['url'];
			$bg_image     = ($settings['bg_image']['id'] != '') ? wp_get_attachment_image_url($settings['bg_image']['id'], 'full') : $settings['bg_image']['url'];
			$bg_image_alt = get_post_meta($settings['bg_image']['id'], '_wp_attachment_image_alt', true);
			$title        = $settings['title'];
			$sub_title    = $settings['sub_title'];

		?>

			<!--Start Features Style5 Area-->
			<section class="features-style5-area">
				<div class="features-style5-area_bg">
					<div class="shape-bg" style="background-image: url(<?php echo $image; ?>);"></div>
				</div>
				<div class="auto-container">
					<div class="row">
						<div class="col-xl-12">
							<div class="features-style5_box">
								<div class="sec-title text-center">
									<div class="sub-title">
										<div class="inner">
											<h3><?php echo $sub_title; ?></h3>
										</div>
										<div class="outer">
											<?php
											if (wp_http_validate_url($bg_image)) {
											?>
												<img src="<?php echo esc_url($bg_image); ?>" alt="<?php echo $bg_image_alt; ?>">
											<?php
											} else {
												echo $bg_image;
											}
											?>
										</div>
									</div>
									<h2><?php echo $title; ?></h2>
								</div>
								<ul class="features-style5_box_inner clearfix text-center">
									<?php
									$i = 1;
									foreach ($settings['items'] as $item) {
										$item_image_one       = ($item['item_image_one']['id'] != '') ? wp_get_attachment_image_url($item['item_image_one']['id'], 'full') : $item['item_image_one']['url'];
										$item_image_one_alt   = get_post_meta($item['item_image_one']['id'], '_wp_attachment_image_alt', true);
										$item_image_two       = ($item['item_image_two']['id'] != '') ? wp_get_attachment_image_url($item['item_image_two']['id'], 'full') : $item['item_image_two']['url'];
										$item_image_two_alt   = get_post_meta($item['item_image_two']['id'], '_wp_attachment_image_alt', true);
										$item_image_three     = ($item['item_image_three']['id'] != '') ? wp_get_attachment_image_url($item['item_image_three']['id'], 'full') : $item['item_image_three']['url'];
										$item_image_three_alt = get_post_meta($item['item_image_three']['id'], '_wp_attachment_image_alt', true);
										$item_heading         = $item['item_heading'];
										$item_description     = $item['item_description'];

										$item_button_url          = $item['item_button_url']['url'];
										$item_button_url_external = $item['item_button_url']['is_external'] ? 'target="_blank"' : '';
										$item_button_url_nofollow = $item['item_button_url']['nofollow'] ? 'rel="nofollow"' : '';
									?>
										<!--Start Features Style5 Single-->
										<li class="features-style5_single">
											<div class="inner-box">
												<div class="icon-holder">
													<div class="inner">
														<?php
														if (wp_http_validate_url($item_image_one)) {
														?>
															<img src="<?php echo esc_url($item_image_one); ?>" alt="<?php echo $item_image_one_alt; ?>">
														<?php
														} else {
															echo $item_image_one;
														}
														?>
													</div>
													<div class="shape1">
														<?php
														if (wp_http_validate_url($item_image_two)) {
														?>
															<img src="<?php echo esc_url($item_image_two); ?>" alt="<?php echo $item_image_two_alt; ?>">
														<?php
														} else {
															echo $item_image_two;
														}
														?>
													</div>
													<div class="shape-bg">
														<?php
														if (wp_http_validate_url($item_image_three)) {
														?>
															<img src="<?php echo esc_url($item_image_three); ?>" alt="<?php echo $item_image_three_alt; ?>">
														<?php
														} else {
															echo $item_image_three;
														}
														?>
													</div>
												</div>
												<div class="text-holder">
													<h3><?php echo $item_heading; ?></h3>
													<p><?php echo $item_description; ?></p>
												</div>
											</div>
											<div class="btns-box">
												<a href="<?php echo esc_url($item_button_url); ?>" <?php echo $item_button_url_external; ?> <?php echo $item_button_url_nofollow; ?>>
													<span class="txt">
														<i class="flaticon-long-arrow-pointing-to-the-right"></i>
													</span>
												</a>
											</div>
										</li>
										<!--End Features Style5 Single-->
									<?php
										$i++;
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
<?php
		}
	}
}
