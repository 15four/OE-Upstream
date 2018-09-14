<?php
namespace ui;

/*
* Horizontal Timeline UI function
*
* @package Opportunity Education
*/

function get_horizontal_timeline( $args = array() ) {

    // Instantiate horizontal timeline with args
	$horizontal_timeline = new \ui\Horizontal_Timeline( $args );

	// Return horizontal timeline markup
	return $horizontal_timeline->get_component();
}

function horizontal_timeline( $args = array() ) {
    echo \ui\get_horizontal_timeline( $args );
}

/**
 * Add Team Favorites Shortcode
 */
function horizontal_timeline_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'tag'                         => 'div',
            'periods_tag'                 => 'div',
            'periods_additional_classes'  => '',
            'period_additional_classes'   => '',
            'additional_classes'          => ''
		),
		$atts
	);

	// Get all periods within slider
	$periods = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'period' );

	// Loop through periods and do shortcodes for content
	foreach( $periods as &$period ) {
		$period['content'] = do_shortcode( $period['content'] );
	}

	// Add periods to atts
	$atts['periods'] = $periods;

	// Return the UI element
	return \ui\get_horizontal_timeline( $atts );
}
add_shortcode( 'horizontal_timeline', '\ui\horizontal_timeline_shortcode' );

/**
 * Horizontal timeline period shortcode
 */
function horizontal_timeline_period_shortcode( $atts ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'title'              => '',
            'excerpt'            => '',
		    'content'            => '',
		    'additional_classes' => ''
		),
		$atts
	);

	return '';
}
add_shortcode( 'horizontal_timeline_period', '\ui\horizontal_timeline_period_shortcode' );
