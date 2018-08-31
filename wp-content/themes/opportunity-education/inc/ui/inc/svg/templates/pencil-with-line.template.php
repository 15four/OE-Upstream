<?php
namespace ui;

/**
 * Template for pencil with line SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 716.7;
$height = 1234.2;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--pencil-with-line ' . $args['additional_classes']
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

// Set pencil with line attributes
$pencil_with_line_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $pencil_with_line_attributes ); ?> d="M687.2,368.2l3.4,38.5l-28.4-26.2L484.5,18.9l25-12.3L687.2,368.2z M662.2,380.5l25-12.3 M683.5,400.1l5.9-2.9M496.6,43.3l25-12.3 M500,50.3l25-12.3 M503.5,57.4l25-12.3 M516,51.2l158.8,323.1 M14.1,1101.4c34.8,44.2,101.5,86,224.7,107.9c166.2,27.7,283.1,18.3,350.8-28c101.6-69.6,19.7-147.7-14.6-141.8c-34.3,6-62.5,41.4-26.1,75.7c36.4,34.3,127.3-3.3,152.7-77.2c25.4-73.9-31.5-113.6-117.3-119.2c-85.8-5.6-207.6-29.2-192.4-106.2c15.1-77,110.7-24.6,138-102.6s-66.7-100.1-32.2-171.8c34.5-71.7,90.9-3.8,157.4-28c44.3-16.2,59.8-42.3,46.5-78.5" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
