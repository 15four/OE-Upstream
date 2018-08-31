<?php
namespace ui;

/**
 * Template for scissors SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 315.7;
$height = 252.5;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--scissors ' . $args['additional_classes']
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

// Set scissors attributes
$scissors_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>
			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $scissors_attributes ); ?> d="M39.7,246.2c0,0,22.4-32.8,56.4-61.8s48.6-40.7,54.1-46.1c5.5-5.4,6.5-7.2,8.6-18.4s4-19.8,4-19.8s-4.1-1.7-3.3-7.4s4.2-33.8,4.2-33.8s1-14.9,2.7-20.4c1.7-5.5,3.7-12.5,9.5-19.5s14.5-13.9,23.4-12.1s23.4,7.1,30.8,13.4c7.3,6.3,4.5,11.9,0.5,18.5s-12.2,18.5-20.2,26.7c-8,8.2-24.2,25.4-27.5,37.2c0,0-3,3-5.3,2.4c0,0-4.6,23.9-3.2,26.3l19.8-6.4c0,0,2.3-3.6,12.4-8.4c10.1-4.8,27-12.6,27-12.6l32.8-14.6c0,0,17.1-11.3,25.7-7.6c8.6,3.7,13.4,9.1,14.9,15.6c1.5,6.5,4.7,16.7-10.3,29.1c0,0-18.1,16.9-42.9,26.2s-28.8,9.4-36.7,8.5c-7.8-0.9-10.8-5-27-5.2c0,0-8.8,2.2-11.2-3.1l-19,5.9C159.8,158.6,78.1,233.6,39.7,246.2z M147.1,145.3c-2.4,3.2-1.5,7.9,2,10.6s8.3,2.2,10.7-1c2.4-3.2,1.5-7.9-2-10.6C154.3,141.7,149.5,142.1,147.1,145.3z M159.8,158.6c0,0,10.5-7.3,13.3-13.4c2.8-6.1,1.3-13.9,1.3-13.9 M150.3,138.3c0,0-64.7,19.2-85.5,25.5c-20.8,6.3-46.5,16.7-53.1,22.7c-6.7,6-4.1,7.2-4.1,7.2c5.7,1.4,102.7-21.4,102.7-21.4 M186.3,57.4c10.5,1.2,19.2-4.7,21.6-15.3c2.4-10.6-0.7-21.2-11.9-23.2S176.8,31,176.8,31C173.7,39.4,175.8,56.3,186.3,57.4z M207.3,142.4c0.6,4.4,4,8.4,11.2,8.2c7.3-0.2,19.3-5.3,30.9-9.3c11.6-4,32.8-17.5,39.2-23.6s6.5-11.8,6-16.4s-3.7-6-7.4-7.1c-3.8-1.1-8.6,0.6-14.9,5.1c-6.3,4.5-14.1,7.8-24.1,13c-10,5.2-27.6,11.5-27.6,11.5C207.6,129.8,206.7,138,207.3,142.4zM162.9,100.1c0,0,8.2,4.7,14.8,4.8 M194.2,125c-16,13.1-15.4,27.8-15.4,27.8" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>
