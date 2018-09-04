<?php
namespace fifteen_four\helpers;

/**
 * Error helper functions for this theme
 */

/**
 * Checks multiple error conditions and consolidates them into one error
 */
function check_known_errors( $error_conditionals = array() ) {

	// Set error to be filled if necessary
	$error = null;

	// Set up default error conditional
	$default_error_conditional = array(
		'conditional' => false,
		'code'        => 'unknown_error',
		'message'     => 'There was an unknown error on our end. Whoops!'
	);

	// Loop through each error conditional and check them
	foreach ( $error_conditionals as $error_conditional ) {

		// If the error conditional is an error, return the error
		if ( is_wp_error( $error_conditional ) ) {
			return $error_conditional;
		}

		// Otherwise, merge this error conditional with the default
		else if ( is_array( $error_conditional ) ) {
			$error_conditional = array_merge( $default_error_conditional, $error_conditional );

			// If the conditional is true, return an error with the error text added
			if ( $error_conditional['conditional'] ) {
				return new \WP_Error( $error_conditional['code'], $error_conditional['message'] );
			}
		}
	}

	// Return false if there are no errors
	return false;
}
