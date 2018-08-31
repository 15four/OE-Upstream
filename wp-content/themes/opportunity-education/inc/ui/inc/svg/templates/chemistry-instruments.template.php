<?php
namespace ui;

/**
 * Template for chemistry instruments SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 171.8;
$height = 252.5;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--chemistry-instruments ' . $args['additional_classes']
);

// Set inner attributes
$inner_attributes = array(
	'class'   => 'c-svg__inner',
	'style' => array(
		'padding-top' => ( $height / $width * 100 ) . '%'
	)
);

// Set SVG attributes
$svg_attributes = array(
	'class'   => 'c-svg__svg',
	'viewBox' => '0 0 ' . $width . ' ' . $height
);

// Set chemistry instruments attributes
$chemistry_instruments_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $chemistry_instruments_attributes ); ?> d="M20.5,186.6c-0.1,0.5-0.5,0.9-1,0.8c-0.5-0.1-0.9-0.5-0.8-1c0.1-0.5,0.5-0.9,1-0.8C20.2,185.6,20.6,186.1,20.5,186.6z M18.3,145.7L7.2,236.2c-0.6,4.9,2.9,9.3,7.8,9.9s9.3-2.9,9.9-7.7L36,147.9L18.3,145.7zM36.8,145.1l-18.7-2.3c-0.8-0.1-1.5,0.5-1.6,1.3s0.5,1.5,1.3,1.6l18.7,2.3c0.8,0.1,1.5-0.5,1.6-1.3C38.2,145.9,37.6,145.2,36.8,145.1z M33.6,167.1l-17.7-2.2 M21.3,171.2c-0.7-0.1-1.3,0.4-1.4,1.1c-0.1,0.7,0.4,1.3,1.1,1.4c0.7,0.1,1.3-0.4,1.4-1.1C22.5,171.9,22,171.3,21.3,171.2z M25.7,178.2c-0.9-0.1-1.8,0.5-1.9,1.5c-0.1,0.9,0.5,1.8,1.5,1.9c0.9,0.1,1.8-0.5,1.9-1.5C27.3,179.2,26.6,178.3,25.7,178.2z M80.4,17.2l5.7,21.4l-2.2,99.2c0,0-1.2,14,6.4,16c9.8,2.6,25.3,0.5,35.6-2.5l4.7-1.3c10.5-2.5,25-8.5,32.1-15.6c5.5-5.5-2.5-17-2.5-17l-51.5-84.8L103,11.1 M103.6,7.3l-25.7,6.9c-0.9,0.2-1.4,1.1-1.1,2c0.2,0.9,1.1,1.4,2,1.1l25.7-6.9c0.9-0.2,1.4-1.1,1.1-2C105.4,7.6,104.5,7.1,103.6,7.3z M115.2,134.2l16.1-4.3 M111.1,118.6l16.1-4.3 M106.9,103l16.1-4.3 M99.9,77l16.1-4.3" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
