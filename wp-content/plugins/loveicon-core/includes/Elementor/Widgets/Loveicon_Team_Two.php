<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Team_Two extends Widget_Base
{
    public function get_name()
    {
        return 'loveicon_team_two';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Team Two', 'loveicon');
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
            'item',
            [
                'label' => esc_html__('item', 'loveicon'),
            ]
        );

        $this->add_control(
            'col_style',
            [
                'label' => __('Column Style', 'plugin-domain'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'col-xl-4',
                'options' => [
                    'col-xl-6' => __('Two', 'plugin-domain'),
                    'col-xl-4' => __('Three', 'plugin-domain'),
                    'col-xl-3' => __('Four', 'plugin-domain'),
                ],
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
            'item_name',
            [
                'label' => esc_html__('Name', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Scott William', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_designation',
            [
                'label' => esc_html__('Designation', 'loveicon'),
                'type' => Controls_Manager::TEXT,
                'default' => __('CEO & Founder', 'loveicon'),
            ]
        );

        $repeater->add_control(
            'item_social_content',
            [
                'label' => esc_html__('Social Content', 'loveicon'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'loveicon'),
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
                'name'     => 'name_typography',
                'label'    => __('Name', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .single-team-style2 .title-holder h4',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'designation_typography',
                'label'    => __('Designation', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .single-team-style2 .title-holder p',
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
            'name_color',
            array(
                'label'     => __('Name Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .single-team-style2 .title-holder h4' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'designation_color',
            array(
                'label'     => __('Designation Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .single-team-style2 .title-holder p' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings  = $this->get_settings_for_display();
        $col_style = $settings['col_style'];
?>
        <!--Start Team Style2 Area-->
        <section class="team-style2-area">
            <div class="container">
                <div class="row">
                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_image = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                        $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                        $item_name = $item["item_name"];
                        $item_designation = $item["item_designation"];
                        $item_social_content = $item["item_social_content"];
                    ?>
                        <div class="<?php echo $col_style; ?> col-lg-4">
                            <div class="single-team-style2">
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
                                <div class="title-holder">
                                    <h4><?php echo $item_name; ?></h4>
                                    <p><?php echo $item_designation; ?></p>
                                    <ul class="social-icon">
                                        <?php echo $item_social_content; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    } ?>
                </div>
            </div>
        </section>
<?php
    }
}
