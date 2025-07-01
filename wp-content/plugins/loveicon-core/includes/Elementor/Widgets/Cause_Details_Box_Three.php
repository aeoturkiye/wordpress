<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Cause_Details_Box_Three extends Widget_Base
{

    public function get_name()
    {
        return 'cause_details_box_three';
    }

    public function get_title()
    {
        return esc_html__('Cause Details Box Three', 'loveicon-core');
    }

    public function get_icon()
    {
        return 'sds-widget-ico';
    }

    public function get_categories()
    {
        return ['loveicon'];
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
            'heading',
            [
                'label' => esc_html__('Heading', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Why Donate with LoveIcon', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Nostrud tem exrcitation duis laboris nisi ut aliquip sedy duis aut cupidata proident sunt culpa.
                Consectetur adipisicing elit sed do eiusmod tempor incididunt.', 'loveicon-core'),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
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

        $this->end_controls_section();

        $this->start_controls_section(
            'item',
            [
                'label' => esc_html__('item', 'loveicon-core'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'item_title',
            [
                'label' => esc_html__('Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('A Real Change', 'loveicon-core'),
            ]
        );

        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Nostrud fact aliquip exrcation nisiut temp sed dui auty.', 'loveicon-core'),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),

            ]
        );

        $repeater->add_control(
            'item_icon_one',
            [
                'label' => esc_html__('Icon One', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'item_icon_two',
            [
                'label' => esc_html__('Icon Two', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'items',
            [
                'label' => esc_html__('Repeater List', 'loveicon-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__('Title #1', 'loveicon-core'),
                        'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
                    ],
                    [
                        'list_title' => esc_html__('Title #2', 'loveicon-core'),
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
                'name'     => 'heading_typography',
                'label'    => __('Heading ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .cause-details-title h3',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'title_typography',
                'label'    => __('Title', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .cause-details-featured-box .single-box .text h3',
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
                'label'     => __('Heading', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .cause-details-title h3' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .cause-details-featured-box .single-box .text h3' => 'color: {{VALUE}}!important',
                ),
            )
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings    = $this->get_settings_for_display();
        $heading     = $settings["heading"];
        $description = $settings["description"];
        $shape       = ($settings["shape"]["id"] != "") ? wp_get_attachment_image($settings["shape"]["id"], "full") : $settings["shape"]["url"];
        $shape_alt   = get_post_meta($settings["shape"]["id"], "_wp_attachment_image_alt", true);
?>
        <div class="cause-details-text-box-3">
            <div class="cause-details-title">
                <h3><?php echo $heading; ?></h3>
                <div class="cause-details-title-shape wow zoomIn" data-wow-duration="2000ms">
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
            </div>
            <p>
                <?php echo $description; ?>
            </p>
            <div class="cause-details-featured-box">
                <div class="row">

                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_title        = $item["item_title"];
                        $item_description  = $item["item_description"];
                        $item_icon_one     = ($item["item_icon_one"]["id"] != "") ? wp_get_attachment_image($item["item_icon_one"]["id"], "full") : $item["item_icon_one"]["url"];
                        $item_icon_one_alt = get_post_meta($item["item_icon_one"]["id"], "_wp_attachment_image_alt", true);
                        $item_icon_two     = ($item["item_icon_two"]["id"] != "") ? wp_get_attachment_image($item["item_icon_two"]["id"], "full") : $item["item_icon_two"]["url"];
                        $item_icon_two_alt = get_post_meta($item["item_icon_two"]["id"], "_wp_attachment_image_alt", true);
                    ?>
                        <div class="col-xl-6">
                            <div class="single-box">
                                <div class="icon">
                                    <?php
                                    if (wp_http_validate_url($item_icon_one)) {
                                    ?>
                                        <img src="<?php echo esc_url($item_icon_one); ?>" alt="<?php esc_url($item_icon_one_alt); ?>">
                                    <?php
                                    } else {
                                        echo $item_icon_one;
                                    }
                                    ?>
                                    <div class="icon-bg">
                                        <?php
                                        if (wp_http_validate_url($item_icon_two)) {
                                        ?>
                                            <img src="<?php echo esc_url($item_icon_two); ?>" alt="<?php esc_url($item_icon_two_alt); ?>">
                                        <?php
                                        } else {
                                            echo $item_icon_two;
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="text">
                                    <h3><?php echo $item_title; ?></h3>
                                    <p><?php echo $item_description; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    } ?>
                </div>
            </div>
        </div>
<?php
    }
}
