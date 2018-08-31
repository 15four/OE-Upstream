<?php
namespace ui;

/**
 * Class for SVGs
 *
 * @package Opportunity_Education
 */

class SVG extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Argument schema
	protected $_arg_schema = array(
		'name'               => null,
		'tag'                => 'div',
		'color_1'            => '',
		'color_2'            => '',
		'color_3'            => '',
		'additional_classes' => ''
	);

	// Configure the component
	protected function _configure() {

		// Set name of the template
		$this->_template_name = \fifteen_four\helpers\clean_class_name( $this->_args['name'] );
	}
}
