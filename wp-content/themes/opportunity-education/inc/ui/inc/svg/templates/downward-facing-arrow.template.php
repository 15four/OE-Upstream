<?php
namespace ui;

/**
 * Template for downward facing arrow SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 100;
$height = 150;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--downward-facing-arrow ' . $args['additional_classes']
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

// Set line attributes
$line_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<line <?php echo \fifteen_four\helpers\get_attributes_from_array( $line_attributes ); ?> x1="50" y1="10" x2="50" y2="140" />
			<line <?php echo \fifteen_four\helpers\get_attributes_from_array( $line_attributes ); ?> x1="10" y1="115" x2="50" y2="140" />
			<line <?php echo \fifteen_four\helpers\get_attributes_from_array( $line_attributes ); ?> x1="50" y1="140" x2="90" y2="115" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
