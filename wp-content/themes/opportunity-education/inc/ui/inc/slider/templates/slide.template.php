<?php
/**
 * Template for slides
 *
 * @package Best_Bison
 */

// Merge slide with defaults
$slide = array_merge(
	array(
		'content'            => '',
		'additional_classes' => ''
	),
	$slide
);

// Set attributes
$attributes = array(

	// Classes
	'class' => 'c-slider__slide js-slider__slide '

		// Determine if slide is active
		. ( $index === $args['active_slide']
			? 'is-active'
			: '' ) . ' '

		// Additional classes
		. $args['slide_additional_classes'] . ' ' . $slide['additional_classes']
);

?>

<<?php echo $args['slide_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<?php echo $slide['content']; ?>
</<?php echo $args['slide_tag']; ?>>
