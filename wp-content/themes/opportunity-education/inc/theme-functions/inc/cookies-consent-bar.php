<?php
namespace theme;

/**
 * Functions for the cookies consent bar
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Opportunity_Education
 */

/**
 * Register Cookies consent text setting
 */
function register_cookies_consent_text_setting() {

	// Register the setting
	register_setting(
		'general',
		'cookies_consent_bar_text',
		array(
			'type'         => 'string',
			'description'  => 'Cookies consent bar message',
			'show_in_rest' => false,
			'default'      => null
		)
	);

	// Add the setting field
	add_settings_field(
		'cookies_consent_bar_text',
		'Cookies Consent Bar Text',
		function( $args ) {

			// Echo the field
			echo \fifteen_four\helpers\wrap_with_tag( '', 'input', array( 'type' => 'text', 'name' => $args['field'], 'value' => get_option( $args['field'] ) ) );
		},
		'general',
		'default',
		array(
			'field' => 'cookies_consent_bar_text'
		)
	);
}
add_action( 'admin_init', '\theme\register_cookies_consent_text_setting' );
