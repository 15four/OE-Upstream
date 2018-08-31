<?php
namespace admin;

/**
 * Opportunity Education misc shortcodes
 *
 * @package Opportunity_Education
 */

/**
 * Add animated text underline
 */
function animated_text_underline_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'size'                         => 'full',
			'additional_classes'           => ''
		),
		$atts
	);

	// Set attributes
	$attributes = array(
		'class' => 'u-underline u-underline--animated js-animation--scroll '
			. ( $atts['size'] === 'small'
				? 'u-underline--small'
				: '' ) . ' '
			. $atts['additional_classes']
	);

	// Return content wrapped and appended with animated underline
	return \fifteen_four\helpers\wrap_with_tag(
		$content,
		'span',
		$attributes
	);
}
add_shortcode( 'animated_underline', '\admin\animated_text_underline_shortcode' );

/**
 * Add embed guy
 */
function embed_guy_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'type'   => 'video',
			'tag'    => 'div',
			'source' => null
		),
		$atts
	);

	// If the source att is null, return false
	if ( $atts['source'] === null ) {
		return false;
	}

	// Set up attributes
	$attributes = array(
		'class' => 'c-embed-guy c-embed-guy--' . $atts['type']
	);

	// Set up iFrame attributes
	$iframe_attributes = array(
		'src'                   => $atts['source'],
		'class'                 => 'c-embed-guy__embed u-block--full-width u-block--full-height',
		'frameborder'           => '0',
		'webkitallowfullscreen' => true,
		'mozallowfullscreen'    => true
	);

	// Return the embed guy HTML
	return \fifteen_four\helpers\wrap_with_tag(
		\fifteen_four\helpers\wrap_with_tag(
			'',
			'iframe',
			$iframe_attributes
		),
		$atts['tag'],
		$attributes
	);
}
add_shortcode( 'embed_guy', '\admin\embed_guy_shortcode' );

/**
 * Add standalone caption
 */
function standalone_caption_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'additional_classes' => '',
		),
		$atts
	);

	// Set up attributes
	$attributes = array(
		'class' => 'wp-standalone-caption ' . $atts['additional_classes']
	);

	// Return the standalone caption HTML
	return \fifteen_four\helpers\wrap_with_tag(
		\fifteen_four\helpers\wrap_with_tag(
			do_shortcode( $content ),
			'figcaption',
			array( 'class' => 'wp-caption-text' )
		),
		'div',
		$attributes
	);
}
add_shortcode( 'standalone_caption', '\admin\standalone_caption_shortcode' );

/**
 * Add block
 */
function block_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'size'               => null,
			'additional_classes' => '',
		),
		$atts
	);

	return \fifteen_four\helpers\wrap_with_tag(
		do_shortcode( $content ),
		'div',
		array(
			'class' => 'o-block '
				. ( $atts['size']
					? 'o-block--' . $atts['size']
					: '' ) . ' '
				. $atts['additional_classes']
		)
	);
}
add_shortcode( 'block', '\admin\block_shortcode' );
