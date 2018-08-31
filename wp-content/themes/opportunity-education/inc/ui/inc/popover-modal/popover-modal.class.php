<?php
namespace ui;

/**
 * Class for popover modals
 *
 * @package Opportunity_Education
 */

class Popover_Modal extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Name of the template
	protected $_template_name = 'popover-modal';

	// Argument schema
	protected $_arg_schema = array(
		'id'                     => '',
		'content'                => '',
		'box_additional_classes' => '',
		'additional_classes'     => ''
	);
}
