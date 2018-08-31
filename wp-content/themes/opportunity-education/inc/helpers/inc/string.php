<?php
namespace helpers;

/**
 * String helper functions
 *
 * @package Opportunity_Education
 */

/**
 * Removes unnecessary opening and closing line breaks from content
 */
function remove_unnecessary_line_breaks( $content = '' ) {

	// Regex replace line breaks at very beginning and very end of content
	return preg_replace(
		[
			"/^\<br \/\>/",
			"/\<br \/\>$/",
		],
		'',
		$content
	);
}
