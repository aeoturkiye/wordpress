<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_About_Three extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_about_three';
    }

    public function get_title()
    {
        return esc_html__('Loveicon About Three', 'loveicon-core');
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
                'label' => esc_html__('general', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'layout_style',
            [
                'label'   => esc_html__('Layout Style', 'loveicon-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => esc_html__('Style One', 'loveicon-core'),
                    'style_2' => esc_html__('Style Two', 'loveicon-core'),
                ],
                'default' => 'style_1',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_2'
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'content_title',
            [
                'label' => esc_html__('Content Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Watch The Intro Video', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],

                    ]
                ]
            ]
        );

        $this->add_control(
            'tag_line',
            [
                'label' => esc_html__('Tag Line', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Donations For Humanity, Safer Way!', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_2'
                        ]
                    ]
                ]
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Providing Urgent Aid For<br> Your Better  Future', 'loveicon-core'),

            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Emergency relief to ongoing aid for those affected by storms.', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Laboris nisi aliquip sed duis aute lorem ipsum dolor amet consectetur adipisicing elit sed do eiusmod tempor tm incididunts lorem ipsum sed labore dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipisicing.', 'loveicon-core'),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),

            ]
        );

        $this->add_control(
            'description2',
            [
                'label' => esc_html__('Description Two', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_2'
                        ],

                    ]
                ]
            ]
        );

        $this->add_control(
            'shape',
            [
                'label' => esc_html__('Shape', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'shape2',
            [
                'label' => esc_html__('Shape Two', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'bottom_title',
            [
                'label' => esc_html__('Bottom Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Donate With Love & Faith', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_2'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => esc_html__('Name', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Johnson Stainter', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => esc_html__('Designation', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Director LoveIcon', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'signature',
            [
                'label' => esc_html__('Signature', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Johnson Stainter', 'loveicon-core'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'loveicon-core'),
                'type' => Controls_Manager::ICONS,
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'url',
            [
                'label' => esc_html__('URL', 'loveicon-core'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'loveicon-core'),
                'show_external' => true,
                'default' => [
                    'url' => '',
                    'is_external' => false,
                    'nofollow' => false,
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_1'
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
                'name'     => 'tagline_typography',
                'label'    => __('Tagline', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
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
            'tagline_color',
            array(
                'label'     => __('Tagline Color', 'loveicon-core'),
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
                    '{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $layout_style = $settings['layout_style'];
?>
        <?php if ($layout_style == 'style_1') {
            $image         = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
            $image_alt     = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            $content_title = $settings["content_title"];
            $tag_line      = $settings["tag_line"];
            $heading       = $settings["heading"];
            $description   = $settings["description"];
            $shape         = ($settings["shape"]["id"] != "") ? wp_get_attachment_image($settings["shape"]["id"], "full") : $settings["shape"]["url"];
            $shape_alt     = get_post_meta($settings["shape"]["id"], "_wp_attachment_image_alt", true);
            $name          = $settings["name"];
            $designation   = $settings["designation"];
            $signature     = $settings["signature"];
            $title         = $settings["title"];
            $icon          = $settings["icon"];
            $url           = $settings["url"]["url"];
            $url_external  = $settings["url"]["is_external"] ? 'target="_blank"' : '';
            $url_nofollow  = $settings["url"]["nofollow"] ? 'rel="nofollow"' : '';

        ?>
            <!--Start About Style3 Area-->
            <se ction class="about-style3-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="about-style3_content">
                                <div class="img-holder">
                                    <?php
                                    if (wp_http_validate_url($image)) {
                                    ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php esc_url($image_alt); ?>">
                                    <?php
                                    } else {
                                        echo $image;
                                    }
                                    ?>
                                    <div class="video-holder-box-2">
                                        <div class="icon wow zoomIn">
                                            <a class="video-popup" title="Loveicon Video Gallery" href="<?php echo esc_url($url); ?>" <?php echo $url_external; ?> <?php echo $url_nofollow; ?>>
                                                <span class="<?php echo $icon['value']; ?>"></span>
                                            </a>
                                            <div class="title">
                                                <h5><?php echo $content_title; ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-holder text-right-rtl">
                                    <div class="about-style1_content-box">
                                        <div class="sec-title">
                                            <div class="sub-title martop0">
                                                <div class="inner">
                                                    <h3><?php echo $tag_line; ?></h3>
                                                </div>
                                            </div>
                                            <h2><?php echo $heading; ?></h2>
                                        </div>
                                        <div class="inner-content">
                                            <h3><?php echo $title; ?></h3>
                                            <p><?php echo $description; ?></p>

                                            <div class="bottom-box">
                                                <div class="signature">
                                                    <h2><?php echo $signature; ?></h2>
                                                </div>
                                                <div class="name">
                                                    <div class="about-style3-shape">
                                                        <?php
                                                        if (wp_http_validate_url($shape)) {
                                                        ?>
                                                            <img src="<?php echo esc_url($shape); ?>" alt="<?php esc_url($shape_alt); ?>">
                                                        <?php
                                                        } else {
                                                            echo $shape;
                                                        }
                                                        ?>
                                                    </div>
                                                    <h3><?php echo $name; ?></h3>
                                                    <span><?php echo $designation; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                <!--End About Style3 Area-->
            <?php } elseif ($layout_style == 'style_2') {

            $image        = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
            $image_alt    = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            $tag_line     = $settings["tag_line"];
            $heading      = $settings["heading"];
            $description  = $settings["description"];
            $description2 = $settings["description2"];
            $bottom_title = $settings["bottom_title"];
            $shape        = ($settings["shape"]["id"] != "") ? wp_get_attachment_image($settings["shape"]["id"], "full") : $settings["shape"]["url"];
            $shape_alt    = get_post_meta($settings["shape"]["id"], "_wp_attachment_image_alt", true);
            $shape2        = ($settings["shape2"]["id"] != "") ? wp_get_attachment_image($settings["shape2"]["id"], "full") : $settings["shape2"]["url"];
            $shape2_alt    = get_post_meta($settings["shape2"]["id"], "_wp_attachment_image_alt", true);
            ?>
                <!--Start About Style4 Area-->
                <section class="about-style4-area">
                    <div class="auto-container">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="about-style4_image_box">
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
                            <div class="col-xl-6 text-right-rtl">
                                <div class="about-style4_content">
                                    <div class="sec-title">
                                        <div class="sub-title martop0">
                                            <div class="inner">
                                                <h3><?php echo $tag_line; ?></h3>
                                            </div>
                                        </div>
                                        <h2><?php echo $heading; ?></h2>
                                    </div>
                                    <div class="inner-box">
                                        <p><?php echo $description; ?></p>
                                        <ul>
                                            <?php echo $description2; ?>
                                        </ul>
                                        <div class="bottom-box">
                                            <div class="shape1">
                                                <?php
                                                if (wp_http_validate_url($shape)) {
                                                ?>
                                                    <img src="<?php echo esc_url($shape); ?>" alt="<?php esc_url($image_alt); ?>">
                                                <?php
                                                } else {
                                                    echo $shape;
                                                }
                                                ?>
                                            </div>
                                            <div class="shape2">
                                                <?php
                                                if (wp_http_validate_url($shape2)) {
                                                ?>
                                                    <img src="<?php echo esc_url($shape2); ?>" alt="<?php esc_url($image_alt); ?>">
                                                <?php
                                                } else {
                                                    echo $shape2;
                                                }
                                                ?>
                                            </div>
                                            <h2><?php echo $bottom_title; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--End About Style4 Area-->
    <?php }
    }
}
