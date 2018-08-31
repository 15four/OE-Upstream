<?php
namespace ui;

/**
 * Template for squiggly line 1 SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 1230;
$height = 1120;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--squiggly-line-1 ' . $args['additional_classes']
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
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $squiggly_line_attributes ); ?> d="M1213.9,95.2c-91.3-89.3-162.8-108.4-214.4-57.2c-77.4,76.7-18.2,126.7-66.4,218.1C885,347.4,808.9,199.4,728,240.1c-80.9,40.7,27.2,255.2-73,279.4c-100.2,24.2-94-79.2-33.6-77.7c60.4,1.5,79.5,120.4-35.7,165.9c-166.2,61.4-302.2,60.7-338.2,59c-86-5.7-292,76.8-224,437.6" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
