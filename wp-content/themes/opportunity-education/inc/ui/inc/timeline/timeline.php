<?php
namespace ui;

/**
 * Timeline functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/timeline.class.php';

/**
 * Gets an timeline
 */
function get_timeline( $args = array() ) {

    // Instantiate timeline with args
	$timeline = new \ui\Timeline( $args );

	// Return timeline markup
	return $timeline->get_component();
}

/**
 * Echoes a timeline
 */
function timeline( $args = array() ) {
	echo \ui\get_timeline( $args );
}

/**
 * Timeline shortcode
 */
function timeline_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'period_tag'                => 'h3',
			'period_additional_classes' => '',
			'item_additional_classes'   => '',
			'additional_classes'        => ''
		),
		$atts
	);

	// Get all periods
	$periods = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'timeline_period' );

	// Loop through each period
	foreach ( $periods as &$period ) {

		// Get all items in period
		$items = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $period['content'] ), 'timeline_item' );

		// Loop through items and do shortcodes
		foreach ( $items as &$item ) {
			$item['content'] = do_shortcode( $item['content'] );
		}

		// Set items array in each period by getting item shortcodes within
		$period['items'] = $items;
	}

	// Add periods to attributes
	$atts['periods'] = $periods;

	// Return a timeline with the proper attributes
	return \ui\get_timeline( $atts );
}
add_shortcode( 'timeline', '\ui\timeline_shortcode' );

/**
 * Timeline period shortcode
 */
function timeline_period_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'label'              => '2005',
			'additional_classes' => ''
		),
		$atts
	);

	return $content;
}
add_shortcode( 'timeline_period', '\ui\timeline_period_shortcode' );

/**
 * Timeline item shortcode
 */
function timeline_item_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'additional_classes' => ''
		),
		$atts
	);

	return $content;
}
add_shortcode( 'timeline_item', '\ui\timeline_item_shortcode' );
