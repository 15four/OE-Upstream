<?php
namespace ui;

/**
 * SVG functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/svg.class.php';

/*
 * Gets an SVG
 */
function get_svg( $args = array() ) {

    // Instantiate SVG with args
	$svg = new \ui\SVG( $args );

	// Return SVG markup
	return $svg->get_component();
}

/*
 * Echoes an SVG
 */
function svg( $args = array() ) {
	echo \ui\get_svg( $args );
}

/*
 * SVG shortcode
 */
function svg_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'name' => null,
			'tag'                => 'div',
			'color_1'            => '',
			'color_2'            => '',
			'color_3'            => '',
			'additional_classes' => ''
		),
		$atts
	);

	// Return an SVG
	return \ui\get_svg( $atts );
}
add_shortcode( 'svg', '\ui\svg_shortcode' );
