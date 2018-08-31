<?php
namespace ui;

/**
 * Class for location maps
 *
 * @package Opportunity_Education
 */

class Location_Map extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

	// Argument schema
	protected $_arg_schema = array(
		'tag'                         => 'div',
		'locations'                   => [],
		'location_additional_classes' => '',
		'additional_classes'          => ''
	);

	// Configure the component
	protected function _configure() {

		// Get the admin template if this is an admin page, otherwise get the regular template
		$this->_template_name = is_admin()
			? 'admin'
			: 'location-map';
	}
}
