<?php
namespace ui;

/**
 * Template for play SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 100;
$height = 100;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--play ' . $args['additional_classes']
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

// Set color 1 attributes
$color_1_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<circle <?php echo \fifteen_four\helpers\get_attributes_from_array( $color_1_attributes ); ?> cx="50" cy="50" r="40" />
			<polygon <?php echo \fifteen_four\helpers\get_attributes_from_array( $color_1_attributes ); ?> points="40,30 70,50 40,70" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>

