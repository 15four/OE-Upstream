<?php
namespace ui;

/**
 * Bio card abstraction
 *
 * @package Opportunity_Education
 */

/*
 * Gets a bio card
 */
function get_bio_card( $user_id = null, $args = array() ) {

	// If the user ID is null, return false
	if ( is_null( $user_id ) ) {
		return false;
	}

	// Otherwise, set up some default args
	$default_args = array(

		// Bio card args
		'title_tag'                  => 'h2',

		// Card args
		'content_additional_classes' => '',
		'additional_classes'         => ''
	);

	// Get user
	$user = get_userdata( $user_id );

	// Set up args
	$args = array_merge(
		$default_args,
		$args,
		array(
			'type' => 'regular',
			'link' => get_author_posts_url( $user->ID )
		)
	);

	// Set up content args
	$content_args = array_merge(
		$args,
		array(
			'user' => $user
		)
	);

	// Add content
	$args['content'] = \fifteen_four\helpers\get_include( __DIR__ . '/templates/content.template.php', $content_args );

	// Add additional classes
	$args['content_additional_classes'] = 'u-padding--std ' . $args['content_additional_classes'];
	$args['additional_classes'] = 'c-card--bio ' . $args['additional_classes'];

	// Unset bio card args
	unset( $args['title_tag'] );

	// Return the card with the appropriate args
	return \ui\get_card( $args );
}

/*
 * Echoes a bio card
 */
function bio_card( $user_id = null, $args = array() ) {
	echo \ui\get_bio_card( $user_id, $args );
}
