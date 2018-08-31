<?php
namespace ui;

/**
 * Slider functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

// Main class
require __DIR__ . '/slider.class.php';

// Abstractions
require __DIR__ . '/abstractions/abstractions.php';

/*
 * Gets a slider
 */
function get_slider( $args = array() ) {

    // Instantiate slider with args
	$slider = new \ui\Slider( $args );

	// Return slider markup
	return $slider->get_component();
}

/*
 * Echoes a slider
 */
function slider( $args = array() ) {
	echo \ui\get_slider( $args );
}

/**
 * Slider shortcode
 */
function slider_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'tag'                         => 'div',
			'slides_additional_classes'   => '',
			'active_slide'                => 0,
			'slide_additional_classes'    => '',
			'controls_additional_classes' => '',
			'control_additional_classes'  => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Get all slides within slider
	$slides = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'slide' );

	// Loop through slides and do shortcodes for content
	foreach( $slides as &$slide ) {
		$slide['content'] = do_shortcode( $slide['content'] );
	}

	// Add slides to atts
	$atts['slides'] = $slides;

	// Return slider
	return \ui\get_slider( $atts );
}
add_shortcode( 'slider', '\ui\slider_shortcode' );

/**
 * Adds a tabbed slider
 */
function tabs_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'tag'                         => 'div',
			'tabs_additional_classes'     => '',
			'active_tab'                  => 0,
			'tab_additional_classes'      => '',
			'controls_alignment'          => 'center',
			'controls_additional_classes' => '',
			'control_additional_classes'  => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Get all tabs within slider
	$tabs = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'tab' );

	// Set controls array
	$controls = [];

	// Loop through tabs
	foreach ( $tabs as &$tab ) {

		// Get tab control within tab
		$tab_controls = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $tab['content'] ), 'tab_control' );

		// Add content
		$tab['content'] = do_shortcode( $tab['content'] );

		// If there are tab controls in the tab, add the first one to the controls array
		array_push(
			$controls,
			!empty( $tab_controls )
				? $tab_controls[0]
				: null
		);
	}

	// Add tabs and controls to atts
	$atts['slides'] = $tabs;
	$atts['controls'] = $controls;

	// Translate tab atts to slide atts
	$atts['type'] = 'tab';
	$atts['slides_additional_classes'] = $atts['tabs_additional_classes'];
	$atts['active_slide'] = $atts['active_tab'];
	$atts['slide_additional_classes'] = $atts['tab_additional_classes'];

	// Unset all tab atts
	unset(
		$atts['tabs_additional_classes'],
		$atts['active_tab'],
		$atts['tab_additional_classes']
	);

	// Return slider
	return \ui\get_slider( $atts );
}
add_shortcode( 'tabs', '\ui\tabs_shortcode' );

/**
 * Slide shortcode
 */
function slide_shortcode( $atts ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'name' => 'Slide',
			'data-tooltip' => ''
		),
		$atts
	);

	return '';
}
add_shortcode( 'slide', '\ui\slide_shortcode' );
add_shortcode( 'tab', '\ui\slide_shortcode' );

/**
 * Tab control shortcode
 */
function tab_control_shortcode( $atts ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'name' => 'tab',
		),
		$atts
	);

	return '';
}
add_shortcode( 'tab_control', '\ui\tab_control_shortcode' );
