<?php
namespace theme;

/**
 * Functions for Google Analytics
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Opportunity_Education
 */

/**
 * Register GA code setting
 */
function register_google_analytics_id_setting() {

	// Register the setting
	register_setting(
		'general',
		'google_analytics_id',
		array(
			'type'         => 'string',
			'description'  => 'Your Google Analytics ID',
			'show_in_rest' => false,
			'default'      => null
		)
	);

	// Add the setting field
	add_settings_field(
		'google_analytics_id',
		'Google Analytics ID',
		function( $args ) {

			// Echo the field
			echo \fifteen_four\helpers\wrap_with_tag( '', 'input', array( 'type' => 'text', 'name' => $args['field'], 'value' => get_option( $args['field'] ) ) );
		},
		'general',
		'default',
		array(
			'field' => 'google_analytics_id'
		)
	);
}
add_action( 'admin_init', '\theme\register_google_analytics_id_setting' );

/**
 * Get GA code
 */
function get_google_analytics_code( $exclude_logged_in_users = false ) {

	// If the user is logged in and the exclude_logged_in_users arg is true, return false
	if ( is_user_logged_in() && $exclude_logged_in_users ) {
		return false;
	}

	// Otherwise, get the GA ID option
	$ga_id = get_option( 'google_analytics_id' );

	// If the option is blank, return false
	if ( !$ga_id ) {
		return false;
	}

	// Otherwise, return the Google Analytics code
	return '<!-- Global site tag (gtag.js) - Google Analytics -->'
		. '<script async src="https://www.googletagmanager.com/gtag/js?id=' . $ga_id . '"></script>'
		. '<script>'
			. 'window.dataLayer = window.dataLayer || [];'
			. 'function gtag(){dataLayer.push(arguments);}'
			. 'gtag("js", new Date());'
			. 'gtag("config", "' . $ga_id . '")'
		. '</script>';
}
