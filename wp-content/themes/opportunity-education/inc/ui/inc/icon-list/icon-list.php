<?php
namespace ui;

/**
 * Icon List functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/icon-list.class.php';

/**
 * Gets an icon list
 */
function get_icon_list( $args = array() ) {

    // Instantiate icon list with args
	$icon_list = new \ui\Icon_List( $args );

	// Return icon list markup
	return $icon_list->get_component();
}

/**
 * Echoes an icon list
 */
function icon_list( $args = array() ) {
	echo \ui\get_icon_list( $args );
}

/**
 * Icon List shortcode
 */
function icon_list_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'type'                    => 'document',
            'columns'                 => false,
            'layout'                  => false,
            'breakpoint'              => 'lg',
			'item_additional_classes' => '',
			'additional_classes'      => ''
		),
		$atts
	);

	// Get all list items
	$items = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'icon_list_item' );

	// Loop through items and do shortcodes
	foreach ( $items as &$item ) {
		$item['content'] = do_shortcode( \helpers\remove_unnecessary_line_breaks( $item['content'] ) );
	}

	// Add items to attributes
	$atts['items'] = $items;

	// Return an icon list with the proper attributes
	return \ui\get_icon_list( $atts );
}
add_shortcode( 'icon_list', '\ui\icon_list_shortcode' );

/**
 * Icon list item shortcode
 */
function icon_list_item_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'width'      => 6,
			'breakpoint' => 'lg',
			'icon'       => null,
		),
		$atts
	);

	return $content;
}
add_shortcode( 'icon_list_item', '\ui\icon_list_item_shortcode' );
