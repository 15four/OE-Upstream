<?php
namespace ui;

/**
 * Location map abstractions
 *
 * @package Opportunity_Education
 */

/*
 * Gets a location map from location posts
 */
function get_location_map_from_locations( $args = array() ) {

	// Clear locations arg
	$args['locations'] = [];

	// Set locations query args
	$locations_args = array(
		'post_type'      => 'location',
		'posts_per_page' => -1,
		'order'          => 'ASC'
	);

	// Query locations
	$locations_query = new \WP_Query( $locations_args );

	// While there are locations, output them
	while ( $locations_query->have_posts() ) {

		// Set up post
		$locations_query->the_post();

		// Grab the global
		$location = $locations_query->post;

		// Get type
		$type = wp_get_post_terms( $location->ID, 'location_type' );
		$type = !empty( $type )
			? $type[0]->slug
			: 'quest-forward-program';

		// Push location into locations arg
		array_push(
			$args['locations'],
			array(
				'type'    => $type,
				'title'   => get_the_title(),
				'content' => \template\get_the_better_excerpt( $location, PHP_INT_MAX ),
				'offset'  => array(
					'top'  => get_post_meta( $location->ID, 'location_offset_top', true ),
					'left' => get_post_meta( $location->ID, 'location_offset_left', true )
				)
			)
		);
	}

	// Reset postdata
	wp_reset_postdata();

	// Return a location map with the correct args
	return \ui\get_location_map( $args );
}

/**
 * Location map shortcode
 */
function location_map_shortcode( $atts, $content ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'tag'                         => 'div',
			'location_additional_classes' => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Return a location map with the proper attributes
	return \ui\get_location_map_from_locations( $atts );
}
add_shortcode( 'location_map', '\ui\location_map_shortcode' );
