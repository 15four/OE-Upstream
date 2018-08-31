<?php
namespace ui;

/**
 * Template for bleeds
 *
 * Bleeds must live within a container for them to work. You have been warned!
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-bleed c-bleed--' . $args['subject_side'] . ' ' . $args['additional_classes']
);

// Set grid attributes
$grid_attributes = array(
	'class' => 'c-grid c-grid--single-row@lg ' . $args['grid_additional_classes']
);

// Subject grid column attributes
$subject_column_attributes = array(
	'class' => 'c-grid__column c-grid__column--12 c-grid__column--' . $args['subject_width'] . '@lg '
		. ( $args['subject_side'] === 'right'
			? 'u-flex--order-1@lg'
			: 'u-display--flex u-flex--direction-column u-flex--align-end' )
);

// Set subject attributes
$subject_attributes = array(
	'class' => 'c-bleed__subject ' . $args['subject_additional_classes']
);

// Set content grid column attributes
$content_column_attributes = array(
	'class' => 'c-grid__column c-grid__column--12 c-grid__column--' . $args['content_width'] . '@lg'
);

// Set content attributes
$content_attributes = array(
	'class' => 'c-bleed__content ' . $args['content_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $grid_attributes ); ?>>

		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $subject_column_attributes ); ?>>
			<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $subject_attributes ); ?>>
				<?php echo $args['subject_content']; ?>
			</div>
		</div>

		<?php if ( ( int ) $args['content_width'] > 0 && ( int ) $args['subject_width'] < 12 ): ?>

		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_column_attributes ); ?>>
			<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_attributes ); ?>>
				<?php echo $args['content']; ?>
			</div>
		</div>

		<?php endif; ?>

	</div>
</<?php echo $args['tag']; ?>>
