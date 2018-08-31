<?php
namespace theme;

/**
 * Quest post type
 *
 * @package Opportunity_Education
 */

function quest_post_type() {

    // Set labels
	$labels = array(
		'name'                  => _x( 'Quests', 'Post Type General Name', 'opportunity-education' ),
		'singular_name'         => _x( 'Quest', 'Post Type Singular Name', 'opportunity-education' ),
		'menu_name'             => __( 'Quests', 'opportunity-education' ),
		'name_admin_bar'        => __( 'Quest', 'opportunity-education' ),
		'archives'              => __( 'Quest Archives', 'opportunity-education' ),
		'attributes'            => __( 'Quest Attributes', 'opportunity-education' ),
		'parent_item_colon'     => __( 'Parent Quest:', 'opportunity-education' ),
		'all_items'             => __( 'All Quests', 'opportunity-education' ),
		'add_new_item'          => __( 'Add New Quest', 'opportunity-education' ),
		'add_new'               => __( 'Add New', 'opportunity-education' ),
		'new_item'              => __( 'New Quest', 'opportunity-education' ),
		'edit_item'             => __( 'Edit Quest', 'opportunity-education' ),
		'update_item'           => __( 'Update Quest', 'opportunity-education' ),
		'view_item'             => __( 'View Quest', 'opportunity-education' ),
		'view_items'            => __( 'View Quests', 'opportunity-education' ),
		'search_items'          => __( 'Search Quest', 'opportunity-education' ),
		'not_found'             => __( 'Not found', 'opportunity-education' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'opportunity-education' ),
		'featured_image'        => __( 'Featured Image', 'opportunity-education' ),
		'set_featured_image'    => __( 'Set featured image', 'opportunity-education' ),
		'remove_featured_image' => __( 'Remove featured image', 'opportunity-education' ),
		'use_featured_image'    => __( 'Use as featured image', 'opportunity-education' ),
		'insert_into_item'      => __( 'Insert into quest', 'opportunity-education' ),
		'uploaded_to_this_item' => __( 'Uploaded to this quest', 'opportunity-education' ),
		'items_list'            => __( 'Quests list', 'opportunity-education' ),
		'items_list_navigation' => __( 'Quests list navigation', 'opportunity-education' ),
		'filter_items_list'     => __( 'Filter quests list', 'opportunity-education' )
	);

    // Set args
	$args = array(
		'label'                 => __( 'Quest', 'opportunity-education' ),
		'description'           => __( 'A post type for Opportunity Education quests', 'opportunity-education' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'taxonomies'            => array( 'tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-book-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);

    // Register the post type
	register_post_type( 'quest', $args );
}
add_action( 'init', '\theme\quest_post_type', 0 );
