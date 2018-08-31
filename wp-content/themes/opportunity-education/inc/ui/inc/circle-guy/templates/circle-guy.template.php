<?php
namespace ui;

/**
 * Template for circle guys
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'o-circle-guy o-circle-guy--' . $args['size'] . ' ' . $args['additional_classes']
);

// Set image container attributes
$image_container_attributes = array(
	'class' => 'o-circle-guy__image-container'
);

// Set image container inner attributes
$image_container_inner_attributes = array(
	'class' => 'o-circle-guy__image-container-inner u-display--flex u-flex--align-center'
);

// Set image attributes
$image_attributes = array(
	'src'   => $args['image'],
	'class' => 'o-circle-guy__image u-display--block'
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_container_attributes ); ?>>
		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_container_inner_attributes ); ?>>
			<img <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_attributes ); ?> />
		</div>
	</div>
</<?php echo $args['tag']; ?>>
