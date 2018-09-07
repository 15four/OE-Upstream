<?php
namespace ui;

/**
 * Circle guy abstractions
 *
 * @package Opportunity_Education
 */

/**
 * Gets or echoes a circle guy from an attachment
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

/**
 * Gets or echoes a circle guy from a user ID
 */
function get_circle_guy_from_user( $user = null, $image_size = 'square', $args = array() ) {

	// If user is null, return false
	if ( is_null( $user ) ) {
		return false;
	}

	// Otherwise, get user
	$user = get_userdata( ( int ) $user );

	// If the user doesn't exist, return false
	if ( !$user ) {
		return false;
	}

	// Otherwise, set user avatar
	$avatar = array( 'src' => [null] );

	// If the wp user avatar function exists, get the avatar
	if ( function_exists( '\get_wp_user_avatar' ) ) {
		$avatar = new \SimpleXMLElement( \get_wp_user_avatar( $user->ID, $image_size ) );
	}

	// Get avatar src
	$avatar_src = $avatar['src'];

	// Merge args with avatar image
	$args = array_merge(
		$args,
		array(
			'image' => $avatar_src[0]
		)
	);

	// Return a circle guy with the proper attributes
	return \ui\get_circle_guy( $args );
}

function circle_guy_from_user( $user = null, $image_size = 'square', $args = array() ) {
	echo \ui\get_circle_guy_from_user( $user, $image_size, $args );
}

/**
 * Circle guy from user shortcode
 */
function circle_guy_from_user_shortcode( $atts ) {

	// Atts
	$atts = shortcode_atts(
		array(

			// User specific
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
	$user = $atts['id'];
	$image_size = $atts['image_size'];

	// Remove args from atts
	unset(
		$atts['id'],
		$atts['image_size']
	);

	return \ui\get_circle_guy_from_user( $user, $image_size, $atts );
}
add_shortcode( 'circle_guy_from_user', 'ui\circle_guy_from_user_shortcode' );
