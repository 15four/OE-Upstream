<?php
namespace ui;

/**
 * Template for squiggly line 2 SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 445.7;
$height = 1234.2;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--squiggly-line-2 ' . $args['additional_classes']
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

// Set squiggly line attributes
$squiggly_line_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $squiggly_line_attributes ); ?> d="M8.6,1224.8c30.8-50.9,74.2-89.3,137.7-113.9c97-39.1,87.5-146.5,87.5-229.9s75.9-121.3,150.2-134.5
	c74.3-13.2,91.4-218.4-90.1-218.4c-121,0-184-41.1-189-123.3C104.7,291,150.2,118,242.8,6.6" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
