<?php
namespace ui;

/**
 * Tile functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Main class
require __DIR__ . '/tile.class.php';

// Abstractions
require __DIR__ . '/abstractions/abstractions.php';

/**
 * Gets a tile
 */
function get_tile( $args = array() ) {

    // Instantiate tile with args
	$tile = new \ui\Tile( $args );

	// Return tile markup
	return $tile->get_component();
}

/**
 * Echoes a tile
 */
function tile( $args = array() ) {
	echo \ui\get_tile( $args );
}

/**
 * Tile shortcode
 */
function tile_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'tag'                         => 'div',
			'link'                        => null,
			'link_target'                 => null,
			'header_background_color'     => 'victoria',
			'header_additional_classes'   => '',
			'subtitle'                    => '',
			'subtitle_tag'                => 'div',
			'subtitle_additional_classes' => '',
			'title'                       => '',
			'title_tag'                   => 'h3',
			'title_additional_classes'    => '',
			'image'                       => null,
			'image_additional_classes'    => '',
			'content_background_color'    => 'rich_white',
			'content_additional_classes'  => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Add the content to the atts
	$atts['content'] = do_shortcode( $content );

	// Return a tile with the proper attributes
	return \ui\get_tile( $atts );
}
add_shortcode( 'tile', '\ui\tile_shortcode' );
