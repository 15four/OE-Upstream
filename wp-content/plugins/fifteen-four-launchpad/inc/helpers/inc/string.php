<?php
namespace fifteen_four\helpers;

/**
 * String helper functions
 */

/**
 * Cleans class names, preserving double underscores for BEM
 */
function clean_class_name( $string ) {
	return preg_replace( '/(?<!_)_(?!_)/', '-', str_replace( '  ', ' ', trim( $string ) ) );
}

/**
 * Splits string into array by a delimiter, trimming the results
 */
function explode_and_trim( $delimiter = ',', $string = null, $limit = PHP_INT_MAX ) {

	// If there is no string, return false
	if ( !$string ) {
		return false;
	}

	// Otherwise return formatted array
	return array_map(
		'trim',
		explode( $delimiter, trim( $string ), $limit )
	);
}

/**
 * Splits a string of text by shortcode tags and returns an array of arrays
 */
function explode_by_shortcode( $content = '' ) {

	// If the content is empty, return false
	if ( empty( $content ) ) {
		return false;
	}

	// Set shortcodes array
	$shortcodes = array();

	// Set preg match array
	$matches = array();

	// Get shortcode regular expression
	$regex = get_shortcode_regex();

	// Match content to regEx
	preg_match_all( '~' . $regex . '~', $content, $matches );

	// Get shortcode names
	$shortcodes_names = $matches[2];

	// Get shortcode atts
	$shortcodes_attributes = $matches[3];

	// Get shortcode content
	$shortcodes_content = $matches[5];

	// Loop through matches and create array entries
    foreach( $shortcodes_names as $index => $shortcode_name ) {

		// Set shortcode
		$shortcode = array(
			'shortcode_name' => $shortcode_name,
			'content'        => $shortcodes_content[$index]
		);

		// Get attributes for this shortcode
		$shortcode_attributes = shortcode_parse_atts( $shortcodes_attributes[$index] );

		// Add shortcode to shortcode array
		$shortcodes[] = array_merge( $shortcode, is_array( $shortcode_attributes ) ? $shortcode_attributes : array() );
	}

    return $shortcodes;
}

/**
 * Cleans and normalizes phone numbers
 */
function normalize_phone_number( $phone_number = '' ) {

	// DEPRECATED - Filter out all non-numeric characters except for parenthesis and + signs
	// return preg_replace( '|(?mi-Us)[^0-9 \\-\\(\\)\\+\\/]|', '', $phone_number );

	// Filter out all non-numeric characters
	return preg_replace( '/[^0-9,.]/', '', $phone_number );
}
