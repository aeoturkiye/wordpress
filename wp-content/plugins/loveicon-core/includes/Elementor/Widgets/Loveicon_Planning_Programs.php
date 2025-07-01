<?php
namespace Loveicon\Helper\Elementor\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Loveicon_Planning_Programs extends Widget_Base
{

    public function get_name()
    {
        return 'loveicon_planning_programs';
    }

    public function get_title()
    {
        return esc_html__('Loveicon Planning Programs', 'loveicon-core');
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
                'label' => esc_html__('BG Image ', 'loveicon-core'),
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
            'tag_line',
            [
                'label' => esc_html__('Tag Line', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('We Change Your Life &amp; World', 'loveicon-core'),
            ]
        );

        $this->add_control(
            'heading',
            [
                'label' => esc_html__('Heading', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Planning & Programs', 'loveicon-core'),
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
                'default' => __('Climate Action', 'loveicon-core'),
            ]
        );

        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Nostrud tem exrcitation duis<br>nisi ut aliquip cupidata.', 'loveicon-core'),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),

            ]
        );

        $repeater->add_control(
            'item_image',
            [
                'label' => esc_html__('Image', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'item_icon',
            [
                'label' => esc_html__('Icon', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $repeater->add_control(
            'item_overlay_image',
            [
                'label' => esc_html__('Overlay Image', 'loveicon-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],

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
        $bg_image = ($settings["bg_image"]["id"] != "") ? wp_get_attachment_image_url($settings["bg_image"]["id"], "full") : $settings["bg_image"]["url"];
        $bg_image_alt = get_post_meta($settings["bg_image"]["id"], "_wp_attachment_image_alt", true);
        $image = ($settings["image"]["id"] != "") ? wp_get_attachment_image($settings["image"]["id"], "full") : $settings["image"]["url"];
        $image_alt = get_post_meta($settings["image"]["id"], "_wp_attachment_image_alt", true);
        $tag_line = $settings["tag_line"];
        $heading = $settings["heading"];
?>
        <!--Start Planning Programs Area-->
        <section class="planning-programs-area">
            <div class="planning-programs-area_bg" style="background-image: url(<?php echo $bg_image;?>);"></div>
            <div class="container">
                <div class="sec-title text-center">
                    <div class="sub-title">
                        <div class="inner">
                            <h3><?php echo $tag_line; ?></h3>
                        </div>
                        <div class="outer">
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
                    </div>
                    <h2><?php echo $heading; ?></h2>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="theme_carousel planning-programs-carousel owl-nav-style-one owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "4" }}}'>
                            <?php
                            $i = 1;
                            foreach ($settings["items"] as $item) {
                                $item_title             = $item["item_title"];
                                $item_description       = $item["item_description"];
                                $item_image             = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                                $item_image_alt         = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                                $item_icon              = ($item["item_icon"]["id"] != "") ? wp_get_attachment_image($item["item_icon"]["id"], "full") : $item["item_icon"]["url"];
                                $item_icon_alt          = get_post_meta($item["item_icon"]["id"], "_wp_attachment_image_alt", true);
                                $item_overlay_image     = ($item["item_overlay_image"]["id"] != "") ? wp_get_attachment_image($item["item_overlay_image"]["id"], "full") : $item["item_overlay_image"]["url"];
                                $item_overlay_image_alt = get_post_meta($item["item_overlay_image"]["id"], "_wp_attachment_image_alt", true);
                                $item_url               = $item["item_url"]["url"];
                                $item_url_external      = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                                $item_url_nofollow      = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';
                            ?>
                                <div class="single-planning-programs">
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
                                            <div class="icon-box">
                                                <?php
                                                if (wp_http_validate_url($item_icon)) {
                                                ?>
                                                    <img src="<?php echo esc_url($item_icon); ?>" alt="<?php esc_url($item_icon_alt); ?>">
                                                <?php
                                                } else {
                                                    echo $item_icon;
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="overlay">
                                            <?php
                                            if (wp_http_validate_url($item_overlay_image)) {
                                            ?>
                                                <img src="<?php echo esc_url($item_overlay_image); ?>" alt="<?php esc_url($item_overlay_image_alt); ?>">
                                            <?php
                                            } else {
                                                echo $item_overlay_image;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="text-holder">
                                        <h2><a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><?php echo $item_title; ?></a></h2>
                                        <p><?php echo $item_description; ?></p>
                                    </div>
                                </div>
                            <?php $i++;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
    }
}