<?php
namespace ui;

/*
* At a glance UI function
*
* @package Opportunity Education
*/

function get_at_a_glance( $args = array() ) {

    // Set config defaults
    $args = array_merge(
        array(
            'tag'                                => 'div',
            'background_color'                   => 'victoria',
            'students'                           => '',
            'schools'                            => '',
            'mentors'                            => '',
            'additional_classes'                 => '',
            'content'                            => '',
            'content_additional_classes'         => '',
        ),
        $args
    );

    // Get and return the template
    return \fifteen_four\helpers\get_include( __DIR__ . '/templates/at-a-glance.template.php', $args );
}

function at_a_glance( $args = array() ) {
    echo \ui\get_at_a_glance( $args );
}

/**
 * Add Team Favorites Shortcode
 */
function at_a_glance_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
            'tag'                                => 'div',
            'background_color'                   => 'victoria',
            'students'                           => '',
            'schools'                            => '',
            'mentors'                            => '',
			'additional_classes'                 => '',
			'content'                            => '',
            'content_additional_classes'         => '',
		),
		$atts
	);

	// Add content text back in
	$atts['content'] = $content;

	// Return the UI element
	return \ui\get_at_a_glance( $atts );
}
add_shortcode( 'at_a_glance', '\ui\at_a_glance_shortcode' );