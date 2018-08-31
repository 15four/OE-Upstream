<?php
namespace ui;

/**
 * Stats List functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/stats-list.class.php';

/**
 * Gets an stats list
 */
function get_stats_list( $args = array() ) {

    // Instantiate stats list with args
	$stats_list = new \ui\Stats_List( $args );

	// Return stats list markup
	return $stats_list->get_component();
}

/**
 * Echoes an stats list
 */
function stats_list( $args = array() ) {
	echo \ui\get_stats_list( $args );
}

/**
 * Stats List shortcode
 */
function stats_list_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'tag'                     => 'div',
			'icon'                    => null,
			'item_additional_classes' => '',
			'additional_classes'      => ''
		),
		$atts
	);

	// Get all list items
	$items = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'stats_list_item' );

	// Add items to attributes
	$atts['items'] = $items;

	// Return an stats list with the proper attributes
	return \ui\get_stats_list( $atts );
}
add_shortcode( 'stats_list', '\ui\stats_list_shortcode' );

/**
 * Stats list item shortcode
 */
function stats_list_item_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'count' => 99,
			'stat'  => 'Bottles of Beer',
		),
		$atts
	);

	return $content;
}
add_shortcode( 'stats_list_item', '\ui\stats_list_item_shortcode' );
