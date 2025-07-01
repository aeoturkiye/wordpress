<?php
/** 
 * Elementor Loveicon_Event_List feature_section_two feature
 * @since 1.0.0
*/
class Loveicon_Event_List extends \Elementor\Widget_Base {
    public function get_name() {
        return 'Loveicon_Event_List';
    }
    public function get_title(){
        return esc_html__( 'Event list', 'plugin-name' );
    }
    public function get_icon(){
        return 'sds-widget-ico';
    }
    public function get_categories(){
        return [ 'loveicon-core' ];
    }
    protected function register_controls() {
        $this->start_controls_section(
            'section_design_area',
            [
                'label' => esc_html__( 'section design', 'loveicon-core' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->end_controls_section();

    }
    protected function render() {
        $settings = $this->get_settings_for_display();
		global $post;

        $pg_num = max(1, (int) filter_input(INPUT_GET, 'pageid'));
        $events_args = array(
			'post_status'    => 'publish',
			'post_type'      => array( Tribe__Events__Main::POSTTYPE ),
			'posts_per_page' => 6,
			// order by startdate from newest to oldest
			'meta_key'       => '_EventStartDate',
			// required in 3.x
			'eventDisplay'   => 'custom',
            'paged' => $pg_num,
		);
        $events_query = new WP_Query( $events_args );

		
        $time_format = get_option('time_format', Tribe__Date_Utils::TIMEFORMAT);
        $time_range_separator = tribe_get_option('timeRangeSeparator', ' - ');
        $start_time = tribe_get_start_date(null, false, $time_format);
        $end_time = tribe_get_end_date(null, false, $time_format);
        $time_formatted = null;

        if ($start_time == $end_time) {
            $time_formatted = esc_html($start_time);
        } else {
            $time_formatted = esc_html($start_time . $time_range_separator . $end_time);
        }

 

    ?>
        <?php if ($events_query->have_posts()) { ?>
            <section class="event-page-one">
                <div class="container">
                    <div class="row text-right-rtl">
                        <?php
                            while ( $events_query->have_posts() ) {
                                $events_query->the_post();

                                $loveicon_core_event_meta_image         = get_post_meta( get_the_id(), 'loveicon_core_event_meta_image', true );
                                $loveicon_core_event_meta_image_url     = wp_get_attachment_image_src( $loveicon_core_event_meta_image, 'full' );
                                if(is_array($loveicon_core_event_meta_image_url)){
                                    $loveicon_core_event_meta_image_url = $loveicon_core_event_meta_image_url[0];
                                }
                        ?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="single-event-style1 single-event-style2">
                                    <div class="single-event-style2_bg" style="background-image: url(<?php echo esc_url( $loveicon_core_event_meta_image_url )?>);"></div>
                                    <div class="static-content">
                                        <div class="date-box">
                                            <div class="left">
                                                <h2><?php  echo tribe_get_start_date( $post->ID, false, 'j' ); ?></h2>
                                            </div>
                                            <div class="right">
                                                <h3><?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?></h3>
                                            </div>
                                        </div>
                                        <div class="meta-info">
                                            <p>Organized By: <a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo tribe_get_organizer($post->ID); ?></a></p>
                                        </div>
                                        <div class="title">
                                            <h2><a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                        <div class="inner-text">
                                            <?php echo wp_trim_words( the_excerpt(), 6, '...' ); ?>
                                        </div>
                                        <div class="border-box"></div>
                                        <div class="event-time">
                                            <div class="icon">
                                                <span class="flaticon-clock"></span>
                                            </div>
                                            <div class="text">
                                                <p><?php echo tribe_get_start_date( $post->ID, false, 'H:ia' ); ?> - <?php echo tribe_get_address(); ?>, <?php echo tribe_get_city(); ?></p>
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="overlay-content">
                                        <div class="date-box">
                                            <div class="left">
                                                <h2><?php  echo tribe_get_start_date( $post->ID, false, 'j' ); ?></h2>
                                            </div>
                                            <div class="right">
                                                <h3><?php echo tribe_get_start_date( $post->ID, false, 'F' ); ?></h3>
                                            </div>
                                        </div>
                                        <div class="meta-info">
                                            <p>Organized By: <a href="<?php echo esc_url( the_permalink() ); ?>"><?php echo tribe_get_organizer($post->ID); ?></a></p>
                                        </div>
                                        <div class="title">
                                            <h2><a href="<?php echo esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h2>
                                        </div>
                                        <div class="inner-text">
                                            <?php echo wp_trim_words( the_excerpt(), 6, '...' ); ?>
                                        </div> 
                                        <div class="btns-box">
                                            <a class="btn-one" href="<?php echo esc_url( the_permalink() ); ?>">
                                                <span class="txt"><i class="arrow1 fa fa-check-circle"></i>read more</span>
                                            </a>
                                        </div>   
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="styled-pagination text-center clearfix">
                                <?php
                                    $current = max(1, (int) filter_input(INPUT_GET, 'pageid'));
                                    echo paginate_links(array(
                                        'base' => add_query_arg('pageid', '%#%'),
                                        'format' => '?pageid=%#%',
                                        'total' => $events_query->max_num_pages,
                                        'current' => $current,
                                        'show_all' => false,
                                        'end_size' => 1,
                                        'mid_size' => 2,
                                        'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
                                        'next_text' => '<i class="fa fa-long-arrow-right"></i>',
                                        'type' => 'plain',
                                        'add_args' => false,
                                        'add_fragment' => '',
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        <?php wp_reset_postdata(); } ?>
    <?php
    }
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Loveicon_Event_List() );