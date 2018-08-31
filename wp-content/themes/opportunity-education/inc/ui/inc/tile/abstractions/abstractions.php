<?php
namespace ui;

/**
 * Tile abstractions
 *
 * @package Opportunity_Education
 */

/**
 * Gets a tile from a post
 */
function get_tile_from_post( $post = null, $args = array() ) {

	// If the post is null, grab the global
	if ( $post === null ) {
		global $post;
	}

	// Get the post
	$post = get_post( $post );

	// Set the image
	$args['image'] = get_the_post_thumbnail_url( $post, 'card' );

	// Set the title
	$args['title'] = get_the_title( $post );

	// Set the link
	$args['link'] = get_the_permalink( $post );

	// Set the content
	$args['content'] = \template\get_the_better_excerpt( $post, ( int ) $args['excerpt_length'] );

	// Unset excerpt args
	unset( $args['excerpt_length'] );

	// Return the tile
	return \ui\get_tile( $args );
}

/**
 * Echoes a tile from a post
 */
function tile_from_post( $post = null, $args = array() ) {
	echo \ui\get_tile_from_post( $post, $args );
}

/**
 * Tile from post shortcode
 */
function tile_from_post_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(

			// Post & excerpt args
			'post'                        => null,
			'excerpt_length'              => 300,

			// Tile args
			'tag'                         => 'div',
			'link_target'                 => null,
			'header_background_color'     => 'victoria',
			'header_additional_classes'   => '',
			'subtitle'                    => '',
			'subtitle_tag'                => 'div',
			'subtitle_additional_classes' => '',
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

	// Set the post
	$post = $atts['post'];

	// Unset post args
	unset( $atts['post'] );

	// Return a tile with the proper attributes
	return \ui\get_tile_from_post( $post, $atts );
}
add_shortcode( 'tile_from_post', '\ui\tile_from_post_shortcode' );
