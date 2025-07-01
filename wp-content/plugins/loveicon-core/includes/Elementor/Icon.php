<?php
namespace Loveicon\Helper\Elementor;
class Icon {

	public function __construct() {
		add_filter( 'elementor/icons_manager/additional_tabs', array( $this, 'custom_icon' ) );
	}

	function custom_icon( $array ) {
		$plugin_url = plugins_url();

		return array(
			'custom-icon' => array(
				'name'          => 'custom-icon',
				'label'         => 'Loveicon Icon',
				'url'           => '',
				'enqueue'       => array(
					$plugin_url . '/loveicon-core/assets/elementor/icon/css/flaticon.css',
				),
				'prefix'        => '',
				'displayPrefix' => '',
				'labelIcon'     => 'loveicon-icon',
				'ver'           => '',
				'fetchJson'     => $plugin_url . '/loveicon-core/assets/elementor/icon/js/regular.js',
				'native'        => 1,
			),
		);
	}
}