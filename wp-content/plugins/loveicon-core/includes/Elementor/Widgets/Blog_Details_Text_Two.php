<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;

class Blog_Details_Text_Two extends Widget_Base {


	public function get_name() {
		return 'blog_details_text_two';
	}

	public function get_title() {
		return esc_html__( 'Blog Details Text Two', 'loveicon-core' );
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
				'label' => esc_html__( 'general', 'loveicon-core' ),
			)
		);

		$this->add_control(
			'title',
			array(
				'label'   => esc_html__( 'Title', 'loveicon-core' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( 'The Challenge', 'loveicon-core' ),
			)
		);

		$this->add_control(
			'shape',
			array(
				'label'   => esc_html__( 'Shape', 'loveicon-core' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__( 'Description', 'loveicon-core' ),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __( 'Nostrud tem exrcitation duis laboris nisi ut aliquip sedy duis aut cupidata proident sunt culpa. Consectetur adipisicing elit sed eiusm sod tempor incididunt aute irure dolor in reprehenderit in voluptate velit esse cillum.', 'loveicon-core' ),
				'placeholder' => esc_html__( 'Type your description here', 'loveicon-core' ),

			)
		);

		$this->end_controls_section();
	}
	protected function render() {
		$settings    = $this->get_settings_for_display();
		$title       = $settings['title'];
		$shape       = ( $settings['shape']['id'] != '' ) ? wp_get_attachment_image( $settings['shape']['id'], 'full' ) : $settings['shape']['url'];
		$shape_alt   = get_post_meta( $settings['shape']['id'], '_wp_attachment_image_alt', true );
		$description = $settings['description'];
		?>
		<!--Start Blog Details Text 2-->
		<div class="blog-details-text-2">
			<div class="blog-details-title">
				<h3><?php echo $title; ?></h3>
				<div class="blog-details-title-shape">
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
			<p><?php echo $description; ?>
			</p>
		</div>
		<!--End Blog Details Text 2-->
		<?php
	}
}
