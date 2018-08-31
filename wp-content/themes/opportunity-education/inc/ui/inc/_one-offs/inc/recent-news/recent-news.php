<?php
namespace ui;

/**
 * Recent news functions
 *
 * @package Opportunity_Education
 */

/*
 * Require includes
 */

/**
 * Gets recent news
 */
function get_recent_news( $args = array() ) {

    // Merge defualt args with passed args
    $args = array_merge(
        array(
			'featured_post' => null,
			'post_count'    => 3
        ),
        $args
	);

	// Return the recent news markup
	return \fifteen_four\helpers\get_include( __DIR__ . '/templates/recent-news.template.php' , $args );
}

/**
 * Echoes recent news
 */
function recent_news( $args = array() ) {
	echo \ui\get_recent_news( $args );
}

/**
 * Recent news shortcode
 */
function recent_news_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'featured_post' => null,
			'post_count'    => 3
		),
		$atts
	);

	// Return recent news with the proper attributes
	return \ui\get_recent_news( $atts );
}
add_shortcode( 'recent_news', '\ui\recent_news_shortcode' );
