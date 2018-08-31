<?php
namespace theme;

/**
 * Location post type
 *
 * @package Opportunity_Education
 */

function location_post_type() {

    // Set labels
	$labels = array(
		'name'                  => _x( 'Locations', 'Post Type General Name', 'opportunity-education' ),
		'singular_name'         => _x( 'Location', 'Post Type Singular Name', 'opportunity-education' ),
		'menu_name'             => __( 'Locations', 'opportunity-education' ),
		'name_admin_bar'        => __( 'Location', 'opportunity-education' ),
		'archives'              => __( 'Location Archives', 'opportunity-education' ),
		'attributes'            => __( 'Location Attributes', 'opportunity-education' ),
		'parent_item_colon'     => __( 'Parent Location:', 'opportunity-education' ),
		'all_items'             => __( 'All Locations', 'opportunity-education' ),
		'add_new_item'          => __( 'Add New Location', 'opportunity-education' ),
		'add_new'               => __( 'Add New', 'opportunity-education' ),
		'new_item'              => __( 'New Location', 'opportunity-education' ),
		'edit_item'             => __( 'Edit Location', 'opportunity-education' ),
		'update_item'           => __( 'Update Location', 'opportunity-education' ),
		'view_item'             => __( 'View Location', 'opportunity-education' ),
		'view_items'            => __( 'View Locations', 'opportunity-education' ),
		'search_items'          => __( 'Search Location', 'opportunity-education' ),
		'not_found'             => __( 'Not found', 'opportunity-education' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'opportunity-education' ),
		'featured_image'        => __( 'Featured Image', 'opportunity-education' ),
		'set_featured_image'    => __( 'Set featured image', 'opportunity-education' ),
		'remove_featured_image' => __( 'Remove featured image', 'opportunity-education' ),
		'use_featured_image'    => __( 'Use as featured image', 'opportunity-education' ),
		'insert_into_item'      => __( 'Insert into location', 'opportunity-education' ),
		'uploaded_to_this_item' => __( 'Uploaded to this location', 'opportunity-education' ),
		'items_list'            => __( 'Locations list', 'opportunity-education' ),
		'items_list_navigation' => __( 'Locations list navigation', 'opportunity-education' ),
		'filter_items_list'     => __( 'Filter locations list', 'opportunity-education' )
	);

    // Set args
	$args = array(
		'label'                 => __( 'Location', 'opportunity-education' ),
		'description'           => __( 'A post type for Opportunity Education locations', 'opportunity-education' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'location_type', 'tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-location',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);

    // Register post type
	register_post_type( 'location', $args );
}
add_action( 'init', '\theme\location_post_type', 0 );
