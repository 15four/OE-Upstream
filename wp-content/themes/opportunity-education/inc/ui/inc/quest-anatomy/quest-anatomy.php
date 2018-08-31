<?php
namespace ui;

/**
 * Quest Anatomy functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/quest-anatomy.class.php';

/**
 * Gets a quest anatomy
 */
function get_quest_anatomy( $args = array() ) {

    // Instantiate quest anatomy with args
	$quest_anatomy = new \ui\Quest_Anatomy( $args );

	// Return quest anatomy markup
	return $quest_anatomy->get_component();
}

/**
 * Echoes a quest anatomy
 */
function quest_anatomy( $args = array() ) {
	echo \ui\get_quest_anatomy( $args );
}

/**
 * Quest anatomy shortcode
 */
function quest_anatomy_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'attachment'               => null,
			'tag'                      => 'div',
			'reviews_offset'           => '41.1',
			'reviews_content'          => 'Learners are able to submit reviews of quests.',
			'effort_offset'            => '41.1',
			'effort_content'           => 'Every quest gets rated in terms of the effort required by the learner.',
			'artifacts_offset'         => '89',
			'artifacts_content'        => 'At the center of every quest is the production of an artifact.',
			'driving_question_offset'  => '63',
			'driving_question_content' => 'Every quest starts with a Driving Question.',
			'additional_classes'       => ''
		),
		$atts
	);

	// Set image as null
	$image = null;

	// If image arg isn't null, get the attachment
	if ( !is_null( $atts['attachment'] ) ) {

		// Get attachment
		$attachment = get_post( $atts['attachment'] );

		// Set image as attachment src
		$image = wp_get_attachment_image_src( $attachment, 'full' );
		$image = $image
			? $image[0]
			: null;
	}

	// Remove attachment arg
	unset( $atts['attachment'] );

	// Return a quest anatomy with the proper attributes
	return \ui\get_quest_anatomy( $atts );
}
add_shortcode( 'quest_anatomy', '\ui\quest_anatomy_shortcode' );
