<?php
namespace ui;

/**
 * Template for map marker SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 24;
$height = 28.8;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--map-marker ' . $args['additional_classes']
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

// Set map marker attributes
$map_marker_attributes = array(
	'class' => 'c-svg__component c-svg__component--fill '
		. ( $args['color_1']
			? 'c-svg__component--fill-color-' . $args['color_1']
			: '' )
);

// Set circle attributes
$circle_attributes = array(
	'class' => 'c-svg__component c-svg__component--fill '
		. ( $args['color_1']
			? 'c-svg__component--fill-color-' . $args['color_2']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>

				<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $map_marker_attributes ); ?> d="M3.5,3.5c-4.7,4.7-4.7,12.4,0,17.1l7.8,7.9c0.4,0.4,1,0.4,1.4,0l7.8-7.9c4.7-4.7,4.7-12.4,0-17.1C15.8-1.2,8.2-1.2,3.5,3.5z"/>
				<circle <?php echo \fifteen_four\helpers\get_attributes_from_array( $circle_attributes ); ?> cx="12" cy="12" r="7"/>
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
