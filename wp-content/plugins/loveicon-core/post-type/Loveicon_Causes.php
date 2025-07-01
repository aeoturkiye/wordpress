<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
/**
 * Elementor LoveIcon_Pro feature_section_two feature
 *
 * @since 1.0.0
 */
class LoveIcon_Pro extends \Elementor\Widget_Base
{
	public function get_name()
	{
		return 'loveicon_pro';
	}
	public function get_title()
	{
		return esc_html__('Causes List', 'loveicon-core');
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
			'campaign_content_design',
			array(
				'label' => esc_html__('Content Design', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'campaign_content_design_list',
			array(
				'label'   => esc_html__('Select Layout', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'style_1' => esc_html__('Style 1', 'loveicon-core'),
					'style_2' => esc_html__('Style 2', 'loveicon-core'),
					'style_3' => esc_html__('Style 3', 'loveicon-core'),
				),
				'default' => esc_html__('style_1', 'loveicon-core'),
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'campaign_content',
			array(
				'label' => esc_html__('Content', 'loveicon-core'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'campaign_content_icon',
			array(
				'label'   => __('list global icon', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);$this->add_control(
			'btn_txt',
			array(
				'label'   => __('Button Text', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Donate Now', 'loveicon-core'),
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
				'selector' => '{{WRAPPER}} .single-cause-style1 .text-holder h3',
			)
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'button_title_typography',
                'label'    => __('Button Title', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .single-cause-style1 .text-holder .btns-box a,{{WRAPPER}} .single-cause-style1 .text-holder h3 a',
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
					'{{WRAPPER}} .single-cause-style1 .text-holder h3' => 'color: {{VALUE}}',
					'{{WRAPPER}} .single-cause-style1 .text-holder h3 a' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .single-cause-style1 .text-holder .btns-box a' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .single-cause-style1 .text-holder .btns-box a.btn-one:hover:before' => 'background: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render()
	{
		$settings                     = $this->get_settings_for_display();
		$campaign_content_design_list = $settings['campaign_content_design_list'];
		$btn_txt = $settings['btn_txt'];

		$campaign_content_icon = ($settings['campaign_content_icon']['id'] != '') ? wp_get_attachment_image_url($settings['campaign_content_icon']['id'], 'full') : $settings['campaign_content_icon']['url'];

		$pg_num        = max(1, (int) filter_input(INPUT_GET, 'pageid'));
		$campaign_args = array(
			'post_type'      => 'campaign',
			'post_status'    => array('publish'),
			// 'nopaging' => false,
			'paged'          => $pg_num,
			// 'posts_per_page' => $posts_per_page,
			'posts_per_page' => 6,
			// 'orderby' => $order_by,
			// 'order' => $order,
		);
		$campaign_query = new \WP_Query($campaign_args);

?>
		<?php if ($campaign_content_design_list == 'style_1') : ?>
			<?php if ($campaign_query->have_posts()) { ?>
				<section class="cause-page-one">
					<div class="auto-container">
						<div class="row text-right-rtl">
							<?php
							while ($campaign_query->have_posts()) {
								$campaign_query->the_post();
								$campaign_id   = get_the_ID();
								$campaign_info = charitable_get_campaign($campaign_id); // campaign info

								$campaign_title           = $campaign_info->post_title; // title
								$campaign_content         = $campaign_info->post_content; // content
								$campaign_description     = $campaign_info->description; // description
								$campaign_post_page_link  = get_post_permalink($campaign_info->ID); // url
								$campaign_image_url       = get_the_post_thumbnail_url($campaign_info->ID, 'loveicon-chariti-1'); // thumbnail
								$campaign_currency_helper = charitable_get_currency_helper();
								$campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount($campaign_info->get_donated_amount());
								$campaign_goal            = $campaign_currency_helper->get_monetary_amount($campaign_info->get_goal());
								$campaign_percent_unround = $campaign_info->get_percent_donated_raw();
								$campaign_percent         = round($campaign_percent_unround);
								$campaign_categories      = $campaign_info->get('categories', true);

								$loveicon_core_campaign_meta_image     = get_post_meta(get_the_ID(), 'loveicon_core_campaign_meta_image', true);
								$loveicon_core_campaign_meta_image_url = wp_get_attachment_image_src($loveicon_core_campaign_meta_image, 'full');
								if (is_array($loveicon_core_campaign_meta_image_url)) {
									$loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
								}
							?>
								<div class="col-xl-4 col-lg-6 col-md-6">
									<div class="single-cause-style1">
										<div class="img-holder">
											<img src="<?php echo esc_url($loveicon_core_campaign_meta_image_url); ?>" alt="logo">
											<?php if ($campaign_content_icon) { ?>
													<a class="lightbox-image" data-fancybox="gallery" href="<?php echo esc_url($loveicon_core_campaign_meta_image_url); ?>">
												<div class="overlay-icon">
														<img src="<?php echo esc_url($campaign_content_icon); ?>" alt="logo">
												</div>
													</a>
											<?php } ?>
										</div>
										<div class="text-holder">
											<h3><a href="<?php echo esc_url($campaign_post_page_link); ?>"><?php echo $campaign_title; ?></a></h3>
											<p><?php echo wp_trim_words($campaign_content, 11, '...'); ?></p>

											<div class="progress-levels progress-levels-style2">
												<!--Skill Box-->
												<div class="progress-box wow">
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
												<a class="btn-one" href="<?php echo esc_url($campaign_post_page_link); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo wp_kses_post($btn_txt, 'loveicon-core'); ?></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="styled-pagination text-center clearfix">
									<?php
									$current = max(1, (int) filter_input(INPUT_GET, 'pageid'));
									echo paginate_links(
										array(
											'base'     => add_query_arg('pageid', '%#%'),
											'format'   => '?pageid=%#%',
											'total'    => $campaign_query->max_num_pages,
											'current'  => $current,
											'show_all' => false,
											'end_size' => 1,
											'mid_size' => 2,
											'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
											'next_text' => '<i class="fa fa-long-arrow-right"></i>',
											'type'     => 'plain',
											'add_args' => false,
											'add_fragment' => '',
										)
									);
									?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php wp_reset_postdata();
			} ?>
		<?php endif; ?>
		<?php if ($campaign_content_design_list == 'style_2') : ?>
			<?php if ($campaign_query->have_posts()) { ?>
				<section class="cause-page-two">
					<div class="auto-container">
						<div class="row text-right-rtl">
							<?php
							while ($campaign_query->have_posts()) {
								$campaign_query->the_post();
								$campaign_id   = get_the_ID();
								$campaign_info = charitable_get_campaign($campaign_id); // campaign info

								$campaign_title           = $campaign_info->post_title; // title
								$campaign_content         = $campaign_info->post_content; // content
								$campaign_description     = $campaign_info->description; // description
								$campaign_post_page_link  = get_post_permalink($campaign_info->ID); // url
								$campaign_image_url       = get_the_post_thumbnail_url($campaign_info->ID, 'full'); // thumbnail
								$campaign_currency_helper = charitable_get_currency_helper();
								$campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount($campaign_info->get_donated_amount());
								$campaign_goal            = $campaign_currency_helper->get_monetary_amount($campaign_info->get_goal());
								$campaign_percent_unround = $campaign_info->get_percent_donated_raw();
								$campaign_percent         = round($campaign_percent_unround);
								$campaign_categories      = $campaign_info->get('categories', true);

								$loveicon_core_campaign_meta_image     = get_post_meta(get_the_ID(), 'loveicon_core_campaign_meta_image', true);
								$loveicon_core_campaign_meta_image_url = wp_get_attachment_image_src($loveicon_core_campaign_meta_image, 'full');
								if (is_array($loveicon_core_campaign_meta_image_url)) {
									$loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
								}
							?>
								<div class="col-xl-6 col-lg-6 col-md-6">
									<div class="single-cause-style1 single-cause-style1--instyle2">
										<div class="img-holder" style="background-image: url(<?php echo esc_url($loveicon_core_campaign_meta_image_url); ?>);"></div>
										<div class="text-holder">
											<div class="category">
												<h6><?php echo $campaign_categories; ?></h6>
											</div>
											<h3><a href="<?php echo esc_url($campaign_post_page_link); ?>"><?php echo $campaign_title; ?></a></h3>
											<p><?php echo wp_trim_words($campaign_content, 11, '...'); ?></p>

											<div class="progress-levels progress-levels-style2">
												<div class="progress-box wow">
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
												<a class="btn-one" href="<?php echo esc_url($campaign_post_page_link); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo wp_kses_post($btn_txt, 'loveicon-core'); ?></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="styled-pagination text-center clearfix">
									<?php
									$current = max(1, (int) filter_input(INPUT_GET, 'pageid'));
									echo paginate_links(
										array(
											'base'     => add_query_arg('pageid', '%#%'),
											'format'   => '?pageid=%#%',
											'total'    => $campaign_query->max_num_pages,
											'current'  => $current,
											'show_all' => false,
											'end_size' => 1,
											'mid_size' => 2,
											'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
											'next_text' => '<i class="fa fa-long-arrow-right"></i>',
											'type'     => 'plain',
											'add_args' => false,
											'add_fragment' => '',
										)
									);
									?>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php wp_reset_postdata();
			} ?>
		<?php endif; ?>
		<?php if ($campaign_content_design_list == 'style_3') : ?>
			<?php if ($campaign_query->have_posts()) { ?>
				<section class="cause-page-one cause-page-three">
					<div class="auto-container">
						<div class="row text-right-rtl">
							<?php
							while ($campaign_query->have_posts()) {
								$campaign_query->the_post();
								$campaign_id   = get_the_ID();
								$campaign_info = charitable_get_campaign($campaign_id); // campaign info

								$campaign_title           = $campaign_info->post_title; // title
								$campaign_content         = $campaign_info->post_content; // content
								$campaign_description     = $campaign_info->description; // description
								$campaign_post_page_link  = get_post_permalink($campaign_info->ID); // url
								$campaign_image_url       = get_the_post_thumbnail_url($campaign_info->ID, 'loveicon-chariti-1'); // thumbnail
								$campaign_currency_helper = charitable_get_currency_helper();
								$campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount($campaign_info->get_donated_amount());
								$campaign_goal            = $campaign_currency_helper->get_monetary_amount($campaign_info->get_goal());
								$campaign_percent_unround = $campaign_info->get_percent_donated_raw();
								$campaign_percent         = round($campaign_percent_unround);
								$campaign_categories      = $campaign_info->get('categories', true);

								$loveicon_core_campaign_meta_image     = get_post_meta(get_the_ID(), 'loveicon_core_campaign_meta_image', true);
								$loveicon_core_campaign_meta_image_url = wp_get_attachment_image_src($loveicon_core_campaign_meta_image, 'full');
								if (is_array($loveicon_core_campaign_meta_image_url)) {
									$loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
								}
							?>
								<div class="col-xl-4 col-lg-6 col-md-6">
									<div class="single-cause-style1">
										<div class="img-holder">
											<img src="<?php echo esc_url($loveicon_core_campaign_meta_image_url); ?>" alt="logo">
											<?php if ($campaign_content_icon) { ?>
													<a class="lightbox-image" data-fancybox="gallery" href="<?php echo esc_url($campaign_image_url); ?>">
												<div class="overlay-icon">
														<img src="<?php echo esc_url($campaign_content_icon); ?>" alt="logo">
												</div>
													</a>
											<?php } ?>
										</div>
										<div class="text-holder">
											<h3><a href="<?php echo esc_url($campaign_post_page_link); ?>"><?php echo $campaign_title; ?></a></h3>
											<p><?php echo wp_trim_words($campaign_content, 11, '...'); ?></p>

											<div class="progress-levels progress-levels-style2">
												<!--Skill Box-->
												<div class="progress-box wow">
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
												<a class="btn-one" href="<?php echo esc_url($campaign_post_page_link); ?>"><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo wp_kses_post($btn_txt, 'loveicon-core'); ?></span></a>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="row">
							<div class="col-xl-12">
								<div class="styled-pagination text-center clearfix">
									<?php
									$current = max(1, (int) filter_input(INPUT_GET, 'pageid'));
									echo paginate_links(
										array(
											'base'     => add_query_arg('pageid', '%#%'),
											'format'   => '?pageid=%#%',
											'total'    => $campaign_query->max_num_pages,
											'current'  => $current,
											'show_all' => false,
											'end_size' => 1,
											'mid_size' => 2,
											'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
											'next_text' => '<i class="fa fa-long-arrow-right"></i>',
											'type'     => 'plain',
											'add_args' => false,
											'add_fragment' => '',
										)
									);
									?>
								</div>
							</div>
						</div>

					</div>
				</section>
			<?php wp_reset_postdata();
			} ?>
		<?php endif; ?>
<?php
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \LoveIcon_Pro());
