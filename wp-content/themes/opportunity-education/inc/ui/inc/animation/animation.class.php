<?php
namespace ui;

/**
 * Class for animations
 *
 * @package Opportunity_Education
 */

class Animation extends \ui\UI_Component {

	// Argument schema
	protected $_arg_schema = array(
		'tag'                => 'div',
		'type'               => 'fade_up',
		'direction'          => null,
		'stagger'            => null,
		'speed'              => null,
		'ease'               => null,
		'on_scroll'          => true,
		'content'            => '',
		'additional_classes' => '',
	);

    // Override get_component function
    public function get_component() {

		// Use shortcode attributes to construct animation attributes
		$attributes = array(

			// Base classes
			'class' => 'o-animation o-animation--' . $this->_args['type'] . ' '

				// Direction
				. ( !is_null( $this->_args['direction'] )
					? 'o-animation--from-' . $this->_args['direction'] . ' '
					: '' )

				// Stagger
				. ( !is_null( $this->_args['stagger'] )
					? 'o-animation--stagger-' . $this->_args['stagger'] . ' '
					: '' )

				// Speed
				. ( !is_null( $this->_args['speed'] )
					? 'o-animation--' . $this->_args['speed'] . ' '
					: '' )

				// Ease
				. ( !is_null( $this->_args['ease'] )
					? 'o-animation--' . $this->_args['ease'] . ' '
					: '' )

				// On scroll
				. ( $this->_args['on_scroll']
					? 'o-animation--scroll js-animation--scroll '
					: '' )

				// Additional classes
				. $this->_args['additional_classes']
		);

		// Return the content wrapped in the tag
		return \fifteen_four\helpers\wrap_with_tag(
			$this->_args['content'],
			$this->_args['tag'],
			$attributes
		);
    }
}
