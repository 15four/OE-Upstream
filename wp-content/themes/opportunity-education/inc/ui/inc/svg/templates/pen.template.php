<?php
namespace ui;

/**
 * Template for pen SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 228;
$height = 252.5;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--pen ' . $args['additional_classes']
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

// Set pen attributes
$pen_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $pen_attributes ); ?> d="M10.6,236.7l21.6-31.9L198.6,21l12.1,10L45.4,217.3l-28.5,24.6L10.6,236.7z M32.2,204.8l13.2,12.5 M11.5,237.8c0,0-5.6,8-4.1,8.4s7.8-5.2,7.8-5.2 M208.6,29.3l13.5-16.3l-7.2-5.9l-14,15.5 M193.4,26.8l12,10.5l0.4,4.7c0,0-46.7,49.2-50.5,53.5c-3.8,4.2,0.3,6,0.3,6l53.8-55l1.4-15.5" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>

