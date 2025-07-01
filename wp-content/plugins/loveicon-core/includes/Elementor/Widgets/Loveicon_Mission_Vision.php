<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Mission_Vision extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_mission_vision';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Mission and Vision', 'loveicon-core');
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
                'label' => esc_html__('General', 'loveicon-core'),
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
            'bg_image',
            [
                'label' => esc_html__('BG Image', 'loveicon-core '),
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
            'shape',
            [
                'label' => esc_html__('Shape', 'loveicon-core '),
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
            'bg_image_one',
            [
                'label'   => esc_html__('BG Image One', 'loveicon-core'),
                'type'    => Controls_Manager::MEDIA,
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
            'bg_image_two',
            [
                'label'   => esc_html__('BG Image Two', 'loveicon-core'),
                'type'    => Controls_Manager::MEDIA,
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
            'tag_line',
            [
                'label'   => esc_html__('Tag Line', 'loveicon-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Help With Featured Cause', 'loveicon-core'),
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
            'heading',
            [
                'label'   => esc_html__('Heading', 'loveicon-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('We Bring Lasting Change<br>To People Effected With<br>Coronavirus (Covid-19)', 'loveicon-core'),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'item_section',
            [
                'label' => esc_html__('item', 'loveicon-core '),
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
            'item_tab_title',
            [
                'label' => esc_html__('Tab Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('How We Work', 'loveicon-core'),
            ]
        );

        $repeater->add_control(
            'item_image',
            [
                'label' => esc_html__('Image', 'loveicon-core '),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'loveicon-core '),
                'type' => Controls_Manager::TEXT,
                'default' => __('Donations with help of our partners,<br> Bigger impact on education!', 'loveicon-core '),
            ]
        );


        $repeater->add_control(
            'item_description_one',
            [
                'label' => esc_html__('Description One', 'loveicon-core '),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Excepteur sint ocaecat cupidatat proident sunt culpa officia mollity
                anim id est laborum. Sed ut duis persic atis under ipsum dolor natus
                sit voluptatem. Lorem ipsum dolor sit amet consectetur.', 'loveicon-core '),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core '),

            ]
        );

        $repeater->add_control(
            'item_description_two',
            [
                'label' => esc_html__('Description Two', 'loveicon-core '),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'loveicon-core '),
            ]
        );

        $repeater->add_control(
            'item_button_title',
            [
                'label' => esc_html__('Button Title', 'loveicon-core '),
                'type' => Controls_Manager::TEXT,
                'default' => __('get in touch', 'loveicon-core '),
            ]
        );

        $repeater->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon', 'loveicon-core '),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $repeater->add_control(
            'item_url',
            [
                'label' => esc_html__('URL', 'loveicon-core '),
                'type' => Controls_Manager::URL,
                'placeholder' => esc_html__('https://your-link.com', 'loveicon-core '),
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
                'label' => esc_html__('Repeater List', 'loveicon-core '),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'loveicon-core '),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core '),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'loveicon-core '),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core '),
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'item2_section',
            [
                'label' => esc_html__('item', 'loveicon-core'),
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

        $repeater2 = new Repeater();

        $repeater2->add_control(
            'item_tab_title',
            [
                'label' => esc_html__('Tab Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Challenges', 'loveicon-core'),
            ]
        );

        $repeater2->add_control(
            'item_description',
            [
                'label'   => esc_html__('Description', 'loveicon-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Laboris nisi utm aliquip sed tempor duis aut lorem ipsum sed dolor sitye amet
                consecte atur autys adipisicing elit sed dolor eiusmod tempor utm incididunts
                lorem ipsum sed labore dolore magna aliqua. Nostrud sed aliquips exercitation
                sed laboris nisiut temp ipsum duis autey.', 'loveicon-core'),
            ]
        );

        $repeater2->add_control(
            'item_button_title',
            [
                'label'   => esc_html__('Button Title', 'loveicon-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => __('Support Us Today', 'loveicon-core'),
            ]
        );

        $repeater2->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon', 'loveicon-core'),
                'type'  => Controls_Manager::ICONS,
            ]
        );

        $repeater2->add_control(
            'item_url',
            [
                'label'         => esc_html__('URL', 'loveicon-core'),
                'type'          => Controls_Manager::URL,
                'placeholder'   => esc_html__('https://your-link.com', 'loveicon-core'),
                'show_external' => true,
                'default'       => [
                    'url'         => '',
                    'is_external' => false,
                    'nofollow'    => false,
                ],

            ]
        );

        $this->add_control(
            'items2',
            [
                'label' => esc_html__('Repeater List', 'loveicon-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater2->get_controls(),
                'default' => [
                    [
                        'list_title'   => esc_html__('Title #1', 'loveicon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
                    ],
                    [
                        'list_title'   => esc_html__('Title #2', 'loveicon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
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
                'label'    => __('Title', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .mission-vision-content-box1 h2',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'description_typography',
                'label'    => __('Description One', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .mission-vision-content-box1 p',
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
                    '{{WRAPPER}} .mission-vision-content-box1 h2' => 'color: {{VALUE}}',
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
        $settings     = $this->get_settings_for_display();
        $layout_style = $settings['layout_style'];
        $tab_id       = rand(000000, 999999);
        $tab_id_class = $tab_id ?? '';

        if ($layout_style == 'style_1') {
            $bg_image     = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
            $bg_image_alt = get_post_meta($settings["bg_image"]["id"], "_wp_attachment_image_alt", true);
            $shape        = ($settings["shape"]["id"] != "") ? wp_get_attachment_image($settings["shape"]["id"], "full") : $settings["shape"]["url"];
            $shape_alt    = get_post_meta($settings["shape"]["id"], "_wp_attachment_image_alt", true);
?>
            <section class="mission-vision-area">
                <div class="mission-vision-area_bg" style="background-image: url(<?php echo $bg_image; ?>);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="mission-vision-tabs tabs-box">
                                <div class="shape1">
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
                                <div class="tab-button-column clearfix">
                                    <ul class="tab-buttons clearfix">
                                        <?php
                                        $i = 1;
                                        foreach ($settings["items"] as $item) {
                                            $item_tab_title    = $item["item_tab_title"];
                                            $item_button_title = $item["item_button_title"];
                                            $item_icon         = $item["item_icon"];
                                            $item_url          = $item["item_url"]["url"];
                                            $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                                            $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';
                                            if ($i == 1) {
                                                $active_class = 'active-btn';
                                            } else {
                                                $active_class = '';
                                            }
                                            if ($i == 1) {
                                                $style = '';
                                            } else {
                                                $style = 'style' . $i;
                                            }
                                        ?>
                                            <!--tab list -->
                                            <li data-tab="#<?php echo $tab_id_class; ?><?php echo $i; ?>" class="tab-btn <?php echo $active_class . ' ' . $style; ?>"><?php echo $item_tab_title; ?></li>
                                        <?php
                                            $i++;
                                        } ?>
                                    </ul>
                                </div>
                                <div class="mission-vision-content-column clearfix text-right-rtl">
                                    <div class="tabs-content">
                                        <?php
                                        $i = 1;
                                        foreach ($settings["items"] as $item) {
                                            $item_image           = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                                            $item_image_alt       = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                                            $item_title           = $item["item_title"];
                                            $item_description_one = $item["item_description_one"];
                                            $item_description_two = $item["item_description_two"];
                                            $item_button_title    = $item["item_button_title"];
                                            $item_icon            = $item["item_icon"];
                                            $item_url             = $item["item_url"]["url"];
                                            $item_url_external    = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                                            $item_url_nofollow    = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';
                                            $active_class      = '';
                                            if ($i == 1) {
                                                $active_class = 'active-tab';
                                            }
                                        ?>
                                            <div class="tab <?php echo $active_class; ?>" id="<?php echo $tab_id_class; ?><?php echo $i; ?>">
                                                <div class="row clearfix">
                                                    <div class="col-xl-5">
                                                        <div class="mission-vision-image-box1">
                                                            <?php
                                                            if (wp_http_validate_url($item_image)) {
                                                            ?>
                                                                <img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
                                                            <?php
                                                            } else {
                                                                echo $item_image;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-7">
                                                        <div class="mission-vision-content-box1">
                                                            <h2><?php echo $item_title; ?></h2>
                                                            <p><?php echo $item_description_one; ?></p>
                                                            <ul>
                                                                <?php echo $item_description_two; ?>
                                                            </ul>
                                                            <div class="btn-box">
                                                                <a class="btn-one" href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>>
                                                                    <span class="txt"><?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true')); ?><?php echo $item_button_title; ?></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $i++;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }
        if ($layout_style == 'style_2') {
            $bg_image_one     = ($settings["bg_image_one"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image_one"]["id"], "full") : $settings["bg_image_one"]["url"];
            $bg_image_one_alt = get_post_meta($settings["bg_image_one"]["id"], "_wp_attachment_image_alt", true);
            $bg_image_two     = ($settings["bg_image_two"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image_two"]["id"], "full") : $settings["bg_image_two"]["url"];
            $bg_image_two_alt = get_post_meta($settings["bg_image_two"]["id"], "_wp_attachment_image_alt", true);
            $tag_line         = $settings["tag_line"];
            $heading          = $settings["heading"];
        ?>
            <section class="mission-vision-style2-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="mission-vision-style2-img" style="background-image: url(<?php echo $bg_image_one; ?>);">
                            </div>
                        </div>
                        <div class="col-xl-6 text-right-rtl">
                            <div class="mission-vision-style2-content-box">
                                <div class="mission-vision-style2-content-box_bg zoom-fade" style="background-image: url(<?php echo $bg_image_two; ?>);"></div>
                                <div class="inner">
                                    <div class="sec-title">
                                        <div class="sub-title martop0">
                                            <div class="inner">
                                                <h3><?php echo $tag_line; ?></h3>
                                            </div>
                                        </div>
                                        <h2><?php echo $heading; ?></h2>
                                    </div>
                                    <div class="mission-vision-style2-tabs tabs-box">
                                        <div class="tab-button-column clearfix">
                                            <ul class="tab-buttons clearfix">
                                                <?php
                                                $i = 1;
                                                foreach ($settings["items2"] as $item) {
                                                    $item_tab_title    = $item["item_tab_title"];
                                                    $item_description  = $item["item_description"];
                                                    $item_button_title = $item["item_button_title"];
                                                    $item_icon         = $item["item_icon"];
                                                    $item_url          = $item["item_url"]["url"];
                                                    $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                                                    $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';
                                                    if ($i == 1) {
                                                        $active_class = 'active-btn';
                                                    } else {
                                                        $active_class = '';
                                                    }
                                                    if ($i == 1) {
                                                        $style = '';
                                                    } else {
                                                        $style = 'style' . $i;
                                                    }
                                                ?>
                                                    <!--tab list -->
                                                    <li data-tab="#<?php echo $tab_id_class; ?><?php echo $i; ?>" class="tab-btn <?php echo $active_class . ' ' . $style; ?>"><?php echo $item_tab_title; ?></li>

                                                <?php
                                                    $i++;
                                                } ?>
                                            </ul>
                                        </div>

                                        <div class="mission-vision-content-column-style2 clearfix">
                                            <div class="tabs-content">
                                                <?php
                                                $i = 1;
                                                foreach ($settings["items2"] as $item) {
                                                    $item_tab_title    = $item["item_tab_title"];
                                                    $item_description  = $item["item_description"];
                                                    $item_button_title = $item["item_button_title"];
                                                    $item_icon         = $item["item_icon"];
                                                    $item_url          = $item["item_url"]["url"];
                                                    $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                                                    $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';
                                                    $active_class      = '';
                                                    if ($i == 1) {
                                                        $active_class = 'active-tab';
                                                    }
                                                ?>
                                                    <div class="tab <?php echo $active_class; ?>" id="<?php echo $tab_id_class; ?><?php echo $i; ?>">
                                                        <div class="row clearfix">
                                                            <div class="col-xl-12">
                                                                <div class="mission-vision-tab-content-style2">
                                                                    <p><?php echo $item_description; ?> </p>
                                                                    <div class="btn-box">
                                                                        <a class="btn-one" href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>>
                                                                            <span class="txt"><?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true')); ?><?php echo $item_button_title; ?></span>
                                                                        </a>
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
                                    }
