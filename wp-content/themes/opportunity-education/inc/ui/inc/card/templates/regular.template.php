<?php
namespace ui;

/**
 * Template for regular cards
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-card c-card--regular '
		. ( $args['link']
			? 'c-card--has-link'
			: '' ) . ' '
		. \helpers\prepare_background_class_names( $args['background_color'] ) . ' '
		. $args['additional_classes']
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

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_attributes ); ?>>
		<?php echo $args['content']; ?>
	</div>

	<?php if ( $args['link'] ): ?>
		</a>
	<?php endif; ?>

</<?php echo $args['tag']; ?>>
