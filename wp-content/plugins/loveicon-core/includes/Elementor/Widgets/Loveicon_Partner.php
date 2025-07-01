<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Partner extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_partner';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Partner', 'loveicon');
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
                'label'   => esc_html__('Layout Style', 'loveicon-core'),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => esc_html__('Style One', 'loveicon-core'),
                    'style_2' => esc_html__('Style Two', 'loveicon-core'),
                    'style_3' => esc_html__('Style Three', 'loveicon-core'),
                    'style_4' => esc_html__('Style Four', 'loveicon-core'),

                ],
                'default' => 'style_1',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'loveicon'),
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

                    ]
                ]
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => esc_html__('BG Image', 'loveicon'),
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
                            'value' => 'style_3'
                        ],

                    ]
                ]
            ]
        );


        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Become Support Partner', 'loveicon'),
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
            'sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Provide financing support to help individuals build livelihoods', 'loveicon'),
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
            'button_title',
            [
                'label' => esc_html__('Button Title', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('get in touch', 'loveicon'),
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
            'button_url',
            [
                'label' => esc_html__('Button URL', 'loveicon'),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'loveicon'),
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

        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('item', 'loveicon'),
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

        $repeater = new Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'loveicon'),
                'type' => Controls_Manager::TEXT,
            ]
        );

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
            'item_url',
            [
                'label' => esc_html__('URL', 'loveicon'),
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

        //repeater2
        $this->start_controls_section(
            'item2',
            [
                'label' => esc_html__('item', 'loveicon'),
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_2'
                        ],
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_3'
                        ],
                        [
                            'name' => 'layout_style',
                            'operator' => '==',
                            'value' => 'style_4'
                        ],

                    ]
                ]

            ]
        );

        $repeater2 = new Repeater();

        $repeater2->add_control(
            'item_image',
            [
                'label' => esc_html__('Image', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater2->add_control(
            'item_url',
            [
                'label' => esc_html__('URL', 'loveicon'),
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
            'items2',
            [
                'label' => esc_html__('Repeater List', 'loveicon'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
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
                'label'    => __('Heading', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .partner-area .top-box .title h2',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'sub_heading_typography',
                'label'    => __('Sub Heading ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .partner-area .top-box .title h4',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'button_title_typography',
                'label'    => __('Button Title ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .btn-one .txt',
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
                    '{{WRAPPER}} .partner-area .top-box .title h2' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .partner-area .top-box .title h4' => 'color: {{VALUE}}',
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
        $settings            = $this->get_settings_for_display();
        $layout_style = $settings['layout_style'];

        if ($layout_style == 'style_1') {
            $image               = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
            $image_alt           = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            $heading             = $settings["heading"];
            $sub_heading         = $settings["sub_heading"];
            $button_title        = $settings["button_title"];
            $button_url          = $settings["button_url"]["url"];
            $button_url_external = $settings["button_url"]["is_external"] ? 'target="_blank"' : '';
            $button_url_nofollow = $settings["button_url"]["nofollow"] ? 'rel="nofollow"' : '';
?>
            <!--Start Partner Area-->
            <section class="partner-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="top-box text-right-rtl">
                                <div class="shape wow zoomIn" data-wow-delay="0ms" data-wow-duration="3500ms">
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
                                <div class="title">
                                    <h2><?php echo $heading; ?></h2>
                                    <h4><?php echo $sub_heading; ?></h4>
                                </div>
                                <div class="btn-box">
                                    <?php if ($button_title) { ?>
                                        <a class="btn-one" href="<?php echo esc_url($button_url); ?>" <?php echo $button_url_external; ?> <?php echo $button_url_nofollow; ?>><span class="txt"><i class="arrow1 fa fa-check-circle"></i><?php echo $button_title; ?></span></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="partner-box partner-carousel owl-carousel owl-theme owl-dot-style1">

                        <?php
                        $i = 1;
                        foreach ($settings["items"] as $item) {

                            $item_image        = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                            $item_image_alt    = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                            $item_url          = $item["item_url"]["url"];
                            $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';

                        ?>
                            <!--Start Single Partner Logo Box-->
                            <li class="single-partner-logo-box">
                                <a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>>
                                    <?php
                                    if (wp_http_validate_url($item_image)) {
                                    ?>
                                        <img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
                                    <?php
                                    } else {
                                        echo $item_image;
                                    }
                                    ?></a>
                            </li>
                            <!--End Single Partner Logo Box-->
                        <?php
                            $i++;
                        }
                        ?>
                    </ul>
                </div>
            </section>
            <!--End Partner Area-->

        <?php  } elseif ($layout_style == 'style_2') {
        ?>
            <!--Start Partner Area-->
            <section class="partner-area partner-area--style3">
                <div class="container">
                    <ul class="partner-box partner-carousel-2 owl-carousel owl-theme">
                        <?php
                        $i = 1;
                        foreach ($settings["items2"] as $item) {

                            $item_image        = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                            $item_image_alt    = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                            $item_url          = $item["item_url"]["url"];
                            $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';

                        ?>
                            <li class="single-partner-logo-box">
                                <a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>>
                                    <?php
                                    if (wp_http_validate_url($item_image)) {
                                    ?>
                                        <img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
                                    <?php
                                    } else {
                                        echo $item_image;
                                    }
                                    ?>
                                </a>
                            </li>
                        <?php $i++;
                        }
                        ?>
                    </ul>
                </div>
            </section>
            <!--End Partner Area-->
        <?php  } elseif ($layout_style == 'style_3') {
            $bg_image        = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
        ?>
            <section class="partner-area partner-area--style3">
                <div class="partner-area--style3_bg" style="background-image: url(<?php echo $bg_image; ?>);"></div>
                <div class="container">
                    <ul class="partner-box partner-carousel-2 owl-carousel owl-theme">
                        <?php
                        $i = 1;
                        foreach ($settings["items2"] as $item) {

                            $item_image = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];

                            $item_image_alt    = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                            $item_url          = $item["item_url"]["url"];
                            $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';

                        ?>
                            <li class="single-partner-logo-box">
                                <a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>>
                                    <?php
                                    if (wp_http_validate_url($item_image)) {
                                    ?>
                                        <img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
                                    <?php
                                    } else {
                                        echo $item_image;
                                    }
                                    ?>
                                </a>
                            </li>
                        <?php $i++;
                        }

                        ?>
                    </ul>
                </div>
            </section>
        <?php  } elseif ($layout_style == 'style_4') {
        ?>
            <section class="partner-style4-area">
                <div class="container">
                    <ul class="partner-box partner-carousel-3 owl-carousel owl-theme">
                        <?php
                        $i = 1;
                        foreach ($settings["items2"] as $item) {

                            $item_image        = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                            $item_image_alt    = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                            $item_url          = $item["item_url"]["url"];
                            $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                            $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';

                        ?>
                            <li class="single-partner-logo-box">
                                <a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>>
                                    <?php
                                    if (wp_http_validate_url($item_image)) {
                                    ?>
                                        <img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
                                    <?php
                                    } else {
                                        echo $item_image;
                                    }
                                    ?>
                                </a>
                            </li>
                        <?php $i++;
                        }

                        ?>

                    </ul>
                </div>
            </section>
<?php }
    }
}
