<?php
namespace ui;

/**
 * Class for sections
 *
 * @package Opportunity_Education
 */

class Slider extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Argument schema
	protected $_arg_schema = array(
		'type'                        => 'regular',
		'tag'                         => 'div',
		'slides'                      => [],
		'slides_tag'                  => 'div',
		'slides_additional_classes'   => '',
		'active_slide'                => 0,
		'slide_tag'                   => 'div',
		'slide_additional_classes'    => '',
		'controls'                    => [],
		'controls_tag'                => 'div',
		'controls_alignment'          => 'center',
		'controls_additional_classes' => '',
		'control_additional_classes'  => '',
		'additional_classes'          => ''
	);

	// Configure the component
	protected function _configure() {

		// Set name of the template
		$this->_template_name = \fifteen_four\helpers\clean_class_name( $this->_args['type'] );
	}
}
