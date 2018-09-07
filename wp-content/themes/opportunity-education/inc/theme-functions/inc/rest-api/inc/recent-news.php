<?php
namespace theme;

/**
 * REST API functions for current news
 *
 * @package Opportunity_Education
 */

// Handle recent news
function handle_recent_news_endpoint_request( \WP_REST_Request $request ) {
	return \ui\get_recent_news( $request->get_query_params() );
}

// Register recent news REST API endpoint
function register_recent_news_rest_endpoint() {

	// Register the endpoint
	register_rest_route(
		'oe/v1',
		'/recent-news',
		array(
    		'methods'  => 'GET',
			'callback' => '\theme\handle_recent_news_endpoint_request',
			'args'     => array(
				'featured_post' => array(
					'default'           => null,
					'validate_callback' => function( $param ) {
						return is_int( $param ) || is_null( $param );
					}
				),
				'post_count'    => array(
					'default'           => 3,
					'validate_callback' => function( $param ) {
						return is_int( $param );
					}
				)
			)
		)
	);
}
add_action( 'rest_api_init', '\theme\register_recent_news_rest_endpoint' );
