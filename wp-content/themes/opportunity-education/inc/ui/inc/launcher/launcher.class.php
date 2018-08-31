<?php
namespace ui;

/**
 * Class for launchers
 *
 * @package Opportunity_Education
 */

class Launcher extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Name of the template
	protected $_template_name = 'launcher';

	// Argument schema
	protected $_arg_schema = array(
		'type'                       => 'video',
		'target'                     => '',
		'icon_color'                 => 'rich_white',
		'content'                    => '',
		'content_additional_classes' => '',
		'additional_classes'         => ''
	);
}
