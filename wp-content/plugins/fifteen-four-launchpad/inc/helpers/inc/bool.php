<?php
namespace fifteen_four\helpers;

/**
 * Boolean helper functions
 */

/**
 * Returns false for bool false or string false
 */
function bool_cast( $value = 'false' ) {
	if ( !$value || $value === 'false' ) {
		return false;
	}
	return true;
}
