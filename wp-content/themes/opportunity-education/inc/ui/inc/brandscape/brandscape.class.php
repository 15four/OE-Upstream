<?php
namespace ui;

/**
 * Class for brandscapes
 *
 * @package Opportunity_Education
 */

class Brandscape extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'brandscape';

	// Argument schema
	protected $_arg_schema = array(
		'type'                        => 'brandscape',
		'tag'                         => 'div',
		'is_static'                   => false,
		'background_image'            => null,
		'has_overlay'                 => false,
		'sections'                    => [],
		'section_tag'                 => 'section',
		'section_additional_classes'  => '',
		'additional_classes'          => ''
	);

	// Configure the component
	protected function _configure() {

		// If the background image is not set, make it a default
		if ( is_null( $this->_args['background_image'] ) ) {
			$this->_args['background_image'] = \constants\get_default_image( 'brandscape' );
		}
	}
}
