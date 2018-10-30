<?php
/**
 * Opportunity Education functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Opportunity_Education
 */

 /**
 * Include constants
 */
require __DIR__ . '/inc/constants/constants.php';

/**
 * Include theme functions
 */
require __DIR__ . '/inc/theme-functions/theme-functions.php';

/**
 * Include template functions
 */
require __DIR__ . '/inc/template-functions/template-functions.php';

/**
 * Include UI functionality
 */
require __DIR__ . '/inc/ui/ui.php';

/**
 * Include admin functions
 */
require __DIR__ . '/inc/admin-functions/admin-functions.php';

/**
 * Include helper functions
 */
require __DIR__ . '/inc/helpers/helpers.php';

/**
 * Adding All Categories Option to Cat Dropdown
 */
function add_all_categories_to_widget($cat_args) {
    $cat_args['show_option_all'] = 'Show all categories';
    $cat_args['show_option_none'] = false;
    return $cat_args;
}
add_filter('widget_categories_dropdown_args', 'add_all_categories_to_widget');
