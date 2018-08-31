<?php
namespace ui;

/**
 * Card functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Main class
require __DIR__ . '/card.class.php';

// Abstractions
require __DIR__ . '/abstractions/abstractions.php';

/**
 * Gets a card
 */
function get_card( $args = array() ) {

    // Instantiate card with args
	$card = new \ui\Card( $args );

	// Return card markup
	return $card->get_component();
}

/**
 * Echoes a card
 */
function card( $args = array() ) {
	echo \ui\get_card( $args );
}

/**
 * Card shortcode
 */
function card_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'type'                          => 'regular',
			'tag'                           => 'div',
			'link'                          => null,
			'background_color'              => 'rich_white',
			'header_content'                => '',
			'header_background_color'       => 'victoria',
			'header_additional_classes'     => '',
			'image'                         => null,
			'image_additional_classes'      => '',
			'belt_image'                    => null,
			'belt_image_additional_classes' => '',
			'content_additional_classes'    => '',
			'additional_classes'            => ''
		),
		$atts
	);

	// Add the content to the atts
	$atts['content'] = do_shortcode( $content );

	// Return a card with the proper attributes
	return \ui\get_card( $atts );
}
add_shortcode( 'card', '\ui\card_shortcode' );

/**
 * Header card shortcode
 */
function header_card_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(

			// Abstracted args
			'header_content_tag'                => 'h3',
			'header_content_additional_classes' => '',

			// Card args
			'type'                              => 'regular',
			'tag'                               => 'div',
			'link'                              => null,
			'background_color'                  => 'rich_white',
			'header_content'                    => '',
			'header_background_color'           => 'victoria',
			'header_additional_classes'         => '',
			'content_additional_classes'        => '',
			'additional_classes'                => ''
		),
		$atts
	);

	// Add the type, header content, and content to the atts
	$atts['type'] = 'header';
	$atts['header_content'] = \fifteen_four\helpers\wrap_with_tag(
		$atts['header_content'],
		$atts['header_content_tag'],
		array(
			'class' => $atts['header_content_additional_classes']
		)
	);
	$atts['content'] = do_shortcode( $content );

	// Unset abstracted args
	unset(
		$atts['header_content_tag'],
		$atts['header_content_additional_classes']
	);

	// Return a card with the proper attributes
	return \ui\get_card( $atts );
}
add_shortcode( 'header_card', '\ui\header_card_shortcode' );

/*
 * Image card shortcode
 */
function image_card_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(

			// Abstracted args
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

	// Set image
	$image = null;

	// If the attachment is not null, get the attachment
	if ( !is_null( $atts['attachment'] ) ) {

		// Otherwise, get the attachment
		$attachment = get_post( $atts['attachment'] );

		// Otherwise, get the image and set the type
		$image = wp_get_attachment_image_src( $attachment->ID, $atts['image_size'] );
		$image = $image
			? $image[0]
			: null;
	}

	// Add the image, type and content to the atts
	$atts['image'] = $image;
	$atts['type'] = 'image';
	$atts['content'] = do_shortcode( $content );

	// Remove abstracted args from atts
	unset(
		$atts['attachment'],
		$atts['image_size']
	);

	// Get an image card with the correct atts
	return \ui\get_card( $atts );
}
add_shortcode( 'image_card', '\ui\image_card_shortcode' );

/**
 * Belt card shortcode
 */
function belt_card_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(

			// Abstracted args
			'image_attachment'              => null,
			'image_size'                    => 'large',
			'belt_image_attachment'         => null,

			// Belt card args
			'tag'                           => 'div',
			'link'                          => null,
			'background_color'              => 'rich_white',
			'image'                         => null,
			'image_additional_classes'      => '',
			'belt_image_additional_classes' => '',
			'content_additional_classes'    => '',
			'additional_classes'            => ''
		),
		$atts
	);

	// Set image and belt image
	$image = null;
	$belt_image = null;

	// If the image attachment is not null, get the attachment
	if ( !is_null( $atts['image_attachment'] ) ) {

		// Get image attachment
		$image_attachment = get_post( $atts['image_attachment'] );

		// Get image
		$image = wp_get_attachment_image_src( $image_attachment->ID, $atts['image_size'] );
		$image = $image
			? $image[0]
			: null;
	}

	// If the belt image attachment is not null, get the attachment
	if ( !is_null( $atts['belt_image_attachment'] ) ) {

		// Get belt image attachment
		$belt_image_attachment = get_post( $atts['belt_image_attachment'] );

		// Get belt image
		$belt_image = wp_get_attachment_image_src( $belt_image_attachment->ID, 'square' );
		$belt_image = $belt_image
			? $belt_image[0]
			: null;
	}

	// Add the images, type and content to the atts
	$atts['image'] = $image;
	$atts['belt_image'] = $belt_image;
	$atts['type'] = 'belt';
	$atts['content'] = do_shortcode( $content );

	// Remove abstracted args from atts
	unset(
		$atts['image_attachment'],
		$atts['image_size'],
		$atts['belt_image_attachment']
	);

	// Return a card with the proper attributes
	return \ui\get_card( $atts );
}
add_shortcode( 'belt_card', '\ui\belt_card_shortcode' );
