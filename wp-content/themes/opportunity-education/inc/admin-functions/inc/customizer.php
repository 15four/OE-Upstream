<?php
namespace admin;

/**
 * Opportunity Education Theme Customizer
 *
 * @package Opportunity_Education
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function customize_register( $wp_customize ) {

	// Set transports
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add Additional JS control
	\admin\add_additional_js_to_customizer( $wp_customize );
}
add_action( 'customize_register', '\admin\customize_register' );

/**
 * Adds additional JS field for Customizer
 */
function add_additional_js_to_customizer( $wp_customize ) {

	// Set up Additional JS control

	// Section
	$wp_customize->add_section(
		'additional_javascript',
		array(
			'title'    => 'Additional Javascript',
			'priority' => 1000,
		)
	);

	// Setting
	$wp_customize->add_setting(
		'additional_javascript',
		array(
			'type'    => 'theme_mod',
			'default' => ''
		)
	);

	// Controller
	$wp_customize->add_control(
		new \WP_Customize_Code_Editor_Control(
			$wp_customize,
			'additional_javascript',
			array(
				'label'     => 'Additional Javascript',
				'code_type' => 'javascript',
				'section'   => 'additional_javascript',
				'settings'  => 'additional_javascript'
			)
		)
	);
}

// Adds Additional JS to header
function add_additional_js_to_header() {

	// Get Additional JS
	$additional_js = get_theme_mod( 'additional_javascript', '' );

	// Echoes the JS to the header inside a script tag
	echo \fifteen_four\helpers\conditionally_wrap_with_tag(
		!empty( $additional_js ),
		$additional_js,
		'script',
		array(
			'id'   => 'opportunity-education-additional-javascript',
			'type' => 'text/javascript'
		)
	);
}
add_action( 'wp_head', '\admin\add_additional_js_to_header');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function customize_preview_js() {
	wp_enqueue_script( 'opportunity-education-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
// add_action( 'customize_preview_init', '\admin\customize_preview_js' );
