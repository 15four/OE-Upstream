<?php
namespace ui;

/*
* School UI function
*
* @package Opportunity Education
*/

function get_school( $args = array() ) {

    // Set config defaults
    $args = array_merge(
        array(
            'tag'                                => 'div',
            'link'                               => null,
            'background_color'                   => 'light_gray',
            'image'                              => null,
            'image_side'                         => 'left',
            'image_container_additional_classes' => '',
            'image_additional_classes'           => '',
            'school_name'                        => '',
            'additional_classes'                 => '',
            'content'                            => '',
            'content_additional_classes'         => ''
        ),
        $args
    );

    // Get and return the template
    return \fifteen_four\helpers\get_include( __DIR__ . '/templates/school.template.php', $args );
}

function school( $args = array() ) {
    echo \ui\get_school( $args );
}

/**
 * Add Team Favorites Shortcode
 */
function school_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
            'tag'                                => 'div',
            'link'                               => null,
            'background_color'                   => 'light_gray',
            'image'                              => null,
            'image_side'                         => 'left',
            'image_container_additional_classes' => '',
            'image_additional_classes'           => '',
            'school_name'                        => '',
			'additional_classes'                 => '',
			'content'                            => '',
            'content_additional_classes'         => ''
		),
		$atts
	);

	// Add content text back in
	$atts['content'] = $content;

	// Return the UI element
	return \ui\get_school( $atts );
}
add_shortcode( 'school', '\ui\school_shortcode' );