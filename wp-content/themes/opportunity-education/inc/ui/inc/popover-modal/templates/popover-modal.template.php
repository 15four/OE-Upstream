<?php
namespace ui;

/**
 * Template for popover modals
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'id'    => $args['id'],
	'class' => 'c-popover-modal js-popover-modal u-display--flex u-flex--justify-center u-flex--align-center u-background--dark '
		. $args['additional_classes']
);

// Set box attributes
$box_attributes = array(
	'class' => 'c-popover-modal__box u-display--flex u-flex--align-center js-popover-modal__box '
		. \helpers\prepare_background_class_names( 'rich_white' ) . ' '
		. $args['box_additional_classes']
);

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<div class="c-popover-modal__closer-container u-display--flex u-flex--justify-end u-block--full-width">
		<button class="c-popover-modal__closer js-popover-modal__closer o-button--unstyled">
			<?php
				\ui\svg(
					array(
						'name'    => 'x'
					)
				);
			?>
		</button>
	</div>

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $box_attributes ); ?>>
		<div class="c-popover-modal__box-inner u-block--full-width">
			<?php echo $args['content']; ?>
		</div>
	</div>
</div>
