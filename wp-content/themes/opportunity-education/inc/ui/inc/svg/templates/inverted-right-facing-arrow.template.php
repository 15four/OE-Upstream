<?php
namespace ui;

/**
 * Template for inverted right facing arrow SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 78.2;
$height = 87.1;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--inverted-right-facing-arrow ' . $args['additional_classes']
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
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $arrow_attributes ); ?> d="M62.4,64.2l9.3,9.4l-9,9 M62,4.6c-33-3.9-51.8,4-56.5,23.7c-7.1,29.5,27.7,47.6,66.2,45.3" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
