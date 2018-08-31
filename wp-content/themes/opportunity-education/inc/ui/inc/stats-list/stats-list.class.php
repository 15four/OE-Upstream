<?php
namespace ui;

/**
 * Class for stats lists
 *
 * @package Opportunity_Education
 */

class Stats_List extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'stats-list';

	// Argument schema
	protected $_arg_schema = array(
		'tag'                     => 'div',
		'icon'                    => null,
		'items'                   => [],
		'item_additional_classes' => '',
		'additional_classes'      => ''
	);
}
