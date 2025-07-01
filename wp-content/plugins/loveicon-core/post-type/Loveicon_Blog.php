<?php
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
/**
 * Elementor Loveicon_Blog feature_section_two feature
 *
 * @since 1.0.0
 */
class Loveicon_Blog extends \Elementor\Widget_Base {

	public function get_name() {
		return 'Loveicon_Blog';
	}
	public function get_title() {
		return esc_html__( 'Blog Item', 'loveicon-name' );
	}
	public function get_icon() {
		return 'sds-widget-ico';
	}
	public function get_categories() {
		return array( 'loveicon-core' );
	}
	protected function register_controls() {
		$this->start_controls_section(
			'section_design_area',
			array(
				'label' => esc_html__( 'section design', 'loveicon-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'event_desing_list',
			array(
				'label'   => esc_html__( 'Select Layout', 'loveicon-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'style_1' => esc_html__( 'Style 1', 'loveicon-core' ),
					'style_2' => esc_html__( 'Style 2', 'loveicon-core' ),
				),
				'default' => esc_html__( 'style_1', 'loveicon-core' ),
			)
		);
		$this->add_control(
			'section_title',
			array(
				'label' => esc_html__( 'title', 'loveicon-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'section_sub_title',
			array(
				'label' => esc_html__( 'sub title', 'loveicon-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			)
		);
		$this->add_control(
			'section_icon',
			array(
				'label'   => esc_html__( 'section icon', 'goodsoul-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->add_control(
			'section_icon_log',
			array(
				'label'   => esc_html__( 'section icon logo', 'goodsoul-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => array(
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				),
			)
		);
		$this->end_controls_section();

		// Typography Section

		$this->start_controls_section(
			'typography_section',
			array(
				'label' => __( 'Typography Section', 'loveicon-core' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title', 'loveicon-core' ),
				'selector' => '{{WRAPPER}} .sec-title h2',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_title_typography',
				'label'    => __( 'Sub Title ', 'loveicon-core' ),
				'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
			)
		);

		$this->end_controls_section();

		// Color Section

		$this->start_controls_section(
			'color_section',
			array(
				'label' => __( 'Color Section', 'loveicon-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'loveicon-core' ),
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
				'label'     => __( 'Sub Title Color', 'loveicon-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title .inner h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		global $post;
		$section_title     = $settings['section_title'];
		$event_desing_list = $settings['event_desing_list'];
		$section_sub_title = $settings['section_sub_title'];
		$section_icon      = ( $settings['section_icon']['id'] != '' ) ? wp_get_attachment_image_url( $settings['section_icon']['id'], 'full' ) : $settings['section_icon']['url'];
		$section_icon_log  = ( $settings['section_icon_log']['id'] != '' ) ? wp_get_attachment_image_url( $settings['section_icon_log']['id'], 'full' ) : $settings['section_icon_log']['url'];

		$pg_num      = max( 1, (int) filter_input( INPUT_GET, 'pageid' ) );
		$posts_args  = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'posts_per_page' => 3,
		);
		$posts_query = new WP_Query( $posts_args );

		?>
		<section class="blog-style1-area">
		<?php if(!empty($section_icon)){ ?>
			<div class="thm-shape1 float-bob"><img src="<?php echo esc_url( $section_icon ); ?>" alt="loveicon"></div>
			<?php } ?>
			<div class="container">
				<div class="sec-title text-center">
					<div class="sub-title">
						<div class="inner">
							<h3><?php echo wp_kses_post( $section_title ); ?></h3>
						</div>
						<?php if(!empty($section_icon_log)){ ?>
						<div class="outer"><img src="<?php echo esc_url( $section_icon_log ); ?>" alt="loveicon"></div>
						<?php } ?>
					</div>
					<h2><?php echo wp_kses_post( $section_sub_title ); ?></h2>
				</div>
				<?php if ( $posts_query->have_posts() ) { ?>
					<div class="row text-right-rtl">
						<?php
						while ( $posts_query->have_posts() ) {
							$posts_query->the_post();
							?>
							<div class="col-xl-4 col-lg-4">
								<div class="single-blog-style1">
									<div class="img-holder">
										<div class="inner">
										<a href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php the_title(); ?>"><?php the_post_thumbnail( 'loveicon-blog-grid' ); ?></a>
												<a href="<?php echo esc_url( get_permalink() ); ?>" aria-label="<?php the_title(); ?>">
											<div class="overlay-icon"><span class="flaticon-plus"></span>
											</div></a>
										</div>
										<div class="date-box">
											<h2><?php echo get_the_date( 'j' ); ?>​</h2>
											<p><?php echo get_the_date( 'F' ); ?>​</p>
										</div>
									</div>
									<div class="text-holder">
										<?php
										if ( is_singular() ) :
											the_title( '<h3 class="entry-title blog-title">', '</h3>' );
										else :
											the_title( '<h3 class="entry-title blog-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
										endif;
										?>
										<?php if ( ! empty( get_the_excerpt() ) ) : ?>
											<div class="text">
												<?php
												if ( get_option( 'rss_use_excerpt' ) ) {
													the_excerpt();
												} else {
													the_excerpt();
												}
												?>
											</div>
										<?php endif; ?>
										<ul class="meta-info">
											<li><i class="fa fa-user" aria-hidden="true"></i> <?php loveicon_posted_by(); ?></li>
											<li><i class="fa fa-comment-o" aria-hidden="true"></i> <?php loveicon_comments_count(); ?></li>
										</ul>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
		<?php
	}
}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Loveicon_Blog() );
