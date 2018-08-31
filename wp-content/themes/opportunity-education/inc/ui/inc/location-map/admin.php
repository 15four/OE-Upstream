<?php
namespace ui;

/**
 * Location Map admin functions
 *
 * @package Opportunity_Education
 */

/**
 * Echoes the admin location map
 */
function admin_location_map( $post ) {

	// Get global wp query
	global $wp_query;

	// Set post param of wp query because the admin section is dumb
	$wp_query->post = $post;

	// Set locations
	$locations = [];

	// Set locations query args
	$locations_args = array(
		'post_type'      => 'location',
		'posts_per_page' => -1,
		'post__not_in'   => [$post->ID]
	);

	// Query locations
	$locations_query = new \WP_Query( $locations_args );

	// While there are locations, output them
	while ( $locations_query->have_posts() ) {

		// Set up post
		$locations_query->the_post();

		// Grab the global
		$location = $locations_query->post;

		// Push location into locations arg
		array_push(
			$locations,
			array(
				'type'    => 'admin',
				'title'   => get_the_title(),
				'content' => \template\get_the_better_excerpt( $location ),
				'offset'  => array(
					'top'  => get_post_meta( $location->ID, 'location_offset_top', true ),
					'left' => get_post_meta( $location->ID, 'location_offset_left', true )
				)
			)
		);
	}

	// Reset postdata
	wp_reset_postdata();

	// Get location map
	\ui\location_map(
		array(
			'locations' => $locations
		)
	);
}

/*
 * Update post meta on post save
 */
function set_location_offset( $post_id ) {

	// Get offsets
	$top_offset = isset( $_POST['location_offset_top'] ) ? $_POST['location_offset_top'] : null;
	$left_offset = isset( $_POST['location_offset_left'] ) ? $_POST['location_offset_left'] : null;

	// If both offsets exist, update the post meta
	if ( !is_null( $top_offset ) && !is_null( $left_offset ) ) {
		update_post_meta( $post_id, 'location_offset_top', $top_offset );
		update_post_meta( $post_id, 'location_offset_left', $left_offset );
	}
}
add_action( 'save_post_location', '\ui\set_location_offset' );

/*
 * Add the meta box
 */
function location_map_metabox() {

	// Add the meta box
	add_meta_box(
		'location_map',
		'Location',
		'\ui\admin_location_map',
		'location'
	);
};
add_action( 'add_meta_boxes', '\ui\location_map_metabox' );

