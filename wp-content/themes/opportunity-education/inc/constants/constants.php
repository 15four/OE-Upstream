<?php
namespace constants;

/**
 * Constants
 *
 * @package Opportunity_Education
 */

// Class names for backgrounds considered to be light
CONST LIGHT_BACKGROUND_CLASS_NAMES = array(
	'zest',
	'cintron',
	'light-mid-gray',
	'light-gray',
	'rich-white',
	'custom-light'
);

// Class names for backgrounds considered to be dark
CONST DARK_BACKGROUND_CLASS_NAMES = array(
	'victoria',
	'dark-victoria',
	'emerald',
	'dark-gray',
	'mid-gray',
	'rich-black',
	'custom-dark',
);

// Important pages
CONST IMPORTANT_PAGES = array(
	'contact_us'           => 174,
	'get_quest_forward'    => 1329,
	'terms_and_conditions' => 180
);

// Default images
CONST DEFAULT_IMAGES = array(
	'brandscape' => array(
		'brandscape/1.jpg',
		'brandscape/2.jpg',
		'brandscape/3.jpg'
	),
	'circle-guy' => 'circle-guy/1.jpg'
);

// Get default images
function get_default_image( $name = null ) {

	// If name is null of the default image does not exist, return false
	if ( is_null( $name ) || !array_key_exists( $name, DEFAULT_IMAGES ) ) {
		return false;
	}

	// If the default image is an array, pick a random one, otherwise, just pick it
	$default_image = is_array( DEFAULT_IMAGES[$name] )
		? DEFAULT_IMAGES[$name][array_rand( DEFAULT_IMAGES[$name] )]
        : DEFAULT_IMAGES[$name];
        
    $parent_theme_dir = get_template_directory_uri() . '/assets/img/defaults/';

    $dir = is_child_theme()
        ? get_stylesheet_directory_uri() . '/assets/img/defaults/'
        : $parent_theme_dir;

    

	// Otherwise, return image path
    // return get_template_directory_uri() . '/assets/img/defaults/' . $default_image;
    
    if ( is_child_theme() ) {
        return get_stylesheet_directory_uri() . '/assets/img/defaults/' . $default_image;
    }
    else {
        return get_template_directory_uri() . '/assets/img/defaults/' . $default_image;
    }
}

// Forms
const FORMS = array(
	'newsletter_subscribe' => 3
);
