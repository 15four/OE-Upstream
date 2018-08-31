<?php
namespace ui;

/**
 * Class for circle guys
 *
 * @package Opportunity_Education
 */

class Circle_Guy extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'circle-guy';

	// Argument schema
	protected $_arg_schema = array(
		'tag'                     => 'div',
		'size'                    => 'full',
        'image'                   => null,
		'additional_classes'      => ''
	);

	// Configure the component
	protected function _configure() {

		// If the image arg is null, make it the default card guy
		if ( is_null( $this->_args['image'] ) ) {
			$this->_args['image'] = \constants\get_default_image( 'circle-guy' );
		}
	}
}
