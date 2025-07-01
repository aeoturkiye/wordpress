<?php
namespace Loveicon\Helper\Elementor;

use Elementor\Plugin;
class Element {

	public function __construct() {
		 add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_widget_categories' ) );
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
	}
	public function widgets_registered() {
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Banner() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Features() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Mission() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Team() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Partner() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Projects() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Testimonials() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Fact_Counter() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Gallery() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_About_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Team_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Slogan() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_About_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Team_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Team_Three() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Contact() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_FAQ() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_About_Three() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Planning_Programs() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Mission_Vision() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Serving_Map() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Single_Sidebar_Box() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Single_Sidebar_Box_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Blog_Details_Text_Three() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Blog_Details_Text_One() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Blog_Details_Text_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cause_Details_Box_Three() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Cause_Details_Box_Four() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Recent_News() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Sidebar_Projects_Gallery() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_About_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Team_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Team_Three() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Contact() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Footer_One() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Footer_Two() );
		Plugin::instance()->widgets_manager->register_widget_type( new Widgets\Loveicon_Footer_Subscribe() );
	}

	function add_elementor_widget_categories( $elements_manager ) {
		$elements_manager->add_category(
			'Loveicon',
			array(
				'title' => __( 'Loveicon', 'loveicon-core' ),
				'icon'  => 'fa fa-plug',
			)
		);
		$elements_manager->add_category(
			'Loveicon_Footer',
			array(
				'title' => __( 'Loveicon Footer', 'loveicon-core' ),
				'icon'  => 'fa fa-plug',
			)
		);
	}
}
