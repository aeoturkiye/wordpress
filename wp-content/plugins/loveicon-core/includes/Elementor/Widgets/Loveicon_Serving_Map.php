<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Serving_Map extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_serving_map';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Serving Map', 'loveicon-core ');
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
                'label' => esc_html__('general', 'loveicon-core '),
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
            'tag_line',
            [
                'label' => esc_html__('Tag Line', 'loveicon-core '),
                'type' => Controls_Manager::TEXT,
                'default' => __('We Change Your Life &amp; World', 'loveicon-core '),
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
                'label' => esc_html__('Heading', 'loveicon-core '),
                'type' => Controls_Manager::TEXT,
                'default' => __('Serving Everywhere', 'loveicon-core '),
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
            'image_one',
            [
                'label' => esc_html__('Image One', 'loveicon-core '),
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
            'image_two',
            [
                'label' => esc_html__('Image Two', 'loveicon-core '),
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
            'shape_one',
            [
                'label' => esc_html__('Shape One', 'loveicon-core '),
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
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'shape_two',
            [
                'label' => esc_html__('Shape Two', 'loveicon-core '),
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
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'shape_three',
            [
                'label' => esc_html__('Shape Three', 'loveicon-core '),
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
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'shape_four',
            [
                'label' => esc_html__('Shape Four', 'loveicon-core '),
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
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'loveicon-core '),
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


        $this->end_controls_section();

        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('item', 'loveicon-core '),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'extra_class',
            [
                'label' => esc_html__('Extra Class', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
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
            'item_content',
            [
                'label' => esc_html__('Content', 'loveicon-core '),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Syrian Refugee Crises<br>Food & Health Program', 'loveicon-core '),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core '),
            ]
        );
		$repeater->add_control(
			'posx',
			array(
				'label'      => __( 'Horizontal Position', 'plugin-domain' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px' => array(
						'min'  => -200,
						'max'  => 1200,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} ' => 'left: {{SIZE}}{{UNIT}} !important;',
				),
			)
		);
		$repeater->add_control(
			'posy',
			array(
				'label'      => __( 'Vertical Position', 'plugin-domain' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => array( 'px', '%' ),
				'range'      => array(
					'px' => array(
						'min'  => -150,
						'max'  => 400,
						'step' => 1,
					),
					'%'  => array(
						'min' => 0,
						'max' => 100,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} {{CURRENT_ITEM}} ' => 'top: {{SIZE}}{{UNIT}} !important;',
				),
			)
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
        $settings        = $this->get_settings_for_display();
        $layout_style    = $settings['layout_style'];
        $shape_one       = ($settings["shape_one"]["id"] != "") ? wp_get_attachment_image($settings["shape_one"]["id"], "full") : $settings["shape_one"]["url"];
        $shape_one_alt   = get_post_meta($settings["shape_one"]["id"], "_wp_attachment_image_alt", true);
        $shape_two       = ($settings["shape_two"]["id"] != "") ? wp_get_attachment_image($settings["shape_two"]["id"], "full") : $settings["shape_two"]["url"];
        $shape_two_alt   = get_post_meta($settings["shape_two"]["id"], "_wp_attachment_image_alt", true);
        $shape_three     = ($settings["shape_three"]["id"] != "") ? wp_get_attachment_image($settings["shape_three"]["id"], "full") : $settings["shape_three"]["url"];
        $shape_three_alt = get_post_meta($settings["shape_three"]["id"], "_wp_attachment_image_alt", true);
        $shape_four      = ($settings["shape_four"]["id"] != "") ? wp_get_attachment_image($settings["shape_four"]["id"], "full") : $settings["shape_four"]["url"];
        $shape_four_alt  = get_post_meta($settings["shape_four"]["id"], "_wp_attachment_image_alt", true);
?>

        <?php if ($layout_style == 'style_1') {

            $bg_image        = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
            $image           = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
            $image_alt       = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
        ?>
            <section class="serving-map-area serving-map-area-style2">
                <div class="serving-map-area-style2_bg" style="background-image: url(<?php echo $bg_image; ?>);"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="serving-map_content">
                                <div class="shape1 zoom-fade">
                                    <?php
                                    if (wp_http_validate_url($shape_one)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_one); ?>" alt="<?php esc_url($shape_one_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_one;
                                    }
                                    ?>
                                </div>
                                <div class="shape2 zoominout">
                                    <?php
                                    if (wp_http_validate_url($shape_two)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_two); ?>" alt="<?php esc_url($shape_two_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_two;
                                    }
                                    ?>
                                </div>
                                <div class="shape3 float-bob">
                                    <?php
                                    if (wp_http_validate_url($shape_three)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_three); ?>" alt="<?php esc_url($shape_three_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_three;
                                    }
                                    ?>
                                </div>
                                <div class="shape4 footertree">
                                    <?php
                                    if (wp_http_validate_url($shape_four)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_four); ?>" alt="<?php esc_url($shape_four_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_four;
                                    }
                                    ?>
                                </div>
                                <div class="inner-map-box">
                                    <?php
                                    if (wp_http_validate_url($image)) {
                                    ?>
                                        <img src="<?php echo esc_url($image); ?>" alt="<?php esc_url($image_alt); ?>">
                                    <?php
                                    } else {
                                        echo $image;
                                    }
                                    ?>
                                    <?php
                                    $i = 1;
                                    foreach ($settings["items"] as $item) {
                                        $extra_class    = $item['extra_class'];
                                        $section_class  = $extra_class ?? ' ';
                                        $item_image     = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                                        $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                                        $item_content   = $item["item_content"];
                                    ?>
                                        <div class="single-serving-box <?php echo $section_class; ?> <?php echo 'elementor-repeater-item-' . $item['_id']; ?> ">
                                            <div class="content">
                                                <div class="img-box">
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
                                                <div class="text-box">
                                                    <p><?php echo $item_content; ?></p>
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
            </section>
        <?php
        }
        if ($layout_style == 'style_2') {
            $image_one     = ($settings["image_one"]["id"] != "") ? wp_get_attachment_image($settings["image_one"]["id"], "full") : $settings["image_one"]["url"];
            $image_one_alt = get_post_meta($settings["image_one"]["id"], "_wp_attachment_image_alt", true);
            $image_two     = ($settings["image_two"]["id"] != "") ? wp_get_attachment_image($settings["image_two"]["id"], "full") : $settings["image_two"]["url"];
            $image_two_alt = get_post_meta($settings["image_two"]["id"], "_wp_attachment_image_alt", true);
            $tag_line      = $settings["tag_line"];
            $heading       = $settings["heading"];
        ?>
            <section class="serving-map-area">
                <div class="container">
                    <div class="sec-title text-center">
                        <div class="sub-title">
                            <div class="inner">
                                <h3><?php echo $tag_line; ?></h3>
                            </div>
                            <div class="outer">
                                <?php
                                if (wp_http_validate_url($image_one)) {
                                ?>
                                    <img src="<?php echo esc_url($image_one); ?>" alt="<?php esc_url($image_one_alt); ?>">
                                <?php
                                } else {
                                    echo $image_one;
                                }
                                ?>
                            </div>
                        </div>
                        <h2><?php echo $heading; ?></h2>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="serving-map_content">
                                <div class="shape1 zoom-fade">
                                    <?php
                                    if (wp_http_validate_url($shape_one)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_one); ?>" alt="<?php esc_url($shape_one_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_one;
                                    }
                                    ?>
                                </div>
                                <div class="shape2 zoominout">
                                    <?php
                                    if (wp_http_validate_url($shape_two)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_two); ?>" alt="<?php esc_url($shape_two_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_two;
                                    }
                                    ?>
                                </div>
                                <div class="shape3 float-bob">
                                    <?php
                                    if (wp_http_validate_url($shape_three)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_three); ?>" alt="<?php esc_url($shape_three_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_three;
                                    }
                                    ?>
                                </div>
                                <div class="shape4 footertree">
                                    <?php
                                    if (wp_http_validate_url($shape_four)) {
                                    ?>
                                        <img src="<?php echo esc_url($shape_four); ?>" alt="<?php esc_url($shape_four_alt); ?>">
                                    <?php
                                    } else {
                                        echo $shape_four;
                                    }
                                    ?>
                                </div>
                                <div class="inner-map-box">
                                    <?php
                                    if (wp_http_validate_url($image_two)) {
                                    ?>
                                        <img src="<?php echo esc_url($image_two); ?>" alt="<?php esc_url($image_two_alt); ?>">
                                    <?php
                                    } else {
                                        echo $image_two;
                                    }
                                    ?>
                                    <?php
                                    $i = 1;
                                    foreach ($settings["items"] as $item) {
                                        $extra_class    = $item['extra_class'];
                                        $section_class  = $extra_class ?? ' ';
                                        $item_image = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                                        $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                                        $item_content = $item["item_content"];
                                    ?>
                                        <div class="single-serving-box <?php echo $section_class; ?>">
                                            <div class="content">
                                                <div class="img-box">
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
                                                <div class="text-box">
                                                    <p><?php echo $item_content; ?></p>
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
            </section>
<?php
        }
    }
}
