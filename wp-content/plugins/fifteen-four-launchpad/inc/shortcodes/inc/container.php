<?php
namespace fifteen_four\shortcodes;

/**
 * Container shortcodes
 */

/**
 * Adds a container
 */
function container( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'additional_classes' => ''
		),
		$atts
	);

	// Set up attributes array
	$attributes = array(
		'class' => 'c-container '
			. $atts['additional_classes']
	);

	// Return content wrapped with a container
	return \fifteen_four\helpers\wrap_with_tag( apply_filters( 'the_content', $content ), 'div', $attributes );
}
add_shortcode( 'container', '\fifteen_four\shortcodes\container' );
