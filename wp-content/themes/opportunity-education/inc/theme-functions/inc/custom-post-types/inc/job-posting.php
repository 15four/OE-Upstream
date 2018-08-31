<?php
namespace theme;

/**
 * Job posting post type
 *
 * @package Opportunity_Education
 */

function job_posting_post_type() {

    // Set labels
	$labels = array(
		'name'                  => _x( 'Job Postings', 'Post Type General Name', 'opportunity-education' ),
		'singular_name'         => _x( 'Job Posting', 'Post Type Singular Name', 'opportunity-education' ),
		'menu_name'             => __( 'Job Postings', 'opportunity-education' ),
		'name_admin_bar'        => __( 'Job Posting', 'opportunity-education' ),
		'archives'              => __( 'Job Posting Archives', 'opportunity-education' ),
		'attributes'            => __( 'Job Posting Attributes', 'opportunity-education' ),
		'parent_item_colon'     => __( 'Parent Job Posting:', 'opportunity-education' ),
		'all_items'             => __( 'All Job Posting', 'opportunity-education' ),
		'add_new_item'          => __( 'Add New Job Posting', 'opportunity-education' ),
		'add_new'               => __( 'Add New', 'opportunity-education' ),
		'new_item'              => __( 'New Job Posting', 'opportunity-education' ),
		'edit_item'             => __( 'Edit Job Posting', 'opportunity-education' ),
		'update_item'           => __( 'Update Job Posting', 'opportunity-education' ),
		'view_item'             => __( 'View Job Posting', 'opportunity-education' ),
		'view_items'            => __( 'View Job Posting', 'opportunity-education' ),
		'search_items'          => __( 'Search Job Posting', 'opportunity-education' ),
		'not_found'             => __( 'Not found', 'opportunity-education' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'opportunity-education' ),
		'featured_image'        => __( 'Featured Image', 'opportunity-education' ),
		'set_featured_image'    => __( 'Set featured image', 'opportunity-education' ),
		'remove_featured_image' => __( 'Remove featured image', 'opportunity-education' ),
		'use_featured_image'    => __( 'Use as featured image', 'opportunity-education' ),
		'insert_into_item'      => __( 'Insert into job posting', 'opportunity-education' ),
		'uploaded_to_this_item' => __( 'Uploaded to this job posting', 'opportunity-education' ),
		'items_list'            => __( 'Job Posting list', 'opportunity-education' ),
		'items_list_navigation' => __( 'Job Posting list navigation', 'opportunity-education' ),
		'filter_items_list'     => __( 'Filter job postings list', 'opportunity-education' )
	);

    // Set args
	$args = array(
		'label'                 => __( 'Job Posting', 'opportunity-education' ),
		'description'           => __( 'A post type for Opportunity Education job postings', 'opportunity-education' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-id',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);

    // Register the post type
	register_post_type( 'job_posting', $args );
}
add_action( 'init', '\theme\job_posting_post_type', 0 );
