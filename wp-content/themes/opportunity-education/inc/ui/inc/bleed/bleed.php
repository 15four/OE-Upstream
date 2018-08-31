<?php
namespace ui;

/**
 * Bleed functions
 *
 * Bleeds must live within a container for them to work. You have been warned!
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/bleed.class.php';

/**
 * Gets a bleed
 */
function get_bleed( $args = array() ) {

    // Instantiate bleed with args
	$bleed = new \ui\Bleed( $args );

	// Return bleed markup
	return $bleed->get_component();
}

/**
 * Echoes a bleed
 */
function bleed( $args = array() ) {
	echo \ui\get_bleed( $args );
}

/**
 * Bleed shortcode
 */
function bleed_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'tag'                        => 'div',
			'subject_side'               => 'right',
			'content_additional_classes' => '',
			'grid_additional_classes'    => '',
			'additional_classes'         => ''
		),
		$atts
	);

	// Get subject
	$bleed_subject = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'bleed_subject' );

	// Get content
	$bleed_content = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'bleed_content' );

	// Add bleed subject to the attributes if there is one
	if ( !empty( $bleed_subject ) ) {
		$atts['subject_content'] = do_shortcode( $bleed_subject[0]['content'] );
		$atts['subject_width'] = isset( $bleed_subject[0]['width'] ) ? $bleed_subject[0]['width'] : 6;
		$atts['subject_additional_classes'] = isset( $bleed_subject[0]['additional_classes'] ) ? $bleed_subject[0]['additional_classes'] : '';
	}

	// Add bleed content to the attributes if there is one
	if ( !empty( $bleed_content ) ) {
		$atts['content'] = do_shortcode( $bleed_content[0]['content'] );
		$atts['content_width'] = isset( $bleed_content[0]['width'] ) ? $bleed_content[0]['width'] : 6;
		$atts['content_additional_classes'] = isset( $bleed_content[0]['additional_classes'] ) ? $bleed_content[0]['additional_classes'] : '';
	}

	// Return a bleed with the proper attributes
	return \ui\get_bleed( $atts );
}
add_shortcode( 'bleed', '\ui\bleed_shortcode' );

/**
 * Bleed content and bleed subject shortcode
 */
function bleed_component_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'width'              => 6,
			'additional_classes' => ''
		),
		$atts
	);

	return $content;
}
add_shortcode( 'bleed_content', '\ui\bleed_component_shortcode' );
add_shortcode( 'bleed_subject', '\ui\bleed_component_shortcode' );
