<?php
namespace fifteen_four\filters;

/**
 * Filters that affect content
 */

/**
 * Remove autoP formatting from around shortcodes in content
 */
function remove_shortcode_autop( $content ) {

	// Remove line breaks from in between shortcodes
	$content = preg_replace( "#\][\n*|\r*|\s*]\[#", '][', $content );

	// Create an array of patterns to remove paragraphs and line breaks from
	$patterns = array (

		// Paragraphs
		'<p>['       => '[',
		'<p>[/'      => '[/',
		']</p>'      => ']',

		// Line breaks
		'<br />['    => '[',
		'<br />[/'   => '[/',
		"]<br />\n[" => "]\n[",
		"]<br />\n<" => "]\n<",
	);

    // Remove paragraphs and line breaks from around those shortcodes
	$content = preg_replace( "#<br />[\n*|\r*|\s*]\[/#", '[/', strtr( $content, $patterns ) );

    // Return the content
	return $content;
}
add_filter( 'the_content', '\fifteen_four\filters\remove_shortcode_autop', 10 );

/**
 * Remove autoP formatting from around shortcodes in ACF content
 */
function remove_shortcode_autop_acf( $content ) {

	// Remove the autop
	remove_filter( 'acf_the_content', 'wpautop' );

	// Add it back in at a known priority
	add_filter( 'acf_the_content', 'wpautop', 1 );

	// Run the code to strip autop from shortcodes
	add_filter( 'acf_the_content', '\fifteen_four\filters\remove_shortcode_autop', 2 );
}
add_action( 'acf/init', '\fifteen_four\filters\remove_shortcode_autop_acf' );
