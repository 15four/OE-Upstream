<?php
namespace ui;

/**
 * Template for belt cards
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-card c-card--belt '
		. ( $args['link']
			? 'c-card--has-link'
			: '' ) . ' '
		. \helpers\prepare_background_class_names( $args['background_color'] ) . ' '
		. $args['additional_classes']
);

// Set image container attributes
$image_container_attributes = array(
	'class' => 'c-card__image-container '
		. $args['image_container_additional_classes']
);

// Set image attributes
$image_attributes = array(
	'class' => 'c-card__image u-block--full-height'
		. $args['image_additional_classes'],
	'style' => array(
		'background-image' => 'url("' . $args['image'] . '")'
	)
);

// Set content attributes
$content_attributes = array(
	'class' => 'c-card__content '
		. $args['content_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( $args['link'] ): ?>
		<a class="c-card__link o-link--plain u-display--block" href="<?php echo $args['link']; ?>">
	<?php endif; ?>

	<header <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_container_attributes ); ?>>
		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_attributes ); ?>>
	</header>

	<div class="c-card__belt u-display--flex u-flex--justify-center">
		<?php
			\ui\circle_guy(
				array(
					'image'              => $args['belt_image'],
					'additional_classes' => 'c-card__belt-image'
				)
			)
		?>
	</div>

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_attributes ); ?>>
		<?php echo $args['content']; ?>
	</div>

	<?php if ( $args['link'] ): ?>
		</a>
	<?php endif; ?>

</<?php echo $args['tag']; ?>>
