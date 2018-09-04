<?php
namespace fifteen_four\helpers;

/**
 * Array helper functions
 */

/**
 * Flattens an array of styles into a string
 */
function get_styles_from_array( $style_array ) {

	// Set output
	$output = '';

	// Loop through each style, format them, and add to string
	foreach ( $style_array as $style_prop => $value ) {

		// Only add to output if value exists
		if ( $value ) {
			$output .= ' ' . $style_prop . ': ' . esc_attr( $value ) . ';';
		}
	}

	// Return style string
	return trim( $output );
}

/**
 * Flattens attribute array into a string
 */
function get_attributes_from_array( $attribute_array ) {

	// Set output
	$output = '';

	// Loop through attributes, format them, and add to string
	foreach ( $attribute_array as $attribute => $value ) {

		// For styles
		if ( $attribute === 'style' ) {
			$value = get_styles_from_array( $value );
		}

		// Only add to output if value exists
		if ( $value || $value === '0' ) {

			// If attribute is class, clean class name
			if ( $attribute === 'class' ) {
				$value = clean_class_name( $value );
			}

			// Add attribute
			$output .= ( $value !== true
				? ' ' . $attribute . '="' . esc_attr( $value ) . '"'
				: ' ' . $attribute );
		}
	}

	// Return attribute string
	return trim( $output );
}

/**
 * Filters an array of shortcodes by a shortcode name
 */
function filter_shortcodes( $shortcodes = array(), $name = false ) {

	// If the shortcodes array is empty or the shortcode name is not specified, return an empty array
	if ( empty( $shortcodes ) || !$name ) {
		return array();
	}

	// Set filtered shortcodes array
	$filtered_shortcodes = array_filter(
		$shortcodes,
		function( $shortcode ) use ( $name ) {
			return $shortcode['shortcode_name'] === $name;
		}
	);

	// Otherwise, re-index and filter the array
	return array_values( $filtered_shortcodes );
}
