<?php
namespace ui;

/**
 * Template for molecule SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 870;
$height = 550;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--molecule ' . $args['additional_classes']
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

// Set molecule attributes
$molecule_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>

			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $molecule_attributes ); ?> d="M308.8,51.7l125.9,72.7l0,145.4l-125.9,72.7l-125.9-72.7l0-145.4L308.8,51.7z M304.8,331.6l125.9-72.7M560.7,51.7l-125.9,72.7 M56.9,342.6l125.9-72.7 M686.6,124.5l125.9-72.7 M686.6,124.5L560.7,51.7 M308.8,488l0-145.4 M833.7,10.5c-14.5,0-26.3,11.8-26.3,26.3s11.8,26.3,26.3,26.3c14.5,0,26.3-11.8,26.3-26.3S848.3,10.5,833.7,10.5z M308.8,488c-14.5,0-26.3,11.8-26.3,26.3c0,14.5,11.8,26.3,26.3,26.3s26.3-11.8,26.3-26.3C335.1,499.8,323.3,488,308.8,488z M36.8,331.6c-14.5,0-26.3,11.8-26.3,26.3c0,14.5,11.8,26.3,26.3,26.3s26.3-11.8,26.3-26.3C63.1,343.3,51.3,331.6,36.8,331.6z" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
