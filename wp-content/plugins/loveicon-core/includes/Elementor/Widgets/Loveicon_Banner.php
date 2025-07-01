<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Banner extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_banner';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Banner', 'loveicon');
    }

    public function get_icon()
    {
        return 'sds-widget-ico';
    }

    public function get_categories()
    {
        return ['Loveicon'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'layout',
            [
                'label' => esc_html__('Layout Style', 'loveicon'),
            ]
        );

        $this->add_control(
            'layout_style',
            [
                'label' => __('Layout Style', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => __('One', 'plugin-domain'),
                    '2' => __('Two', 'plugin-domain'),
                    '3' => __('Three', 'plugin-domain'),
                    '4' => __('Four', 'plugin-domain'),
                    '5' => __('Five', 'plugin-domain'),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('Item', 'loveicon'),
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '1'
                        ],
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '3'
                        ],
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '4'
                        ],
                    ]
                ]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_image',
            [
                'label' => esc_html__('Image', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_heading',
            [
                'label' => esc_html__('Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Every Good<br> Act Is A Charity', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'item_sub_image',
            [
                'label' => esc_html__('Sub Heading Image', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'loveicon'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_shape',
            [
                'label' => esc_html__('Shape One', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_shape2',
            [
                'label' => esc_html__('Shape Two', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_button_one_title',
            [
                'label' => esc_html__('Button One Title', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('how we help', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_button_two_title',
            [
                'label' => esc_html__('Button Two Title', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('support us', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_button_one_url',
            [
                'label' => esc_html__('Button One URL', 'loveicon'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'loveicon'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $repeater->add_control(
            'item_button_two_url',
            [
                'label' => esc_html__('Button Two URL', 'loveicon'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'loveicon'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('Repeater List', 'loveicon'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'loveicon'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'loveicon'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'social',
            [
                'label' => esc_html__('Social', 'loveicon'),
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '3'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'socials_title',
            [
                'label'   => esc_html__('Social Title', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('FOLLOW US', 'loveicon'),
            ]
        );

        $repeater1 = new Repeater();

        $repeater1->add_control(
            'social_icon',
            [
                'label' => __('Social Icon', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );

        $repeater1->add_control(
            'social_url',
            [
                'label' => __('Social URL', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'items1',
            [
                'label' => esc_html__('Social List', 'loveicon'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater1->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'loveicon'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'loveicon'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();
        //repeater3
        $this->start_controls_section(
            'item3',
            [
                'label' => esc_html__('item', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => '5'
                        ],
                    ]
                ]
            ]
        );

        $repeater3 = new Repeater();

        $repeater3->add_control(
            'item_bg_image',
            [
                'label' => esc_html__('BG Image', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater3->add_control(
            'item_shape_one',
            [
                'label' => esc_html__('Shape One', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater3->add_control(
            'item_shape_two',
            [
                'label' => esc_html__('Shape Two', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater3->add_control(
            'item_heading',
            [
                'label' => esc_html__('Heading', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Support & Donate', 'loveicon-core'),
            ]
        );

        $repeater3->add_control(
            'item_sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('For Worldwide Covid-19 Pandemic', 'loveicon-core'),
            ]
        );

        $repeater3->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Veniam quis nostrud exercitation sed ullamco laboris', 'loveicon-core'),
            ]
        );

        $repeater3->add_control(
            'item_button_one_title',
            [
                'label' => esc_html__('Button One Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('How we help', 'loveicon-core'),
            ]
        );

        $repeater3->add_control(
            'item_button_one_url',
            [
                'label' => esc_html__('Button One URL', 'loveicon-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'loveicon-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $repeater3->add_control(
            'item_button_one_icon',
            [
                'label' => esc_html__('Button One Icon', 'loveicon-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $repeater3->add_control(
            'item_button_two_title',
            [
                'label' => esc_html__('Button Two Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Our Programs', 'loveicon-core'),
            ]
        );

        $repeater3->add_control(
            'item_button_two_url',
            [
                'label' => esc_html__('Button Two URL', 'loveicon-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'loveicon-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],

            ]
        );

        $repeater3->add_control(
            'item_button_two_icon',
            [
                'label' => esc_html__('Button Two Icon', 'loveicon-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $this->add_control(
            'items3',
            [
                'label' => esc_html__('Repeater List', 'loveicon-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater3->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'loveicon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
                    ],

                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'slider_settings',
			array(
				'label' => esc_html__( 'Slider Settings', 'driving_school' ),
			)
		);
		$this->add_control(
			'loop',
			array(
				'label'        => esc_html__( 'Enable Loop', 'driving_school' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'mouseDrag',
			array(
				'label'        => esc_html__( 'Enable mouseDrag', 'driving_school' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',
			)
		);
		$this->add_control(
			'autoplay',
			array(
				'label'        => esc_html__( 'Enable Autoplay', 'driving_school' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'yes',

			)
		);
		$this->add_control(
			'autoplay_speed',
			array(
				'label'   => esc_html__( 'Autoplay Speed', 'driving_school' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => __( '8000', 'driving_school' ),
			)
		);
		$this->add_control(
			'arrows',
			array(
				'label'        => esc_html__( 'Enable Arrows', 'driving_school' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => 'false',

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
                'selector' => '{{WRAPPER}} .main-slider .content .big-title h2,{{WRAPPER}} .main-slider.style3 .content .big-title h2',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'sub_heading_typography',
                'label'    => __('Sub Heading', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .main-slider .content h3,{{WRAPPER}} .main-slider.style5 .content h4',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'description_typography',
                'label'    => __('Description', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .main-slider .content .text p,{{WRAPPER}} .main-slider.style3 .content .text p,{{WRAPPER}} .main-slider.style5 .content .text p',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'button_title_typography',
                'label'    => __('Button One Title ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .btn-one-style2,{{WRAPPER}} .btn-one.btn-one-style2 .txt',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'button_title_two_typography',
                'label'    => __('Button Two Title ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .main-slider .content .btns-box a.marlft15,{{WRAPPER}} .main-slider .content .btns-box a.marlft15',
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
                    '{{WRAPPER}} .main-slider .content .big-title h2' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .main-slider .content h3' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->start_controls_tabs('tabs_button_style');
        $this->start_controls_tab(
            'tab_button_normal',
            array(
                'label' => __('Normal', 'loveicon-core'),
            )
        );

        $this->add_control(
            'button_bg_color',
            array(
                'label'     => __('Button One BG Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .btn-one' => 'background-color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'button_two_bg_color',
            array(
                'label'     => __('Button Two BG Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .marlft15' => 'background-color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'button_title_color',
            array(
                'label'     => __('Button One Title Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .btn-one .txt' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .btn-one.btn-one-style2' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'button_two_title_color',
            array(
                'label'     => __('Button Two Title Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .marlft15 .txt' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            array(
                'label' => __('Hover', 'loveicon-core'),
            )
        );

        $this->add_control(
            'button_hover_bg_color',
            array(
                'label'     => __('Button One Hover BG Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .btn-one:before' => 'background: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'button_two_hover_bg_color',
            array(
                'label'     => __('Button Two Hover BG Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .marlft15:before' => 'background: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $layout_style = $settings['layout_style'];

        $loop     = $settings['loop'];
		if ( $loop == 'yes' ) {
			$loop = 'true';
		} else {
			$loop = 'false';
		}

		$mouseDrag     = $settings['mouseDrag'];
		if ( $mouseDrag == 'yes' ) {
			$mouseDrag = 'true';
		} else {
			$mouseDrag = 'false';
		}


		$autoplay = $settings['autoplay'];
		if ( $autoplay == 'yes' ) {
			$autoplay = 'true';
		} else {
			$autoplay = 'false';
		}
		$autoplay_speed = $settings['autoplay_speed'];

		$arrows = $settings['arrows'];
		if ( $arrows == 'yes' ) {
			$arrows = 'true';
		} else {
			$arrows = 'false';
		}

		$sl_set = array(
			'loop'           => $loop,
			'autoplay'       => $autoplay,
			'autoplayTimeout' => ! empty( $autoplay_speed ) ? $autoplay_speed : '8000',
			'nav'         => $arrows,
			'mouseDrag'         => $mouseDrag,
		);

        if ($layout_style == '1') {
?>
            <!-- Start Main Slider -->
            <section class="main-slider style1">
                <div class="shape2 paroller"></div>
                <div class="slider-box">
                    <!-- Banner Carousel -->
                    <div class="banner-carousel owl-theme owl-carousel" data-slider='<?php echo wp_json_encode( $sl_set ); ?>'>
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_image                   = ($item["item_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                            $item_sub_heading             = $item["item_sub_heading"];
                            $item_description             = $item["item_description"];
                            $item_heading                 = $item["item_heading"];
                            $item_button_one_title        = $item["item_button_one_title"];
                            $item_button_two_title        = $item["item_button_two_title"];
                            $item_button_one_url          = $item["item_button_one_url"]["url"];
                            $item_button_one_url_external = $item["item_button_one_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_one_url_nofollow = $item["item_button_one_url"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_button_two_url          = $item["item_button_two_url"]["url"];
                            $item_button_two_url_external = $item["item_button_two_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_two_url_nofollow = $item["item_button_two_url"]["nofollow"] ? 'rel="nofollow"' : '';
                        ?>
                            <!-- Slide -->
                            <div class="slide">
                                <div class="image-layer" style="background-image:url(<?php echo $item_image; ?>)"></div>
                                <div class="auto-container">
                                    <div class="content">
                                        <h3><?php echo $item_sub_heading; ?></h3>
                                        <div class="big-title">
                                            <h2><?php echo $item_heading; ?></h2>
                                        </div>
                                        <div class="border-box"></div>
                                        <div class="text">
                                            <p><?php echo $item_description; ?></p>
                                        </div>
                                        <div class="btns-box">
                                            <?php if ($item_button_one_title) { ?>
                                                <a class="btn-one btn-one-style2" href="<?php echo esc_url($item_button_one_url); ?>" <?php echo $item_button_one_url_external; ?> <?php echo $item_button_one_url_nofollow; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_one_title; ?></span>
                                                </a>
                                            <?php } ?>
                                            <?php if ($item_button_two_title) { ?>
                                                <a class="btn-one marlft15" href="<?php echo esc_url($item_button_two_url); ?>" <?php echo $item_button_two_url_external; ?> <?php echo $item_button_two_url_nofollow; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_two_title; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Slide -->
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Main Slider -->
        <?php
        } elseif ($layout_style == '2') {
        ?>
            <!-- Start Main Slider -->
            <section class="main-slider style2">
                <div class="shape2 paroller"></div>
                <div class="slider-box">
                    <!-- Banner Carousel -->
                    <div class="banner-carousel owl-theme owl-carousel" data-slider='<?php echo wp_json_encode( $sl_set ); ?>'>
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_image                   = ($item["item_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                            $item_shape                   = ($item["item_shape"]["id"] != "") ? wp_get_attachment_image_url($item["item_shape"]["id"], "full") : $item["item_shape"]["url"];
                            $item_shape_alt               = get_post_meta($item["item_shape"]["id"], "_wp_attachment_image_alt", true);
                            $item_sub_heading             = $item["item_sub_heading"];
                            $item_description             = $item["item_description"];
                            $item_heading                 = $item["item_heading"];
                            $item_button_one_title        = $item["item_button_one_title"];
                            $item_button_two_title        = $item["item_button_two_title"];
                            $item_button_one_url          = $item["item_button_one_url"]["url"];
                            $item_button_one_url_external = $item["item_button_one_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_one_url_nofollow = $item["item_button_one_url"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_button_two_url          = $item["item_button_two_url"]["url"];
                            $item_button_two_url_external = $item["item_button_two_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_two_url_nofollow = $item["item_button_two_url"]["nofollow"] ? 'rel="nofollow"' : '';
                        ?>
                            <!-- Slide -->
                            <div class="slide">
                                <div class="image-layer" style="background-image:url(<?php echo $item_image; ?>)"></div>
                                <?php if ($i % 2 != 0) { ?>
                                    <div class="man-shape">
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
                                <?php
                                }
                                ?>
                                <div class="auto-container">
                                    <div class="content text-center">
                                        <div class="parallax-scene parallax-scene-1">
                                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                                <div class="shape"><img class="float-bob-y" src="<?php echo LOVEICON_CORE_ASSETS; ?>/images/slide-shape-1.png" alt="loveicon"></div>
                                            </div>
                                        </div>
                                        <div class="parallax-scene parallax-scene-2">
                                            <div data-depth="0.20" class="parallax-layer shape wow zoomInRight" data-wow-duration="2000ms">
                                                <div class="shape2"><img src="<?php echo LOVEICON_CORE_ASSETS; ?>/images/slide-shape-2.png" alt="loveicon"></div>
                                            </div>
                                        </div>
                                        <div class="parallax-scene parallax-scene-3">
                                            <div data-depth="0.20" class="parallax-layer shape wow zoomIn" data-wow-duration="2000ms">
                                                <div class="shape3"><img src="<?php echo LOVEICON_CORE_ASSETS; ?>/images/slide-shape-3.png" alt="loveicon"></div>
                                            </div>
                                        </div>
                                        <div class="shape4 zoominout"><img src="<?php echo LOVEICON_CORE_ASSETS; ?>/images/slide-shape-4.png" alt="loveicon"></div>
                                        <?php
                                        if ($i == 2) {
                                        ?>
                                            <div class="shape5"><img class="zoominout" src="<?php echo LOVEICON_CORE_ASSETS; ?>/images/slide-shape-3.png" alt="loveicon"></div>
                                            <div class="image-box">
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
                                        <?php
                                        }
                                        ?>
                                        <h3><?php echo $item_sub_heading; ?></h3>
                                        <div class="big-title">
                                            <h2><?php echo $item_heading; ?></h2>
                                        </div>
                                        <div class="border-box"></div>
                                        <div class="btns-box">
                                            <?php if ($item_button_one_title) { ?>
                                                <a class="btn-one btn-one-style2" href="<?php echo esc_url($item_button_one_url); ?>" <?php echo $item_button_one_url_external; ?> <?php echo $item_button_one_url_nofollow; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_one_title; ?></span>
                                                </a>
                                            <?php }
                                            if ($item_button_two_title) { ?>
                                                <a class="btn-one marlft15" href="<?php echo esc_url($item_button_two_url); ?>" <?php echo $item_button_two_url_external; ?> <?php echo $item_button_two_url_nofollow; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_two_title; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Main Slider -->
        <?php
        } elseif ($layout_style == '3') {
        ?>
            <!-- Start Main Slider -->
            <section class="main-slider style3">
                <div class="slider-social-links-box">
                    <div class="title">
                        <h3><?php echo $settings['socials_title']; ?></h3>
                    </div>
                    <div class="border-box"></div>
                    <ul class="clearfix">
                        <?php
                        $i = 1;
                        foreach ($settings["items1"] as $item) {
                            $social_icon         = $item["social_icon"];
                            $social_url          = $item["social_url"]["url"];
                            $social_url_external = $item["social_url"]["is_external"] ? 'target="_blank"' : '';
                            $social_url_nofollow = $item["social_url"]["nofollow"] ? 'rel="nofollow"' : '';
                            if ($i == 1) {
                                $class = 'active';
                            } else {
                                $class = '';
                            }
                        ?>
                            <li class="<?php echo $class; ?>">
                                <a href="<?php echo esc_url($social_url); ?>" <?php echo $social_url_external; ?> <?php echo $social_url_nofollow; ?>><?php \Elementor\Icons_Manager::render_icon(($social_icon), array('aria-hidden' => 'true')); ?></a>
                            </li>
                        <?php
                            $i++;
                        }
                        ?>
                    </ul>
                </div>
                <div class="slider-box">
                    <!-- Banner Carousel -->
                    <div class="banner-carousel owl-theme owl-carousel" data-slider='<?php echo wp_json_encode( $sl_set ); ?>'>
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_image                   = ($item["item_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                            $item_shape                   = ($item["item_shape"]["id"] != "") ? wp_get_attachment_image_url($item["item_shape"]["id"], "full") : $item["item_shape"]["url"];
                            $item_sub_heading             = $item["item_sub_heading"];
                            $item_description             = $item["item_description"];
                            $item_heading                 = $item["item_heading"];
                            $item_button_one_title        = $item["item_button_one_title"];
                            $item_button_two_title        = $item["item_button_two_title"];
                            $item_button_one_url          = $item["item_button_one_url"]["url"];
                            $item_button_one_url_external = $item["item_button_one_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_one_url_nofollow = $item["item_button_one_url"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_button_two_url          = $item["item_button_two_url"]["url"];
                            $item_button_two_url_external = $item["item_button_two_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_two_url_nofollow = $item["item_button_two_url"]["nofollow"] ? 'rel="nofollow"' : '';
                        ?>
                            <!-- Slide -->
                            <div class="slide">
                                <div class="image-layer-bg">
                                    <div class="slide-hand-shape" style="background-image: url(<?php echo $item_shape; ?>);"></div>
                                </div>
                                <div class="slide-image-box" style="background-image: url(<?php echo $item_image; ?>);"></div>
                                <div class="auto-container">
                                    <div class="content">
                                        <div class="big-title">
                                            <h2><?php echo $item_heading; ?></h2>
                                        </div>
                                        <div class="text">
                                            <p><?php echo $item_description; ?></p>
                                        </div>
                                        <div class="btns-box">
                                            <?php if ($item_button_one_title) { ?>
                                                <a class="btn-one " href="<?php echo esc_url($item_button_one_url); ?>" <?php echo $item_button_one_url_external; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_one_title; ?></span>
                                                </a>
                                            <?php }
                                            if ($item_button_two_title) { ?>
                                                <a class="btn-one btn-one-style3 marlft15" href="<?php echo esc_url($item_button_two_url); ?>" <?php echo $item_button_two_url_external; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_two_title; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Main Slider -->
        <?php
        } elseif ($layout_style == '4') {
        ?>
            <!-- Start Main Slider -->
            <section class="main-slider style4">
                <div class="slider-box">
                    <!-- Banner Carousel -->
                    <div class="banner-carousel owl-theme owl-carousel" data-slider='<?php echo wp_json_encode( $sl_set ); ?>'>
                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {
                            $item_image                   = ($item["item_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                            $item_shape                   = ($item["item_shape"]["id"] != "") ? wp_get_attachment_image_url($item["item_shape"]["id"], "full") : $item["item_shape"]["url"];
                            $item_shape2                  = ($item["item_shape2"]["id"] != "") ? wp_get_attachment_image_url($item["item_shape2"]["id"], "full") : $item["item_shape2"]["url"];
                            $item_sub_image               = ($item["item_sub_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_sub_image"]["id"], "full") : $item["item_sub_image"]["url"];
                            $item_sub_heading             = $item["item_sub_heading"];
                            $item_description             = $item["item_description"];
                            $item_heading                 = $item["item_heading"];

                            $item_button_one_title        = $item["item_button_one_title"];
                            $item_button_two_title        = $item["item_button_two_title"];

                            $item_button_one_url          = $item["item_button_one_url"]["url"];
                            $item_button_one_url_external = $item["item_button_one_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_one_url_nofollow = $item["item_button_one_url"]["nofollow"] ? 'rel="nofollow"' : '';

                            $item_button_two_url          = $item["item_button_two_url"]["url"];
                            $item_button_two_url_external = $item["item_button_two_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_two_url_nofollow = $item["item_button_two_url"]["nofollow"] ? 'rel="nofollow"' : '';
                        ?>
                            <!-- Slide -->
                            <div class="slide">
                                <div class="image-layer" style="background-image:url(<?php echo $item_image; ?>)"></div>
                                <div class="slider4-shape-bg" style="background-image: url(<?php echo $item_shape; ?>);"></div>
                                <div class="slider-style4-shape-bg" style="background-image: url(<?php echo $item_shape2; ?>);"></div>
                                <div class="image-bg-overlay"></div>
                                <div class="auto-container">
                                    <div class="content text-center">
                                        <div class="sub-title-box">
                                            <?php echo $item_sub_heading; ?>
                                            <div class="sub-title-box-bg" style="background-image: url(<?php echo $item_sub_image; ?>);"></div>
                                        </div>
                                        <div class="big-title">
                                            <h2><?php echo $item_heading; ?></h2>
                                        </div>
                                        <div class="text">
                                            <p><?php echo $item_description; ?></p>
                                        </div>
                                        <div class="btns-box">
                                            <?php if ($item_button_one_title) { ?>
                                                <a class="btn-one btn-one-style2" href="<?php echo esc_url($item_button_one_url); ?>" <?php echo $item_button_one_url_external; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_one_title; ?></span>
                                                </a>
                                            <?php }
                                            if ($item_button_two_title) { ?>
                                                <a class="btn-one marlft15" href="<?php echo esc_url($item_button_two_url); ?>" <?php echo $item_button_two_url_external; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $item_button_two_title; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
            <!-- End Main Slider -->
        <?php
        } elseif ($layout_style == '5') {
        ?>
            <section class="main-slider style5">
                <div class="slider-box">
                    <!-- Banner Carousel -->
                    <div class="banner-carousel owl-theme owl-carousel" data-slider='<?php echo wp_json_encode( $sl_set ); ?>'>
                        <?php
                        $i = 1;
                        foreach ($settings["items3"] as $item) {
                            $item_title                   = $item["item_title"];
                            $item_bg_image                = ($item["item_bg_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_bg_image"]["id"], "full") : $item["item_bg_image"]["url"];
                            $item_bg_image_alt            = get_post_meta($item["item_bg_image"]["id"], "_wp_attachment_image_alt", true);
                            $item_shape_one               = ($item["item_shape_one"]["id"] != "") ? wp_get_attachment_image($item["item_shape_one"]["id"], "full", '', array('class' => 'float-bob-y')) : $item["item_shape_one"]["url"];
                            $item_shape_one_alt           = get_post_meta($item["item_shape_one"]["id"], "_wp_attachment_image_alt", true);
                            $item_shape_two               = ($item["item_shape_two"]["id"] != "") ? wp_get_attachment_image($item["item_shape_two"]["id"], "full", '', array('class' => 'zoominout')) : $item["item_shape_two"]["url"];
                            $item_shape_two_alt           = get_post_meta($item["item_shape_two"]["id"], "_wp_attachment_image_alt", true);
                            $item_heading                 = $item["item_heading"];
                            $item_sub_heading             = $item["item_sub_heading"];
                            $item_button_one_title        = $item["item_button_one_title"];
                            $item_button_one_url          = $item["item_button_one_url"]["url"];
                            $item_button_one_url_external = $item["item_button_one_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_one_url_nofollow = $item["item_button_one_url"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_button_one_icon         = $item["item_button_one_icon"];
                            $item_button_two_title        = $item["item_button_two_title"];
                            $item_button_two_url          = $item["item_button_two_url"]["url"];
                            $item_button_two_url_external = $item["item_button_two_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_button_two_url_nofollow = $item["item_button_two_url"]["nofollow"] ? 'rel="nofollow"' : '';
                            $item_button_two_icon         = $item["item_button_two_icon"];
                        ?>
                            <div class="slide">
                                <div class="image-layer" style="background-image:url(<?php echo $item_bg_image; ?>)"></div>
                                <div class="slider-gradient-bg"></div>
                                <div class="image-bg-overlay"></div>
                                <div class="auto-container">
                                    <div class="content">
                                        <div class="parallax-scene parallax-scene-1">
                                            <div data-depth="0.20" class="parallax-layer shape wow zoomIn">
                                                <div class="shape1">
                                                    <?php
                                                    if (wp_http_validate_url($item_shape_one)) {
                                                    ?>
                                                        <img class="float-bob-y" src="<?php echo esc_url($item_shape_one); ?>" alt="<?php esc_url($item_shape_one); ?>">
                                                    <?php
                                                    } else {
                                                        echo $item_shape_one;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="shape2">
                                            <?php
                                            if (wp_http_validate_url($item_shape_two)) {
                                            ?>
                                                <img class="zoominout" src="<?php echo esc_url($item_shape_two); ?>" alt="<?php esc_url($item_shape_two); ?>">
                                            <?php
                                            } else {
                                                echo $item_shape_two;
                                            }
                                            ?>
                                        </div>
                                        <div class="big-title">
                                            <h2><?php echo $item_heading; ?></h2>
                                        </div>
                                        <div class="slide-border-box"></div>
                                        <h4><?php echo $item_sub_heading; ?></h4>
                                        <div class="text">
                                            <p><?php echo $item_title; ?></p>
                                        </div>
                                        <div class="btns-box">
                                            <?php if ($item_button_one_title) { ?>
                                                <a class="btn-one btn-one-style2" href="<?php echo esc_url($item_button_one_url); ?>" <?php echo $item_button_one_url_external; ?> <?php echo $item_button_one_url_nofollow; ?>>
                                                    <span class="txt"><?php \Elementor\Icons_Manager::render_icon(($item_button_one_icon), array('aria-hidden' => 'true')); ?><?php echo $item_button_one_title; ?></span>
                                                </a>
                                            <?php }
                                            if ($item_button_two_title) { ?>
                                                <a class="btn-one marlft15" href="<?php echo esc_url($item_button_two_url); ?>" <?php echo $item_button_two_url_external; ?> <?php echo $item_button_two_url_nofollow; ?>>
                                                    <span class="txt"><?php \Elementor\Icons_Manager::render_icon(($item_button_two_icon), array('aria-hidden' => 'true')); ?><?php echo $item_button_two_title; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
<?php
        }
    }
}
