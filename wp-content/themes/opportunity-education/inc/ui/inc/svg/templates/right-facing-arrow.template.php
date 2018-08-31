<?php
namespace ui;

/**
 * Template for right facing arrow SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 87.2;
$height = 64;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--right-facing-arrow ' . $args['additional_classes']
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
		. 'o-animation o-animation--scroll o-animation--draw-right-facing-arrow js-animation--scroll'
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $arrow_attributes ); ?> d="M72.7,4c0,34.9-23,53.5-69,56 M83.5,16.7L72.6,4L60.5,16.9" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
