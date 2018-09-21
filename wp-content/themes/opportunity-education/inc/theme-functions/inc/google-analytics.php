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

/**
 * Register Google Tag Manager code setting
 */
function register_google_tag_manager_id_setting() {

	// Register the setting
	register_setting(
		'general',
		'google_tag_manager_id',
		array(
			'type'         => 'string',
			'description'  => 'Your Google Tag Manager ID',
			'show_in_rest' => false,
			'default'      => null
		)
	);

	// Add the setting field
	add_settings_field(
		'google_tag_manager_id',
		'Google Tag Manager ID',
		function( $args ) {

			// Echo the field
			echo \fifteen_four\helpers\wrap_with_tag( '', 'input', array( 'type' => 'text', 'name' => $args['field'], 'value' => get_option( $args['field'] ) ) );
		},
		'general',
		'default',
		array(
			'field' => 'google_tag_manager_id'
		)
	);
}
add_action( 'admin_init', '\theme\register_google_tag_manager_id_setting' );

/**
 * Get Google Tag Manager code
 */
function get_google_tag_manager_code( $exclude_logged_in_users = false ) {

	// If the user is logged in and the exclude_logged_in_users arg is true, return false
	if ( is_user_logged_in() && $exclude_logged_in_users ) {
		return false;
	}

	// Otherwise, get the Google Tag Manager ID option
	$google_tag_manager_id = get_option( 'google_tag_manager_id' );

	// If the option is blank, return false
	if ( !$google_tag_manager_id ) {
		return false;
	}

	// Otherwise, return the Google Tag Manager code
	return '<!-- Google Tag Manager -->'
		. '<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start":'
		. 'new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0],'
		. 'j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src='
		. '"https://www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);'
		. '})(window,document,"script","dataLayer","' . $google_tag_manager_id . '");</script>'
		. '<!-- End Google Tag Manager -->';
}

/**
 * Get Google Tag Manager noscript code
 */
function get_google_tag_manager_noscript_code( $exclude_logged_in_users = false ) {

	// If the user is logged in and the exclude_logged_in_users arg is true, return false
	if ( is_user_logged_in() && $exclude_logged_in_users ) {
		return false;
	}

	// Otherwise, get the Google Tag Manager ID option
	$google_tag_manager_id = get_option( 'google_tag_manager_id' );

	// If the option is blank, return false
	if ( !$google_tag_manager_id ) {
		return false;
	}

	// Otherwise, return the Google Tag Manager noscript code
	return '<!-- Google Tag Manager (noscript) -->'
		. '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . $google_tag_manager_id . '" '
		. 'height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>'
		. '<!-- End Google Tag Manager (noscript) -->';
}
