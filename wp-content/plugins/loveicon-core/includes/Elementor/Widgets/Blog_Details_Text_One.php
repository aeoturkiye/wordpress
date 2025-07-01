<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Blog_Details_Text_One extends Widget_Base {


	public function get_name() {
		return 'blog_details_text_one';
	}

	public function get_title() {
		return esc_html__( 'Blog Details Text One', 'loveicon' );
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
				'label' => esc_html__( 'general', 'loveicon' ),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => esc_html__( 'Image', 'loveicon' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'shape',
			array(
				'label'   => esc_html__( 'Shape', 'loveicon' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'tagline',
			array(
				'label'   => esc_html__( 'Heading', 'loveicon' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Why Donate with LoveIcon', 'loveicon' ),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'   => esc_html__( 'Description', 'loveicon' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'Nostrud tem exrcitation duis laboris nisiut aliquip sedy duis aut cupidata proident sunt culpa adipisicing elit sed eiusmod tempor incididunt.', 'loveicon' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'item', 'loveicon' ),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__( 'Title', 'loveicon' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'A Real Change', 'loveicon' ),
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__( 'Description', 'loveicon' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( 'Nostrud fact aliquip exrcation nisiut temp sed dui auty.', 'loveicon' ),
				'placeholder' => esc_html__( 'Type your description here', 'loveicon' ),
			)
		);

		$repeater->add_control(
			'item_image_one',
			array(
				'label'   => esc_html__( 'Image One', 'loveicon' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'item_image_two',
			array(
				'label'   => esc_html__( 'Image Two', 'loveicon' ),
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
				'name'     => 'heading_typography',
				'label'    => __( 'Heading ', 'loveicon-core' ),
				'selector' => '{{WRAPPER}} .blog-details-title h3',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Title', 'loveicon-core' ),
				'selector' => '{{WRAPPER}} .cause-details-featured-box .single-box .text h3',
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
			'heading_color',
			array(
				'label'     => __( 'Heading', 'loveicon-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .blog-details-title h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'loveicon-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cause-details-featured-box .single-box .text h3' => 'color: {{VALUE}}!important',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$image       = ( $settings['image']['id'] != '' ) ? wp_get_attachment_image( $settings['image']['id'], 'full' ) : $settings['image']['url'];
		$image_alt   = get_post_meta( $settings['image']['id'], '_wp_attachment_image_alt', true );
		$shape       = ( $settings['shape']['id'] != '' ) ? wp_get_attachment_image( $settings['shape']['id'], 'full' ) : $settings['shape']['url'];
		$shape_alt   = get_post_meta( $settings['shape']['id'], '_wp_attachment_image_alt', true );
		$tagline     = $settings['tagline'];
		$description = $settings['description'];
		?>
		<!--Start Blog Details Text 1-->
		<div class="blog-details-text-1">
			<div class="blog-details-title">
				<h3><?php echo $tagline; ?></h3>
				<div class="blog-details-title-shape wow zoomIn animated">
					<?php
					if ( wp_http_validate_url( $shape ) ) {
						?>
						<img src="<?php echo esc_url( $shape ); ?>" alt="<?php esc_url( $shape_alt ); ?>">
						<?php
					} else {
						echo $shape;
					}
					?>
				</div>
			</div>
			<p><?php echo $description; ?></p>

			<div class="cause-details-featured-box">
				<div class="row">
					<div class="col-xl-6">

						<?php
						$i = 1;
						foreach ( $settings['items'] as $item ) {
							$item_title         = $item['item_title'];
							$item_description   = $item['item_description'];
							$item_image_one     = ( $item['item_image_one']['id'] != '' ) ? wp_get_attachment_image( $item['item_image_one']['id'], 'full' ) : $item['item_image_one']['url'];
							$item_image_one_alt = get_post_meta( $item['item_image_one']['id'], '_wp_attachment_image_alt', true );
							$item_image_two     = ( $item['item_image_two']['id'] != '' ) ? wp_get_attachment_image( $item['item_image_two']['id'], 'full' ) : $item['item_image_two']['url'];
							$item_image_two_alt = get_post_meta( $item['item_image_two']['id'], '_wp_attachment_image_alt', true );
							?>
						 <div class="single-box">
								<div class="icon">
									<?php
									if ( wp_http_validate_url( $item_image_one ) ) {
										?>
										<img src="<?php echo esc_url( $item_image_one ); ?>" alt="<?php esc_url( $item_image_one_alt ); ?>">
										<?php
									} else {
										echo $item_image_one;
									}
									?>
									<div class="icon-bg">
										<?php
										if ( wp_http_validate_url( $item_image_two ) ) {
											?>
											<img src="<?php echo esc_url( $item_image_two ); ?>" alt="<?php esc_url( $item_image_two_alt ); ?>">
											<?php
										} else {
											echo $item_image_two;
										}
										?>
									</div>
								</div>
								<div class="text">
									<h3><?php echo $item_title; ?></h3>
									<p>
										<?php echo $item_description; ?>
									</p>
								</div>
							</div>
							<?php
							$i++;
						}
						?>
					</div>
					<div class="col-xl-6">
						<div class="img-box">
							<?php
							if ( wp_http_validate_url( $image ) ) {
								?>
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php esc_url( $image_alt ); ?>">
								<?php
							} else {
								echo $image;
							}
							?>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--End Blog Details Text 1-->
		<?php
	}
}
