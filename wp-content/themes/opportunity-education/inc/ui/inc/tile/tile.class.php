<?php
namespace ui;

/**
 * Class for tiles
 *
 * @package Opportunity_Education
 */

class Tile extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Name of the template
	protected $_template_name = 'tile';

	// Argument schema
	protected $_arg_schema = array(
		'tag'                         => 'div',
		'link'                        => null,
		'link_target'                 => null,
		'header_background_color'     => 'victoria',
		'header_additional_classes'   => '',
		'subtitle'                    => '',
		'subtitle_tag'                => 'div',
		'subtitle_additional_classes' => '',
		'title'                       => '',
		'title_tag'                   => 'h3',
		'title_additional_classes'    => '',
		'image'                       => null,
		'image_additional_classes'    => '',
		'content'                     => '',
		'content_additional_classes'  => '',
		'additional_classes'          => ''
	);
}
