<?php
namespace Loveicon\Helper\Elementor\Widgets;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Recent_News extends Widget_Base
{

    public function get_name()
    {
        return 'recent_news';
    }

    public function get_title()
    {
        return esc_html__('Recent News', 'loveicon-core');
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
                'default' => __('Recent News', 'loveicon-core'),
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

        $repeater->add_control(
            'item_description',
            [
                'label' => esc_html__('Description', 'loveicon-core'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 6,
                'default' => __('Help with Global<br> Charity', 'loveicon-core'),
                'placeholder' => esc_html__('Type your description here', 'loveicon-core'),

            ]
        );

        $repeater->add_control(
            'item_date',
            [
                'label' => esc_html__('Date', 'loveicon-core'),
                'type' => Controls_Manager::TEXT,
                'default' => __('March 9, 2021', 'loveicon-core'),
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
        <!--Start Single Sidebar Box-->
        <div class="single-sidebar-box">
            <div class="sidebar-campaigns">
                <div class="title">
                    <h3><?php echo $title; ?></h3>
                </div>
                <ul class="recent-campaigns recent-news">

                    <?php
                    $i = 1;
                    foreach ($settings["items"] as $item) {

                        $item_image = ($item["item_image"]["id"] != "") ? wp_get_attachment_image($item["item_image"]["id"], "full") : $item["item_image"]["url"];
                        $item_image_alt = get_post_meta($item["item_image"]["id"], "_wp_attachment_image_alt", true);
                        $item_icon = $item["item_icon"];
                        $item_description = $item["item_description"];
                        $item_date = $item["item_date"];
                        $item_url = $item["item_url"]["url"];
                        $item_url_external = $item["item_url"]["is_external"] ? 'target="_blank"' : '';
                        $item_url_nofollow = $item["item_url"]["nofollow"] ? 'rel="nofollow"' : '';
                    ?> <li>
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
                                        <a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><?php \Elementor\Icons_Manager::render_icon(($item_icon), array('aria-hidden' => 'true')); ?></a>
                                    </div>
                                </div>
                                <div class="title-box">
                                    <h4><a href="<?php echo esc_url($item_url); ?>" <?php echo $item_url_external; ?> <?php echo $item_url_nofollow; ?>><?php echo $item_description; ?></a></h4>
                                    <p><?php echo $item_date; ?></p>
                                </div>
                            </div>
                        </li>
                    <?php $i++;
                    } ?>

                </ul>
            </div>
        </div>
<?php
    }
}