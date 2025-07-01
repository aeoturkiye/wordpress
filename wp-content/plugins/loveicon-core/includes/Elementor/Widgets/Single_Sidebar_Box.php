<?php
namespace Loveicon\Helper\Elementor\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;

class Single_Sidebar_Box extends Widget_Base
{

    public function get_name()
    {
        return 'single_sidebar_box';
    }

    public function get_title()
    {
        return esc_html__('Single Sidebar Box', 'loveicon-core');
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
            'image',
            [
                'label' => esc_html__('Image', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );


        $this->add_control(
            'name',
            [
                'label' => esc_html__('Name', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Saima Hayden', 'loveicon-core'),
            ]
        );


        $this->add_control(
            'description_one',
            [
                'label' => esc_html__('Description One', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Nostrud aliquip exrcitation laboris<br>nisiut temp duis autey. Lorem unt<br>ipsum sit amet elit dolor.', 'loveicon-core'),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),

            ]
        );


        $this->add_control(
            'description_two',
            [
                'label' => esc_html__('Description Two', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
            ]
        );


        $this->end_controls_section();
    }
    protected function render()
    {
        $settings        = $this->get_settings_for_display();
        $image           = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
        $image_alt       = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
        $name            = $settings["name"];
        $description_one = $settings["description_one"];
        $description_two = $settings["description_two"];
?>
        <!--Start Single Sidebar Box-->
        <div class="single-sidebar-box">
            <div class="sidebar-author-box text-center">
                <div class="img-holder">
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
                <div class="title-holder">
                    <h3><?php echo $name; ?></h3>
                    <p><?php echo $description_one; ?></p>
                </div>
                <ul class="social-links">
                    <?php echo $description_two; ?>
                </ul>
            </div>
        </div>
<?php
    }
}