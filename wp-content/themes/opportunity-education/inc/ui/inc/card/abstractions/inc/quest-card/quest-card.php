<?php
namespace ui;

/**
 * Quest card abstraction
 *
 * @package Opportunity_Education
 */

/*
 * Gets a quest card
 */
function get_quest_card( $quest = null, $args = array() ) {

	// If the quest is null, return false
	if ( is_null( $quest ) ) {
		return false;
	}

	// Otherwise, set up some default args
	$default_args = array(

		// Quest card args
		'title_tag'               => 'h3',
		'driving_question_tag'    => 'h4',
		'subheader_tag'           => 'h5',

		// Card args
		'header_background_color' => 'rich_white',
		'additional_classes'      => ''
	);

	// Otherwise, get post
	$quest = get_post( $quest );

	// Set up args
	$args = array_merge(
		$default_args,
		$args,
		array(
			'type' => 'header'
		)
	);

	// Set up content args
	$content_args = array_merge(
		$args,
		array(
			'quest' => $quest
		)
	);

	// Add content
	$args['header_content'] = \fifteen_four\helpers\get_include( __DIR__ . '/templates/header.template.php', $content_args );
	$args['content'] = \fifteen_four\helpers\get_include( __DIR__ . '/templates/content.template.php', $content_args );

	// Add additional class
	$args['additional_classes'] = 'c-card--quest ' . $args['additional_classes'];

	// Unset quest card args
	unset(
		$args['title_tag'],
		$args['driving_question_tag'],
		$args['subheader_tag']
	);

	// Return the card with the appropriate args
	return \ui\get_card( $args );
}

/*
 * Echoes a quest card
 */
function quest_card( $quest = null, $args = array() ) {
	echo \ui\get_quest_card( $quest, $args );
}

/*
 * Quest card shortcode
 */
function quest_card_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(

			// Quest card args
			'quest'                      => null,
			'title_tag'                  => 'h3',
			'driving_question_tag'       => 'h4',
			'subheader_tag'              => 'h5',

			// Card args
			'tag'                        => 'div',
			'link'                       => null,
			'background_color'           => 'rich_white',
			'header_background_color'    => 'rich_white',
			'content_additional_classes' => '',
			'additional_classes'         => ''
		),
		$atts
	);

	// Get quest
	$quest = $atts['quest'];

	// Remove quest card atts
	unset( $atts['quest'] );

	// Get and return the quest card
	return \ui\get_quest_card( $quest, $atts );
}
add_shortcode( 'quest_card', '\ui\quest_card_shortcode' );
