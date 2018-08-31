<?php
namespace ui;

/**
 * Bar functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Main class
require __DIR__ . '/bar.class.php';

// Abstractions
require __DIR__ . '/abstractions/abstractions.php';

/**
 * Gets a bar
 */
function get_bar( $args = array() ) {

    // Instantiate bar with args
	$bar = new \ui\Bar( $args );

	// Return bar markup
	return $bar->get_component();
}

/**
 * Echoes a bar
 */
function bar( $args = array() ) {
	echo \ui\get_bar( $args );
}

/**
 * Bar shortcode
 */
function bar_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'tag'                         => 'div',
			'link'                        => null,
			'subtitle_tag'                => 'div',
			'subtitle'                    => '',
			'subtitle_additional_classes' => '',
			'title_tag'                   => 'h4',
			'title'                       => '',
			'title_additional_classes'    => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Return a bar with the proper attributes
	return \ui\get_bar( $atts );
}
add_shortcode( 'bar', '\ui\bar_shortcode' );
