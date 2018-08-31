<?php
namespace theme;

/**
 * Theme setup
 *
 * @package Opportunity_Education
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function setup() {

	/*
	* Make theme available for translation.
	* Translations can be filed in the /languages/ directory.
	* If you're building a theme based on Opportunity Education, use a find and replace
	* to change 'opportunity-education' to the name of your theme in all the template files.
	*/
	load_theme_textdomain( 'opportunity-education', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Let WordPress manage the document title.
	* By adding theme support, we declare that this theme does not use a
	* hard-coded <title> tag in the document head, and expect WordPress to
	* provide it for us.
	*/
	add_theme_support( 'title-tag' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'opportunity-education' ),
	) );

	/*
	* Switch default core markup for search form, comment form, and comments
	* to output valid HTML5.
	*/
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 504,
		'width'       => 128,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	/*
	* Add excerpt support to pages
	*/
	add_post_type_support( 'page', 'excerpt' );

	/*
	* Remove editor support from pages
	*/
	add_post_type_support( 'page', 'editor' );
}
add_action( 'after_setup_theme', '\theme\setup' );

/**
 * Additional image sizes
 */
add_image_size( 'section', 1500, 900, false );
add_image_size( 'brandscape', 1500, 844, true );
add_image_size( 'bleed', 900, 540, false );
add_image_size( 'card', 600, 400, true );
add_image_size( 'card-thin', 600, 340, true );
add_image_size( 'square', 500, 500, true );

// Add custom image sizes to select dropdown
function add_image_sizes_to_dropdown( $sizes ){

	// Set array of custom sizes
	$custom_sizes = array(
		'section'   => __( 'Section' ),
		'bleed'     => __( 'Bleed' ),
		'card'      => __( 'Card' ),
		'card-thin' => __( 'Card (Thin)' )
	);

	// Return merged array
	return array_merge( $sizes, $custom_sizes );
}
add_filter( 'image_size_names_choose', '\theme\add_image_sizes_to_dropdown' );
