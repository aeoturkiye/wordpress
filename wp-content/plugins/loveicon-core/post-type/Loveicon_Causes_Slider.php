<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/** 
 * Elementor LoveIcon_Pro_Slider feature_section_two feature
 * @since 1.0.0
 */

class LoveIcon_Pro_Slider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'LoveIcon_Pro_Slider';
    }
    public function get_title()
    {
        return esc_html__('Cause Slider', 'plugin-name');
    }
    public function get_icon()
    {
        return 'sds-widget-ico';
    }
    public function get_categories()
    {
        return ['loveicon-core'];
    }
    public function get_script_depends()
    {
        return array('loveicon-cause-slider');
    }
    private function loveicon_campaign_list()
    {
        $loveicon_campaign_list_in_option = array();
        $loveicon_campaign_arg    = array(
            'post_type'      => array('campaign'),
            'posts_per_page' => -1,
        );
        $loveicon_campaign_list  = new WP_Query($loveicon_campaign_arg);
        if ($loveicon_campaign_list->have_posts()) {
            while ($loveicon_campaign_list->have_posts()) {
                $loveicon_campaign_list->the_post();
                $loveicon_campaign_list_in_option[get_the_ID()] = get_the_title();
            }
        }
        wp_reset_postdata();
        return $loveicon_campaign_list_in_option;
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_design',
            [
                'label' => esc_html__('section design', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'campaign_content_design_list',
            array(
                'label'   => esc_html__('Select Layout', 'loveicon-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'style_1'  => esc_html__('Style 1', 'loveicon-core'),
                    'style_2'  => esc_html__('Style 2', 'loveicon-core'),
                    'style_3'  => esc_html__('Style 3', 'loveicon-core'),
                ),
                'default' => esc_html__('style_1', 'loveicon-core'),
            )
        );
        $this->add_control(
            'section_design_icon',
            array(
                'label'      => esc_html__('Background overlay icon', 'goodsoul-core'),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'    => array(
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ),
                'conditions' => array(
                    'relation' => 'or',
                    'terms'    => array(
                        array(
                            'name'     => 'campaign_content_design_list',
                            'operator' => '==',
                            'value'    => 'style_1',
                        ),
                        array(
                            'name'     => 'campaign_content_design_list',
                            'operator' => '==',
                            'value'    => 'style_2',
                        ),
                        array(
                            'name'     => 'campaign_content_design_list',
                            'operator' => '==',
                            'value'    => 'style_3',
                        ),
                    ),
                ),
            )
        );
        $this->add_control(
            'section_design_icon_two',
            array(
                'label'      => esc_html__('Background overlay icon two', 'goodsoul-core'),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'    => array(
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ),
                'conditions' => array(
                    'relation' => 'or',
                    'terms'    => array(
                        array(
                            'name'     => 'campaign_content_design_list',
                            'operator' => '==',
                            'value'    => 'style_1',
                        ),
                        array(
                            'name'     => 'campaign_content_design_list',
                            'operator' => '==',
                            'value'    => 'style_3',
                        ),
                    ),
                ),
            )
        );
        $this->add_control(
			'btn_txt',
			array(
				'label'   => __('Button Text', 'loveicon-core'),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__('Donate Now', 'loveicon-core'),
			)
		);
        $this->end_controls_section();
        $this->start_controls_section(
            'section_header',
            [
                'label' => esc_html__('section header', 'plugin-name'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_header_img',
            array(
                'label'      => esc_html__('Background Header Img', 'goodsoul-core'),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'    => array(
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ),
            )
        );
        $this->add_control(
            'section_header_title',
            array(
                'label'   => esc_html__('Section title', 'goodsoul-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
            )
        );
        $this->add_control(
            'section_header_sub_title',
            array(
                'label'   => esc_html__('Section sub title', 'goodsoul-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
            )
        );
        $this->add_control(
            'section_header_content',
            array(
                'label'   => esc_html__('Section content', 'goodsoul-core'),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'conditions' => array(
                    'relation' => 'or',
                    'terms'    => array(
                        array(
                            'name'     => 'campaign_content_design_list',
                            'operator' => '==',
                            'value'    => 'style_3',
                        ),
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
                    '{{WRAPPER}} .btn-one:before' => 'background: {{VALUE}}!important',
                ),
            )
        );

        $this->add_control(
            'arrow_button_hover_color',
            array(
                'label'     => __(' Arrow Button Hover Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .owl-nav-style-one.owl-theme .owl-nav [class*="owl-"]:before' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .owl-nav-style-one.owl-theme .owl-nav [class*="owl-"]:hover' => 'background: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings                     = $this->get_settings_for_display();
        $campaign_content_design_list = $settings['campaign_content_design_list'];


        $section_design_icon  = ($settings['section_design_icon']['id'] != '') ? wp_get_attachment_image_url($settings['section_design_icon']['id'], 'full') : $settings['section_design_icon']['url'];
        $section_header_img  = ($settings['section_header_img']['id'] != '') ? wp_get_attachment_image_url($settings['section_header_img']['id'], 'full') : $settings['section_header_img']['url'];



        $section_header_title = $settings['section_header_title'];
        $section_header_sub_title = $settings['section_header_sub_title'];
        $section_header_content = $settings['section_header_content'];
		$btn_txt = $settings['btn_txt'];


        $pg_num = max(1, (int) filter_input(INPUT_GET, 'pageid'));
        $campaign_args = array(
            'post_type' => 'campaign',
            'post_status' => array('publish'),
            // 'nopaging' => false,
            'paged' => $pg_num,
            // 'posts_per_page' => $posts_per_page,
            'posts_per_page' => 6,
            // 'orderby' => $order_by,
            // 'order' => $order,
        );
        $campaign_query = new \WP_Query($campaign_args);

?>
        <?php if ($campaign_content_design_list == 'style_1') :

            $section_design_icon_two  = ($settings['section_design_icon_two']['id'] != '') ? wp_get_attachment_image_url($settings['section_design_icon_two']['id'], 'full') : $settings['section_design_icon_two']['url'];

        ?>
            <section class="cause-style2-area">
                <div class="thm-shape1 float-bob"><img src="<?php echo esc_url($section_design_icon); ?>" alt="logo"></div>
                <div class="thm-shape2 zoom-fade"><img src="<?php echo esc_url($section_design_icon_two); ?>" alt="logo"></div>
                <div class="auto-container">
                    <div class="sec-title text-center">
                        <div class="sub-title">
                            <div class="inner">
                                <h3><?php echo wp_kses_post($section_header_title) ?></h3>
                            </div>
						<?php if(!empty($section_header_img)){ ?>
                            <div class="outer"><img src="<?php echo esc_url($section_header_img); ?>" alt="logo"></div>
                        <?php } ?>
                        </div>
                        <h2><?php echo wp_kses_post($section_header_sub_title) ?></h2>
                    </div>
                    <?php if ($campaign_query->have_posts()) : ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="theme_carousel cause2-carousel owl-dot-style1 owl-theme owl-carousel" data-options='{"loop": true, "margin": 40, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "2" }, "1200":{ "items" : "3" }}}'>
                                    <?php
                                    $campaign_count = 0;
                                    while ($campaign_query->have_posts()) {
                                        $campaign_query->the_post();
                                        $campaign_id = get_the_ID();
                                        $campaign_info = charitable_get_campaign($campaign_id); // campaign info 

                                        $campaign_title            = $campaign_info->post_title; // title
                                        $campaign_content            = $campaign_info->post_content; // content
                                        $campaign_description     = $campaign_info->description; // description
                                        $campaign_post_page_link  = get_post_permalink($campaign_info->ID); // url
                                        $campaign_image_url       = get_the_post_thumbnail_url($campaign_info->ID, 'loveicon-chariti-1'); // thumbnail
                                        $campaign_currency_helper = charitable_get_currency_helper();
                                        $campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount($campaign_info->get_donated_amount());
                                        $campaign_goal              = $campaign_currency_helper->get_monetary_amount($campaign_info->get_goal());
                                        $campaign_percent_unround         = $campaign_info->get_percent_donated_raw();
                                        $campaign_percent         = round($campaign_percent_unround);
                                        $campaign_categories      = $campaign_info->get('categories', true);
                                        $campaign_count++;


                                        $loveicon_core_campaign_meta_image         = get_post_meta(get_the_ID(), 'loveicon_core_campaign_meta_image', true);
                                        $loveicon_core_campaign_meta_image_url     = wp_get_attachment_image_src($loveicon_core_campaign_meta_image, 'full');
                                        if (is_array($loveicon_core_campaign_meta_image_url)) {
                                            $loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
                                        }
                                    ?>
                                        <?php
                                        if ($campaign_count % 2 == 0) {
                                        ?>
                                            <div class="single-cause-style1 style2">
                                                <div class="text-holder">
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
                                                <div class="img-holder">
                                                    <img src="<?php echo esc_url($loveicon_core_campaign_meta_image_url); ?>" alt="logo">
                                                </div>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="single-cause-style1 ">
                                                <div class="img-holder">
                                                    <img src="<?php echo esc_url($loveicon_core_campaign_meta_image_url); ?>" alt="logo">
                                                </div>
                                                <div class="text-holder">
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
                                        <?php }  ?>
                                    <?php }  ?>
                                </div>
                            </div>
                        </div>
                        <?php wp_reset_postdata();  ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
        <?php if ($campaign_content_design_list == 'style_2') : ?>
            <section class="cause-style3-area">
                <div class="cause-style3-area_bg " style="background-image: url(<?php echo esc_url($section_design_icon); ?>);"></div>
                <div class="auto-container">
                    <div class="sec-title text-center">
                        <div class="sub-title">
                            <div class="inner">
                                <h3><?php echo wp_kses_post($section_header_title) ?></h3>
                            </div>
                            <?php if(!empty($section_header_img)){ ?>
                            <div class="outer"><img src="<?php echo esc_url($section_header_img); ?>" alt="logo"></div>
                        <?php } ?>
                        </div>
                        <h2><?php echo wp_kses_post($section_header_sub_title) ?></h2>
                    </div>
                    <?php if ($campaign_query->have_posts()) : ?>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="theme_carousel cause2-carousel owl-nav-style-one owl-theme owl-carousel" data-options='{"loop": true, "margin": 50, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "2" }}}'>
                                    <?php
                                    while ($campaign_query->have_posts()) {
                                        $campaign_query->the_post();
                                        $campaign_id = get_the_ID();
                                        $campaign_info = charitable_get_campaign($campaign_id); // campaign info 

                                        $campaign_title            = $campaign_info->post_title; // title
                                        $campaign_content            = $campaign_info->post_content; // content
                                        $campaign_description     = $campaign_info->description; // description
                                        $campaign_post_page_link  = get_post_permalink($campaign_info->ID); // url
                                        $campaign_image_url       = get_the_post_thumbnail_url($campaign_info->ID, 'loveicon-chariti-1'); // thumbnail
                                        $campaign_currency_helper = charitable_get_currency_helper();
                                        $campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount($campaign_info->get_donated_amount());
                                        $campaign_goal              = $campaign_currency_helper->get_monetary_amount($campaign_info->get_goal());
                                        $campaign_percent_unround         = $campaign_info->get_percent_donated_raw();
                                        $campaign_percent         = round($campaign_percent_unround);
                                        $campaign_categories      = $campaign_info->get('categories', true);


                                        $loveicon_core_campaign_meta_image         = get_post_meta(get_the_ID(), 'loveicon_core_campaign_meta_image', true);
                                        $loveicon_core_campaign_meta_image_url     = wp_get_attachment_image_src($loveicon_core_campaign_meta_image, 'full');
                                        if (is_array($loveicon_core_campaign_meta_image_url)) {
                                            $loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
                                        }
                                    ?>
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
                                    <?php }  ?>
                                </div>
                            </div>
                        </div>
                        <?php wp_reset_postdata();  ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
        <?php
        if ($campaign_content_design_list == 'style_3') :

            $section_design_icon_two  = ($settings['section_design_icon_two']['id'] != '') ? wp_get_attachment_image_url($settings['section_design_icon_two']['id'], 'full') : $settings['section_design_icon_two']['url'];
        ?>
            <section class="cause-style4-area">
                <div class="shape1 zoom-fade"><img src="<?php echo esc_url($section_design_icon); ?>" alt="logo"></div>
                <div class="shape2 zoominout"><img src="<?php echo esc_url($section_design_icon_two); ?>" alt="logo"></div>
                <div class="cause-style4-content-box">
                <?php if(!empty($section_header_img)){ ?>
                    <div class="cause-style4-content-box_bg" style="background-image: url(<?php echo esc_url($section_header_img); ?>);"></div>
                <?php } ?>
                    <div class="container-fluid">
                        <div class="auto-container">
                            <div class="cause-style4-title text-right-rtl">

                                <div class="left">
                                    <div class="sec-title">
                                        <div class="sub-title martop0">
                                            <div class="inner">
                                                <h3><?php echo wp_kses_post($section_header_title); ?></h3>
                                            </div>
                                        </div>
                                        <h2><?php echo wp_kses_post($section_header_sub_title); ?></h2>
                                    </div>
                                </div>

                                <div class="right">
                                    <div class="text">
                                        <p><?php echo wp_kses_post($section_header_content); ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php if ($campaign_query->have_posts()) : ?>
                            <div class="cause-style4-content_inner">
                                <div class="theme_carousel cause4-carousel owl-nav-style-one owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "2" }, "1450":{ "items" : "3" }, "1850":{ "items" : "4" }}}'>
                                    <?php
                                    while ($campaign_query->have_posts()) {
                                        $campaign_query->the_post();
                                        $campaign_id = get_the_ID();
                                        $campaign_info = charitable_get_campaign($campaign_id); // campaign info 

                                        $campaign_title            = $campaign_info->post_title; // title
                                        $campaign_content            = $campaign_info->post_content; // content
                                        $campaign_description     = $campaign_info->description; // description
                                        $campaign_post_page_link  = get_post_permalink($campaign_info->ID); // url
                                        $campaign_image_url       = get_the_post_thumbnail_url($campaign_info->ID, 'loveicon-chariti-1'); // thumbnail
                                        $campaign_currency_helper = charitable_get_currency_helper();
                                        $campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount($campaign_info->get_donated_amount());
                                        $campaign_goal              = $campaign_currency_helper->get_monetary_amount($campaign_info->get_goal());
                                        $campaign_percent_unround         = $campaign_info->get_percent_donated_raw();
                                        $campaign_percent         = round($campaign_percent_unround);
                                        $campaign_categories      = $campaign_info->get('categories', true);


                                        $loveicon_core_campaign_meta_image         = get_post_meta(get_the_ID(), 'loveicon_core_campaign_meta_image', true);
                                        $loveicon_core_campaign_meta_image_url     = wp_get_attachment_image_src($loveicon_core_campaign_meta_image, 'loveicon-chariti-slider-3');
                                        if (is_array($loveicon_core_campaign_meta_image_url)) {
                                            $loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
                                        }
                                    ?>
                                        <div class="single-cause-style1 single-cause-style5">
                                            <div class="img-holder">
                                                <img src="<?php echo esc_url($loveicon_core_campaign_meta_image_url); ?>" alt="causes">
                                                <div class="text-holder overlay-box">
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
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
<?php
    }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \LoveIcon_Pro_Slider());
