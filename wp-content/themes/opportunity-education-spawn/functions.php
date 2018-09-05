<?php
namespace child_theme;

/**
 * Opportunity Education Spawn functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Opportunity_Education
 */

/**
 * Enqueue scripts and styles
 */
function scripts() {

    // Child styles
    wp_enqueue_style( 'opportunity-education-spawn-style', get_stylesheet_directory_uri() . '/style.css', array( 'opportunity-education-style' ) );
}
add_action( 'wp_enqueue_scripts', '\child_theme\scripts' );
