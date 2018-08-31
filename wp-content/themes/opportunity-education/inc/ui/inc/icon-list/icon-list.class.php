<?php
namespace ui;

/**
 * Class for icon lists
 *
 * @package Opportunity_Education
 */

class Icon_List extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'icon-list';

	// Argument schema
	protected $_arg_schema = array(
		'type'                    => 'document',
		'columns'                 => false,
		'items'                   => [],
		'item_additional_classes' => '',
		'additional_classes'      => ''
	);
}
