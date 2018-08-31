<?php
namespace ui;

/**
 * Quote card abstraction
 *
 * @package Opportunity_Education
 */

/*
 * Gets a quote card
 */
function get_quote_card( $attachment_id = null, $content = '', $args = array() ) {

	// Get attachment
	$attachment = !is_null( $attachment_id )
		? get_post( $attachment_id )
		: null;

	// Set up some default args
	$default_args = array(

		// Quote card args
		'author'                     => '',
		'image_size'                 => 'square',

		// Card args
		'content_additional_classes' => '',
		'additional_classes'         => ''
	);

	// Set up args
	$args = array_merge(
		$default_args,
		$args,
		array(
			'type' => 'regular'
		)
	);

	// Set up content args
	$content_args = array_merge(
		$args,
		array(
			'attachment' => $attachment,
			'content'    => $content
		)
	);

	// Add content
	$args['content'] = \fifteen_four\helpers\get_include( __DIR__ . '/templates/content.template.php', $content_args );

	// Add additional classes
	$args['content_additional_classes'] = 'u-padding--section ' . $args['content_additional_classes'];
	$args['additional_classes'] = 'c-card--quote ' . $args['additional_classes'];

	// Unset quote card args
	unset(
		$args['author'],
		$args['image_size']
	);

	// Return the card with the appropriate args
	return \ui\get_card( $args );
}

/*
 * Echoes a quote card
 */
function quote_card( $attachment_id = null, $content = '', $args = array() ) {
	echo \ui\get_quote_card( $attachment_id, $content, $args );
}

/*
 * Quote card shortcode
 */
function quote_card_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(

			// Quote card args
			'author'                     => '',
			'attachment'                 => null,
			'image_size'                 => 'square',

			// Card args
			'tag'                        => 'div',
			'link'                       => null,
			'background_color'           => 'rich_white',
			'content_additional_classes' => '',
			'additional_classes'         => ''
		),
		$atts
	);

	// Get attachment
	$attachment_id = $atts['attachment'];

	// Prepare content
	$content = do_shortcode( \helpers\remove_unnecessary_line_breaks( $content ) );

	// Remove quote card atts
	unset( $atts['attachment'] );

	// Get and return the number card
	return \ui\get_quote_card( $attachment_id, $content, $atts );
}
add_shortcode( 'quote_card', '\ui\quote_card_shortcode' );
