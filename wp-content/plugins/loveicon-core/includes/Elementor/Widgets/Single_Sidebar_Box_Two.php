<?php
namespace Loveicon\Helper\Elementor\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Single_Sidebar_Box_Two extends Widget_Base
{

    public function get_name()
    {
        return 'single_sidebar_box_two';
    }

    public function get_title()
    {
        return esc_html__('Single Sidebar Box Two', 'loveicon-core');
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
            'bg_image',
            [
                'label' => esc_html__('BG Image', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

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
            'tag_line',
            [
                'label' => esc_html__('Tag Line', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Small Donations Bigger Impact', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Education Health<br>for Every Child', 'loveicon-core'),
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
            'button_title',
            [
                'label' => esc_html__('Button Title', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('donate now', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'url',
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

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings     = $this->get_settings_for_display();
        $bg_image     = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
        $bg_image_alt = get_post_meta($settings["bg_image"]["id"], "_wp_attachment_image_alt", true);
        $image        = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
        $image_alt    = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
        $logo         = ($settings["logo"]["id"] != "") ? wp_get_attachment_image($settings["logo"]["id"], "full") : $settings["logo"]["url"];
        $logo_alt     = get_post_meta($settings["logo"]["id"], "_wp_attachment_image_alt", true);
        $tag_line     = $settings["tag_line"];
        $title        = $settings["title"];
        $icon         = $settings["icon"];
        $button_title = $settings["button_title"];
        $url          = $settings["url"]["url"];
        $url_external = $settings["url"]["is_external"] ? 'target="_blank"' : '';
        $url_nofollow = $settings["url"]["nofollow"] ? 'rel="nofollow"' : '';
?>
        <!--Start Single Sidebar Box-->
        <div class="single-sidebar-box">
            <div class="sidebar-slogan-box" style="background-image: url(<?php echo $bg_image; ?>);">
                <div class="icon">
                    <?php
                    if (wp_http_validate_url($logo)) {
                    ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php esc_url($logo_alt); ?>">
                    <?php
                    } else {
                        echo $logo;
                    }
                    ?>
                </div>
                <p><?php echo $tag_line; ?></p>
                <h2><?php echo $title; ?></h2>
                <div class="btn-box">
                    <div class="hand">
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
                    <a class="btn-one" href="<?php echo esc_url($url); ?>" <?php echo $url_external; ?> <?php echo $url_nofollow; ?>>
                        <span class="txt"><?php \Elementor\Icons_Manager::render_icon(($icon), array('aria-hidden' => 'true')); ?><?php echo $button_title; ?></span>
                    </a>
                </div>
            </div>
        </div>
<?php
    }
}