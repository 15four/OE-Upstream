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

	// Fonts
	wp_enqueue_style( 'opportunity-education-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i' );

	// Move jQuery to footer
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

	// Main styles
	wp_enqueue_style( 'opportunity-education-style', get_stylesheet_uri() );

	// Main scripts
	wp_register_script( 'opportunity-education-scripts-vendor', get_stylesheet_directory_uri() . '/assets/js/vendor.js', array(), '20180510', true );
	wp_register_script( 'opportunity-education-scripts-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20180510', true );

	// Enqueue scripts
	wp_enqueue_script( 'opportunity-education-scripts-vendor' );
	wp_enqueue_script( 'opportunity-education-scripts-main' );

	// Comment / reply
	/* if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	} */
}
add_action( 'wp_enqueue_scripts', '\theme\scripts' );

/**
 * Enqueue scripts and styles.
 */
function admin_scripts() {

	// If the screen is an admin screen and the user can edit posts, enqueue admin stuff
	if ( is_admin() && current_user_can( 'edit_posts' ) ) {

		// Admin styles
		wp_enqueue_style( 'opportunity-education-admin-style', get_stylesheet_directory_uri() . '/assets/css/admin.css' );

		// Admin scripts
		wp_register_script( 'opportunity-education-scripts-admin', get_stylesheet_directory_uri() . '/assets/js/admin.js', array(), '20180510', true );
		wp_enqueue_script( 'opportunity-education-scripts-admin' );
	}
}
add_action( 'admin_enqueue_scripts', '\theme\admin_scripts' );
