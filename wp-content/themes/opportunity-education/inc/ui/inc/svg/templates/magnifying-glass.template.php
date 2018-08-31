<?php
namespace ui;

/**
 * Template for magnifying glass SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 100;
$height = 100;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--magnifying-glass ' . $args['additional_classes']
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

// Set arrow attributes
$magnifying_glass_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<circle <?php echo \fifteen_four\helpers\get_attributes_from_array( $magnifying_glass_attributes ); ?> cx="45" cy="45" r="35" />
			<line <?php echo \fifteen_four\helpers\get_attributes_from_array( $magnifying_glass_attributes ); ?> x1="69.748737341" y1="69.748737341" x2="95" y2="95" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
