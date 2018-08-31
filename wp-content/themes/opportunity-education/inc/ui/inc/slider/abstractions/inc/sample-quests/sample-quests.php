<?php
namespace ui;

/**
 * Sample Quests slider abstraction
 *
 * @package Opportunity_Education
 */

/*
 * Gets a tabbed slider with sample quests
 */
function get_slider_from_sample_quests() {
    return \fifteen_four\helpers\get_include( __DIR__ . '/templates/sample-quests.template.php' );
}
add_shortcode( 'sample_quests_old', '\ui\get_slider_from_sample_quests' );

/**
 * Sample Quests slider shortcode
 */
function sample_quests_slider_shortcode( $atts, $content ) {

	// Atts
	$atts = shortcode_atts(
		array(
			'tag'                         => 'div',
			'tabs_additional_classes'     => '',
			'active_tab'                  => 0,
			'tab_additional_classes'      => '',
			'controls_alignment'          => 'center',
			'controls_additional_classes' => '',
			'control_additional_classes'  => '',
			'additional_classes'          => ''
		),
		$atts
	);

	// Get all tabs within slider
	$tabs = \fifteen_four\helpers\filter_shortcodes( \fifteen_four\helpers\explode_by_shortcode( $content ), 'tab' );

	// Set controls array
	$controls = [];

	// Loop through tabs
	foreach ( $tabs as $index => $tab ) {

		// Add content and quest
		$tab['content'] = do_shortcode( $tab['content'] );
		$tab['quest'] = isset( $tab['quest'] )
			? $tab['quest']
			: null;

		// Get content from template
		$tabs[$index]['content'] = \fifteen_four\helpers\get_include( __DIR__ . '/templates/slide-content.template.php', $tab );

		// Set tab control
		$control = [];

		// Add quest and title
		$control['quest'] = $tab['quest'];
		$control['title'] = $tab['name']
			? $tab['name']
			: null;

		// Add content from template
		$control['content'] = \fifteen_four\helpers\get_include( __DIR__ . '/templates/control-content.template.php', $control );

		// Add the control to the controls array
		$controls[] = $control;
	}

	// Add tabs and controls to atts
	$atts['slides'] = $tabs;
	$atts['controls'] = $controls;

	// Translate tab atts to slide atts
	$atts['type'] = 'tab';
	$atts['slides_additional_classes'] = $atts['tabs_additional_classes'];
	$atts['active_slide'] = $atts['active_tab'];
	$atts['slide_additional_classes'] = $atts['tab_additional_classes'];

	// Add additional classes
	$atts['controls_additional_classes'] = 'u-flex--justify-between u-flex--align-start ' . $atts['controls_additional_classes'];
	$atts['additional_classes'] = 'c-slider--sample-quests ' . $atts['additional_classes'];

	// Unset all tab atts
	unset(
		$atts['tabs_additional_classes'],
		$atts['active_tab'],
		$atts['tab_additional_classes']
	);

	// Return slider
	return \ui\get_slider( $atts );
}
add_shortcode( 'sample_quests', '\ui\sample_quests_slider_shortcode' );
