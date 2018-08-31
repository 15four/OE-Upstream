<?php
namespace theme;

/**
 * Course post type
 *
 * @package Opportunity_Education
 */

function course_post_type() {

    // Set labels
	$labels = array(
		'name'                  => _x( 'Courses', 'Post Type General Name', 'opportunity-education' ),
		'singular_name'         => _x( 'Course', 'Post Type Singular Name', 'opportunity-education' ),
		'menu_name'             => __( 'Courses', 'opportunity-education' ),
		'name_admin_bar'        => __( 'Course', 'opportunity-education' ),
		'archives'              => __( 'Course Archives', 'opportunity-education' ),
		'attributes'            => __( 'Course Attributes', 'opportunity-education' ),
		'parent_item_colon'     => __( 'Parent Course:', 'opportunity-education' ),
		'all_items'             => __( 'All Courses', 'opportunity-education' ),
		'add_new_item'          => __( 'Add New Course', 'opportunity-education' ),
		'add_new'               => __( 'Add New', 'opportunity-education' ),
		'new_item'              => __( 'New Course', 'opportunity-education' ),
		'edit_item'             => __( 'Edit Course', 'opportunity-education' ),
		'update_item'           => __( 'Update Course', 'opportunity-education' ),
		'view_item'             => __( 'View Course', 'opportunity-education' ),
		'view_items'            => __( 'View Courses', 'opportunity-education' ),
		'search_items'          => __( 'Search Course', 'opportunity-education' ),
		'not_found'             => __( 'Not found', 'opportunity-education' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'opportunity-education' ),
		'featured_image'        => __( 'Featured Image', 'opportunity-education' ),
		'set_featured_image'    => __( 'Set featured image', 'opportunity-education' ),
		'remove_featured_image' => __( 'Remove featured image', 'opportunity-education' ),
		'use_featured_image'    => __( 'Use as featured image', 'opportunity-education' ),
		'insert_into_item'      => __( 'Insert into course', 'opportunity-education' ),
		'uploaded_to_this_item' => __( 'Uploaded to this course', 'opportunity-education' ),
		'items_list'            => __( 'Courses list', 'opportunity-education' ),
		'items_list_navigation' => __( 'Courses list navigation', 'opportunity-education' ),
		'filter_items_list'     => __( 'Filter courses list', 'opportunity-education' )
	);

    // Set args
	$args = array(
		'label'                 => __( 'Course', 'opportunity-education' ),
		'description'           => __( 'A post type for Opportunity Education courses', 'opportunity-education' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'tag' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
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
	register_post_type( 'course', $args );
}
add_action( 'init', '\theme\course_post_type', 0 );
