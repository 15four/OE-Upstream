<?php
namespace template;

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Opportunity_Education
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function body_classes( $classes ) {

	// Get global bools
	global
	$is_lynx,
	$is_gecko,
	$is_IE,
	$is_opera,
	$is_NS4,
	$is_safari,
	$is_chrome,
	$is_iphone;

	// Add browser class if it can be determined

	// Lynx
	if ( $is_lynx ) {
		$classes[] = 'lynx';
	}

	// Gecko
	else if ( $is_gecko ) {
		$classes[] = 'gecko';
	}

	// Opera
	else if ( $is_opera ) {
		$classes[] = 'opera';
	}

	// NS4
	else if ( $is_NS4 ) {
		$classes[] = 'ns4';
	}

	// Safari
	else if ( $is_safari ) {
		$classes[] = 'safari';
	}

	// Chrome
	else if ( $is_chrome ) {
		$classes[] = 'chrome';
	}

	// Turd
	else if ( $is_IE ) {

		// Add IE class
        $classes[] = 'ie';

        // Set IE version
        $IE_version = '';

        // Add class for IE version if it can be found
        if ( preg_match( '/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $IE_version ) ) {
        	$classes[] = 'ie' . $IE_version[1];
        }
	}

	// If browser cannot be determined
	else {
		$classes[] = 'unknown-browser';
	}

	// Add iPhone class if possible
	if ( $is_iphone ) {
		$classes[] = 'iphone';
	}

	// Add operating system class if it can be determined

	// Mac OSX
	if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'mac' ) ) {
	    $classes[] = 'osx';
	}

	// Linux
	else if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'linux' ) ) {
		$classes[] = 'linux';
	}

	// Windows
	else if ( stristr( $_SERVER['HTTP_USER_AGENT'], 'windows' ) ) {
		$classes[] = 'windows';
	}

	// Adds a class of hfeed to non-singular pages

	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
// Turn this off when caching is enabled
// add_filter( 'body_class', '\template\body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', '\template\pingback_header' );
