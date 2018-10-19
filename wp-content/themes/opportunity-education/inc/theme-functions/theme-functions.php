<?php
namespace theme;

/**
 * Theme functions
 *
 * @package Opportunity_Education
 */

/**
 * Require includes
 */
require __DIR__ . '/inc/setup.php';
require __DIR__ . '/inc/sidebars-widgets.php';
require __DIR__ . '/inc/styles-scripts.php';
require __DIR__ . '/inc/walkers.php';
require __DIR__ . '/inc/plugin-overrides.php';
require __DIR__ . '/inc/google-analytics.php';
require __DIR__ . '/inc/cookies-consent-bar.php';
require __DIR__ . '/inc/widgets/widgets.php';

// Custom post types and taxonomies
require __DIR__ . '/inc/custom-post-types/custom-post-types.php';
require __DIR__ . '/inc/custom-taxonomies/custom-taxonomies.php';

// REST API
require __DIR__ . '/inc/rest-api/rest-api.php';
