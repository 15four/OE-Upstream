<?php
namespace helpers;

/**
 * Wordpress helper functions
 *
 * @package Opportunity_Education
 */

/**
 * Gets the URI of the current directory
 */
function get_current_directory_uri() {

	// Get backtrace
	$backtrace = debug_backtrace();

	// Grab directory of first backtrace
	$current_directory = dirname( $backtrace[0]['file'] );

	// Otherwise, replace the server root directory with the template directory and return
	return str_replace( get_template_directory(), get_template_directory_uri(), $current_directory );
}
