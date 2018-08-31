<?php
namespace ui;

/**
 * Template for batteries SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 470;
$height = 660;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--batteries ' . $args['additional_classes']
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

// Set batteries attributes
$batteries_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>

			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $batteries_attributes ); ?> d="M95.4,540.6l28.9-176.1H74.2l22-39L185.4,149l-28.9,176.1h51.7l-23.7,39L95.4,540.6z M272,623.8V65.8c0-13.7-11.1-24.8-24.8-24.8H35.3c-13.7,0-24.8,11.1-24.8,24.8v558.1c0,13.7,11.1,24.8,24.8,24.8h211.9C260.9,648.7,272,637.6,272,623.8z M245.3,66H37.2v556.9h208.1V66z M184.9,40.9V22c0-6.4-5.2-11.5-11.5-11.5h-64.3c-6.4,0-11.5,5.2-11.5,11.5v18.9 M272,614.4l183.9-444c5.2-12.7-0.8-27.2-13.4-32.4L272,67.4 M272,544.6l159.1-384.1L272,94.5M25.8,595.3 M385,114.2l7.2-17.5c2.4-5.9-0.4-12.6-6.2-15L326.5,57c-5.9-2.4-12.6,0.4-15,6.2l-7.2,17.5" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
