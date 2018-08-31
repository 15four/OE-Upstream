<?php
namespace ui;

/**
 * Class for Bleeds
 *
 * Bleeds must live within a container for them to work. You have been warned!
 *
 * @package Opportunity_Education
 */

class Bleed extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Name of the template
	protected $_template_name = 'bleed';

	// Argument schema
	protected $_arg_schema = array(
		'tag'                        => 'div',
		'subject_side'               => 'right',
		'subject_content'            => '',
		'subject_width'              => '6',
		'subject_additional_classes' => '',
		'content'                    => '',
		'content_width'              => '6',
		'content_additional_classes' => '',
		'grid_additional_classes'    => '',
		'additional_classes'         => ''
	);
}
