<?php
namespace Loveicon\Helper\Elementor\Settings;

use Elementor\Utils;

class Animation {


	public static function loveicon_get_animation_name() {
		$animations = array(
			'none'               => 'No Animation',
			'sliceDown'          => 'sliceDown',
			'sliceDownLeft'      => 'sliceDownLeft',
			'sliceUp'            => 'sliceUp',
			'sliceUpLeft'        => 'sliceUpLeft',
			'sliceUpDown'        => 'sliceUpDown',
			'sliceUpDownLeft'    => 'sliceUpDownLeft',
			'fold'               => 'fold',
			'fade'               => 'fade',
			'random'             => 'random',
			'slideInRight'       => 'slideInRight',
			'slideInLeft'        => 'slideInLeft',
			'boxRandom'          => 'boxRandom',
			'boxRain'            => 'boxRain',
			'boxRainReverse'     => 'boxRainReverse',
			'boxRainGrow'        => 'boxRainGrow',
			'boxRainGrowReverse' => 'boxRainGrowReverse',
		);

		return $animations;
	}

	public static function loveicon_get_wow_animation_control( $obj, $animationClass = 'fadeInLeft', $animationDelay = '0s' ) {
		$obj->add_control(
			'animation_class',
			array(
				'label'     => __( 'Animation Class', 'loveicon-core' ),
				'separator' => 'before',
				'type'      => \Elementor\Controls_Manager::ANIMATION,
				'default'   => $animationClass,
				'options'   => loveicon_get_animation_name(),
			)
		);
		$obj->add_control(
			'addon_animation_delay_time',
			array(
				'label'       => __( 'Delay Time', 'loveicon-core' ),
				'separator'   => 'before',
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => $animationDelay,
				'placeholder' => esc_html__( 'Animation delay value ex:200s.', 'loveicon-core' ),
			)
		);
	}
}
