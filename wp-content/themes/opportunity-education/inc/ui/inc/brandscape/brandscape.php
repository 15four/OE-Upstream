<?php
namespace ui;

/**
 * Brandscape functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Main class
require __DIR__ . '/brandscape.class.php';

/*
 * Gets a brandscape
 */
function get_brandscape( $args = array() ) {

    // Instantiate brandscape with args
	$brandscape = new \ui\Brandscape( $args );

	// Return brandscape markup
	return $brandscape->get_component();
}

/*
 * Echoes a brandscape
 */
function brandscape( $args = array() ) {
	echo \ui\get_brandscape( $args );
}

/**
 * Brandscape shortcode
 */
function brandscape_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'type'                        => 'brandscape',
			'tag'                         => 'div',
			'is_static'                   => false,
			'background_image'            => null,
			'has_overlay'                 => false,
			'section_tag'                 => 'section',
			'section_additional_classes'  => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Get all sections within brandscape
	$sections = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'brandscape_section' );

	// Map the sections array to add content
	$sections = array_map(
		function( $shortcode ) {
			return array(
				'background_subject_type' => isset( $shortcode['background_subject_type'] ) ? $shortcode['background_subject_type'] : 'image',
				'background_subject'      => isset( $shortcode['background_subject'] ) ? $shortcode['background_subject'] : null,
				'content'                 => do_shortcode( $shortcode['content'] )
			);
		},
		$sections
	);

	// Add sections to atts
	$atts['sections'] = $sections;

	// Return brandscape
	return \ui\get_brandscape( $atts );
}
add_shortcode( 'brandscape', '\ui\brandscape_shortcode' );

/**
 * Brandscape section shortcode
 */
function brandscape_section_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'background_subject_type' => 'image',
			'background_subject'      => null
		),
		$atts
	);

	return '';
}
add_shortcode( 'brandscape_section', '\ui\brandscape_section_shortcode' );
