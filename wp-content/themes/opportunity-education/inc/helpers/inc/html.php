<?php
namespace helpers;

/**
 * HTML helper functions
 *
 * @package Opportunity_Education
 */

/**
 * Adds abstract background class name depending on if the background is 'light' or 'dark'
 */
function prepare_background_class_names( $background = 'rich_white' ) {

	// Clean the background
	$background = \fifteen_four\helpers\clean_class_name( $background );

	// Check if the background exists either the light or dark background class names arrays
	// If it does, prepare and return the class name with the abstract class name prepended
	if ( in_array( $background, \constants\LIGHT_BACKGROUND_CLASS_NAMES ) ) {
		return 'u-background--light u-background--' . $background;
	}

	else if ( in_array( $background, \constants\DARK_BACKGROUND_CLASS_NAMES ) ) {
		return 'u-background--dark u-background--' . $background;
	}

	// Otherwise, prepare and return just the background class name
	return 'u-background--' . $background;
}
