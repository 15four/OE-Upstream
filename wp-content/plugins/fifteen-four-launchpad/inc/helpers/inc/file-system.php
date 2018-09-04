<?php
namespace fifteen_four\helpers;

/**
 * File System helper functions
 */

/**
 * Get an include file via a function and return its contents
 */
function get_included_via_function( $function, ...$params ) {

	// Set output
	$output = '';

	// Open output buffer
	ob_start();

	// Call function
	call_user_func( $function, ...$params );

	// Add contents to variable
	$output .= ob_get_contents();

	// Close output buffer
	ob_end_clean();

	// Return HTML output
	return $output;
}

/**
 * Get an included file and return its contents
 */
function get_include( $path, $args = array() ) {

	// Set output
	$output = '';

	// Open output buffer
	ob_start();

	// Include file
	include( $path );

	// Add contents to variable
	$output .= ob_get_contents();

	// Close output buffer
	ob_end_clean();

	// Return HTML output
	return $output;
}
