<?php
namespace theme;

/**
 * Functions for enqueuing scripts and styles
 *
 * @package Opportunity_Education
 */

/**
 * Enqueue scripts and styles
 */
function scripts() {

	// Main Fonts
	wp_enqueue_style( 'opportunity-education-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i' );

	// Move jQuery to footer
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

	// Main styles
	wp_enqueue_style( 'opportunity-education-style', get_template_directory_uri() . '/style.css' );

	// Main scripts
	wp_register_script( 'opportunity-education-scripts-vendor', get_template_directory_uri() . '/assets/js/vendor.js', array(), '20180510', true );
	wp_register_script( 'opportunity-education-scripts-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20180510', true );

	// Font Awesome scripts
	wp_register_script( 'opportunity-education-font-awesome-brands', 'https://use.fontawesome.com/releases/v5.2.0/js/brands.js', array(), '20180510', true );
	wp_register_script( 'opportunity-education-font-awesome-main', 'https://use.fontawesome.com/releases/v5.2.0/js/fontawesome.js', array(), '20180510', true );

	// Enqueue scripts
	wp_enqueue_script( 'opportunity-education-scripts-vendor' );
	wp_enqueue_script( 'opportunity-education-scripts-main' );
	wp_enqueue_script( 'opportunity-education-font-awesome-brands' );
	wp_enqueue_script( 'opportunity-education-font-awesome-main' );

	// Comment / reply
	/* if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	} */
}
add_action( 'wp_enqueue_scripts', '\theme\scripts' );

// Modify scripts tags for Font Awesome scripts
function fix_font_awesome_scripts( $tag, $handle, $src ) {

	// Set Font Awesome script integrities
	$font_awesome_script_integrities = array(
		'opportunity-education-font-awesome-brands' => 'sha384-4BRtleJgTYsMKIVuV1Z7lNE29r4MxwKR7u88TWG2GaXsmSljIykt/YDbmKndKGID',
		'opportunity-education-font-awesome-main'   => 'sha384-QcnrgQuRmocjIBY6ByWMmDvUg3HO4MSdVjY7ynJwZfvTDhVPPQOUI9TRzc6/7ZO1'
	);

	// If the handle is one of the Font awesome ones, add the defer, integrity, and cross-origin attributes
	if ( array_key_exists( $handle, $font_awesome_script_integrities ) ) {

		// Add tags to src
		$tag = '<script defer src="' . $src . '" integrity="' . $font_awesome_script_integrities[$handle] . '" crossorigin="anonymous"></script>';
	}

	return $tag;
}
add_filter( 'script_loader_tag', '\theme\fix_font_awesome_scripts', 10, 3 );

/**
 * Enqueue scripts and styles.
 */
function admin_scripts() {

	// If the screen is an admin screen and the user can edit posts, enqueue admin stuff
	if ( is_admin() && current_user_can( 'edit_posts' ) ) {

		// Admin styles
		wp_enqueue_style( 'opportunity-education-admin-style', get_template_directory_uri() . '/assets/css/admin.css' );

		// Admin scripts
		wp_register_script( 'opportunity-education-scripts-admin', get_template_directory_uri() . '/assets/js/admin.js', array(), '20180510', true );
		wp_enqueue_script( 'opportunity-education-scripts-admin' );
	}
}
add_action( 'admin_enqueue_scripts', '\theme\admin_scripts' );
