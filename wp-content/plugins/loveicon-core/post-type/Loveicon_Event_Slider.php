<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
/** 
 * Elementor LoveIcon_Event_Slider feature_section_two feature
 * @since 1.0.0
 */
class LoveIcon_Event_Slider extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'LoveIcon_Event_Slider';
    }
    public function get_title()
    {
        return esc_html__('Event Slider', 'plugin-name');
    }
    public function get_icon()
    {
        return 'sds-widget-ico';
    }
    public function get_categories()
    {
        return ['loveicon-core'];
    }
    public function get_script_depends()
    {
        return array('loveicon-cause-slider');
    }
    protected function register_controls()
    {
        $this->start_controls_section(
            'section_design_area',
            [
                'label' => esc_html__('section design', 'loveicon-core'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'event_desing_list',
            array(
                'label'   => esc_html__('Select Layout', 'loveicon-core'),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'style_1'  => esc_html__('Style 1', 'loveicon-core'),
                    'style_2'  => esc_html__('Style 2', 'loveicon-core'),
                ),
                'default' => esc_html__('style_1', 'loveicon-core'),
            )
        );
        $this->add_control(
            'section_title',
            array(
                'label'   => esc_html__('title', 'loveicon-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
            )
        );
        $this->add_control(
            'section_sub_title',
            array(
                'label'   => esc_html__('sub title', 'loveicon-core'),
                'type'    => \Elementor\Controls_Manager::TEXT,
            )
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'section_bg',
                'label' => __('Background', 'loveicon-core'),
                'types' => ['classic'],
                'selector' => '{{WRAPPER}} .event-style1_image-box',
            ]
        );
        $this->add_control(
            'section_icon',
            array(
                'label'      => esc_html__('section icon', 'goodsoul-core'),
                'type'       => \Elementor\Controls_Manager::MEDIA,
                'default'    => array(
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ),
            )
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
                'name'     => 'title_typography',
                'label'    => __('Title', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .sec-title h2',
            )
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'sub_title_typography',
                'label'    => __('Sub Title ', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
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
            'title_color',
            array(
                'label'     => __('Title Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'sub_title_color',
            array(
                'label'     => __('Sub Title Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .sec-title .sub-title .inner h3' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'button_hover_color',
            array(
                'label'     => __(' Arrow Button Hover Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .event-style1-area .owl-nav-style-one.owl-theme .owl-nav .owl-prev:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .event-style1-area .owl-nav-style-one.owl-theme .owl-nav .owl-next:hover' => 'background: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_section();
    }
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        global $post;
        $section_title     = $settings['section_title'];
        $event_desing_list = $settings['event_desing_list'];
        $section_sub_title = $settings['section_sub_title'];
        $section_icon      = ($settings['section_icon']['id'] != '') ? wp_get_attachment_image_url($settings['section_icon']['id'], 'full') : $settings['section_icon']['url'];

        $pg_num = max(1, (int) filter_input(INPUT_GET, 'pageid'));
        $events_args = array(
            'post_status'    => 'publish',
            'post_type'      => array(Tribe__Events__Main::POSTTYPE),
            'posts_per_page' => 2,
            // order by startdate from newest to oldest
            'meta_key'       => '_EventStartDate',
            // required in 3.x
            'eventDisplay'   => 'custom',
            'paged' => $pg_num,
        );
        $events_query = new WP_Query($events_args);


        $time_format = get_option('time_format', Tribe__Date_Utils::TIMEFORMAT);
        $time_range_separator = tribe_get_option('timeRangeSeparator', ' - ');
        $start_time           = tribe_get_start_date(null, false, $time_format);
        $end_time             = tribe_get_end_date(null, false, $time_format);
        $time_formatted = null;

        if ($start_time == $end_time) {
            $time_formatted = esc_html($start_time);
        } else {
            $time_formatted = esc_html($start_time . $time_range_separator . $end_time);
        }

        $event_desing_class     = 'event-style1-area';
        $event_desing_box_class = '';
        if ($event_desing_list == 'style_2') :
            $event_desing_class     = 'event-style2-area';
            $event_desing_box_class = 'event-style2_content-box';
        endif;

?>
        <section class="event-style1-area <?php echo esc_attr($event_desing_class); ?>">
            <div class="custom-container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="event-style1_image-box">
                            <?php if ($section_icon) : ?>
                                <div class="shape"><img class="zoom-fade" src="<?php echo esc_url($section_icon); ?>" alt="logo"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="event-style1_content-box  <?php echo esc_attr($event_desing_box_class); ?>">
                            <div class="sec-title text-right-rtl">
                                <div class="sub-title martop0">
                                    <div class="inner">
                                        <h3><?php echo wp_kses_post($section_title); ?></h3>
                                    </div>
                                </div>
                                <h2><?php echo wp_kses_post($section_sub_title); ?></h2>
                            </div>
                            <?php if ($events_query->have_posts()) { ?>
                                <div class="inner-content text-right-rtl">
                                    <div class="event-style1-carousel owl-carousel owl-theme owl-nav-style-one">
                                        <?php
                                        while ($events_query->have_posts()) {
                                            $events_query->the_post();
                                        ?>
                                            <div class="single-event-style1">
                                                <div class="date-box">
                                                    <div class="left">
                                                        <h2><?php echo tribe_get_start_date($post->ID, false, 'j'); ?></h2>
                                                    </div>
                                                    <div class="right">
                                                        <h3><?php echo tribe_get_start_date($post->ID, false, 'F'); ?></h3>
                                                    </div>
                                                </div>
                                                <div class="meta-info">
                                                    <p>Organized By: <a href="<?php echo esc_url(the_permalink()); ?>"><?php echo tribe_get_organizer($post->ID); ?></a></p>
                                                </div>
                                                <div class="title">
                                                    <h2><a href="<?php echo esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h2>
                                                </div>
                                                <div class="border-box"></div>
                                                <div class="event-time">
                                                    <div class="icon">
                                                        <span class="flaticon-clock"></span>
                                                    </div>
                                                    <div class="text">
                                                        <p><?php echo tribe_get_start_date($post->ID, false, 'H:ia'); ?> - <?php echo tribe_get_address(); ?>, <?php echo tribe_get_city(); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            <?php wp_reset_postdata();
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \LoveIcon_Event_Slider());
