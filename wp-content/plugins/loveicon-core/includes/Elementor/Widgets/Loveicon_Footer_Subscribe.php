<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Loveicon_Footer_Subscribe extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_footer_subscribe';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Footer Subscribe', 'loveicon-core');
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
            'title',
            [
                'label' => esc_html__('Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Subscribe', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Be the first one to receive latest updates.', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'short_code',
            [
                'label' => esc_html__('Short Code', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $title = $settings["title"];
        $heading = $settings["heading"];
        $short_code = $settings["short_code"];
?>

            <div class="single-footer-widget fixwidth martop pdtop40">
                <div class="title">
                    <h3><?php echo $title; ?></h3>
                </div>
                <div class="text">
                    <p><?php echo $heading; ?></p>
                </div>

                <?php echo do_shortcode($short_code); ?>
            </div>
<?php
    }
}