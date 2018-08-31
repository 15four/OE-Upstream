<?php
namespace ui;

/**
 * Section functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */
require __DIR__ . '/section.class.php';

/*
 * Gets a section
 */
function get_section( $args = array() ) {

    // Instantiate section with args
	$section = new \ui\Section( $args );

	// Return section markup
	return $section->get_component();
}

/*
 * Echoes a section
 */
function section( $args = array() ) {
	echo \ui\get_section( $args );
}
