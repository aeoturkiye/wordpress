<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Fact_Counter extends Widget_Base
{
	public function get_name()
	{
		return 'loveicon_fact_counter';
	}

	public function get_title()
	{
		return esc_html__('Loveicon Fact Counter', 'loveicon');
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
				'label'   => __('Layout Style', 'loveicon'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __('One', 'loveicon'),
					'2' => __('Two', 'loveicon'),
					'3' => __('Three', 'loveicon'),
					'4' => __('Four', 'loveicon'),
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

		$this->add_control(
			'video_url',
			array(
				'label'         => esc_html__('Video URL', 'loveicon'),
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
			'title',
			array(
				'label'   => esc_html__('Title', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Watch The Intro Video', 'loveicon'),
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label'      => esc_html__('Sub Title', 'loveicon'),
				'type'       => Controls_Manager::TEXT,
				'default'    => __('We Change Your Life & World', 'loveicon'),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '2',
						),
					),
				),
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
			)
		);

		$repeater->add_control(
			'item_shape_one',
			array(
				'label'   => esc_html__('Shape One', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_shape_two',
			array(
				'label'   => esc_html__('Shape Two', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label'   => esc_html__('Icon', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'item_symbol',
			array(
				'label'   => esc_html__('Symbol', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'item_counting_number',
			array(
				'label'   => esc_html__('Counting Number', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'item_counter_unit',
			array(
				'label'   => esc_html__('Counter Unit', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'   => esc_html__('Description', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Received Donations From<br>Our Loving People', 'loveicon'),
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
                'name'     => 'description_typography',
                'label'    => __('Description', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .single-fact-counter .text p',
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
            'description_color',
            array(
                'label'     => __('Description Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .single-fact-counter .text p' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_section();
	}
	protected function render()
	{
		$settings = $this->get_settings_for_display();

		$video_url    = $settings['video_url']['url'];
		$title        = $settings['title'];
		$layout_style = $settings['layout_style'];

		if ($layout_style == '1') {
			$bg_image = ($settings['bg_image']['id'] != '') ? wp_get_attachment_image_url($settings['bg_image']['id'], 'full') : $settings['bg_image']['url'];
?>
			<!--Start Fact Counter Area-->
			<section class="fact-counter-area">
				<div class="fact-counter-area_bg" style="background-image: url(<?php echo $bg_image; ?>);"></div>
				<div class="container">
					<div class="row">
						<div class="col-xl-7">
							<div class="fact-counter_box">
								<ul class="clearfix">

									<?php
									$i = 1;
									foreach ($settings['items'] as $item) {
										$item_title           = $item['item_title'];
										$item_shape_one       = ($item['item_shape_one']['id'] != '') ? wp_get_attachment_image($item['item_shape_one']['id'], 'full') : $item['item_shape_one']['url'];
										$item_shape_one_alt   = get_post_meta($item['item_shape_one']['id'], '_wp_attachment_image_alt', true);
										$item_shape_two       = ($item['item_shape_two']['id'] != '') ? wp_get_attachment_image($item['item_shape_two']['id'], 'full') : $item['item_shape_two']['url'];
										$item_shape_two_alt   = get_post_meta($item['item_shape_two']['id'], '_wp_attachment_image_alt', true);
										$item_icon            = ($item['item_icon']['id'] != '') ? wp_get_attachment_image($item['item_icon']['id'], 'full') : $item['item_icon']['url'];
										$item_icon_alt        = get_post_meta($item['item_icon']['id'], '_wp_attachment_image_alt', true);
										$item_symbol          = $item['item_symbol'];
										$item_counting_number = $item['item_counting_number'];
										$item_counter_unit    = $item['item_counter_unit'];
										$item_description     = $item['item_description'];
									?>
										<li class="single-fact-counter ">
											<div class="outer-box">
												<div class="shape1">
													<?php
													if (wp_http_validate_url($item_shape_one)) {
													?>
														<img src="<?php echo esc_url($item_shape_one); ?>" alt="<?php esc_url($item_shape_one_alt); ?>">
													<?php
													} else {
														echo $item_shape_one;
													}
													?>
												</div>
												<div class="shape2 zoominout">
													<?php
													if (wp_http_validate_url($item_shape_two)) {
													?>
														<img src="<?php echo esc_url($item_shape_two); ?>" alt="<?php esc_url($item_shape_two_alt); ?>">
													<?php
													} else {
														echo $item_shape_two;
													}
													?>
												</div>
												<div class="top">
													<div class="icon-box">
														<div class="icon">
															<?php
															if (wp_http_validate_url($item_icon)) {
															?>
																<img src="<?php echo esc_url($item_icon); ?>" alt="<?php esc_url($item_icon_alt); ?>">
															<?php
															} else {
																echo $item_icon;
															}
															?>
														</div>
													</div>
													<?php
													if ($i == 1) {
														$class = 'count-outer count-box';
													} else {
														$class = 'count-outer count-box style' . $i;
													}
													?>
													<div class="<?php echo $class; ?>">
														<span class="dolor-sign"><?php echo $item_symbol; ?></span><span class="count-text" data-speed="3000" data-stop="<?php echo $item_counting_number; ?>">0</span><span><?php echo $item_counter_unit; ?></span>
													</div>
												</div>
												<div class="text">
													<?php echo $item_description; ?>
												</div>
											</div>
										</li>
									<?php
										$i++;
									}
									?>
								</ul>
							</div>
						</div>
						<div class="col-xl-5">
							<div class="video-holder-box">
								<div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
									<a class="video-popup" title="Loveicon Video Gallery" href="<?php echo $video_url; ?>">
										<span class="flaticon-play-button-1"></span>
									</a>
									<div class="title">
										<h5><?php echo $title; ?></h5>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--End Fact Counter Area-->
		<?php
		} elseif ($layout_style == '2') {
		?>
			<section class="fact-counter-style2-area">
				<div class="auto-container">
					<div class="row text-right-rtl">
						<?php
						$i = 1;
						foreach ($settings['items'] as $item) {
							$item_title           = $item['item_title'];
							$item_shape_one       = ($item['item_shape_one']['id'] != '') ? wp_get_attachment_image($item['item_shape_one']['id'], 'full') : $item['item_shape_one']['url'];
							$item_shape_one_alt   = get_post_meta($item['item_shape_one']['id'], '_wp_attachment_image_alt', true);
							$item_shape_two       = ($item['item_shape_two']['id'] != '') ? wp_get_attachment_image($item['item_shape_two']['id'], 'full') : $item['item_shape_two']['url'];
							$item_shape_two_alt   = get_post_meta($item['item_shape_two']['id'], '_wp_attachment_image_alt', true);
							$item_icon            = ($item['item_icon']['id'] != '') ? wp_get_attachment_image($item['item_icon']['id'], 'full') : $item['item_icon']['url'];
							$item_icon_alt        = get_post_meta($item['item_icon']['id'], '_wp_attachment_image_alt', true);
							$item_symbol          = $item['item_symbol'];
							$item_counting_number = $item['item_counting_number'];
							$item_counter_unit    = $item['item_counter_unit'];
							$item_description     = $item['item_description'];

						?>
							<!--Start Single Fact Counter Style2-->
							<div class="col-xl-3 col-lg-6 col-md-6">
								<div class="single-fact-counter single-fact-counter-style2 ">
									<div class="outer-box">
										<div class="shape1 wow zoomIn" data-wow-delay="0ms" data-wow-duration="3500ms">
											<?php
											if (wp_http_validate_url($item_shape_one)) {
											?>
												<img src="<?php echo esc_url($item_shape_one); ?>" alt="<?php esc_url($item_shape_one_alt); ?>">
											<?php
											} else {
												echo $item_shape_one;
											}
											?>
										</div>
										<div class="shape2 float-bob-y">
											<?php
											if (wp_http_validate_url($item_shape_two)) {
											?>
												<img src="<?php echo esc_url($item_shape_two); ?>" alt="<?php esc_url($item_shape_two_alt); ?>">
											<?php
											} else {
												echo $item_shape_two;
											}
											?>
										</div>
										<div class="top">
											<div class="icon-box">
												<div class="icon">
													<?php
													if (wp_http_validate_url($item_icon)) {
													?>
														<img src="<?php echo esc_url($item_icon); ?>" alt="<?php esc_url($item_icon_alt); ?>">
													<?php
													} else {
														echo $item_icon;
													}
													?>
												</div>
											</div>
											<?php
											if ($i == 1) {
											?>
												<div class="count-outer count-box">
													<span class="dolor-sign"><?php echo $item_symbol; ?></span><span class="count-text" data-speed="3000" data-stop="<?php echo $item_counting_number; ?>">0</span><span><?php echo $item_counter_unit; ?></span>
												</div>
											<?php
											} else {
											?>
												<div class="count-outer count-box style<?php echo $i; ?>">
													<span class="count-text" data-speed="3000" data-stop="<?php echo $item_counting_number; ?>">0</span><span><?php echo $item_counter_unit; ?></span>
												</div>
											<?php
											}
											?>
										</div>
										<div class="text">
											<p><?php echo $item_description; ?></p>
										</div>
									</div>
								</div>
							</div>
							<!--End Single Fact Counter Style2-->
						<?php
							$i++;
						}
						?>
					</div>
				</div>
			</section>
			<!--End Fact Counter Style2 Area-->
		<?php
		} elseif ($layout_style == '3') {
		?>
			<!--Start Fact Counter Style3 Area-->
			<section class="fact-counter-style3-area">
				<div class="auto-container">
					<div class="row text-right-rtl">
						<?php
						$i = 1;
						foreach ($settings['items'] as $item) {
							$item_title           = $item['item_title'];
							$item_shape_one       = ($item['item_shape_one']['id'] != '') ? wp_get_attachment_image_url($item['item_shape_one']['id'], 'full') : $item['item_shape_one']['url'];
							$item_shape_two       = ($item['item_shape_two']['id'] != '') ? wp_get_attachment_image($item['item_shape_two']['id'], 'full') : $item['item_shape_two']['url'];
							$item_shape_two_alt   = get_post_meta($item['item_shape_two']['id'], '_wp_attachment_image_alt', true);
							$item_icon            = ($item['item_icon']['id'] != '') ? wp_get_attachment_image($item['item_icon']['id'], 'full') : $item['item_icon']['url'];
							$item_icon_alt        = get_post_meta($item['item_icon']['id'], '_wp_attachment_image_alt', true);
							$item_symbol          = $item['item_symbol'];
							$item_counting_number = $item['item_counting_number'];
							$item_counter_unit    = $item['item_counter_unit'];
							$item_description     = $item['item_description'];
						?>
							<?php

							if ($i % 2 == 0) {
								$class = 'light-black';
							} else {
								$class = '';
							}
							?>
							<!--Start Single Fact Counter Style2-->
							<div class="col-xl-3 col-lg-6 col-md-6">
								<div class="single-fact-counter single-fact-counter-style2 single-fact-counter-style3">
									<div class="outer-box">
										<div class="shape1 wow zoomIn" data-wow-delay="0ms" data-wow-duration="3500ms">
											<img class="zoom-fade" src="<?php echo $item_shape_one; ?>" alt="loveicon">
										</div>
										<div class="shape2 float-bob-y">
											<?php
											if (wp_http_validate_url($item_shape_two)) {
											?>
												<img src="<?php echo esc_url($item_shape_two); ?>" alt="<?php esc_url($item_shape_two_alt); ?>">
											<?php
											} else {
												echo $item_shape_two;
											}
											?>
										</div>
										<div class="top">
											<div class="icon-box">
												<div class="icon">
													<?php
													if (wp_http_validate_url($item_icon)) {
													?>
														<img src="<?php echo esc_url($item_icon); ?>" alt="<?php esc_url($item_icon_alt); ?>">
													<?php
													} else {
														echo $item_icon;
													}
													?>
												</div>
											</div>
											<?php
											if ($i == 1) {
											?>
												<div class="count-outer count-box">
													<span class="dolor-sign"><?php echo $item_symbol; ?></span><span class="count-text" data-speed="3000" data-stop="<?php echo $item_counting_number; ?>">0</span><span><?php echo $item_counter_unit; ?></span>
												</div>
											<?php
											} else {
											?>
												<div class="count-outer count-box style<?php echo $i; ?>">
													<span class="count-text" data-speed="3000" data-stop="<?php echo $item_counting_number; ?>">0</span><span><?php echo $item_counter_unit; ?></span>
												</div>
											<?php
											}
											?>
										</div>
										<div class="text">
											<p><?php echo $item_description; ?></p>
										</div>
									</div>
								</div>
							</div>
							<!--End Single Fact Counter Style2-->
						<?php
							$i++;
						}
						?>
					</div>
				</div>
			</section>
			<!--End Fact Counter Style3 Area-->
		<?php
		} elseif ($layout_style == '4') {
			$bg_image     = ($settings['bg_image']['id'] != '') ? wp_get_attachment_image($settings['bg_image']['id'], 'full') : $settings['bg_image']['url'];
			$bg_image_alt = get_post_meta($settings['bg_image']['id'], '_wp_attachment_image_alt', true);
			$title        = $settings['title'];
			$sub_title    = $settings['sub_title'];
		?>


			<!--Start Fact Counter Style4 Area-->
			<section class="fact-counter-style4-area">
				<div class="auto-container">
					<div class="sec-title text-center">
						<div class="sub-title">
							<div class="inner">
								<h3><?php echo $sub_title; ?></h3>
							</div>
							<div class="outer">
								<?php
								if (wp_http_validate_url($bg_image)) {
								?>
									<img src="<?php echo esc_url($bg_image); ?>" alt="<?php esc_url($bg_image_alt); ?>">
								<?php
								} else {
									echo $bg_image;
								}
								?>
							</div>
						</div>
						<h2><?php echo $title; ?></h2>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<div class="fact-counter-style4-content">
								<ul>
									<?php
									$i = 1;
									foreach ($settings['items'] as $item) {
										$item_icon            = ($item['item_icon']['id'] != '') ? wp_get_attachment_image($item['item_icon']['id'], 'full') : $item['item_icon']['url'];
										$item_icon_alt        = get_post_meta($item['item_icon']['id'], '_wp_attachment_image_alt', true);
										$item_counting_number = $item['item_counting_number'];
										$item_title           = $item['item_title'];
									?>
										<li class="single-fact-counter-style4">
											<div class="icon">
												<?php
												if (wp_http_validate_url($item_icon)) {
												?>
													<img src="<?php echo esc_url($item_icon); ?>" alt="<?php esc_url($item_icon_alt); ?>">
												<?php
												} else {
													echo $item_icon;
												}
												?>
											</div>
											<div class="bottom">
												<div class="count-outer count-box">
													<span class="count-text" data-speed="3000" data-stop="<?php echo $item_counting_number; ?>">0</span>
												</div>
												<div class="text">
													<h5><?php echo $item_title; ?></h5>
												</div>
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
			</section>
<?php
		}
	}
}