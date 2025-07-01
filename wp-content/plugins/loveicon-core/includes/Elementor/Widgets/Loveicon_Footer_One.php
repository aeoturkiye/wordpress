<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Loveicon_Footer_One extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_footer_one';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Footer One', 'loveicon-core');
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
            'logo',
            [
                'label' => esc_html__('Logo', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Excepteur sint occaecat cupidatat none proident sunt culpa officia deserunt mollit anim id est laborum luptatem.', 'loveicon-core'),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'loveicon-core'),
                'type' => Controls_Manager::ICONS,
            ]
        );


        $this->add_control(
            'support_box_content',
            [
                'label' => esc_html__('Support Box Content', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings            = $this->get_settings_for_display();
        $logo                = ($settings["logo"]["id"] != "") ? wp_get_attachment_image($settings["logo"]["id"], "full") : $settings["logo"]["url"];
        $logo_alt            = get_post_meta($settings["logo"]["id"], "_wp_attachment_image_alt", true);
        $description         = $settings["description"];
        $icon                = $settings["icon"];
        $support_box_content = $settings["support_box_content"];
?>
        <!--Start single footer widget-->
        
            <div class="single-footer-widget">
                <div class="our-company-info">
                    <div class="footer-logo">
                        <a href="index.html">
                            <?php
                            if (wp_http_validate_url($logo)) {
                            ?>
                                <img src="<?php echo esc_url($logo); ?>" alt="<?php esc_url($logo_alt); ?>">
                            <?php
                            } else {
                                echo $logo;
                            }
                            ?></a>
                    </div>
                    <div class="text-box">
                        <p><?php echo $description; ?></p>
                    </div>

                    <div class="footer-contact-info">
                        <div class="icon">
                            <span class="<?php echo $icon['value']; ?>"></span>
                        </div>
                        <div class="support-box">
                            <?php echo $support_box_content; ?>
                        </div>
                    </div>

                </div>
            </div>
<?php
    }
}