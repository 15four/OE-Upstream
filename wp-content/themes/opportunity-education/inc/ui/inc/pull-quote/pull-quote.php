<?php
namespace ui;

/**
 * Pull Quote functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/pull-quote.class.php';

/**
 * Gets a pull quote
 */
function get_pull_quote( $args = array() ) {

    // Instantiate pull quote with args
	$pull_quote = new \ui\Pull_Quote( $args );

	// Return pull quote markup
	return $pull_quote->get_component();
}

/**
 * Echoes a pull quote
 */
function pull_quote( $args = array() ) {
	echo \ui\get_pull_quote( $args );
}

/**
 * Pull quote shortcode
 */
function pull_quote_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'author'             => 'Author Name',
			'additional_classes' => ''
		),
		$atts
	);

	// Add content to atts
	$atts['content'] = do_shortcode( \helpers\remove_unnecessary_line_breaks( $content ) );

	// Return a pull quote with the proper attributes
	return \ui\get_pull_quote( $atts );
}
add_shortcode( 'pull_quote', '\ui\pull_quote_shortcode' );
