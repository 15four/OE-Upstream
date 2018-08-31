<?php
namespace ui;

/*
* Horizontal Timeline UI function
*
* @package Opportunity Education
*/

function get_horizontal_timeline( $args = array() ) {

    // Set config defaults
    $args = array_merge(
        array(
            'tag'                          => 'section',
            'additional_classes'           => '',
            'content'                      => '',
            'content_additional_classes'   => ''
        ),
        $args
    );

    // Get and return the template
    return \fifteen_four\helpers\get_include( __DIR__ . '/templates/horizontal-timeline.template.php', $args );
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
			'tag'                          => 'section',
			'additional_classes'           => '',
			'content'                      => '',
            'content_additional_classes'   => ''
		),
		$atts
	);

	// Add content text back in
	$atts['content'] = $content;

	// Return the UI element
	return \ui\get_horizontal_timeline( $atts );
}
add_shortcode( 'horizontal_timeline', '\ui\horizontal_timeline_shortcode' );