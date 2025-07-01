<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Loveicon_Gallery extends Widget_Base {


	public function get_name() {
		return 'loveicon_gallery';
	}

	public function get_title() {
		return esc_html__( 'Loveicon Gallery', 'loveicon' );
	}

	public function get_icon() {
		return 'sds-widget-ico';
	}

	public function get_categories() {
		return array( 'Loveicon' );
	}

	protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__( 'General', 'loveicon' ),
			)
		);

		$this->add_control(
			'layout_style',
			array(
				'label'   => __( 'Layout Style', 'loveicon' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __( 'One', 'loveicon' ),
					'2' => __( 'Two', 'loveicon' ),
					'3' => __( 'Three', 'loveicon' ),
				),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'      => esc_html__( 'Heading', 'loveicon' ),
				'type'       => Controls_Manager::TEXT,
				'default'    => __( 'Watch The Intro Video', 'loveicon' ),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '2',
						),
					),
				),
			)
		);

		$this->add_control(
			'sub_heading',
			array(
				'label'      => esc_html__( 'Sub Heading', 'loveicon' ),
				'type'       => Controls_Manager::TEXT,
				'default'    => __( 'Watch The Intro Video', 'loveicon' ),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '2',
						),
					),
				),
			)
		);

		$this->add_control(
			'bg_image',
			array(
				'label'      => esc_html__( 'BG Image', 'loveicon' ),
				'type'       => Controls_Manager::MEDIA,
				'default'    => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'conditions' => array(
					'relation' => 'or',
					'terms'    => array(
						array(
							'name'     => 'layout_style',
							'operator' => '==',
							'value'    => '2',
						),
					),
				),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'Item', 'loveicon' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_image',
			array(
				'label'   => esc_html__( 'Image', 'loveicon' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'shape_image',
			array(
				'label'   => esc_html__( 'Shape Image', 'loveicon' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => esc_html__( 'Repeater List', 'loveicon' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__( 'Title #1', 'loveicon' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'loveicon' ),
					),
					array(
						'list_title'   => esc_html__( 'Title #2', 'loveicon' ),
						'list_content' => esc_html__( 'Item content. Click the edit button to change this text.', 'loveicon' ),
					),
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings     = $this->get_settings_for_display();
		$layout_style = $settings['layout_style'];

		if ( $layout_style == '1' ) {
			?>
			<!--Start Gallery Area-->
			<section class="gallery-area">
				<div class="container-fullwidth">
					<div class="row">
						<div class="col-xl-12">
							<div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": false, "dots": false, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "3" } , "1139":{ "items" : "4" }, "1200":{ "items" : "5" }}}'>

								<?php
								$i = 1;
								foreach ( $settings['items'] as $item ) {
									$item_image     = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
									$item_image_url = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
									$item_image_alt = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );
									?>
									<!--Start Single Gallery Item-->
									<div class="single-gallery-item">
										<div class="img-holder">
											<?php
											if ( wp_http_validate_url( $item_image ) ) {
												?>
												<img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
												<?php
											} else {
												echo $item_image;
											}
											?>
											<div class="overlay-button">
												<a class="lightbox-image" data-fancybox="gallery" href="<?php echo $item_image_url; ?>">
													<span class="flaticon-add"></span>
												</a>
											</div>
										</div>
									</div>
									<!--End Single Gallery Item-->
									<?php
									$i++;
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--End Gallery Area-->
			<?php
		} elseif ( $layout_style == '2' ) {
			$bg_image     = ( $settings['bg_image']['id'] != '' ) ? wp_get_attachment_image_url( $settings['bg_image']['id'], 'full' ) : $settings['bg_image']['url'];
			$bg_image_alt = get_post_meta( $settings['bg_image']['id'], '_wp_attachment_image_alt', true );
			$heading      = $settings['heading'];
			$sub_heading  = $settings['sub_heading'];

			?>

			<!--Start Causes Gallery Area-->
			<section class="causes-gallery-area">
				<div class="container">
					<div class="sec-title text-center">
						<div class="sub-title">
							<div class="inner">
								<h3><?php echo $sub_heading; ?></h3>
							</div>
							<div class="outer">
								<?php
								if ( wp_http_validate_url( $bg_image ) ) {
									?>
									<img src="<?php echo esc_url( $bg_image ); ?>" alt="<?php esc_url( $bg_image_alt ); ?>">
									<?php
								} else {
									echo $bg_image;
								}
								?>
							</div>
						</div>
						<h2><?php echo $heading; ?></h2>
					</div>
					<div class="row">
						<?php
						$i = 1;
						foreach ( $settings['items'] as $item ) {
							$item_image      = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
							$item_image_alt  = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );
							$shape_image     = ( $item['shape_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['shape_image']['id'], 'full' ) : $item['shape_image']['url'];
							$shape_image_alt = get_post_meta( $item['shape_image']['id'], '_wp_attachment_image_alt', true );
							$item_image_url  = ( $item['item_image']['id'] != '' ) ? wp_get_attachment_image_url( $item['item_image']['id'], 'full' ) : $item['item_image']['url'];
							$item_image_alt  = get_post_meta( $item['item_image']['id'], '_wp_attachment_image_alt', true );
							?>
							<!--Start Causes Gallery Block1-->
							<div class="col-xl-4 col-lg-6 col-md-6">
								<div class="causes-gallery-block1">
									<div class="img-holder">
										<?php
										if ( wp_http_validate_url( $item_image ) ) {
											?>
											<img src="<?php echo esc_url( $item_image ); ?>" alt="<?php esc_url( $item_image_alt ); ?>">
											<?php
										} else {
											echo $item_image;
										}
										?>
										<div class="shape">
											<?php
											if ( wp_http_validate_url( $shape_image ) ) {
												?>
												<img src="<?php echo esc_url( $shape_image ); ?>" alt="<?php esc_url( $shape_image_alt ); ?>">
												<?php
											} else {
												echo $shape_image;
											}
											?>
										</div>
											<a class="lightbox-image" data-fancybox="gallery" href="<?php echo $item_image_url; ?>">
										<div class="overlay-icon">
												<span class="flaticon-magnifiying-glass"></span>
										</div>
											</a>
									</div>
								</div>
							</div>
							<!--End Causes Gallery Block1-->
							<?php
							$i++;
						}
						?>
					</div>
				</div>
			</section>
			<?php
		}
	}
}
