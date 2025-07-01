<?php
namespace Loveicon\Helper;
class Widgets
{
	/**
	 * Initialize the class
	 */
	function __construct()
	{
		// Register the post type
		add_action('widgets_init', array($this, 'widgets_registered'));
	}

	public function widgets_registered()
	{
		register_widget(new Widgets\Loveicon_Widget_Selector());
		register_widget( new Widgets\Loveicon_Recent_Posts() );
		register_widget(new Widgets\Service_Sidebar_Menu());

		// register_widget( new Widgets\Loveicon_Attribute_Widget_Selector() );
	}
}