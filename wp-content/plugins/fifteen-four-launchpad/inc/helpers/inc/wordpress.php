<?php
namespace fifteen_four\helpers;

/**
 * Wordpress helper functions
 */

/**
 * Get user(s) via a meta field and value
 */
function get_user_by_meta( $meta_key, $meta_value ) {

	// Get all matching users
	$users = \fifteen_four\helpers\get_users_by_meta( $meta_key, $meta_value );

    // Return the first one
	return reset( $users );
}

function get_users_by_meta( $meta_key, $meta_value ) {

	// if any of the args are left empty, return empty array
	if ( empty( $meta_key ) || empty( $meta_value ) ) {
		return array();
	}

    // Get the matching users and return them
	return get_users(
        array(
            'meta_key'    => $meta_key,
            'meta_value'  => $meta_value,
            'count_total' => false
        )
	);
}

/**
 * Check if a user has a given role
 */
function user_has_role( $user, $role = 'administrator' ) {

	// If the user is not a user, return false
	if ( $user instanceof \WP_User == false ) {
		return false;
	}

	// Otherwise check the role
	return in_array( $role, $user->roles );
}
