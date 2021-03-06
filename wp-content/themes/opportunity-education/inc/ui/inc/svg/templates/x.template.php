<?php
namespace ui;

/**
 * Template for x SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 100;
$height = 100;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--x ' . $args['additional_classes']
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

// Set x attributes
$x_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<line <?php echo \fifteen_four\helpers\get_attributes_from_array( $x_attributes ); ?> x1="10" y1="10" x2="90" y2="90" />
			<line <?php echo \fifteen_four\helpers\get_attributes_from_array( $x_attributes ); ?> x1="90" y1="10" x2="10" y2="90" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>

