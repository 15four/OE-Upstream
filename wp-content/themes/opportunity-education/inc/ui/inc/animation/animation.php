<?php
namespace ui;

/**
 * Animation functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/animation.class.php';

/**
 * Gets an animation
 */
function get_animation( $args = array() ) {

    // Instantiate animation with args
	$animation = new \ui\Animation( $args );

	// Return animation markup
	return $animation->get_component();
}

/**
 * Echoes an animation
 */
function animation( $args = array() ) {
	echo \ui\get_animation( $args );
}

/**
 * Animation shortcode
 */
function animation_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'tag'                => 'div',
			'type'               => 'fade_up',
			'direction'          => null,
			'stagger'            => null,
			'speed'              => null,
			'ease'               => null,
			'on_scroll'          => true,
			'additional_classes' => '',
		),
		$atts
	);

	// Add content to args
	$atts['content'] = do_shortcode( $content );

	// Return animation
	return \ui\get_animation( $atts	);
}
add_shortcode( 'animation', '\ui\animation_shortcode' );
