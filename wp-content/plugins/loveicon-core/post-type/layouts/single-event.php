<?php get_header();
    global $post;
	$loveicon_core_event_url         = get_post_meta( get_queried_object_id(), 'loveicon_core_event_url', true );
	$loveicon_core_event_age_person         = get_post_meta( get_queried_object_id(), 'loveicon_core_event_age_person', true );
	$loveicon_core_event_meta_image         = get_post_meta( get_queried_object_id(), 'loveicon_core_event_meta_image', true );
	$loveicon_core_event_meta_image_url     = wp_get_attachment_image_src( $loveicon_core_event_meta_image, 'full' );
	if(is_array($loveicon_core_event_meta_image_url)){
		$loveicon_core_event_meta_image_url = $loveicon_core_event_meta_image_url[0];
	}
?>
<section class="event-details-area">
    <div class="container">
        <div class="row text-right-rtl">
            <div class="col-xl-8">
                <div class="event-details_content">

                    <div class="event-details-image-box">
                        <?php if(!empty($loveicon_core_event_meta_image_url)){ ?>
                            <img src="<?php echo esc_url( $loveicon_core_event_meta_image_url ); ?>" alt="logo">
				        <?php } ?>
                        <div class="category">
                            <h6><?php 
                                $args_ops = [
                                    'before'       => '',
                                    'sep'          => ', ',
                                    'after'        => '',
                                    'label'        => '', // An appropriate plural/singular label will be provided
                                    'label_before' => '',
                                    'label_after'  => '',
                                    'wrap_before'  => '',
                                    'wrap_after'   => '',
                                ];
                                $categories = tribe_get_event_taxonomy( $post->ID, $args_ops );
                                $html = ! empty( $categories ) ? sprintf(
                                    '%s%s %s %s%s%s',
                                    $args_ops['label_before'],
                                    '',
                                    $args_ops['label_after'],
                                    $args_ops['wrap_before'],
                                    $categories,
                                    $args_ops['wrap_after']
                                ) : '';

                                echo apply_filters( 'tribe_get_event_categories', $html, $post->ID, $args_ops, $categories );
                            ?></h6>
                        </div>
                    </div>

                    <div class="event-details-text-box">
                        <h2><?php the_title(); ?></h2>
                        <ul class="event-info">
                            <li>
                                <div class="icon">
                                    <img src="<?php echo plugin_dir_url( __FILE__ ); ?>../../assets/images/icon/date-1.png" alt="logo">
                                    <div class="overlay-icon">
                                        <img src="<?php echo plugin_dir_url( __FILE__ ); ?>../../assets/images/icon/date-1-bg.png" alt="logo">
                                    </div>
                                </div>
                                <div class="text">
                                    <p>Event Date</p>
                                    <h3><?php  echo tribe_get_start_date( $post->ID, false); ?><br/><?php echo tribe_get_start_date( $post->ID, false, 'H:ia' ); ?></h3>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="<?php echo plugin_dir_url( __FILE__ ); ?>../../assets/images/icon/map-marker-1.png" alt="logo">
                                    <div class="overlay-icon">
                                        <img src="<?php echo plugin_dir_url( __FILE__ ); ?>../../assets/images/icon/map-marker-1-bg.png" alt="logo">
                                    </div>
                                </div>
                                <div class="text">
                                    <p>Event Location</p>
                                    <h3><?php echo tribe_get_address(); ?><br> <?php echo tribe_get_city(); ?></h3>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <img src="<?php echo plugin_dir_url( __FILE__ ); ?>../../assets/images/icon/cost-1.png" alt="logo">
                                    <div class="overlay-icon">
                                        <img src="<?php echo plugin_dir_url( __FILE__ ); ?>../../assets/images/icon/cost-1-bg.png" alt="logo">
                                    </div>
                                </div>
                                <div class="text">
                                    <p>Event Cost</p>
                                    <h3><?php echo tribe_get_cost( null, true ); ?><br> <?php echo $loveicon_core_event_age_person; ?></h3>
                                </div>
                            </li>
                        </ul>

                        <div class="bottom-box">
                            <div class="btns">
                                <a class="btn-one" href="<?php echo esc_url($loveicon_core_event_url);?>" target="_blank" rel="nofollow">
                                    <span class="txt"><i class="arrow1 fa fa-check-circle"></i>join this event</span>
                                </a>
                            </div>
                            <div class="social-share">
                                <div class="title">
                                    <h5>Share Cause</h5>
                                </div>
                                <ul class="social-links">
                                    <li>
                                        <a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>"><span class="fa fa-facebook"></span></a>
                                    </li>
                                    <li>
                                        <a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://twitter.com/home?status=<?php echo urlencode( get_the_title() ); ?>-<?php echo esc_url( get_permalink() ); ?>"><span class="fa fa-twitter"></span></a>
                                    </li>
                                    <li>
                                        <a onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url( get_permalink() ); ?>" target="_blank">
                                            <span class="fa fa-linkedin"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php the_content(); ?>
                </div>    
            </div> 

            <?php if (is_active_sidebar('sidebar-3')) { ?>
                <div class="col-xl-4">
                    <div class="sidebar-content-box">
                        <?php dynamic_sidebar( 'sidebar-3' ); ?>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<?php get_footer();