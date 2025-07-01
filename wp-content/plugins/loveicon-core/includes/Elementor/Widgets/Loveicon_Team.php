<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use \Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Team extends Widget_Base
{
	public function get_name()
	{
		return 'loveicon_team';
	}

	public function get_title()
	{
		return esc_html__('Loveicon Team', 'loveicon');
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
				'label' => esc_html__('General', 'loveicon'),
			)
		);

		$this->add_control(
			'layout_style',
			array(
				'label'   => __('Layout Style', 'plugin-domain'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => array(
					'1' => __('One', 'plugin-domain'),
					'2' => __('Two', 'plugin-domain'),
				),
			)
		);

		$this->add_control(
			'col_style',
			array(
				'label'   => __('Column Style', 'plugin-domain'),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'col-xl-4',
				'options' => array(
					'col-xl-6' => __('Two', 'plugin-domain'),
					'col-xl-4' => __('Three', 'plugin-domain'),
					'col-xl-3' => __('Four', 'plugin-domain'),
				),
			)
		);

		$this->add_control(
			'sub_heading',
			array(
				'label'   => esc_html__('Sub Heading', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('We Change Your Life & World', 'loveicon'),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__('Heading', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Meet Our Volunteers', 'loveicon'),
			)
		);

		$this->add_control(
			'image',
			array(
				'label'   => esc_html__('Image', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'bg_shape',
			array(
				'label'   => esc_html__('BG Shape', 'loveicon'),
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
				'label' => esc_html__('Item', 'loveicon'),
			)
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'item_title',
			array(
				'label'   => esc_html__('Title', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Scott William', 'loveicon'),
			)
		);

		$repeater->add_control(
			'item_image',
			array(
				'label'   => esc_html__('Image', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'item_social',
			array(
				'label'       => esc_html__('Social', 'loveicon'),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'placeholder' => esc_html__('Type your description here', 'loveicon'),
			)
		);

		$repeater->add_control(
			'item_shape',
			array(
				'label'   => esc_html__('Shape', 'loveicon'),
				'type'    => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$repeater->add_control(
			'item_title_link',
			array(
				'label'         => esc_html__('Title Link', 'loveicon'),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__('https://your-link.com', 'loveicon'),
				'show_external' => true,
				'default'       => array(
					'url'         => '',
					'is_external' => false,
					'nofollow'    => false,
				),
			)
		);

		$repeater->add_control(
			'item_designation',
			array(
				'label'   => esc_html__('Designation', 'loveicon'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Volunteer', 'loveicon'),
			)
		);

		$this->add_control(
			'items',
			array(
				'label'   => esc_html__('Repeater List', 'loveicon'),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $repeater->get_controls(),
				'default' => array(
					array(
						'list_title'   => esc_html__('Title #1', 'loveicon'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
					),
					array(
						'list_title'   => esc_html__('Title #2', 'loveicon'),
						'list_content' => esc_html__('Item content. Click the edit button to change this text.', 'loveicon'),
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
				'name'     => 'heading_typography',
				'label'    => __('Heading', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title h2',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'sub_heading_typography',
				'label'    => __('Sub Heading', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .sec-title .sub-title .inner h3',
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __('Title', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .single-team-style1 .title-holder h3',
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

		$this->add_control(
			'sub_heading_color',
			array(
				'label'     => __('Sub Heading Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .sec-title .sub-title .inner h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .single-team-style1 .title-holder h3' => 'color: {{VALUE}}',
				),
			)
		);
		$this->end_controls_section();
	}
	protected function render()
	{
		$settings     = $this->get_settings_for_display();
		$layout_style = $settings['layout_style'];
		$col_style    = $settings['col_style'];

		if ($layout_style == '1') {

			$bg_shape_url = ($settings['bg_shape']['id'] != '') ? wp_get_attachment_image_url($settings['bg_shape']['id'], 'full') : $settings['bg_shape']['url'];
			$sub_heading  = $settings['sub_heading'];
			$heading      = $settings['heading'];
			$image        = ($settings['image']['id'] != '') ? wp_get_attachment_image($settings['image']['id'], 'full') : $settings['image']['url'];
			$image_alt    = get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true);
?>
			<!--Start Team Style1 Area-->
			<section class="team-style1-area">
				<?php if ($bg_shape_url) : ?>
					<div class="shape">
						<img class="zoominout" src="<?php echo esc_url($bg_shape_url); ?>" alt="logo">
					</div>
				<?php endif; ?>

				<div class="container">
					<div class="sec-title text-center">
						<div class="sub-title">
							<div class="inner">
								<h3><?php echo $sub_heading; ?></h3>
							</div>
							<div class="outer">
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
						<h2><?php echo $heading; ?></h2>
					</div>
					<div class="row">
						<?php
						$i = 1;
						foreach ($settings['items'] as $item) {
							$item_title               = $item['item_title'];
							$item_image               = ($item['item_image']['id'] != '') ? wp_get_attachment_image($item['item_image']['id'], 'full') : $item['item_image']['url'];
							$item_image_alt           = get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true);
							$item_social              = $item['item_social'];
							$item_shape               = ($item['item_shape']['id'] != '') ? wp_get_attachment_image($item['item_shape']['id'], 'full') : $item['item_shape']['url'];
							$item_shape_alt           = get_post_meta($item['item_shape']['id'], '_wp_attachment_image_alt', true);
							$item_title_link          = $item['item_title_link']['url'];
							$item_title_link_external = $item['item_title_link']['is_external'] ? 'target="_blank"' : '';
							$item_title_link_nofollow = $item['item_title_link']['nofollow'] ? 'rel="nofollow"' : '';
							$item_designation         = $item['item_designation'];
						?>
							<!--Start Single Team Style1-->
							<div class="<?php echo $col_style; ?> col-lg-6 col-md-6">
								<div class="single-team-style1">
									<div class="img-holder">
										<div class="inner">
											<?php
											if (wp_http_validate_url($item_image)) {
											?>
												<img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
											<?php
											} else {
												echo $item_image;
											}
											?>
											<div class="icon">
												<span class=""></span>
											</div>
										</div>
										<div class="overly-box">
											<ul class="social-links">
												<?php echo $item_social; ?>
											</ul>
										</div>
										<div class="shape">
											<?php
											if (wp_http_validate_url($item_shape)) {
											?>
												<img src="<?php echo esc_url($item_shape); ?>" alt="<?php esc_url($item_shape_alt); ?>">
											<?php
											} else {
												echo $item_shape;
											}
											?>
										</div>
									</div>
									<div class="title-holder text-center">
										<h3><?php echo $item_title; ?></h3>
										<?php echo $item_designation; ?>
									</div>
								</div>
							</div>
							<!--End Single Team Style1-->
						<?php
							$i++;
						}
						?>
					</div>
				</div>
			</section>
			<!--End Team Style1 Area-->
		<?php
		} elseif ($layout_style == '2') {
			$sub_heading  = $settings['sub_heading'];
			$bg_shape     = ($settings['bg_shape']['id'] != '') ? wp_get_attachment_image($settings['bg_shape']['id'], 'full') : $settings['bg_shape']['url'];
			$bg_shape_alt = get_post_meta($settings['bg_shape']['id'], '_wp_attachment_image_alt', true);
			$heading      = $settings['heading'];
			$image        = ($settings['image']['id'] != '') ? wp_get_attachment_image($settings['image']['id'], 'full') : $settings['image']['url'];
			$image_alt    = get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true);
		?>
			<!--Start Team Style1 Area-->
			<section class="team-style1-area pdb120">
				<div class="thm-shape1 float-bob">
					<?php
					if (wp_http_validate_url($bg_shape)) {
					?>
						<img src="<?php echo esc_url($bg_shape); ?>" alt="<?php esc_url($bg_shape_alt); ?>">
					<?php
					} else {
						echo $bg_shape;
					}
					?>
				</div>
				<div class="container">
					<div class="sec-title text-center">
						<div class="sub-title">
							<div class="inner">
								<h3><?php echo $sub_heading; ?></h3>
							</div>
							<div class="outer">
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
						<h2><?php echo $heading; ?></h2>
					</div>
					<div class="row">
						<?php
						if ($col_style == 'col-xl-4') {
							$item_col = '3';
						} elseif ($col_style == 'col-xl-6') {
							$item_col = '2';
						} else {
							$item_col = '4';
						}
						?>
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="theme_carousel team-carousel owl-dot-style1 owl-theme owl-carousel" data-options='{"loop": true, "margin": 30, "autoheight":true, "lazyload":true, "nav": false, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "<?php echo $item_col; ?>" }}}'>
								<?php
								$i = 1;
								foreach ($settings['items'] as $item) {
									$item_title               = $item['item_title'];
									$item_image               = ($item['item_image']['id'] != '') ? wp_get_attachment_image($item['item_image']['id'], 'full') : $item['item_image']['url'];
									$item_image_alt           = get_post_meta($item['item_image']['id'], '_wp_attachment_image_alt', true);
									$item_social              = $item['item_social'];
									$item_shape               = ($item['item_shape']['id'] != '') ? wp_get_attachment_image($item['item_shape']['id'], 'full') : $item['item_shape']['url'];
									$item_shape_alt           = get_post_meta($item['item_shape']['id'], '_wp_attachment_image_alt', true);
									$item_title_link          = $item['item_title_link']['url'];
									$item_title_link_external = $item['item_title_link']['is_external'] ? 'target="_blank"' : '';
									$item_title_link_nofollow = $item['item_title_link']['nofollow'] ? 'rel="nofollow"' : '';
									$item_designation         = $item['item_designation'];
								?>
									<!--Start Single Team Style1-->
									<div class="single-team-style1">
										<div class="img-holder">
											<div class="inner">
												<?php
												if (wp_http_validate_url($item_image)) {
												?>
													<img src="<?php echo esc_url($item_image); ?>" alt="<?php esc_url($item_image_alt); ?>">
												<?php
												} else {
													echo $item_image;
												}
												?>
												<div class="icon">
													<span class=""></span>
												</div>
											</div>
											<div class="overly-box">
												<ul class="social-links">
													<?php echo $item_social; ?>
												</ul>
											</div>
											<div class="shape">
												<?php
												if (wp_http_validate_url($item_shape)) {
												?>
													<img src="<?php echo esc_url($item_shape); ?>" alt="<?php esc_url($item_shape_alt); ?>">
												<?php
												} else {
													echo $item_shape;
												}
												?>
											</div>
										</div>
										<div class="title-holder text-center">
											<h3><?php echo $item_title; ?></h3>
											<?php echo $item_designation; ?>
										</div>
									</div>
									<!--End Single Team Style1-->
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</section>
<?php
		}
	}
}
