<?php
namespace ui;

/**
 * Placeholder functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

/**
 * Gets placeholder
 */
function get_placeholder( $content = '' ) {

	// Return the placeholder markup
	return \fifteen_four\helpers\get_include( __DIR__ . '/templates/placeholder.template.php' , $content );
}

/**
 * Echoes placeholder
 */
function placeholder( $content = '' ) {
	echo \ui\get_placeholder( $content );
}

/**
 * Placeholder shortcode
 */
function placeholder_shortcode( $atts, $content ) {

	// Return placeholder with the proper attributes
	return \ui\get_placeholder( do_shortcode( $content ) );
}
add_shortcode( 'placeholder', '\ui\placeholder_shortcode' );
