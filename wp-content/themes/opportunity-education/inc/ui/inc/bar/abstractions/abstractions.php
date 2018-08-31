<?php
namespace ui;

/**
 * Bar abstractions
 *
 * @package Opportunity_Education
 */

/**
 * Gets a bar from a post
 */
function get_bar_from_post( $post = null, $args = array() ) {

	// If the post is null, grab the global
	if ( $post === null ) {
		global $post;
	}

	// Get the post
	$post = get_post( $post );

	// Set the subtitle
	$args['subtitle'] = get_the_date( get_option( 'date_format' ), $post );

	// Set the title
	$args['title'] = get_the_title( $post );

	// Set the link
	$args['link'] = get_the_permalink( $post );

	// Return the bar
	return \ui\get_bar( $args );
}

/**
 * Echoes a bar from a post
 */
function bar_from_post( $post = null, $args = array() ) {
	echo \ui\get_bar_from_post( $post, $args );
}

/**
 * Bar from post shortcode
 */
function bar_from_post_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(

			// Post args
			'post'                        => null,

			// Bar args
			'tag'                         => 'div',
			'subtitle_tag'                => 'div',
			'subtitle_additional_classes' => '',
			'title_tag'                   => 'h3',
			'title_additional_classes'    => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Set the post
	$post = $atts['post'];

	// Unset post args
	unset( $atts['post'] );

	// Return a bar with the proper attributes
	return \ui\get_bar_from_post( $post, $atts );
}
add_shortcode( 'bar_from_post', '\ui\bar_from_post_shortcode' );
