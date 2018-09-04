<?php
namespace theme;

/**
 * Functions for registering sidebars and widgets
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Opportunity_Education
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function widgets_init() {

	// Register default sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'opportunity-education' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'opportunity-education' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s u-text--caption">',
		'after_widget'  => '</article>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Register footer main sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Main', 'opportunity-education' ),
		'id'            => 'sidebar-footer-main',
		'description'   => esc_html__( 'Add widgets here.', 'opportunity-education' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s u-text--caption">',
		'after_widget'  => '</article>',
		'before_title'  => '<h2 class="widget-title u-text--caption u-text--family-roboto u-text--compact u-text--bold u-text--color-zest u-text--uppercase u-margin-bottom--tiny">',
		'after_title'   => '</h2>',
	) );

	// Register footer 1 sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'opportunity-education' ),
		'id'            => 'sidebar-footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'opportunity-education' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s u-text--caption">',
		'after_widget'  => '</article>',
		'before_title'  => '<h2 class="widget-title u-text--caption u-text--family-roboto u-text--compact u-text--bold u-text--color-zest u-text--uppercase u-margin-bottom--tiny">',
		'after_title'   => '</h2>',
	) );

	// Register footer 2 sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'opportunity-education' ),
		'id'            => 'sidebar-footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'opportunity-education' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s u-text--caption">',
		'after_widget'  => '</article>',
		'before_title'  => '<h2 class="widget-title u-text--caption u-text--family-roboto u-text--compact u-text--bold u-text--color-zest u-text--uppercase u-margin-bottom--tiny">',
		'after_title'   => '</h2>',
	) );

	// Register footer 3 sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'opportunity-education' ),
		'id'            => 'sidebar-footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'opportunity-education' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s u-text--caption">',
		'after_widget'  => '</article>',
		'before_title'  => '<h2 class="widget-title u-text--caption u-text--family-roboto u-text--compact u-text--bold u-text--color-zest u-text--uppercase u-margin-bottom--tiny">',
		'after_title'   => '</h2>',
	) );

	// Register footer 4 sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'opportunity-education' ),
		'id'            => 'sidebar-footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'opportunity-education' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s u-text--caption">',
		'after_widget'  => '</article>',
		'before_title'  => '<h2 class="widget-title u-text--caption u-text--family-roboto u-text--compact u-text--bold u-text--color-zest u-text--uppercase u-margin-bottom--tiny">',
		'after_title'   => '</h2>',
	) );

	// Register subfooter sidebar
	register_sidebar( array(
		'name'          => esc_html__( 'Subfooter', 'opportunity-education' ),
		'id'            => 'sidebar-subfooter',
		'description'   => esc_html__( 'Add widgets here.', 'opportunity-education' ),
		'before_widget' => '<article id="%1$s" class="widget %2$s u-text--caption">',
		'after_widget'  => '</article>',
		'before_title'  => '<h2 class="widget-title u-text--caption u-text--family-roboto u-text--compact u-text--bold u-text--color-zest u-text--uppercase u-margin-bottom--tiny">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', '\theme\widgets_init' );
