<?php
namespace ui;

/**
 * Template for left facing arrow SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 78.2;
$height = 87.1;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--left-facing-arrow ' . $args['additional_classes']
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
$arrow_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' ) . ' '
		. 'o-animation o-animation--scroll o-animation--draw-left-facing-arrow js-animation--scroll'
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $arrow_attributes ); ?> d="M62.7,3.6l9,9L62.4,22 M71.7,12.6C33.2,10.3-1.6,28.4,5.5,57.9C10.2,77.6,29,85.5,62,81.6" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
