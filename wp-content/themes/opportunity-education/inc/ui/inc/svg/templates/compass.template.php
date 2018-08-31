<?php
namespace ui;

/**
 * Template for compass SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 870;
$height = 790;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--compass ' . $args['additional_classes']
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

// Set compass attributes
$compass_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>

			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $compass_attributes ); ?> d="M751.5,309.7c-52.3,52.3-137.1,52.3-189.3,0s-52.3-137.1,0-189.3s137.1-52.3,189.3,0C803.7,172.6,803.7,257.4,751.5,309.7z M710.5,161.3c-29.7-29.7-77.8-29.7-107.5,0s-29.7,77.8,0,107.5c29.7,29.7,77.8,29.7,107.5,0C740.2,239.1,740.2,190.9,710.5,161.3z M310.7,308.4c-17-17-44.7-17-61.7,0c-17,17-17,44.7,0,61.7c17,17,44.7,17,61.7,0C327.7,353,327.7,325.4,310.7,308.4z M770.9,145l83.9-83.9c7.6-7.6,7.6-20,0-27.6l-17.3-17.3c-7.6-7.6-20-7.6-27.6,0l-84.1,84.1M217.5,741.1l-29.6,29.6c-2.7,2.7-3.5,6.2-1.9,7.9l3.7,3.7c1.6,1.6,5.2,0.8,7.9-1.9l29.7-29.7 M42.9,566.5l-29.6,29.6c-2.7,2.7-3.5,6.2-1.9,7.9l3.7,3.7c1.6,1.6,5.2,0.8,7.9-1.9l29.7-29.7 M523.8,230.4l-224.1,69.9 M545.2,289.1l-227,70.8M236.2,338.8L39.4,535.5c-7.5,7.5-7.5,19.9,0.1,27.5L56,579.5c7.6,7.6,20,7.7,27.5,0.1l196.8-196.8 M591.4,331.9L216,707.3c-8.3,8.3-9,21.4-1.4,29l16.5,16.5c7.6,7.6,20.6,7,29-1.4l402.6-402.6 M385.5,626.6L368,609 M407.3,604.8l-17.5-17.5 M429,583l-17.5-17.5 M450.8,561.3l-17.5-17.5 M472.5,539.5L455,522 M494.3,517.8l-17.5-17.5 M516,496l-17.5-17.5 M537.8,474.3l-17.5-17.5M559.5,452.5L542,435 M581.3,430.8l-17.5-17.5 M603,409l-17.5-17.5 M624.8,387.3l-17.5-17.5 M395.9,616.2l-13.8-13.8 M376.2,635.9l-13.8-13.8 M417.6,594.4l-13.8-13.8 M439.4,572.7l-13.8-13.8 M461.1,550.9l-13.8-13.8 M482.9,529.2l-13.8-13.8 M504.7,507.4l-13.8-13.8 M526.4,485.6l-13.8-13.8 M534.4,450.1l13.8,13.8 M569.9,442.1l-13.8-13.8 M591.7,420.4l-13.8-13.8 M613.4,398.6l-13.8-13.8 M635.2,376.9l-13.8-13.8 M257.9,754.2l-17.5-17.5 M262.1,714.9l17.5,17.5 M301.4,710.6l-17.5-17.5 M323.2,688.9l-17.5-17.5 M344.9,667.1l-17.5-17.5 M366.7,645.4l-17.5-17.5 M254.5,730l13.8,13.8 M290,722l-13.8-13.8 M311.8,700.3L298,686.5M333.5,678.5l-13.8-13.8 M355.3,656.8L341.5,643" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
