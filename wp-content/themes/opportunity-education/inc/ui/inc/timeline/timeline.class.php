<?php
namespace ui;

/**
 * Class for timelines
 *
 * @package Opportunity_Education
 */

class Timeline extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'timeline';

	// Argument schema
	protected $_arg_schema = array(
		'period_tag'                => 'h3',
		'periods'                   => [],
		'period_additional_classes' => '',
		'item_additional_classes'   => '',
		'additional_classes'        => ''
	);
}
