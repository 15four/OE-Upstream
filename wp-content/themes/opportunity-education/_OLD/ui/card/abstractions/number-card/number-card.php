<?php
namespace ui;

/**
 * Number card abstraction
 *
 * @package Opportunity_Education
 */

/*
 * Gets a number card
 */
function get_number_card( $number = 1, $args = array() ) {

	// Set up some default args
	$default_args = array(
		'content_additional_classes'         => '',
		'additional_classes'                 => ''
	);

	// Set up args
	$args = array_merge(
		$default_args,
		$args,
		array(
			'type' => 'image'
		)
	);

	// Set up content args
	$content_args = array_merge(
		$args,
		array(
			'number' => $number
		)
	);

	// Add content
	$args['content'] = \fifteen_four\helpers\get_include( __DIR__ . '/templates/content.template.php', $content_args );

	// Add additional classes
	$args['content_additional_classes'] = 'u-display--flex u-flex--align-start ' . $args['content_additional_classes'];
	$args['additional_classes'] = 'c-card--number ' . $args['additional_classes'];

	// Return the card with the appropriate args
	return \ui\get_card( $args );
}

/*
 * Echoes a number card
 */
function number_card( $number = null, $args = array() ) {
	echo \ui\get_number_card( $number, $args );
}

/*
 * Number card shortcode
 */
function number_card_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(

			// Number card args
			'number'                             => 1,
			'attachment'                         => null,
			'image_size'                         => 'large',

			// Card args
			'tag'                                => 'div',
			'link'                               => null,
			'background_color'                   => 'rich_white',
			'image_side'                         => 'left',
			'image_container_additional_classes' => '',
			'image_additional_classes'           => '',
			'content_additional_classes'         => '',
			'additional_classes'                 => ''
		),
		$atts
	);

	// If attachment is null, return false
	if ( is_null( $atts['attachment'] ) ) {
		return false;
	}

	// Otherwise, get number
	$number = $atts['number'];

	// Get attachment image src
	$image = wp_get_attachment_image_src( ( int ) $atts['attachment'], $atts['image_size'] );
	$atts['image'] = isset( $image[0] ) ? $image[0] : null;

	// Add content
	$atts['content'] = do_shortcode( $content );

	// Remove number card atts
	unset(
		$atts['number'],
		$atts['attachment'],
		$atts['image_size']
	);

	// Get and return the number card
	return \ui\get_number_card( $number, $atts );
}
add_shortcode( 'number_card', '\ui\number_card_shortcode' );
