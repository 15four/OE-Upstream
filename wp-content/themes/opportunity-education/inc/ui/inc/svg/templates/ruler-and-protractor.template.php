<?php
namespace ui;

/**
 * Template for ruler and protractor SVGs
 *
 * @package Opportunity_Education
 */

// Set dimensions
$width = 850;
$height = 870;

// Set attributes
$attributes = array(
	'class' => 'c-svg c-svg--ruler-and-protractor ' . $args['additional_classes']
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

// Set ruler and protractor attributes
$ruler_and_protractor_attributes = array(
	'class' => 'c-svg__component c-svg__component--stroke '
		. ( $args['color_1']
			? 'c-svg__component--stroke-color-' . $args['color_1']
			: '' )
);

// Set number attributes
$number_attributes = array(
	'class' => 'c-svg__component c-svg__component--fill '
		. ( $args['color_1']
			? 'c-svg__component--fill-color-' . $args['color_1']
			: '' )
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $inner_attributes ); ?>>
		<svg <?php echo \fifteen_four\helpers\get_attributes_from_array( $svg_attributes ); ?>>

			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $ruler_and_protractor_attributes ); ?> d="M716,31.1l123.4,123.4L134,860L10.6,736.6L716,31.1z M669.5,77.7l44.9,44.9 M613.8,133.4l44.9,44.9 M558.1,189l44.9,44.9 M547.4,289.6l-44.9-44.9 M446.8,300.4l44.9,44.9 M391.1,356l44.9,44.9 M335.5,411.7l44.9,44.9 M279.8,467.4l44.9,44.9M224.1,523.1l44.9,44.9 M168.5,578.7l44.9,44.9 M157.7,679.3l-44.9-44.9 M57.1,690.1l44.9,44.9 M642.9,104.3l35.3,35.3 M693.4,53.8l35.3,35.3 M587.3,159.9l35.3,35.3 M531.6,215.6l35.3,35.3 M475.9,271.3l35.3,35.3 M455.5,362.2l-35.3-35.3 M364.6,382.6l35.3,35.3M344.2,473.5l-35.3-35.3 M253.2,493.9l35.3,35.3 M197.6,549.6l35.3,35.3 M141.9,605.3l35.3,35.3 M86.2,660.9l35.3,35.3 M30.6,716.6l35.3,35.3 M586.9,107.7c-130.3-130.3-341.4-130.3-471.7,0s-130.3,341.4,0,471.7L586.9,107.7z M480,138.2c-81.9-81.9-223.1-73.5-315.4,18.8S63.9,390.6,145.8,472.5L480,138.2z" />

			<path <?php echo \fifteen_four\helpers\get_attributes_from_array( $number_attributes ); ?> d="M121.2,742c5.5,5.5,6.5,10.6,2.9,14.2c-3.2,3.2-8.3,2.3-13.7-3c-5.4-5.4-6.1-10.8-2.8-14C111.1,735.8,116.1,736.8,121.2,742z M112.7,751c4.2,4.2,7.9,5.3,9.9,3.3c2.2-2.2,0.7-5.9-3.4-10.1c-4-4-7.6-5.6-9.9-3.3C107.3,742.9,108.3,746.6,112.7,751z M164.9,686.5L164.9,686.5l-1.3,4.4l-2.1-1.2l1.6-5.4l1.9-1.9l16.2,16.2l-2.1,2.1L164.9,686.5zM229.1,650.6l-1.3-1.3l0.1-3.4c0.2-8.1,0-12-2.4-14.5c-1.6-1.6-4-2.4-6.4,0.1c-1.5,1.5-1.9,3.4-2.1,4.8l-2.2-0.8c0.2-2.1,1.1-4.4,2.9-6.2c3.5-3.5,7.3-2.6,9.7-0.2c3,3,3.2,7.6,3.1,14.3l-0.1,2.5l0,0l7.3-7.3l1.8,1.8L229.1,650.6z M283.5,591.2c1-0.2,3.1-1,4.6-2.6c2.8-2.8,1.9-5.5,0.5-6.8c-2.3-2.2-5.3-1.2-7.4,0.9L280,584l-1.6-1.6l1.2-1.2c1.6-1.6,2.8-4.4,0.9-6.3c-1.3-1.3-3.3-1.6-5.3,0.4c-1.3,1.3-2,3.1-2.2,4.3l-2.2-1c0.2-1.5,1.2-3.7,3-5.5c3.2-3.2,6.5-2.7,8.5-0.8c1.7,1.7,2.1,4.1,0.8,6.8l0,0c2.4-1.6,5.5-1.7,7.8,0.5c2.6,2.6,2.8,6.9-1,10.8c-1.8,1.8-4,2.8-5.3,3.1L283.5,591.2z M347.1,532.7l-4.4-4.4l-7.5,7.5l-1.4-1.4l-3.1-17.6l2.4-2.4l10.1,10.1l2.3-2.3l1.7,1.7l-2.3,2.3l4.4,4.4L347.1,532.7z M341,526.5l-5.4-5.4c-0.8-0.8-1.7-1.7-2.5-2.6l-0.1,0.1c0.4,1.4,0.7,2.5,1,3.7l1.5,9.5l0,0L341,526.5z M392.1,459l-6.2,6.2l3.5,4.8c0.3-0.4,0.6-0.8,1.2-1.4c1.2-1.2,2.8-2.2,4.4-2.6c2-0.5,4.4-0.2,6.5,1.8c3.2,3.2,3,8-0.5,11.6c-1.8,1.8-3.8,2.8-5,3l-1.1-2.2c1.1-0.3,2.9-1.1,4.4-2.6c2.1-2.1,2.5-5.2,0.3-7.3c-2.1-2.1-5-2.2-8.2,1.1c-0.9,0.9-1.5,1.7-2.1,2.4l-6.7-8.8l7.7-7.7L392.1,459z M447,403.5c-0.5,0.4-1,1-1.5,1.7c-2.9,4-2.2,8.3,0.1,11.4l0.1-0.1c-0.2-1.8,0.2-4,2-5.8c2.9-2.9,6.9-2.8,10.1,0.3c3,3,3.7,7.7,0.3,11.1c-3.5,3.5-8.4,3-12.6-1.2c-3.2-3.2-4.6-6.8-4.6-10c0-2.7,1-5.3,2.8-7.6c0.5-0.7,1.1-1.3,1.5-1.7L447,403.5z M455.7,413.5c-2.3-2.3-5-2.4-7-0.4c-1.3,1.3-1.7,3.4-1.1,5.1c0.1,0.4,0.3,0.8,0.7,1.2c2.7,2.6,5.9,3.4,8.2,1.1C458.3,418.6,458,415.8,455.7,413.5z M502.3,345.1l1.4,1.4l7.7,21.8l-2.3,2.3l-7.3-21.3l0,0l-7.9,7.9l-1.8-1.8L502.3,345.1zM559.3,312.3c-2-2-2.3-4.7-1.1-7.5l-0.1-0.1c-2.6,0.9-4.8,0.3-6.2-1.1c-2.6-2.6-2.1-6.5,0.7-9.3c3.1-3.1,6.7-2.7,8.7-0.7c1.4,1.4,2.2,3.5,1.1,6.4l0.1,0.1c2.8-1.2,5.5-1,7.4,0.9c2.8,2.8,2.3,7.1-0.8,10.2C565.7,314.6,561.6,314.6,559.3,312.3zM553.8,301.4c1.6,1.6,3.7,1.3,6.1-0.1c0.9-1.9,1-3.9-0.5-5.4c-1.3-1.3-3.4-1.9-5.4,0.1C552.2,297.8,552.4,300,553.8,301.4zM567.9,303.4c-2-2-4.3-1.5-7.1,0c-1.3,2.4-1.1,4.7,0.4,6.3c1.6,1.7,4.3,1.9,6.3-0.1C569.5,307.6,569.6,305.1,567.9,303.4zM618.9,257.8c0.5-0.4,1-1,1.7-1.8c1.1-1.4,1.8-3.2,1.8-5c0.1-2-0.5-4.2-2.2-6.4l-0.1,0.1c0.2,2-0.4,3.9-2.1,5.6c-2.9,2.9-7,2.6-9.7-0.2c-3.1-3.1-3.5-8-0.2-11.3c3.3-3.3,8-2.7,12.2,1.5c3.6,3.6,4.9,7.2,4.8,10.4c0,2.5-1,4.9-2.5,6.9c-0.7,0.9-1.3,1.6-1.9,2.1L618.9,257.8z M610.4,247.6c2,2,4.7,2.2,6.5,0.3c1.5-1.5,1.9-3.3,1.5-4.9c-0.1-0.3-0.2-0.6-0.6-1c-2.8-2.8-5.9-3.9-8.2-1.6C607.8,242.4,608.1,245.4,610.4,247.6z M660.4,191L660.4,191l-1.3,4.4l-2.1-1.2l1.6-5.4l1.9-1.9l16.2,16.2l-2.1,2.1L660.4,191z M683.6,179.6c5.5,5.5,6.5,10.6,2.9,14.2c-3.2,3.2-8.3,2.3-13.7-3c-5.4-5.4-6.1-10.8-2.8-14C673.4,173.4,678.4,174.5,683.6,179.6z M675,188.7c4.2,4.2,7.9,5.3,9.9,3.3c2.2-2.2,0.7-5.9-3.4-10.1c-4-4-7.6-5.6-9.9-3.3C669.7,180.5,670.6,184.3,675,188.7z M716,135.4L716,135.4l-1.3,4.4l-2.1-1.2l1.6-5.4l1.9-1.9l16.2,16.2l-2.1,2.1L716,135.4zM727.3,124.2L727.3,124.2l-1.3,4.4l-2.1-1.2l1.6-5.4l1.9-1.9l16.2,16.2l-2.1,2.1L727.3,124.2z" />
		</svg>
	</div>
</<?php echo $args['tag']; ?>>