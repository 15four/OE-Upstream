<?php
namespace ui;

/**
 * Class for pull quotes
 *
 * @package Opportunity_Education
 */

class Pull_Quote extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'pull-quote';

	// Argument schema
	protected $_arg_schema = array(
		'author'             => 'Author Name',
		'content'            => '',
		'additional_classes' => ''
	);
}
