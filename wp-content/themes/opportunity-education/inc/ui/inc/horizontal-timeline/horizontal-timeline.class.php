<?php
namespace ui;

/**
 * Class for horizontal timeline
 *
 * @package Opportunity_Education
 */

class Horizontal_Timeline extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Argument schema
	protected $_arg_schema = array(
		'tag'                         => 'div',
		'periods'                     => [],
		'periods_tag'                 => 'div',
		'periods_additional_classes'  => '',
		'period_additional_classes'   => '',
		'additional_classes'          => ''
	);
}
