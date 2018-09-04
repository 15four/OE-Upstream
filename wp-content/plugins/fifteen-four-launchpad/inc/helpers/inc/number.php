<?php
namespace fifteen_four\helpers;

/**
 * Number helper functions
 */

/**
 * Determines if a number is in a range
 */
function number_is_in_range( $number, $min, $max, $include_bounds = true ) {

	return $include_bounds
		? $min <= $number && $number <= $max
		: $min < $number && $number < $max;
}
