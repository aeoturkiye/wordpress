<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Projects extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_projects';
    }

    public function get_title()
    {
        return esc_html__('Loveicon_Projects', 'loveicon');
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
            'heading',
            [
                'label' => esc_html__('Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Ongoing Projects', 'loveicon'),
            ]
        );

        $this->add_control(
            'sub_heading',
            [
                'label' => esc_html__('Sub Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('We Change Your Life & World', 'loveicon'),
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
                    ]
                ]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_image_one',
            [
                'label' => esc_html__('Image One', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_image_two',
            [
                'label' => esc_html__('Image Two', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'loveicon'),
                'type' => Controls_Manager::TEXT,
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
            'item1',
            [
                'label' => esc_html__('Item', 'loveicon'),
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

        $repeater1 = new Repeater();

        $repeater1->add_control(
            'item_image_one',
            [
                'label' => esc_html__('Image One', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1->add_control(
            'item_image_two',
            [
                'label' => esc_html__('Image Two', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1->add_control(
            'item_image_three',
            [
                'label' => esc_html__('Image Three', 'loveicon'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater1->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Climate Action', 'loveicon'),
            ]
        );

        $repeater1->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Nostrud tem exrcitation duis<br>nisi ut aliquip cupidata.', 'loveicon'),
            ]
        );

        $repeater1->add_control(
            'title_url',
            [
                'label' => __('Title URL', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'items1',
            [
                'label' => esc_html__('Repeater List', 'loveicon'),
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
                'name'     => 'sub_heading_typography',
                'label'    => __('Sub Heading', 'loveicon-core'),
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
        $settings     = $this->get_settings_for_display();
        $layout_style = $settings["layout_style"];

        if ($layout_style == '1') {
            $heading     = $settings["heading"];
            $sub_heading = $settings["sub_heading"];
            $image       = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
            $image_alt   = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
?>
            <section class="ongoing-projects-area">
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
                            <div class="ongoing-projects_content">
                                <ul class="clearfix">
                                    <?php
                                    $i = 0;
                                    foreach ($settings["items"] as $item) {
                                        $item_image_one     = ($item["item_image_one"]["id"] != "") ? wp_get_attachment_image($item["item_image_one"]["id"], "full") : $item["item_image_one"]["url"];
                                        $item_image_one_alt = get_post_meta($item["item_image_one"]["id"], "_wp_attachment_image_alt", true);
                                        $item_image_two     = ($item["item_image_two"]["id"] != "") ? wp_get_attachment_image_url($item["item_image_two"]["id"], "full") : $item["item_image_two"]["url"];
                                        $item_title         = $item["item_title"];
                                        $i++;
                                        if ($i < 5) {
                                    ?>
                                            <!--Start Single Ongoing Project-->
                                            <li class="single-ongoing-project">
                                                <div class="icon">
                                                    <?php
                                                    if (wp_http_validate_url($item_image_one)) {
                                                    ?>
                                                        <img src="<?php echo esc_url($item_image_one); ?>" alt="<?php esc_url($item_image_one_alt); ?>">
                                                    <?php
                                                    } else {
                                                        echo $item_image_one;
                                                    }
                                                    ?>
                                                </div>
                                                <h4><?php echo $item_title; ?></h4>
                                                <div class="overly-bg" style="background-image: url(<?php echo $item_image_two; ?>);">
                                                </div>
                                            </li>
                                            <!--End Single Ongoing Project-->
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                                <ul class="clearfix">
                                    <?php
                                    $i = 0;
                                    foreach ($settings["items"] as $item) {
                                        $item_image_one     = ($item["item_image_one"]["id"] != "") ? wp_get_attachment_image($item["item_image_one"]["id"], "full") : $item["item_image_one"]["url"];
                                        $item_image_one_alt = get_post_meta($item["item_image_one"]["id"], "_wp_attachment_image_alt", true);
                                        $item_image_two     = ($item["item_image_two"]["id"] != "") ? wp_get_attachment_image_url($item["item_image_two"]["id"], "full") : $item["item_image_two"]["url"];
                                        $item_title         = $item["item_title"];
                                        $i++;
                                        if ($i > 4) {
                                    ?>
                                            <!--Start Single Ongoing Project-->
                                            <li class="single-ongoing-project">
                                                <div class="icon">
                                                    <?php
                                                    if (wp_http_validate_url($item_image_one)) {
                                                    ?>
                                                        <img src="<?php echo esc_url($item_image_one); ?>" alt="<?php esc_url($item_image_one_alt); ?>">
                                                    <?php
                                                    } else {
                                                        echo $item_image_one;
                                                    }
                                                    ?>
                                                </div>
                                                <h4><?php echo $item_title; ?></h4>
                                                <div class="overly-bg" style="background-image: url(<?php echo $item_image_two; ?>);">
                                                </div>
                                            </li>
                                            <!--End Single Ongoing Project-->
                                    <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        } elseif ($layout_style == '2') {
            $heading     = $settings["heading"];
            $sub_heading = $settings["sub_heading"];
            $image       = ($settings["image"]["id"] != "") ? wp_get_attachment_image_url($settings["image"]["id"], "full") : $settings["image"]["url"];
            $image_alt   = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            $bg_image    = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];

        ?>
            <!--Start Planning Programs Area-->
            <section class="planning-programs-area">
                <div class="planning-programs-area_bg" style="background-image: url(<?php echo $bg_image ?>);"></div>
                <div class="container">
                    <div class="sec-title text-center">
                        <div class="sub-title">
                            <div class="inner">
                                <h3><?php echo $heading ?></h3>
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
                        <h2><?php echo $sub_heading ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="theme_carousel planning-programs-carousel owl-nav-style-one owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "4" }}}'>
                                <?php
                                $i = 0;
                                foreach ($settings["items1"] as $item) {
                                    $item_image_one       = ($item["item_image_one"]["id"] != "") ? wp_get_attachment_image_url($item["item_image_one"]["id"], "full") : $item["item_image_one"]["url"];
                                    $item_image_one_alt   = get_post_meta($item["item_image_one"]["id"], "_wp_attachment_image_alt", true);
                                    $item_image_two       = ($item["item_image_two"]["id"] != "") ? wp_get_attachment_image_url($item["item_image_two"]["id"], "full") : $item["item_image_two"]["url"];
                                    $item_image_two_alt   = get_post_meta($item["item_image_two"]["id"], "_wp_attachment_image_alt", true);
                                    $item_image_three     = ($item["item_image_three"]["id"] != "") ? wp_get_attachment_image_url($item["item_image_three"]["id"], "full") : $item["item_image_three"]["url"];
                                    $item_image_three_alt = get_post_meta($item["item_image_three"]["id"], "_wp_attachment_image_alt", true);
                                    $item_title           = $item["item_title"];
                                    $title_url            = $item["title_url"]["url"];
                                    $title_url_external   = $item["title_url"]["is_external"] ? 'target="_blank"' : '';
                                    $title_url_nofollow   = $item["title_url"]["nofollow"] ? 'rel="nofollow"' : '';
                                    $item_description     = $item["item_description"];
                                ?>
                                    <!--Start Single Planning Programs-->
                                    <div class="single-planning-programs">
                                        <div class="img-holder">
                                            <div class="inner">
                                                <?php
                                                if (wp_http_validate_url($item_image_one)) {
                                                ?>
                                                    <img src="<?php echo esc_url($item_image_one); ?>" alt="<?php esc_url($item_image_one_alt); ?>">
                                                <?php
                                                } else {
                                                    echo $item_image_one;
                                                }
                                                ?>
                                                <div class="icon-box">
                                                    <?php
                                                    if (wp_http_validate_url($item_image_two)) {
                                                    ?>
                                                        <img src="<?php echo esc_url($item_image_two); ?>" alt="<?php esc_url($item_image_two_alt); ?>">
                                                    <?php
                                                    } else {
                                                        echo $item_image_two;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="overlay">
                                                <?php
                                                if (wp_http_validate_url($item_image_three)) {
                                                ?>
                                                    <img src="<?php echo esc_url($item_image_three); ?>" alt="<?php esc_url($item_image_three_alt); ?>">
                                                <?php
                                                } else {
                                                    echo $item_image_three;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="text-holder">
                                            <h2><a href="<?php echo esc_url($title_url); ?>" <?php echo $title_url_external; ?> <?php echo $title_url_nofollow; ?>><?php echo $item_title; ?></a></h2>
                                            <p><?php echo $item_description; ?></p>
                                        </div>
                                    </div>
                                    <!--Start Single Planning Programs-->
                                <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
<?php
        }
    }
}
