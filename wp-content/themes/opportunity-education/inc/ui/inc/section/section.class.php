<?php
namespace ui;

/**
 * Class for sections
 *
 * @package Opportunity_Education
 */

class Section extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Name of the template
	protected $_template_name = 'section';

	// Argument schema
	protected $_arg_schema = array(
		'index'                      => 0,
		'tag'                        => 'section',
		'background_color'           => 'rich_white',
		'background_image'           => null,
		'background_image_style'     => 'cover',
		'background_layers'          => [],
		'padding'                    => ['top', 'bottom'],
		'padding_style'              => 'section',
		'constrain_content'          => true,
		'content'                    => '',
		'content_additional_classes' => '',
		'additional_classes'         => ''
	);
}
