<?php
namespace ui;

/**
 * Class for cards
 *
 * @package Opportunity_Education
 */

class Card extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Argument schema
	protected $_arg_schema = array(

		// General
		'type'                               => 'regular',
		'tag'                                => 'div',
		'link'                               => null,
		'background_color'                   => 'rich_white',

		// For cards with numbers
		'number_label'                       => '',
		'number'                             => 1,
		'number_tag'                         => 'h4',
		'number_background_color'            => 'victoria',
		'number_additional_classes'          => '',

		// For cards with headers
		'header_content'                     => '',
		'header_background_color'            => 'victoria',
		'header_additional_classes'          => '',

		// For cards with images
		'image'                              => null,
		'image_side'                         => 'left',
		'image_container_additional_classes' => '',
		'image_additional_classes'           => '',

		// For cards with belts
		'belt_image'                         => null,
		'belt_image_additional_classes'      => '',

		// Content
		'content'                            => '',
		'content_additional_classes'         => '',

		// Additional classes
		'additional_classes'                 => ''
	);

	// Configure the component
	protected function _configure() {

		// Set name of the template
		$this->_template_name = \fifteen_four\helpers\clean_class_name( $this->_args['type'] );
	}
}
