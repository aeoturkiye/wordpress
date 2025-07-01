<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Slogan extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_slogan';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Slogan', 'loveicon');
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
            'general',
            [
                'label' => esc_html__('General', 'loveicon'),
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
                ],
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label'   => esc_html__('BG Image', 'loveicon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'shape1',
            [
                'label'   => esc_html__('Shape One', 'loveicon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'shape2',
            [
                'label'   => esc_html__('Shape Two', 'loveicon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'shape3',
            [
                'label'   => esc_html__('Shape Three', 'loveicon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'shape4',
            [
                'label'   => esc_html__('Shape Four', 'loveicon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'pattern_image',
            [
                'label'   => esc_html__('Pattern Image', 'loveicon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
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
                            'value'    => '4'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'heading',
            [
                'label'   => esc_html__('Heading', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Service to others<br> is the rent you pay<br> for your room here<br> on earth.', 'loveicon'),
            ]
        );

        $this->add_control(
            'name',
            [
                'label'   => esc_html__('Name', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Muhammad Ali', 'loveicon'),
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
                            'value'    => '4'
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label'   => esc_html__('Icon', 'loveicon'),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
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
                            'value'    => '4'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label'   => esc_html__('Sub Title', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Make a Difference Today!', 'loveicon'),
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
                            'value'    => '4'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label'   => esc_html__('Title', 'loveicon'),

                'type'    => Controls_Manager::TEXT,
                'default' => __('Become a Volunteer', 'loveicon'),
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

        $this->add_control(
            'description',
            [
                'label'   => esc_html__('Description', 'loveicon'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => __('Your Small Donations Make Bigger Impact On Someone’s Life, So Act Today!', 'loveicon'),
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'button_title',
            [
                'label'   => esc_html__('Button Title', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('register today', 'loveicon'),
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
                            'value'    => '4'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label'         => esc_html__('Button URL', 'loveicon'),
                'type'          => Controls_Manager::URL,
                'placeholder'   => esc_html__('https://your-link.com', 'loveicon'),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
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
                            'value'    => '4'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'video_btn_title',
            [
                'label'   => esc_html__('Video Button Title', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('register today', 'loveicon'),
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'video_btn_url',
            [
                'label'         => esc_html__('Video Button URL', 'loveicon'),
                'type'          => Controls_Manager::URL,
                'placeholder'   => esc_html__('https://your-link.com', 'loveicon'),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms'    => [
                        [
                            'name'     => 'layout_style',
                            'operator' => '==',
                            'value'    => '2'
                        ],
                    ]
                ]
            ]
        );


        $this->add_control(
            'button_title1',
            [
                'label'   => esc_html__('Button Title One', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('register today', 'loveicon'), 'conditions' => [
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
            'button_one_url',
            [
                'label'         => esc_html__('Button One URL', 'loveicon'),
                'type'          => Controls_Manager::URL,
                'placeholder'   => esc_html__('https://your-link.com', 'loveicon'),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
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
            'button_title2',
            [
                'label'   => esc_html__('Button Title Two', 'loveicon'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('register today', 'loveicon'),
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
            'button_two_url',
            [
                'label'         => esc_html__('Button Two URL', 'loveicon'),
                'type'          => Controls_Manager::URL,
                'placeholder'   => esc_html__('https://your-link.com', 'loveicon'),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],
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
                'label'    => __('Heading ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .slogan-content_top h2,{{WRAPPER}} .sec-title h2',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',
                'label'    => __('Title ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .slogan-content_bottom .left .title h2',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'sub_title_typography',
                'label'    => __('Sub Title', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .slogan-content_bottom .left .title p',
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
                    '{{WRAPPER}} .slogan-content_top h2' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .slogan-content_bottom .left .title h2' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .slogan-content_bottom .left .title p' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .btn-one-style2' => 'color: {{VALUE}}',
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

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings     = $this->get_settings_for_display();
        $layout_style = $settings["layout_style"];

        if ($layout_style == '1') {
            $bg_image            = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
            $pattern_image       = ($settings["pattern_image"]["id"] != "") ? wp_get_attachment_image_url($settings["pattern_image"]["id"], "full") : $settings["pattern_image"]["url"];
            $heading             = $settings["heading"];
            $name                = $settings["name"];
            $icon                = ($settings["icon"]["id"] != "") ? wp_get_attachment_image($settings["icon"]["id"], "full") : $settings["icon"]["url"];
            $icon_alt            = get_post_meta($settings["icon"]["id"], "_wp_attachment_image_alt", true);
            $title               = $settings["title"];
            $sub_heading         = $settings["sub_heading"];
            $button_title        = $settings["button_title"];
            $button_url          = $settings["button_url"]["url"];
            $button_url_external = $settings["button_url"]["is_external"] ? 'target="_blank"' : '';
            $button_url_nofollow = $settings["button_url"]["nofollow"] ? 'rel="nofollow"' : '';
?>
            <!--Start slogan Area-->
            <section class="slogan-area">
                <div class="slogan-area_bg" style="background-image: url(<?php echo $pattern_image; ?>);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slogan-content text-right-rtl">
                                <div class="slogan-content_top" style="background-image: url(<?php echo $bg_image; ?>);">
                                    <h2><?php echo $heading; ?></h2>
                                    <div class="name">
                                        <h5><?php echo $name; ?></h5>
                                    </div>
                                </div>
                                <div class="slogan-content_bottom">
                                    <div class="left">
                                        <div class="icon">
                                            <?php
                                            if (wp_http_validate_url($icon)) {
                                            ?>
                                                <img src="<?php echo esc_url($icon); ?>" alt="<?php esc_url($icon_alt); ?>">
                                            <?php
                                            } else {
                                                echo $icon;
                                            }
                                            ?>
                                        </div>
                                        <div class="title">
                                            <p><?php echo $title; ?></p>
                                            <h2><?php echo $sub_heading; ?></h2>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="btns-box">
                                            <?php if ($button_title) { ?>
                                                <a class="btn-one btn-one-style2" href="<?php echo esc_url($button_url); ?>" <?php echo $button_url_external; ?> <?php echo $button_url_nofollow; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $button_title; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End slogan Area-->
        <?php
        } elseif ($layout_style == '2') {
            $bg_image               = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
            $heading                = $settings["heading"];
            $shape1                 = ($settings["shape1"]["id"] != "") ? wp_get_attachment_image_url($settings["shape1"]["id"], "full") : $settings["shape1"]["url"];
            $shape2                 = ($settings["shape2"]["id"] != "") ? wp_get_attachment_image_url($settings["shape2"]["id"], "full") : $settings["shape2"]["url"];
            $shape3                 = ($settings["shape3"]["id"] != "") ? wp_get_attachment_image_url($settings["shape3"]["id"], "full") : $settings["shape3"]["url"];
            $shape4                 = ($settings["shape4"]["id"] != "") ? wp_get_attachment_image_url($settings["shape4"]["id"], "full") : $settings["shape4"]["url"];
            $description            = $settings["description"];
            $button_title           = $settings["button_title"];
            $button_url             = $settings["button_url"]["url"];
            $button_url_external    = $settings["button_url"]["is_external"] ? 'target="_blank"' : '';
            $button_url_nofollow    = $settings["button_url"]["nofollow"] ? 'rel="nofollow"' : '';
            $video_btn_title        = $settings["video_btn_title"];
            $video_btn_url          = $settings["video_btn_url"]["url"];
            $video_btn_url_external = $settings["video_btn_url"]["is_external"] ? 'target="_blank"' : '';
            $video_btn_url_nofollow = $settings["video_btn_url"]["nofollow"] ? 'rel="nofollow"' : '';
        ?>
            <!--Start Slogan Style2 Area-->
            <section class="slogan-style2-area" style="background-image: url(<?php echo $bg_image; ?>);">
                <?php if(!empty($shape1)){ ?>
                <div class="hand-shape1 wow slideInLeft" data-wow-delay="400ms" data-wow-duration="1500ms">
                    <img class="float-bob-y" src="<?php echo $shape1; ?>" alt="loveicon">
                </div>
                <?php } if(!empty($shape2)){ ?>
                <div class="hand-shape2 wow slideInRight" data-wow-delay="800ms" data-wow-duration="1500ms">
                    <img class="float-bob-y" src="<?php echo $shape2; ?>" alt="loveicon">
                </div>
                <?php } ?>
                <?php if(!empty($shape3)){ ?>
                <div class="hand-shape3 wow slideInUp" data-wow-delay="1200ms" data-wow-duration="1500ms">
                    <img src="<?php echo $shape3; ?>" alt="loveicon">
                </div>
                <?php } if(!empty($shape4)){ ?>
                <div class="hand-shape4 wow slideInUp" data-wow-delay="1200ms" data-wow-duration="1500ms">
                    <img class="zoom-fade" src="<?php echo $shape4; ?>" alt="loveicon">
                </div>
                <?php } ?>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slogan-style2-content text-right-rtl">
                                <div class="sec-title">
                                    <h2><?php echo $heading; ?></h2>
                                </div>
                                <div class="text-box">
                                    <p><?php echo $description; ?></p>
                                </div>
                                <div class="btns-box">
                                    <?php if ($button_title) { ?>
                                        <a class="btn-one" href="<?php echo esc_url($button_url); ?>" <?php echo $button_url_external; ?> <?php echo $button_url_nofollow; ?>><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $button_title; ?></span></a>
                                    <?php } ?>
                                    <a class="video-popup cause-video-button" title="LoveIcon Video Gallery" href="<?php echo esc_url($video_btn_url); ?>" <?php echo $video_btn_url_external; ?> <?php echo $video_btn_url_nofollow; ?>>
                                        <span class="flaticon-play-button playicon"></span><span class="txt"><?php echo $video_btn_title; ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Slogan Style2 Area-->
        <?php
        } elseif ($layout_style == '3') {
            $bg_image                = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
            $heading                 = $settings["heading"];
            $sub_heading             = $settings["sub_heading"];
            $button_title1           = $settings["button_title1"];
            $button_one_url          = $settings["button_one_url"]["url"];
            $button_one_url_external = $settings["button_one_url"]["is_external"] ? 'target="_blank"' : '';
            $button_one_url_nofollow = $settings["button_one_url"]["nofollow"] ? 'rel="nofollow"' : '';
            $button_title2           = $settings["button_title2"];
            $button_two_url          = $settings["button_two_url"]["url"];
            $button_two_url_external = $settings["button_two_url"]["is_external"] ? 'target="_blank"' : '';
            $button_two_url_nofollow = $settings["button_two_url"]["nofollow"] ? 'rel="nofollow"' : '';
        ?>
            <!--Start Slogan Style3 Area-->
            <section class="slogan-style3-area">
                <div class="slogan-style3-area_bg" style="background-image: url(<?php echo $bg_image; ?>);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slogan-style3-content text-center">
                                <div class="sec-title">
                                    <div class="sub-title martop0">
                                        <div class="inner">
                                            <h3><?php echo $sub_heading; ?></h3>
                                        </div>
                                    </div>
                                    <h2><?php echo $heading; ?></h2>
                                </div>
                                <div class="btns-box">
                                    <?php if ($button_title1) { ?>
                                        <a class="btn-one" href="<?php echo esc_url($button_one_url); ?>" <?php echo $button_one_url_external; ?> <?php echo $button_one_url_nofollow; ?>><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?Php echo $button_title1; ?></span></a>
                                    <?php }
                                    if ($button_title2) { ?>
                                        <a class="btn-one" href="<?php echo esc_url($button_two_url); ?>" <?php echo $button_two_url_external; ?> <?php echo $button_two_url_nofollow; ?>><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?Php echo $button_title2; ?></span></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Slogan Style3 Area-->
        <?php
        } elseif ($layout_style == '4') {
            $pattern_image       = ($settings["pattern_image"]["id"] != "") ? wp_get_attachment_image_url($settings["pattern_image"]["id"], "full") : $settings["pattern_image"]["url"];
            $bg_image            = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
            $heading             = $settings["heading"];
            $name                = $settings["name"];
            $title               = $settings["title"];
            $sub_heading         = $settings["sub_heading"];
            $button_title        = $settings["button_title"];
            $button_url          = $settings["button_url"]["url"];
            $button_url_external = $settings["button_url"]["is_external"] ? 'target="_blank"' : '';
            $button_url_nofollow = $settings["button_url"]["nofollow"] ? 'rel="nofollow"' : '';
            $icon                = ($settings["icon"]["id"] != "") ? wp_get_attachment_image_url($settings["icon"]["id"], "full") : $settings["icon"]["url"];
            $icon_alt            = get_post_meta($settings["icon"]["id"], "_wp_attachment_image_alt", true);
        ?>
            <section class="slogan-area slogan-area-style4">
                <div class="slogan-area_bg-2" style="background-image: url(<?php echo $pattern_image; ?>);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-right-rtl">
                            <div class="slogan-content">
                                <div class="slogan-content_top" style="background-image: url(<?php echo $bg_image; ?>);">
                                    <h2><?php echo $heading; ?></h2>
                                    <div class="name">
                                        <h5><?php echo $name; ?></h5>
                                    </div>
                                </div>
                                <div class="slogan-content_bottom">
                                    <div class="left">
                                        <div class="icon">
                                            <?php
                                            if (wp_http_validate_url($icon)) {
                                            ?>
                                                <img src="<?php echo esc_url($icon); ?>" alt="<?php esc_url($icon_alt); ?>">
                                            <?php
                                            } else {
                                                echo $icon;
                                            }
                                            ?>
                                        </div>
                                        <div class="title">
                                            <p><?php echo $title; ?></p>
                                            <h2><?php echo $sub_heading; ?></h2>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="btns-box">
                                            <?php if ($button_title) { ?>
                                                <a class="btn-one btn-one-style2" href="<?php echo esc_url($button_url); ?>" <?php echo $button_url_external; ?> <?php echo $button_url_nofollow; ?>>
                                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i><?Php echo $button_title; ?></span>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    }
}
