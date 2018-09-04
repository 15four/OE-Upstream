<?php
namespace fifteen_four\helpers\acf;

/**
 * ACF helper functions for this theme
 *
 * @package Best_Bison
 */

/**
 * Normalizes ACF select field return values as arrays
 */
function normalize_select_field( $value ) {

	// If the value is an array, return it
	if ( is_array( $value ) ) {
		return $value;
	}

	// If the value is a string, make it an array and return
	else if ( is_string( $value ) ) {
		return [$value];
	}

	// Otherwise, return an array with a null value
	return [null];
}

/**
 * Safely gets a URL for a specific size from an image, falls back to the original
 */
function get_image( $image_array, $size = 'section' ) {

	// If the image array is empty, return false
	if ( empty( $image_array ) ) {
		return false;
	}

	// Return the image url or the full size image url
	return isset( $image_array['sizes'][$size] ) ? $image_array['sizes'][$size] : $image_array['url'];
}
