<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Loveicon_Footer_About extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_footer_about';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Footer About', 'loveicon-core');
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
                'default' => __('About Us', 'loveicon-core'),
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
                'default' => __('Where We Work', 'loveicon-core'),
            ]
        );

        $repeater->add_control(
            'item_url',
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
    }
    protected function render()
    {
        $settings =  $this->get_settings_for_display();
        $title = $settings["title"];
?>
        <div class="col-xl-2 col-lg-4 col-md-3 col-sm-12 wow animated fadeInUp" data-wow-delay="0.5s">
            <div class="single-footer-widget martop">
                <div class="title">
                    <h3><?php echo $title; ?></h3>
                </div>
                <ul class="footer-widget-links1">
                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_title = $item["item_title"];
                        $item_url = $item["item_url"]["url"];
                        $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                        $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';
                    ?>
                        <li><a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><?php echo $item_title; ?></a></li>
                    <?php $i++;
                    } ?>

                </ul>
            </div>
        </div>
<?php
    }
}