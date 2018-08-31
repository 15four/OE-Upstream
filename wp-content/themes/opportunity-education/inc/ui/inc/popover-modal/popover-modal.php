<?php
namespace ui;

/**
 * Popover modal functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Class
require __DIR__ . '/popover-modal.class.php';

/**
 * Gets a popover modal
 */
function get_popover_modal( $args = array() ) {

    // Instantiate popover modal with args
	$popover_modal = new \ui\Popover_Modal( $args );

	// Return popover modal markup
	return $popover_modal->get_component();
}

/**
 * Echoes a popover modal
 */
function popover_modal( $args = array() ) {
	echo \ui\get_popover_modal( $args );
}

/**
 * Popover modal shortcode
 */
function popover_modal_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'id'                     => '',
			'box_additional_classes' => '',
			'additional_classes'     => ''
		),
		$atts
	);

	// Add the content to the atts
	$atts['content'] = do_shortcode( $content );

	// Return a popover modal with the proper attributes
	return \ui\get_popover_modal( $atts );
}
add_shortcode( 'popover_modal', '\ui\popover_modal_shortcode' );
