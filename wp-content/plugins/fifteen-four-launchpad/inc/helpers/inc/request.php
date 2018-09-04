<?php
namespace fifteen_four\helpers;

/**
 * Request helper functions
 */

/**
 * Get current url with or without pagination
 */
function get_current_url( $include_pagination = true ) {

	// Grab global wp object
	global $wp;

	// Get current url
	$current_url = home_url( $_SERVER['REQUEST_URI'] );

	if ( !$include_pagination ) {

		// Get position of last character of url
		$url_end_position = strlen( $current_url );

		// Get position on page directory
		$page_directory_position = strpos( $current_url , '/page' );
		$page_directory_position = $page_directory_position !== false
			? $page_directory_position
			: $url_end_position;

		// Get position of any query vars
		$query_vars_position = strpos( $current_url, '/?' );
		$query_vars_position = $query_vars_position !== false
			? $query_vars_position
			: $url_end_position;

		// Removes page directory structure if it finds it
		$current_url = $page_directory_position
			? substr_replace( $current_url, '', $page_directory_position, $query_vars_position - $page_directory_position )
			: $current_url;
	}

	// Return formatted url
	return trailingslashit( $current_url );
}
