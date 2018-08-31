<?php
namespace theme;

/**
 * Functions for overriding plugins
 *
 * @package Opportunity_Education
 */

/**
 * Override gForms input CSS classes
 */
function gforms_input_classes( $input, $field, $value, $entry_id, $form_id ) {

	// If the form is the newsletter subscribe form, add the small field class
	if ( $form_id === \constants\FORMS['newsletter_subscribe'] ) {

		$input = \fifteen_four\helpers\wrap_with_tag(
			'',
			'input',
			array(
				'id'          => '',
				'name'        => 'input_' . $field['id'],
				'type'        => $field['type'],
				'value'       => $field['defaultValue'],
				'placeholder' => $field['placeholder'],
				'class'       => $field['cssClass'] . ' o-field--small'
			)
		);
	}

	return $input;
}
add_filter( 'gform_field_input', '\theme\gforms_input_classes', 10, 5 );

/**
 * Force gForms to add scripts into footer
 */
add_filter( 'gform_init_scripts_footer', '__return_true' );

/**
 * Prepend load deferral to gForms AJAX script
 */
function gform_cdata_prepend( $content = '' ) {

	// If AJAX isn't happening, prepend the content
	if ( !( defined( 'DOING_AJAX' ) && DOING_AJAX ) || !isset( $_POST[‘gform_ajax’] ) ) {
		$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	}

	return $content;
}
add_filter( 'gform_cdata_open', '\theme\gform_cdata_prepend' );

/**
 * Append load deferral to gForms AJAX script
 */
function gform_cdata_append( $content = '' ) {

	// If AJAX isn't happening, append the content
	if ( !( defined( 'DOING_AJAX' ) && DOING_AJAX ) || !isset( $_POST[‘gform_ajax’] ) ) {
		$content = ' }, false );';
	}

	return $content;
}
add_filter( 'gform_cdata_close', '\theme\gform_cdata_append' );


/**
 * Disable Pantheon cache
 */
function add_header_nocache() {
    header( 'Cache-Control: no-cache, must-revalidate, max-age=0' );
}
// Disabled since we do want caching now
// add_action( 'send_headers', '\theme\add_header_nocache', 15 );

/**
 * Enable clearing of Redis cache from back end (only when active)
 */
if ( extension_loaded( 'redis' ) && is_plugin_active( 'wp-redis/wp-redis.php' ) ) {

	// Add toolbar item to clear cache
	function add_redis_cache_clear_link( $admin_bar ) {

		// Add menu to bar
		$admin_bar->add_node( array(
			'id'    => 'clear-redis-cache',
			'title' => 'Clear Redis Cache',
			'href'  => admin_url( '?clear-redis-object-cache=true' ),
			'meta'  => array(
				'title' => __( 'Clear Redis Cache' ),
			),
		));
	}
	add_action( 'admin_bar_menu', '\theme\add_redis_cache_clear_link', 150 );

	// Add cache clear notice
	function add_redis_cache_clear_notice() {
		echo '<div class="notice notice-success is-dismissible">'
			. '<p>' . __( 'Redis cache successfully purged!', 'opportunity_education' ) . '</p>'
			. '</div>';
	}

	// Clear redis cache
	function clear_redis_cache() {

		// If there is a query string for 'clear-redis-object-cache' and it is true, flush the cache and add the notice
		if ( isset( $_REQUEST['clear-redis-object-cache'] ) && $_REQUEST['clear-redis-object-cache'] === 'true' ) {

			// Clear the cache
			\wp_cache_flush();

			// Add the notice
			add_action( 'admin_notices', '\theme\add_redis_cache_clear_notice' );
		}
	}
	add_action( 'init', '\theme\clear_redis_cache' );
}
