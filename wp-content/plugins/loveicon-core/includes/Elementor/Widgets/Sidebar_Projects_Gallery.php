<?php
namespace Loveicon\Helper\Elementor\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Sidebar_Projects_Gallery extends Widget_Base
{

    public function get_name()
    {
        return 'sidebar_projects_gallery';
    }

    public function get_title()
    {
        return esc_html__('Sidebar Projects Gallery', 'loveicon-core');
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
                'default' => __('Projects Gallery', 'loveicon-core'),
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
                'type' => Controls_Manager::ICONS,
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
        <!--Start Single Sidebar Box-->
        <div class="single-sidebar-box">
            <div class="projects-gallery-box">
                <div class="title">
                    <h3><?php echo $title; ?></h3>
                </div>
                <ul class="gallery">

                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {
                        $item_image     = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                        $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                        $item_image_url = ($item["item_image"]["id"] != "") ? wp_get_attachment_image_url($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                        $item_icon      = $item["item_icon"];
                    ?>
                        <li>
                            <div class="inner">
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
                                    <div class="overlay-content">
                                        <a class="lightbox-image" data-fancybox="gallery" href="<?php echo $item_image_url;?>">
                                            <span class="<?php echo $item_icon['value']; ?>"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                    } ?>
                </ul>
            </div>
        </div>
<?php
    }
}