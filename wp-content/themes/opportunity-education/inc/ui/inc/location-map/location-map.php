<?php
namespace ui;

/**
 * Location Map functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Main class
require __DIR__ . '/location-map.class.php';

// Admin version
require __DIR__ . '/admin.php';

// Abstractions
require __DIR__ . '/abstractions/abstractions.php';

/**
 * Gets a location map
 */
function get_location_map( $args = array() ) {

    // Instantiate location map with args
	$location_map = new \ui\Location_Map( $args );

	// Return location map markup
	return $location_map->get_component();
}

/**
 * Echoes a location map
 */
function location_map( $args = array() ) {
	echo \ui\get_location_map( $args );
}
