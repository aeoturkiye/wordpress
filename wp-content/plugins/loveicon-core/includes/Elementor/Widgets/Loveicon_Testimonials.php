<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Testimonials extends Widget_Base
{
    public function get_name()
    {
        return 'loveicon_testimonials';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Testimonials', 'loveicon');
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

                ],
                'default' => 'style_1',
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
                            'value' => 'style_1'
                        ],
                    ]
                ]
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__(' Image', 'loveicon'),
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
            'tagline',
            [
                'label' => esc_html__('Tag Line', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('We Change Your Life &amp; World', 'loveicon'),
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
                'label' => esc_html__('Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Testimonials', 'loveicon'),
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
                'label' => esc_html__('Name', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Johnny Thomas', 'loveicon'),
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
            'item_heading',
            [
                'label' => esc_html__('Heading', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Power to create opportunities', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Nori grape silver beet broccoli kombu beet greens parsley bean potato quandong celery. Bunya nuts black-eyed pea prairie jícama turnip leek lentil turnip greens parsnip salsify sea.', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_address',
            [
                'label' => esc_html__('Address', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('California, USA', 'loveicon'),
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
                    ]
                ]
            ]
        );

        $repeater2 = new Repeater();

        $repeater2->add_control(
            'item_designation',
            [
                'label' => esc_html__('Designation', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Founder of CEO', 'loveicon'),
            ]
        );
        $repeater2->add_control(
            'item_name',
            [
                'label' => esc_html__('Name', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Mr. Jems Bond', 'loveicon'),
            ]
        );

        $repeater2->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('“Praesent scelerisque, odio euferm ntum malesuada, nisi arcu vlutpat nisl, sit amet convallis nunc turpis eget eros.Praesent scelerisque, dio eu ferme ntum malesuada, nisi arcu volutpat.”', 'loveicon'),
            ]
        );

        $repeater2->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon', 'loveicon-core'),
                'type' => Controls_Manager::ICONS,
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
                'name'     => 'tagline_typography',
                'label'    => __('Tag Line', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'heading_typography',
                'label'    => __('Heading', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .single-testimonial-style1 .text-holder .text h3,{{WRAPPER}} .sec-title h2',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'description_typography',
                'label'    => __('Description ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .single-testimonial-style1 .text-holder .text',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'name_typography',
                'label'    => __('Name ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .single-testimonial-style1 .text-holder .client-info h4,{{WRAPPER}} .single-testimonial-style2 .client-info .client_name span',
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
                'label'     => __('Tag Line Color', 'loveicon-core'),
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
                    '{{WRAPPER}} .single-testimonial-style1 .text-holder .text h3' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'name_color',
            array(
                'label'     => __('Name Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .single-testimonial-style1 .text-holder .client-info h4' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .single-testimonial-style2 .client-info .client_name span' => 'color: {{VALUE}}',
                ),
            )
        );
        $this->end_controls_section();
    }
    protected function render()
    {
        $settings     = $this->get_settings_for_display();
        $layout_style = $settings['layout_style'];
        if ($layout_style == 'style_1') {
            $bg_image = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
?>
            <!--Start Testimonial style1 Area-->
            <section class="testimonial-style1-area">
                <div class="testimonial-style1-area_bg" style="background-image: url(<?php echo $bg_image; ?>);"></div>
                <div class="container">
                    <div class="testimonial-style1-content">
                        <div class="testimonial-style1_carousel owl-carousel owl-theme">
                            <!--Start Single Testimonial Style1-->
                            <?php
                            $i = 1;
                            foreach ($settings["items"] as $item) {
                                $item_title       = $item["item_title"];
                                $item_image       = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                                $item_image_alt   = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                                $item_heading     = $item["item_heading"];
                                $item_description = $item["item_description"];
                                $item_address     = $item["item_address"];
                            ?>
                                <div class="single-testimonial-style1">
                                    <div class="img-holder">
                                        <div class="inner">
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
                                    <div class="text-holder">
                                        <div class="quote">
                                            <span class="flaticon-right-quotes-symbol"></span>
                                        </div>
                                        <div class="text">
                                            <h3><?php echo $item_heading; ?></h3>
                                            <?php echo $item_description; ?>
                                        </div>
                                        <div class="client-info">
                                            <h4><?php echo $item_title; ?></h4>
                                            <span><?php echo $item_address; ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $i++;
                            }
                            ?>
                            <!--End Single Testimonial Style1-->
                        </div>
                    </div>
                </div>
            </section>
            <!--End Testimonial Style1 Area-->
        <?php } elseif ($layout_style == 'style_2') {
            $image     = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
            $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
            $tagline   = $settings['tagline'];
            $heading   = $settings['heading'];
        ?>
            <!--Start Testimonial page One-->
            <section class="testimonial-page-one">
                <div class="container">
                    <div class="sec-title text-center">
                        <div class="sub-title">
                            <div class="inner">
                                <h3><?php echo $tagline; ?></h3>
                            </div>
                            <div class="outer">
                                <?php
                                if (wp_http_validate_url($image)) {
                                ?>
                                    <img src="<?php echo esc_url($image); ?>" alt="<?php esc_url($image); ?>">
                                <?php
                                } else {
                                    echo $image;
                                }
                                ?>
                            </div>
                        </div>
                        <h2><?php echo $heading; ?></h2>
                    </div>
                    <div class="row text-right-rtl">
                        <!--Start Single Testimonial Style2-->
                        <?php
                        $i = 1;
                        foreach ($settings["items2"] as $item) {

                            $item_description = $item["item_description"];
                            $item_icon        = $item["item_icon"];
                            $item_designation = $item["item_designation"];
                            $item_name        = $item["item_name"];
                        ?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-testimonial-style2">
                                    <div class="text-holder">
                                        <p><?php echo $item_description; ?></p>
                                    </div>
                                    <div class="client-info">
                                        <div class="quote_icon bgclr1">
                                            <span class="<?php echo $item_icon['value']; ?>"></span>
                                        </div>
                                        <div class="client_name">
                                            <h5><?php echo $item_designation; ?></h5>
                                            <span><?php echo $item_name; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Single Testimonial Style2-->
                        <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </section>
<?php }
    }
}
