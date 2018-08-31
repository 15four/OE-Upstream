<?php
namespace ui;

/**
 * Launcher functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Class
require __DIR__ . '/launcher.class.php';

/**
 * Gets a launcher
 */
function get_launcher( $args = array() ) {

    // Instantiate launcher with args
	$launcher = new \ui\Launcher( $args );

	// Return launcher markup
	return $launcher->get_component();
}

/**
 * Echoes a launcher
 */
function launcher( $args = array() ) {
	echo \ui\get_launcher( $args );
}

/**
 * Launcher shortcode
 */
function launcher_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'type'                       => 'video',
			'target'                     => '',
			'icon_color'                 => 'rich_white',
			'content_additional_classes' => '',
			'additional_classes'         => ''
		),
		$atts
	);

	// Add the content to the atts
	$atts['content'] = do_shortcode( $content );

	// Return a launcher with the proper attributes
	return \ui\get_launcher( $atts );
}
add_shortcode( 'launcher', '\ui\launcher_shortcode' );
