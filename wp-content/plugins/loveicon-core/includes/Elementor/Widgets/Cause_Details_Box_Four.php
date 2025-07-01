<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Cause_Details_Box_Four extends Widget_Base
{
	public function get_name()
	{
		return 'cause_details_box_four';
	}

	public function get_title()
	{
		return esc_html__('Cause Details Box Four', 'loveicon-core');
	}

	public function get_icon()
	{
		return 'sds-widget-ico';
	}

	public function get_categories()
	{
		return array('Loveicon');
	}

protected function register_controls() {

		$this->start_controls_section(
			'general',
			array(
				'label' => esc_html__('general', 'loveicon-core'),
			)
		);

		$this->add_control(
			'shape',
			array(
				'label'   => esc_html__('Shape', 'loveicon-core'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => esc_html__('Image', 'loveicon-core'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'tag_line',
			array(
				'label'   => esc_html__('Tag Line', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('The Challenge', 'loveicon-core'),
			)
		);

		$this->add_control(
			'description_one',
			array(
				'label'       => esc_html__('Description One', 'loveicon-core'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __(
					'Nostrud tem exrcitation duis laboris nisi ut aliquip sedy duis aute cupidata proident sunt 
                culpa. Consectetur adipisicing elit sed eiusm
                sod tempor incididunt.',
					'loveicon-core'
				),
				'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
			)
		);

		$this->add_control(
			'description_two',
			array(
				'label'       => esc_html__('Description Two', 'loveicon-core'),
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => __(
					'Nostrud tem exrcitation duis laboris nisi ut aliquip sedy duis aute cupidata proident sunt 
                culpa. Consectetur adipisicing elit sed eiusm
                sod tempor incididunt.',
					'loveicon-core'
				),
				'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
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
				'name'     => 'tagline_typography',
				'label'    => __('Tagline ', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .cause-details-title h3',
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
			'tagline_color',
			array(
				'label'     => __('Tagline Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .cause-details-title h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render()
	{
		$settings        = $this->get_settings_for_display();
		$shape           = ($settings['shape']['id'] != '') ? wp_get_attachment_image($settings['shape']['id'], 'full') : $settings['shape']['url'];
		$shape_alt       = get_post_meta($settings['shape']['id'], '_wp_attachment_image_alt', true);
		$image           = ($settings['image']['id'] != '') ? wp_get_attachment_image($settings['image']['id'], 'full') : $settings['image']['url'];
		$image_alt       = get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true);
		$tag_line        = $settings['tag_line'];
		$description_one = $settings['description_one'];
		$description_two = $settings['description_two'];
?>
		<div class="cause-details-text-box-4">
			<div class="row">
				<div class="col-xl-6">
					<div class="text-box">
						<div class="cause-details-title">
							<h3>The Challenge</h3>
							<div class="cause-details-title-shape ">
								<?php
								if (wp_http_validate_url($shape)) {
								?>
									<img src="<?php echo esc_url($shape); ?>" alt="<?php esc_url($shape_alt); ?>">
								<?php
								} else {
									echo $shape;
								}
								?>
							</div>
						</div>
						<div class="text1">
							<p><?php echo $description_one; ?>
							</p>
						</div>
						<div class="text2">
							<p><?php echo $description_two; ?>
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-6">
					<div class="img-box">
						<?php
						if (wp_http_validate_url($image)) {
						?>
							<img src="<?php echo esc_url($image); ?>" alt="<?php esc_url($image_alt); ?>">
						<?php
						} else {
							echo $image;
						}
						?>
					</div>
				</div>
			</div>
		</div>
<?php
	}
}
