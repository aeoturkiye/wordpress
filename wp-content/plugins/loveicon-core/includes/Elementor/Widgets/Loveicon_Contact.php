<?php
namespace Loveicon\Helper\Elementor\Widgets;

use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Plugin;
use Elementor\Repeater;
use Elementor\Group_Control_Typography;

class Loveicon_Contact extends Widget_Base
{
	public function get_name()
	{
		return 'loveicon_contact';
	}

	public function get_title()
	{
		return esc_html__('Loveicon Contact', 'loveicon-core');
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
			'tag_line',
			array(
				'label'   => esc_html__('Tag Line', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Support LoveIcon With Heart!', 'loveicon-core'),
			)
		);

		$this->add_control(
			'heading',
			array(
				'label'   => esc_html__('Heading', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Get In Touch With Us', 'loveicon-core'),
			)
		);

		$this->add_control(
			'description',
			array(
				'label'       => esc_html__('Description', 'loveicon-core'),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __(
					'Laboris nisi aliquip sed duis aute lorem ipsum dolor amet consectetur adipisicing
                sed eiusmod tempor tm incididunts lorem ipsum sed labore dolore magnad aliqua. 
                Lorem ipsum dolor sit amet consectetur adipisicing.',
					'loveicon-core'
				),
				'placeholder' => esc_html__('Type your description here', 'loveicon-core'),
			)
		);

		$this->add_control(
			'short_code',
			array(
				'label'   => esc_html__('Short Code', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
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
			'item_title',
			array(
				'label'   => esc_html__('Title', 'loveicon-core'),
				'type'    => Controls_Manager::TEXT,
				'default' => __('Visit Office', 'loveicon-core'),
			)
		);

		$repeater->add_control(
			'item_icon',
			array(
				'label' => esc_html__('Icon', 'loveicon-core'),
				'type'  => Controls_Manager::ICONS,
			)
		);

		$repeater->add_control(
			'item_address',
			array(
				'label'       => esc_html__('Address', 'loveicon-core'),
				'type'        => Controls_Manager::TEXTAREA,
				'rows'        => 6,
				'default'     => __('83 Andy Street, Madison<br>New Jersey - 78002', 'loveicon-core'),
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
				'label'    => __('Tag Line', 'loveicon-core'),
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

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __('Heading', 'loveicon-core'),
				'selector' => '{{WRAPPER}} .contact-info-sidebar ul li .top .title h3',
			)
		);

		$this->add_group_control(
            Group_Control_Typography::get_type(),
            array(
                'name'     => 'button_title_typography',
                'label'    => __('Button Title', 'loveicon-core'),
                'selector' => '{{WRAPPER}} .btn-one .txt',
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
				'label'     => __('Tag Line Color', 'loveicon-core'),
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

		$this->add_control(
			'title_color',
			array(
				'label'     => __('Title Color', 'loveicon-core'),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .contact-info-sidebar ul li .top .title h3' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
            'button_bg_color',
            array(
                'label'     => __('Button BG Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .btn-one' => 'background: {{VALUE}}!important',
                ),
            )
        );

		$this->add_control(
            'button_title_color',
            array(
                'label'     => __('Button Title Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .btn-one .txt' => 'color: {{VALUE}}',
                ),
            )
        );

		$this->add_control(
            'button_hover_color',
            array(
                'label'     => __('Button Hover Color', 'loveicon-core'),
                'separator' => 'before',
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .btn-one:before' => 'background: {{VALUE}}!important',
                ),
            )
        );

		$this->end_controls_section();
	}
	protected function render()
	{
		$settings    = $this->get_settings_for_display();
		$tag_line    = $settings['tag_line'];
		$heading     = $settings['heading'];
		$description = $settings['description'];
		$short_code  = $settings['short_code'];
?>
		<!--Start Contact Style1 Area-->
		<section class="contact-style1-area">
			<div class="container">
				<div class="row text-right-rtl">
					<div class="col-xl-8">
						<div class="contact-style1_form">
							<div class="sec-title">
								<div class="sub-title martop0">
									<div class="inner">
										<h3><?php echo $tag_line; ?></h3>
									</div>
								</div>
								<h2><?php echo $heading; ?></h2>
								<p><?php echo $description; ?>
								</p>
							</div>
							<div class="contact-form">
								<?php echo do_shortcode($short_code); ?>
							</div>
						</div>
					</div>

					<div class="col-xl-4">
						<div class="sidebar-content-box">
							<div class="contact-info-sidebar">
								<ul>
									<?php
									$i = 1;
									foreach ($settings['items'] as $item) {
										$item_title   = $item['item_title'];
										$item_icon    = $item['item_icon'];
										$item_address = $item['item_address'];
									?>
										<li>
											<div class="top">
												<div class="icon">
													<span class="<?php echo $item_icon['value']; ?>"></span>
												</div>
												<div class="title">
													<h3><?php echo $item_title; ?></h3>
												</div>
											</div>
											<?php echo $item_address; ?>
										</li>
									<?php
										$i++;
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Contact Style1 Area-->
<?php
	}
}
