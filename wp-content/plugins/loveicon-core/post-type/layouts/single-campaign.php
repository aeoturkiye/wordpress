<?php get_header();
	$loveicon_core_campaign_meta_image         = get_post_meta( get_queried_object_id(), 'loveicon_core_campaign_meta_image', true );
	$loveicon_core_campaign_meta_image_url     = wp_get_attachment_image_src( $loveicon_core_campaign_meta_image, 'full' );
	if(is_array($loveicon_core_campaign_meta_image_url)){
		$loveicon_core_campaign_meta_image_url = $loveicon_core_campaign_meta_image_url[0];
	}
    $campaign_id = get_the_id();
    $campaign_info = charitable_get_campaign( $campaign_id );
    $campaign_title      	  = $campaign_info->post_title; // title
    $campaign_content      	  = $campaign_info->post_content; // content
    $campaign_description     = $campaign_info->description; // description
    $campaign_post_page_link  = get_post_permalink( $campaign_info->ID ); // url
    $campaign_image_url       = get_the_post_thumbnail_url( $campaign_info->ID, 'loveicon-chariti-single-2' ); // thumbnail
    $campaign_currency_helper = charitable_get_currency_helper();
    $campaign_donated_amount  = $campaign_currency_helper->get_monetary_amount( $campaign_info->get_donated_amount() );
    $campaign_goal	          = $campaign_currency_helper->get_monetary_amount( $campaign_info->get_goal() );
    $campaign_percent_unround         = $campaign_info->get_percent_donated_raw();
    $campaign_percent         = round($campaign_percent_unround);
    $campaign_categories      = $campaign_info->get( 'categories', true );
    $campaign_suggested_donations = $campaign_info->get_suggested_donations();

    function ed_remove_phone_field_from_donation_form12( $fields ) {
        isset( $fields['phone'] );
        isset( $fields['address'] );
        isset( $fields['address_2'] );
        isset( $fields['city'] );
        isset( $fields['state'] );
        isset( $fields['country'] );
        isset( $fields['postcode'] );
        return $fields;
    }
    add_filter( 'charitable_donation_form_user_fields', 'ed_remove_phone_field_from_donation_form12' );

    
?> 
<section class="cause-details-area">
    <div class="container">
        <div class="row text-right-rtl">
            <div class="col-xl-8">
                <div class="cause-details_content">
                    <div class="cause-details-image-box">
                        <?php if(!empty($loveicon_core_campaign_meta_image_url)){ ?>
                            <img src="<?php echo esc_url( $loveicon_core_campaign_meta_image_url ); ?>" alt="logo">
				        <?php } ?>
                        <div class="category">
                            <h6><?php echo $campaign_categories; ?></h6>
                        </div>
                    </div>
                    <div class="donate-form-box donate-form-box--style2">
                        <div class="progress-levels progress-levels-style2">
                            <div class="progress-box wow animated" style="visibility: visible;">
                                <div class="inner count-box">
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="bar-fill" data-percent="<?php echo esc_attr( $campaign_percent );?>" title="Book"></div>
                                        </div>
                                    </div>
                                    <div class="bottom-box">
                                        <div class="rate-box">
                                            <p><?php echo esc_html__( 'Achieved', 'loveicon-core' ); ?><span><?php echo $campaign_donated_amount;?></span></p>
                                            <p><?php echo esc_html__( 'Target', 'loveicon-core' ); ?><span><?php echo $campaign_goal;?></span></p>
                                        </div>
                                        <div class="skill-percent">
                                            <span class="count-text" data-speed="3000" data-stop="<?php echo esc_attr( $campaign_percent );?>"><?php echo esc_attr( $campaign_percent );?></span>
                                            <span class="percent"><?php echo esc_html__( '%', 'loveicon-core' ); ?></span>
                                            <p class="outer-text"><?php echo esc_html__( 'Pledged So Far', 'loveicon-core' ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="donation_wrapper">
                            <?php charitable_get_current_donation_form()->render(); ?>
                        </div>
                    </div>
                    <?php the_content(); ?>
                </div>    
            </div> 
            <?php if (is_active_sidebar('sidebar-2')) { ?>
                <div class="col-xl-4">
                    <div class="sidebar-content-box">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
</section>
<?php get_footer();