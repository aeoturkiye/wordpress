<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
/**
 * Elementor LoveIcon_Pro_Item feature_section_two feature
 *
 * @since 1.0.0
 */
class LoveIcon_Pro_Item extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'LoveIcon_Pro_Item';
	}
	public function get_title()
	{
		return esc_html__('Causes Single ', 'loveicon-core');
	}
	public function get_icon()
	{
		return 'sds-widget-ico';
	}
	public function get_categories()
	{
		return array('loveicon-core');
	}
	private function loveicon_campaign_list()
	{
		$loveicon_campaign_list_in_option = array();
		$loveicon_campaign_arg            = array(
			'post_type'      => array('campaign'),
			'posts_per_page' => -1,
		);
		$loveicon_campaign_list           = new WP_Query($loveicon_campaign_arg);
		if ($loveicon_campaign_list->have_posts()) {
			while ($loveicon_campaign_list->have_posts()) {
				$loveicon_campaign_list->the_post();
				$loveicon_campaign_list_in_option[get_the_ID()] = get_the_title();
			}
		}
		wp_reset_postdata();
		return $loveicon_campaign_list_in_option;
	}
protected function register_controls() {
		$this->start_controls_section(
			'campaign_single_item_design',
			array(
				'label' => esc_html__('Campaign Single Item Design', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'campaign_single_item_design_list',
			array(
				'label'   => esc_html__('Select Layout', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'style_1' => esc_html__('Style 1', 'loveicon-core'),
					'style_2' => esc_html__('Style 2', 'loveicon-core'),
					'style_3' => esc_html__('Style 3', 'loveicon-core'),
					'style_4' => esc_html__('Style 4', 'loveicon-core'),
				),
				'default' => esc_html__('style_1', 'loveicon-core'),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'       => 'campaign_single_item_design_bg',
				'label'      => __('Background', 'loveicon-core'),
				'types'      => array('classic'),
				'selector'   => '{{WRAPPER}} .cause-page-three-featured-cause-bg',
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_1',
						),
					),
				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			array(
				'name'       => 'campaign_single_item_design_bg_two',
				'label'      => __('Background', 'loveicon-core'),
				'types'      => array('classic'),
				'selector'   => '{{WRAPPER}} .causes-style1-area_bg',
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_2',
						),
					),
				),
			)
		);
		$this->add_control(
			'campaign_single_item_design_icon',
			array(
				'label'      => esc_html__('Background icon', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::MEDIA,
				'default'    => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),

				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_2',
						),
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_3',
						),
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_1',
						),
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_4',
						),
					),
				),
			)
		);

		$this->add_control(
			'campaign_single_item_design_icon_two',
			array(
				'label'      => esc_html__('Background overlay bg', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::MEDIA,
				'default'    => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				// 'selectors'  => array(
				// '{{WRAPPER}} .causes-section-six:before' => 'background: url({{URL}})',
				// ),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_3',
						),
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_4',
						),
					),
				),
			)
		);

		$this->add_control(
			'campaign_single_item_design_icon_three',
			array(
				'label'      => esc_html__('Background from icon', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::MEDIA,
				'default'    => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				// 'selectors'  => array(
				// '{{WRAPPER}} .causes-section-six:before' => 'background: url({{URL}})',
				// ),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_3',
						),
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_4',
						),
					),
				),
			)
		);

		$this->add_control(
			'campaign_single_item_design_icon_four',
			array(
				'label'      => esc_html__('Background icon', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::MEDIA,
				'default'    => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
				// 'selectors'  => array(
				// '{{WRAPPER}} .causes-section-six:before' => 'background: url({{URL}})',
				// ),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_4',
						),
					),
				),

			)
		);

		$this->end_controls_section();
		$this->start_controls_section(
			'campaign_single_content_style_three',
			array(
				'label'      => esc_html__('Item Content', 'loveicon-core'),
				'tab'        => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_3',
						),
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_4',
						),
					),
				),
			)
		);
		$this->add_control(
			'section_title',
			array(
				'label' => esc_html__('title', 'loveicon-core'),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'section_main_title',
			array(
				'label' => esc_html__('Main Title', 'loveicon-core'),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'section_sub_title',
			array(
				'label'      => esc_html__('Sub Title', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '!=',
							'value'    => 'style_4',
						),
					),
				),
			)
		);
		$this->add_control(
			'section_video_url',
			array(
				'label'      => esc_html__('video url', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_4',
						),
					),
				),
			)
		);
		$this->add_control(
			'section_content',
			array(
				'label' => esc_html__('Content', 'loveicon-core'),
				'type'  => \Elementor\Controls_Manager::TEXTAREA,
			)
		);
		$this->add_control(
			'section_item_list',
			array(
				'label'      => esc_html__('Item list', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::TEXTAREA,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_4',
						),
					),
				),
			)
		);
		$this->add_control(
			'section_signature',
			array(
				'label'      => esc_html__('signature', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '!=',
							'value'    => 'style_4',
						),
					),
				),
			)
		);
		$this->add_control(
			'authore_name',
			array(
				'label'      => esc_html__('authore name', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '!=',
							'value'    => 'style_4',
						),
					),
				),
			)
		);
		$this->add_control(
			'authore_position',
			array(
				'label'      => esc_html__('authore position', 'loveicon-core'),
				'type'       => \Elementor\Controls_Manager::TEXT,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '!=',
							'value'    => 'style_4',
						),
					),
				),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'campaign_single_item_img_area',
			array(
				'label'      => esc_html__('Img and Content', 'loveicon-core'),
				'tab'        => \Elementor\Controls_Manager::TAB_CONTENT,
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'campaign_single_item_design_list',
							'operator' => '==',
							'value'    => 'style_2',
						),
					),
				),
			)
		);
		$this->add_control(
			'campaign_single_item_section_title',
			array(
				'label' => esc_html__('Section title', 'loveicon-core'),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'campaign_single_item_video_url',
			array(
				'label' => esc_html__('Video Url', 'loveicon-core'),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'campaign_single_item_custom_url',
			array(
				'label' => esc_html__('Custom Donate Button Url', 'loveicon-core'),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'campaign_single_item_img',
			array(
				'label' => esc_html__('chariti list', 'loveicon-core'),
				'type'  => \Elementor\Controls_Manager::MEDIA,
			)
		);
		$this->add_control(
			'campaign_single_item_img_list',
			array(
				'label'  => esc_html__('chariti image', 'loveicon-core'),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'campaign_single_item',
			array(
				'label' => esc_html__('Campaign Single Item', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'campaign_all_list',
			array(
				'label'   => esc_html__('Campaign List', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => $this->loveicon_campaign_list(),
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
				'selector' => '{{WRAPPER}} .sec-title h2,{{WRAPPER}} .single-cause-style1 .text-holder h3 a',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_title_typography',
				'label'    => __('Sub Title ', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
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
					'{{WRAPPER}} .single-cause-style1 .text-holder h3 a' => 'color: {{VALUE}}',
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
			'button_title_color',
			array(
				'label'     => __('Button Title Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .btn-one .txt' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_bg_color',
			array(
				'label'     => __('Button BG Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .btn-one' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_hover_color',
			array(
				'label'     => __('Button Hover Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .btn-one:before' => 'background: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render()
	{
		$settings = $this->get_settings_for_display();
		// style 3
		$section_title      = $settings['section_title'];
		$section_main_title = $settings['section_main_title'];
		$section_sub_title  = $settings['section_sub_title'];
		$section_content    = $settings['section_content'];
		$section_signature  = $settings['section_signature'];
		$authore_name       = $settings['authore_name'];
		$authore_position   = $settings['authore_position'];

		$campaign_single_item_design_list = $settings['campaign_single_item_design_list'];

		$campaign_single_item_section_title = $settings['campaign_single_item_section_title'];
		$campaign_single_item_img_list      = $settings['campaign_single_item_img_list'];
		$campaign_single_item_video_url     = $settings['campaign_single_item_video_url'];
		$campaign_single_item_custom_url     = $settings['campaign_single_item_custom_url'];

		$campaign_all_list = $settings['campaign_all_list'];
		$campaign_id       = $campaign_all_list;
		$campaign_info     = charitable_get_campaign($campaign_id); // campaign info

		$campaign_title           = $campaign_info->post_title; // title
		$campaign_content         = $campaign_info->post_content; // content
		$campaign_description     = $campaign_info->description; // description
		$campaign_post_page_link  = get_post_permalink($campaign_info->ID); // url
		$campaign_image_url       = get_the_post_thumbnail_url($campaign_info->ID, 'loveicon-chariti-single-2'); // thumbnail
		$campaign_currency_helper = charitable_get_currency_helper();
		$campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount($campaign_info->get_donated_amount());
		$campaign_goal            = $campaign_currency_helper->get_monetary_amount($campaign_info->get_goal());
		$campaign_percent_unround = $campaign_info->get_percent_donated_raw();
		$campaign_percent         = round($campaign_percent_unround);
		$campaign_categories      = $campaign_info->get('categories', true);

		$campaign_suggested_donations = $campaign_info->get_suggested_donations();

		$loveicon_core_campaign_meta_image     = get_post_meta($campaign_id, 'loveicon_core_campaign_meta_image', true);
		$loveicon_core_campaign_meta_image_url = wp_get_attachment_image_src($loveicon_core_campaign_meta_image, 'full');
		if (is_array($loveicon_core_campaign_meta_image_url)) {
			$loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
		}

?>
		<?php
		if ($campaign_single_item_design_list == 'style_1') :
			$campaign_single_item_design_icon  = ($settings['campaign_single_item_design_icon']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon']['id'], 'full') : $settings['campaign_single_item_design_icon']['url'];
		?>
			<section class="cause-page-three-featured-cause">
				<div class="cause-page-three-featured-cause-bg"></div>
				<div class="auto-container">
					<div class="cause-page3-featured-cause-content">
						<div class="featured-cause-image-box">
							<img src="<?php echo esc_url($campaign_single_item_design_icon); ?>" alt="<?php echo esc_attr('campaign'); ?>">
							<div class="overlay-text">
								<div class="inner"><?php echo esc_html__('Featured Cause', 'loveicon-core'); ?></div>
							</div>
						</div>
						<div class="single-cause-style1 single-cause-style1--instyle2 featured-cause-content-box text-right-rtl">
							<div class="text-holder">
								<div class="category">
									<h6><?php echo $campaign_categories; ?></h6>
								</div>
								<h3><a href="<?php echo esc_url($campaign_post_page_link); ?>"><?php echo $campaign_title; ?></a></h3>
								<p><?php echo wp_trim_words($campaign_content, 20, '...'); ?></p>
								<div class="progress-levels progress-levels-style2">
									<!--Skill Box-->
									<div class="progress-box wow animated" style="visibility: visible;">
										<div class="inner count-box">
											<div class="bar">
												<div class="bar-innner">
													<div class="bar-fill" data-percent="<?php echo esc_attr($campaign_percent); ?>" title="Book"></div>
												</div>
											</div>
											<div class="bottom-box">
												<div class="rate-box">
													<p><?php echo esc_html__('Achieved', 'loveicon-core'); ?><span><?php echo $campaign_donated_amount; ?></span></p>
													<p><?php echo esc_html__('Target', 'loveicon-core'); ?><span><?php echo $campaign_goal; ?></span></p>
												</div>
												<div class="skill-percent">
													<span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($campaign_percent); ?>"><?php echo $campaign_percent; ?></span>
													<span class="percent"><?php echo esc_html__('%', 'loveicon-core'); ?></span>
													<p class="outer-text"><?php echo esc_html__('Pledged So Far', 'loveicon-core'); ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="btns-box">
								<?php if($campaign_single_item_custom_url){ ?>
									<a class="btn-one" href="<?php echo esc_url($campaign_single_item_custom_url); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo esc_html__('Donate Now', 'loveicon-core'); ?></span></a>
										<?php } else { ?>
									<a class="btn-one" href="<?php echo esc_url($campaign_post_page_link); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo esc_html__('Donate Now', 'loveicon-core'); ?></span></a>
										<?php } ?>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
		<?php endif; ?>
		<?php
		if ($campaign_single_item_design_list == 'style_2') :
			$campaign_single_item_design_icon  = ($settings['campaign_single_item_design_icon']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon']['id'], 'full') : $settings['campaign_single_item_design_icon']['url'];
		?>
			<section class="causes-style1-area">
				<div class="causes-style1-area_bg"></div>
				<div class="container">
					<div class="row">
						<div class="col-xl-6">
							<div class="causes-style1_image-box">
								<div class="shape wow slideInLeft" data-wow-delay="0ms" data-wow-duration="3500ms">
									<img class="zoom-fade" src="<?php echo esc_url($campaign_single_item_design_icon); ?>" alt="logo">
								</div>
								<?php
								$img_count = 0;
								foreach ($campaign_single_item_img_list as $item) {
									$img_count++;
								?>
									<?php if ($img_count == '1') : ?>
										<div class="causes-style1_image2">
											<?php
											$campaign_single_item_img  = ($item['campaign_single_item_img']['id'] != '') ? wp_get_attachment_image_url($item['campaign_single_item_img']['id'], 'full') : $item['campaign_single_item_img']['url'];
											?>
											<img src="<?php echo esc_url($campaign_single_item_img); ?>" alt="causes">
										</div>
									<?php endif; ?>
									<?php if ($img_count == '2') : ?>
										<div class="main">
											<?php
											$campaign_single_item_img  = ($item['campaign_single_item_img']['id'] != '') ? wp_get_attachment_image_url($item['campaign_single_item_img']['id'], 'full') : $item['campaign_single_item_img']['url'];
											?>
											<img src="<?php echo esc_url($campaign_single_item_img); ?>" alt="causes">
										</div>
									<?php endif; ?>
									<?php if ($img_count == '3') : ?>
										<div class="causes-style1_image3">
											<?php
											$campaign_single_item_img  = ($item['campaign_single_item_img']['id'] != '') ? wp_get_attachment_image_url($item['campaign_single_item_img']['id'], 'full') : $item['campaign_single_item_img']['url'];
											?>
											<img src="<?php echo esc_url($campaign_single_item_img); ?>" alt="causes">
										</div>
									<?php endif; ?>
									<?php if ($img_count == '4') : ?>
										<div class="causes-style1_image4">
											<?php
											$campaign_single_item_img  = ($item['campaign_single_item_img']['id'] != '') ? wp_get_attachment_image_url($item['campaign_single_item_img']['id'], 'full') : $item['campaign_single_item_img']['url'];
											?>
											<img src="<?php echo esc_url($campaign_single_item_img); ?>" alt="causes">
										</div>
									<?php endif; ?>
								<?php } ?>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="causes-style1_content-box text-right-rtl">
								<div class="sec-title">
									<div class="sub-title martop0">
										<div class="inner">
											<h3><?php echo wp_kses_post($campaign_single_item_section_title); ?></h3>
										</div>
									</div>
									<h2><?php echo $campaign_title; ?></h2>
								</div>
								<div class="inner-content">
									<div class="text-box">
										<p><?php echo wp_trim_words($campaign_content, 30, '...'); ?></p>
									</div>

									<div class="progress-levels">
										<!--Skill Box-->
										<div class="progress-box wow">
											<div class="inner count-box">
												<div class="bar">
													<div class="bar-innner">
														<div class="bar-fill" data-percent="<?php echo esc_attr($campaign_percent); ?>" title="Book"></div>
													</div>
													<div class="text"><?php echo esc_html__('Target:', 'loveicon-core'); ?> <?php echo $campaign_goal; ?></div>
												</div>

												<div class="skill-percent">
													<span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($campaign_percent); ?>"><?php echo esc_attr($campaign_percent); ?></span>
													<span class="percent"><?php echo esc_html__('%', 'loveicon-core'); ?></span>
													<span class="outer-text"><?php echo esc_html__('Pledged So Far', 'loveicon-core'); ?></span>
												</div>
											</div>
										</div>
									</div>

									<div class="btns-box">
										<?php if($campaign_single_item_custom_url){ ?>
										<a class="btn-one" href="<?php echo esc_url($campaign_single_item_custom_url); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo esc_html__('Donate Now', 'loveicon-core'); ?></span></a>
										<?php } else { ?>
										<a class="btn-one" href="<?php echo esc_url($campaign_post_page_link); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo esc_html__('Donate Now', 'loveicon-core'); ?></span></a>
										<?php } ?>
										<a class="video-popup cause-video-button" title="Loveicon Video Gallery" href="<?php echo esc_url($campaign_single_item_video_url); ?>">
											<span class="flaticon-play-button playicon"></span><span class="txt"><?php echo esc_html__('Cause video', 'loveicon-core'); ?></span>
										</a>
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
		<?php endif; ?>
		<?php
		if ($campaign_single_item_design_list == 'style_3') :

			$campaign_single_item_design_icon_two  = ($settings['campaign_single_item_design_icon_two']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon_two']['id'], 'full') : $settings['campaign_single_item_design_icon_two']['url'];

			$campaign_single_item_design_icon  = ($settings['campaign_single_item_design_icon']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon']['id'], 'full') : $settings['campaign_single_item_design_icon']['url'];

			$campaign_single_item_design_icon_three  = ($settings['campaign_single_item_design_icon_three']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon_three']['id'], 'full') : $settings['campaign_single_item_design_icon_three']['url'];

		?>
			<section class="about-style1-area">
				<div class="container">
					<div class="row">
						<div class="col-xl-8">
							<div class="about-style1_content-box text-right-rtl">

								<div class="about-style1_content-box_map">
									<img src="<?php echo esc_url($campaign_single_item_design_icon_two); ?>" alt="loveicon">
								</div>

								<div class="sec-title">
									<div class="sub-title martop0">
										<div class="inner">
											<h3><?php echo wp_kses_post($section_title); ?></h3>
										</div>
									</div>
									<h2><?php echo wp_kses_post($section_main_title); ?></h2>
								</div>
								<div class="inner-content">
									<h3><?php echo wp_kses_post($section_sub_title); ?></h3>
									<p><?php echo wp_kses_post($section_content); ?></p>

									<div class="bottom-box">
										<div class="signature">
											<h2><?php echo wp_kses_post($section_signature); ?></h2>
										</div>
										<div class="name">
											<h3><?php echo wp_kses_post($authore_name); ?></h3>
											<span><?php echo wp_kses_post($authore_position); ?></span>
											<div class="shape">
												<img src="<?php echo esc_url($campaign_single_item_design_icon); ?>" alt="loveicon">
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="col-xl-4 text-right-rtl">
							<div class="donate-form-box">
								<div class="shape1"><img src="<?php echo esc_url($campaign_single_item_design_icon_three); ?>" alt="love-icon"></div>
								<div class="top-title">
									<h2><?php echo wp_kses_post($campaign_title); ?></h2>
								</div>

								<div class="progress-levels progress-levels-style2">
									<!--Skill Box-->
									<div class="progress-box wow animated" style="visibility: visible;">
										<div class="inner count-box">
											<div class="bar">
												<div class="bar-innner">
													<div class="bar-fill" data-percent="<?php echo esc_attr($campaign_percent); ?>" title="Book"></div>
												</div>
											</div>
											<div class="bottom-box">
												<div class="rate-box">
													<p><?php echo esc_html__('Achieved', 'loveicon-core'); ?><span><?php echo $campaign_donated_amount; ?></span></p>
													<p><?php echo esc_html__('Target', 'loveicon-core'); ?><span><?php echo $campaign_goal; ?></span></p>
												</div>
												<div class="skill-percent">
													<span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($campaign_percent); ?>"><?php echo esc_attr($campaign_percent); ?></span>
													<span class="percent"><?php echo esc_html__('%', 'loveicon-core'); ?></span>
													<span class="outer-text"><?php echo esc_html__('Pledged So Far', 'loveicon-core'); ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="donation_wrapper">
									<p style="color: #fff;"><?php echo wp_trim_words($campaign_content, 20, '...'); ?></p>
									<br />
									<?php if($campaign_single_item_custom_url){ ?>
										<a class="btn-one btn-one-style2" href="<?php echo esc_url($campaign_single_item_custom_url); ?>" target="_blank" rel="nofollow">
										<span class="txt"><i class="arrow1 fa fa-check-circle"></i>Donate Now</span></a>
										<?php } else { ?>
									<a class="btn-one btn-one-style2" href="<?php echo esc_url($campaign_post_page_link); ?>" target="_blank" rel="nofollow">
										<span class="txt"><i class="arrow1 fa fa-check-circle"></i>Donate Now</span>
										<?php } ?>
									</a>
								</div>
								<form style="display: none;" action="<?php echo esc_url($campaign_post_page_link); ?>" method="GET" class="donation_wrapper">
									<ul class="chicklet-list clearfix text-center">
										<?php
										$cunt = 0;
										foreach ($campaign_suggested_donations as $amount) {
										?>
											<li class="goodsou-donform-suggested">
												<input type="radio" class="good_don_form-chec" id="donate-amount-<?php echo $cunt; ?>" value="<?php echo $amount['amount']; ?>" name="amount_out" />
												<label for="donate-amount-<?php echo $cunt; ?>"><?php echo $amount['amount']; ?></label>
											</li>
										<?php
											$cunt++;
										}
										?>
									</ul>
									<div class="other-amount d-flex align-items-center">
										<div class="form-group">
											<span class="currency-sym-goodform-addon style-charity"></span>
											<input type="text" required="required" id="good_don_form_cust" name="amount_out" placeholder="Custom Amount">
										</div>
										<button class="theme-btn btn-style-ten" type="submit"><span>njhkjhkjhkj</span></button>
									</div>
								</form>

							</div>
						</div>

					</div>
				</div>
			</section>
		<?php endif; ?>

		<?php
		if ($campaign_single_item_design_list == 'style_4') :
			$section_item_list = $settings['section_item_list'];
			$section_video_url = $settings['section_video_url'];



			$campaign_single_item_design_icon_two  = ($settings['campaign_single_item_design_icon_two']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon_two']['id'], 'full') : $settings['campaign_single_item_design_icon_two']['url'];

			$campaign_single_item_design_icon  = ($settings['campaign_single_item_design_icon']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon']['id'], 'full') : $settings['campaign_single_item_design_icon']['url'];

			$campaign_single_item_design_icon_three  = ($settings['campaign_single_item_design_icon_three']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon_three']['id'], 'full') : $settings['campaign_single_item_design_icon_three']['url'];

			$campaign_single_item_design_icon_four  = ($settings['campaign_single_item_design_icon_four']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_single_item_design_icon_four']['id'], 'full') : $settings['campaign_single_item_design_icon_four']['url'];



		?>
			<section class="support-green-area">
				<div class="container">
					<div class="row">

						<div class="col-xl-5">
							<div class="support-green-box1 wow slideInLeft" data-wow-delay="100ms" data-wow-duration="3500ms">
								<div class="support-green-box1_bg"></div>
								<div class="single-cause-style1" style="background:url(<?php echo esc_url($campaign_single_item_design_icon); ?>);">
									<div class="text-holder text-center text-right-rtl">
										<h3><?php echo wp_kses_post($campaign_title); ?></h3>
										<p><?php echo wp_trim_words($campaign_content, 11, '...'); ?></p>
										<div class="progress-levels progress-levels-style2">
											<!--Skill Box-->
											<div class="progress-box wow animated" style="visibility: visible;">
												<div class="inner count-box">
													<div class="bar">
														<div class="bar-innner">
															<div class="bar-fill" data-percent="<?php echo esc_attr($campaign_percent); ?>" title="Book"></div>
														</div>
													</div>
													<div class="bottom-box">
														<div class="rate-box clrwhite">
															<p><?php echo esc_html__('Achieved', 'loveicon-core'); ?><span><?php echo $campaign_donated_amount; ?></span></p>
															<p><?php echo esc_html__('Target', 'loveicon-core'); ?><span><?php echo $campaign_goal; ?></span></p>
														</div>
														<div class="skill-percent">
															<span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr($campaign_percent); ?>"><?php echo esc_attr($campaign_percent); ?></span>
															<span class="percent"><?php echo esc_html__('%', 'loveicon-core'); ?></span>
															<p class="outer-text"><?php echo esc_html__('Pledged So Far', 'loveicon-core'); ?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="btns-box">
										<?php if($campaign_single_item_custom_url){ ?>
										
										<a class="btn-one" href="<?php echo esc_url($campaign_single_item_custom_url); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo esc_html__('Donate Now', 'loveicon-core'); ?></span></a>
										<?php } else { ?>
											<a class="btn-one" href="<?php echo esc_url($campaign_post_page_link); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo esc_html__('Donate Now', 'loveicon-core'); ?></span></a>
										<?php } ?>
										</div>

									</div>
								</div>


							</div>
						</div>

						<div class="col-xl-7">
							<div class="support-green-box2 text-right-rtl">
								<div class="image1">
									<img class="zoom-fade" src="<?php echo esc_url($campaign_single_item_design_icon_two); ?>" alt="logo">
								</div>
								<div class="image2">
									<img src="<?php echo esc_url($campaign_single_item_design_icon_three); ?>" alt="logo">
									<div class="shape  wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
										<img class="zoom-fade" src="<?php echo esc_url($campaign_single_item_design_icon_four); ?>" alt="logo">
									</div>
								</div>
								<div class="sec-title">
									<div class="sub-title martop0">
										<div class="inner">
											<h3><?php echo wp_kses_post($section_title); ?></h3>
										</div>
									</div>
									<h2><?php echo wp_kses_post($section_main_title); ?></h2>
								</div>
								<div class="inner-box">
									<p><?php echo wp_kses_post($section_content); ?></p>
									<?php echo wp_kses_post($section_item_list); ?>
									<div class="btns-box">
										<a class="video-popup cause-video-button" title="LoveIcon Video Gallery" href="<?php echo esc_url($section_video_url); ?>">
											<span class="flaticon-play-button playicon"></span><span class="txt">cause video</span>
										</a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</section>
		<?php endif; ?>
<?php
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \LoveIcon_Pro_Item());
