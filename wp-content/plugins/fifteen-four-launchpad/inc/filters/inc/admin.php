<?php
namespace fifteen_four\filters;

/**
 * Filters that affect the admin section
 */

/**
 * Configure TinyMCE
 */
function setup_tinymce( $settings ) {

	// Set block formats
	$settings['block_formats'] = 'Paragraph=p; Heading 2=h2; Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading6=h6; Preformatted=pre';

	// Return settings array
	return $settings;
}

add_filter( 'tiny_mce_before_init', '\fifteen_four\filters\setup_tinymce' );