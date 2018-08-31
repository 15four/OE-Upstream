<?php
namespace ui;

/**
 * Template for highlighter SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 283.2;
$height = 252.5;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--highlighter ' . $args['additional_classes']
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

// Set highlighter attributes
$highlighter_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $highlighter_attributes ); ?> d="M28.2,14.9c0,0,22.8,18.5,24,19.6c1.2,1.2,3.4,4,10.3,4.4c7.4,0.4,12.5,4.3,12.5,4.3l162,136c0,0,33.2,30,36.9,35.1s2.4,9.2,0,13.4c-2.3,4.2-10.7,12.9-15.7,17c-5,4.1-10.3-1.4-10.3-1.4c-13.7-10.2-40.7-31-40.7-31S53.3,76.8,50.1,73.5s-6.5-7.9-6.2-13.4c0.3-5.5-3.8-8.7-3.8-8.7L15.1,30.8C21.2,18.9,28.2,14.9,28.2,14.9z M207.3,212.3c0,0,17.7-4.7,29.7-33 M25.4,16.8L12.3,6.6L7.1,19.2l10,8.1 M57.7,37.8c-6.9,5-14.9,17.4-14.9,17.4" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>

