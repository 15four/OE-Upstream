<?php
namespace ui;

/**
 * Template for stats lists
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-stats-list u-display--flex u-flex--align-center ' . $args['additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( !is_null( $args['icon'] ) ): ?>
		<div class="c-stats-list__icon-container">
			<div class="c-stats-list__icon">
				<img src="<?php echo \helpers\get_current_directory_uri() . '/assets/icon-' . $args['icon'] . '.png'; ?>" class="u-display--block" />
			</div>
		</div>
	<?php endif; ?>

	<ul class="c-stats-list__list u-display--flex">

		<?php

			// Loop through list items
			foreach ( $args['items'] as $index => $item ) {

				// Include the list item template with each item
				include( __DIR__ . '/item.template.php' );
			}
		?>
	</ul>
</<?php echo $args['tag']; ?>>
