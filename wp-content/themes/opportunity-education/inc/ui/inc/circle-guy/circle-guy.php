<?php
namespace ui;

/**
 * Circle Guy functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Main class
require __DIR__ . '/circle-guy.class.php';

// Abstractions
require __DIR__ . '/abstractions/abstractions.php';

/**
 * Gets a circle guy
 */
function get_circle_guy( $args = array() ) {

    // Instantiate circle guy with args
	$circle_guy = new \ui\Circle_Guy( $args );

	// Return circle guy markup
	return $circle_guy->get_component();
}

/**
 * Echoes a circle guy
 */
function circle_guy( $args = array() ) {
	echo \ui\get_circle_guy( $args );
}

/**
 * Circle guy shortcode
 */
function circle_guy_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'tag'                => 'div',
			'size'               => 'full',
			'image'              => null,
			'additional_classes' => ''
		),
		$atts
	);

	// Return a circle guy with the proper attributes
	return \ui\get_circle_guy( $atts );
}
add_shortcode( 'circle_guy', '\ui\circle_guy_shortcode' );
