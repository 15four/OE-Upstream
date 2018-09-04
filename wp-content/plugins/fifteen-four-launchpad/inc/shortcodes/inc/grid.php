<?php
namespace fifteen_four\shortcodes;

/**
 * Grid shortcodes
 */

/**
 * Adds a grid
 */
function grid( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'additional_classes' => ''
		),
		$atts
	);

	// Get attributes
	$attributes = array(
		'class' => 'c-grid '
			. $atts['additional_classes']
	);

	// Return grid HTML
	return \fifteen_four\helpers\wrap_with_tag( apply_filters( 'the_content', $content ), 'div', $attributes );
}
add_shortcode( 'grid', 'fifteen_four\shortcodes\grid' );
add_shortcode( 'nested_grid', 'fifteen_four\shortcodes\grid' );

/**
 * Adds a grid column
 */
function grid_column( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'initial_width'      => '12',
			'width'              => '6',
			'initial_order'      => '0',
			'order'              => '0',
			'breakpoint'         => 'lg',
			'additional_classes' => ''
		),
		$atts
	);

	// Get attributes
	$attributes = array(
		'class' => 'c-grid__column '
			. 'c-grid__column--' . $atts['initial_width'] . ' '
			. 'c-grid__column--' . $atts['width'] . '@' . $atts['breakpoint'] . ' '
			. ( $atts['initial_order'] !== '0'
				? 'u-flex--order-' . $atts['initial_order'] . ' '
				: '' )
			. ( $atts['order'] !== '0'
				? 'u-flex--order-' . $atts['order'] . '@' . $atts['breakpoint'] . ' '
				: '' )
			. $atts['additional_classes']
	);

	// Return column HTML
	return \fifteen_four\helpers\wrap_with_tag( apply_filters( 'the_content', $content ), 'div', $attributes );
}
add_shortcode( 'grid_column', 'fifteen_four\shortcodes\grid_column' );
add_shortcode( 'nested_grid_column', 'fifteen_four\shortcodes\grid_column' );