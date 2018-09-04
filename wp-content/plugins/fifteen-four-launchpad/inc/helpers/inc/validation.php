<?php
namespace fifteen_four\helpers;

/**
 * Validation helper functions
 */

/**
 * Determines if a US phone number is valid
 */
function validate_phone_number( $phone_number = null ) {

	// If the phone number is null, return false
	if ( $phone_number === null ) {
		return false;
	}

	// Otherwise, normalize it
	$phone_number = \fifteen_four\helpers\normalize_phone_number( $phone_number );

	// If the phone number is 11 digits long, remove the first digit
	if ( strlen( $phone_number ) === 11 ) {
		$phone_number = substr( $phone_number, 1 );
	}

	// Return whether or not the resultant phone number is 10 digits long
	return strlen( $phone_number ) === 10;
}
