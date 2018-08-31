<?php
namespace ui;

/**
 * Template for squiggly line 3 SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 572;
$height = 1240;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--squiggly-line-3 ' . $args['additional_classes']
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
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $squiggly_line_attributes ); ?> d="M10,10.8c152.8-7.7,239.2,38.8,259.2,139.4c30,151-131.3,145.6-100.7,281.6c30.6,135.9,316.6,15.8,381.3,142.5C614.6,701,357.6,931.3,257.5,892.2c-100.1-39.1-25.1-161.2,46.6-128c71.7,33.2,135.9,183.4,58.9,301c-51.3,78.4-151.4,133-300.2,163.8" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
