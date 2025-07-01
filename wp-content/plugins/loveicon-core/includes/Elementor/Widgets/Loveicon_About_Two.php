<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_About_Two extends Widget_Base
{


	public function get_name()
	{
		return 'loveicon_about_two';
	}

	public function get_title()
	{
		return esc_html__('Loveicon About Two', 'loveicon-core');
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
				'default' => __('Help With Featured Cause', 'loveicon-core'),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__('Heading', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Educate Children In<br> Rural Areas Our Priority', 'loveicon-core'),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__('Description', 'loveicon-core'),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __('Laboris nisi utm aliquip sed duis aute lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor utm incididunts lorem ipsum sed labore sud dolore magna aliqua.', 'loveicon-core'),
				'placeholder' => esc_html__('Type your description here', 'loveicon-core'),

			)
		);

		$this->add_control(
			'shape_one',
			array(
				'label'   => esc_html__('Shape One', 'loveicon-core'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__('item', 'loveicon-core'),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'extra_class',
			array(
				'label'       => esc_html__('Extra Class', 'loveicon-core'),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			)
		);

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__('Title', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Finished Projects', 'loveicon-core'),
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label'   => esc_html__('Icon', 'loveicon-core'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),

			)
		);

		$repeater->add_control(
			'item_count_number',
			array(
				'label'   => esc_html__('Count Number', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('1.3', 'loveicon-core'),
			)
		);

		$repeater->add_control(
			'item_count_unit',
			array(
				'label'   => esc_html__('Count Unit', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('k', 'loveicon-core'),
			)
		);

		$repeater->add_control(
			'item_description',
			array(
				'label'       => esc_html__('Description', 'loveicon-core'),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __('Nostrud temp exerction laboris<br> nisi utm aliquip duis aute.', 'loveicon-core'),
				'placeholder' => esc_html__('Type your description here', 'loveicon-core'),

			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => esc_html__('Repeater List', 'loveicon-core'),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__('Title #1', 'loveicon-core'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
					),
					array(
						'list_title'   => esc_html__('Title #2', 'loveicon-core'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon-core'),
					),
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
				'name'     => 'tagline_typography',
				'label'    => __('Tagline', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'heading_typography',
				'label'    => __('Heading', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title h2',
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
					'{{WRAPPER}} .sec-title .sub-title .inner h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'heading_color',
			array(
				'label'     => __('Heading Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}}',
				),
			)
		);

		$this->end_controls_section();
	}
	protected function render()
	{
		$settings    = $this->get_settings_for_display();
		$image       = ($settings['image']['id'] != '') ? wp_get_attachment_image($settings['image']['id'], 'full') : $settings['image']['url'];
		$image_alt   = get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true);
		$tag_line    = $settings['tag_line'];
		$heading     = $settings['heading'];
		$description = $settings['description'];
		$shape_one   = ($settings['shape_one']['id'] != '') ? wp_get_attachment_image_url($settings['shape_one']['id'], 'full') : $settings['shape_one']['url'];

?>
		<!--Start About Style2 Area-->
		<section class="about-style2-area pd120-0-0">
			<div class="container">
				<div class="row">
					<div class="col-xl-7 text-right-rtl">
						<div class="about-style2_content-box">
							<div class="thm-shape1 wow slideInLeft" data-wow-delay="0ms" data-wow-duration="3500ms">
								<img class="rotate-me" src="<?php echo $shape_one; ?>" alt="loveicon">
							</div>
							<div class="sec-title">
								<div class="sub-title martop0">
									<div class="inner">
										<h3><?php echo $tag_line; ?></h3>
									</div>
								</div>
								<h2><?php echo $heading; ?></h2>
							</div>
							<div class="inner-content">
								<p><?php echo $description; ?></p>
								<ul>

									<?php
									$i = 1;
									foreach ($settings['items'] as $item) {
										$item_title        = $item['item_title'];
										$item_icon         = ($item['item_icon']['id'] != '') ? wp_get_attachment_image($item['item_icon']['id'], 'full') : $item['item_icon']['url'];
										$item_icon_alt     = get_post_meta($item['item_icon']['id'], '_wp_attachment_image_alt', true);
										$item_count_number = $item['item_count_number'];
										$item_count_unit   = $item['item_count_unit'];
										$item_description  = $item['item_description'];
										$extra_class       = $item['extra_class'];
										$section_class     = $extra_class ?? 'style2';
									?>
										<li class="<?php echo $section_class; ?>">
											<div class="left">
												<div class="icon">
													<?php
													if (wp_http_validate_url($item_icon)) {
													?>
														<img src="<?php echo esc_url($item_icon); ?>" alt="<?php esc_url($item_icon_alt); ?>">
													<?php
													} else {
														echo $item_icon;
													}
													?>
												</div>
												<div class="count-outer count-box style4">
													<span class="count-text" data-speed="3000" data-stop="<?php echo $item_count_number; ?>"><?php echo $item_count_number; ?></span><span><?php echo $item_count_unit; ?></span>
													<h5><?php echo $item_title; ?></h5>
												</div>
											</div>
											<div class="right">
												<div class="text">
													<p><?php echo $item_description; ?></p>
												</div>
											</div>
										</li>
									<?php
										$i++;
									}
									?>

								</ul>
							</div>
						</div>
					</div>

					<div class="col-xl-5">
						<div class="about-style2_image-box">
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
		</section>
		<!--End About Style2 Area-->
<?php
	}
}
