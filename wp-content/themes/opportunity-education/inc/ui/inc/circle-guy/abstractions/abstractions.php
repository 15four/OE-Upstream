<?php
namespace ui;

/**
 * Circle guy abstractions
 *
 * @package Opportunity_Education
 */

/**
 * Gets a circle guy from an attachment
 */
function get_circle_guy_from_attachment( $attachment = null, $image_size = 'square', $args = array() ) {

	// If attachment is null, return false
	if ( is_null( $attachment ) ) {
		return false;
	}

	// Otherwise, get attachment
	$attachment = get_post( $attachment );

	// Merge args with attachment image
	$args = array_merge(
		$args,
		array(
			'image' => wp_get_attachment_image_src( $attachment->ID, $image_size )[0]
		)
	);

	// Return a circle guy with the proper attributes
	return \ui\get_circle_guy( $args );
}

/**
 * Echoes a circle guy from an attachment
 */
function circle_guy_from_attachment( $attachment = null, $image_size = 'square', $args = array() ) {
	echo \ui\get_circle_guy_from_attachment( $attachment, $image_size, $args );
}

/**
 * Circle guy from attachment shortcode
 */
function circle_guy_from_attachment_shortcode( $atts ) {

	// Atts
	$atts = shortcode_atts(
		array(

			// Attachment specific
			'id'                 => null,
			'image_size'         => 'square',

			// General circle guy atts
			'tag'                => 'div',
			'size'               => 'full',
			'additional_classes' => ''
		),
		$atts
	);

	// Get arguments from atts
	$attachment = $atts['id'];
	$image_size = $atts['image_size'];

	// Remove args from atts
	unset(
		$atts['id'],
		$atts['image_size']
	);

	return \ui\get_circle_guy_from_attachment( $attachment, $image_size, $atts );
}
add_shortcode( 'circle_guy_from_attachment', 'ui\circle_guy_from_attachment_shortcode' );
