<?php
namespace ui;

/**
 * Template for tape SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 870;
$height = 780;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--tape ' . $args['additional_classes']
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

// Set tape attributes
$tape_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>

			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $tape_attributes ); ?> d="M490.4,359c37.5,91.6-37.3,209-167.2,262.1s-265.5,22-303-69.6s37.3-209,167.2-262.1S452.8,267.4,490.4,359zM211.7,348.9C128.4,383,80.4,458.3,104.5,517s111.1,78.7,194.4,44.6s131.3-109.4,107.2-168.1S295,314.8,211.7,348.9z M507.4,403.2c1.4-5.4,3-10.8,4.8-16.2c30.2-88.9,120.4-172.4,242.7-212.7c35.7-11.8,71.5-19,106.1-21.9l-19.1-15.1l17.8-18.8l-18.8-17.8l19.6-20.8l-19.6-18.6l16.8-17.7l-15.1-14.3l17.5-18.5c-56.5,9.5-114.4,26.7-171.5,52c-118.9,52.6-214.2,131.2-275.7,218.8M20.2,551.5l46.2,123.1c37.5,91.6,173.2,122.8,303,69.6C499.2,691.1,574,573.7,536.5,482.1L490.4,359 M411.8,434.6c-38.1-14.8-89-13.6-138.5,6.7c-64.7,26.5-108.1,77.8-113,127" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
