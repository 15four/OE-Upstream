<?php
namespace theme;

/**
 * Location Type taxonomy
 *
 * @package Opportunity_Education
 */

function location_type_taxonomy() {

	// Set labels
	$labels = array(
		'name'                       => _x( 'Location Types', 'Taxonomy General Name', 'opportunity-education' ),
		'singular_name'              => _x( 'Location Type', 'Taxonomy Singular Name', 'opportunity-education' ),
		'menu_name'                  => __( 'Location Types', 'opportunity-education' ),
		'all_items'                  => __( 'All Location Types', 'opportunity-education' ),
		'parent_item'                => __( 'Parent Location Type', 'opportunity-education' ),
		'parent_item_colon'          => __( 'Parent Location Type:', 'opportunity-education' ),
		'new_item_name'              => __( 'New Location Type Name', 'opportunity-education' ),
		'add_new_item'               => __( 'Add New Location Type', 'opportunity-education' ),
		'edit_item'                  => __( 'Edit Location Type', 'opportunity-education' ),
		'update_item'                => __( 'Update Location Type', 'opportunity-education' ),
		'view_item'                  => __( 'View Location Type', 'opportunity-education' ),
		'separate_items_with_commas' => __( 'Separate location types with commas', 'opportunity-education' ),
		'add_or_remove_items'        => __( 'Add or remove location types', 'opportunity-education' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'opportunity-education' ),
		'popular_items'              => __( 'Popular Location Types', 'opportunity-education' ),
		'search_items'               => __( 'Search Location Types', 'opportunity-education' ),
		'not_found'                  => __( 'Not Found', 'opportunity-education' ),
		'no_terms'                   => __( 'No location types', 'opportunity-education' ),
		'items_list'                 => __( 'Location Types list', 'opportunity-education' ),
		'items_list_navigation'      => __( 'Location Types list navigation', 'opportunity-education' ),
	);

	// Set args
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'show_in_rest'               => false,
	);

	// Register the taxonomy
	register_taxonomy( 'location_type', array( 'location' ), $args );
}
add_action( 'init', '\theme\location_type_taxonomy', 0 );
