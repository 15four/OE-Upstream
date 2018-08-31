<?php
namespace ui;

/**
 * Class for bars
 *
 * @package Opportunity_Education
 */

class Bar extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'bar';

	// Argument schema
	protected $_arg_schema = array(
		'tag'                         => 'div',
		'link'                        => null,
		'subtitle_tag'                => 'div',
		'subtitle'                    => '',
		'subtitle_additional_classes' => '',
		'title_tag'                   => 'h3',
		'title'                       => '',
		'title_additional_classes'    => '',
		'additional_classes'          => ''
	);
}
