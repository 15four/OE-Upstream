<?php
namespace fifteen_four\helpers;

/**
 * HTML helper functions
 */

/**
 * Determines if a tag is self-closing
 */
function is_tag_self_closing( $tag ) {

	// Set self-closing tags
	$self_closing_tags = array(
		'area',
		'base',
		'br',
		'col',
		'command',
		'embed',
		'hr',
		'img',
		'input',
		'keygen',
		'link',
		'menuitem',
		'meta',
		'param',
		'source',
		'track',
		'wbr'
	);

	// Return wether or not the tag is in the self-closing tags array
	return in_array( $tag, $self_closing_tags );
}

/**
 * Wraps a string with an HTML tag
 */
function wrap_with_tag( $content = null, $tag = 'div', $attributes = array() ) {

	// Determine if the tag is self-closing
	$is_tag_self_closing = \fifteen_four\helpers\is_tag_self_closing( $tag );

	// If the content is null and the tag is not self-closing, return false
	if ( is_null( $content ) && !$is_tag_self_closing ) {
		return false;
	}

	// Otherwise, set output
	$output = '';

	// If the tag is a self-closing one, output it that way
	if ( $is_tag_self_closing ) {
		$output .= '<' . $tag . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ) . '/>';
	}

	// Otherwise, output it normally
	else {

		// Start tag
		$output .= '<' . $tag . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ) . '>';

		// Add content
		$output .= $content;

		// Close tag
		$output .= '</' . $tag . '>';
	}

	// Return HTML output
	return $output;
}

/**
 * Conditionally wraps a string with an HTML tag
 */
function conditionally_wrap_with_tag( $condition = false, $content, $tag = 'div', $attributes = array() ) {
	if ( $condition ) {
		return \fifteen_four\helpers\wrap_with_tag( $content, $tag, $attributes );
	}

	return $content;
}

/**
 * Gets a built-in template image and wraps it in an image tag
 */
function get_template_image( $relative_path = null, $additional_attributes = array() ) {

	// If the attributes do not include a source, return false
	if ( $relative_path === null || !file_exists( get_template_directory() . '/assets/img' . $relative_path ) ) {
		return false;
	}

	// Otherwise, set up the attributes
	$attributes = array(
		'src' => get_template_directory_uri() . '/assets/img' . $relative_path
	);

	return \fifteen_four\helpers\wrap_with_tag( '', 'img', array_merge( $attributes, $additional_attributes ) );
}

/**
 * Gets a standard HTML5 video
 */
function get_video( $sources = array(), $attributes = array() ) {

	// Merge passed attributes with default attributes
	$attributes = array_merge(
		array(
			'controls'    => true,
			'playsinline' => true
		),
		$attributes
	);

	// If the sources are not an array, make them an array
	if ( !is_array( $sources ) ) {
		$sources = array( $sources );
	}

	// Set the source markup
	$source_markup = '';

	// Loop through the sources and add each one to the source markup
	foreach ( $sources as $source ) {
		$source_markup .= \fifteen_four\helpers\wrap_with_tag(
			'',
			'source',
			array(
				'src'  => $source,
				'type' => 'video/' . array_reverse( explode( '.', $source ) )[0]
			)
		);
	}

	// Add in no support notice
	$source_markup .= 'Your browser does not support video';

	// Return the sources wrapped by the video
	return \fifteen_four\helpers\wrap_with_tag( $source_markup, 'video', $attributes );
}
