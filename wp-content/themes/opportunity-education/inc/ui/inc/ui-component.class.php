<?php
namespace ui;

/**
 * Master class for UI elements
 *
 * @package Opportunity_Education
 */

class UI_Component {

	// Path to the component
	protected $_component_directory = null;

	// Name of the template
	protected $_template_name = null;

	// Argument schema
	protected $_arg_schema = array();

	// Constructor
	public function __construct( $args = array() ) {

		// Set arguments
		$this->_set_args( $args );

		// Configure
		$this->_configure();
		return true;
	}

	// Set argument schema
	protected function _set_args( $args ) {

		// Set global args array
		$this->_args = array();

		// Loop through arg schema
		foreach ( $this->_arg_schema as $arg => $default ) {

			// Set global arg as either passed arg or the specified default
			$this->_args[$arg] = isset( $args[$arg] ) ? $args[$arg] : $default;
		}
	}

	// Configure the component — This is the master class and thus this function is meant to be overwritten
	protected function _configure() {
		return false;
	}

	// Gets the UI component template
	public function get_component() {

		// If either the component directory or template name is not specified, return false
		if ( $this->_component_directory === null || $this->_template_name === null ) {
			echo 'JUNK';
			return false;
		}

		// Otherwise, get the template and return the markup
		return \fifteen_four\helpers\get_include(
			$this->_component_directory . '/templates/' . $this->_template_name . '.template.php',
			$this->_args
		);
	}
}
