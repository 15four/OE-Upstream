<?php
namespace ui;

/**
 * Template for timeline periods
 *
 * @package Opportunity_Education
 */

// Merge item with defaults
$period = array_merge(
	array(
		'label'              => '2005',
		'items'              => [],
		'additional_classes' => ''
	),
	$period
);

// Set attributes
$attributes = array(
	'class' => 'c-timeline__period ' . $args['period_additional_classes'] . ' ' . $period['additional_classes']
);

// Set period label attributes
$period_label_attributes = array(
	'class' => 'c-timeline__period-label u-display--flex u-flex--justify-center u-flex--align-center u-block--centered ');
?>

<li <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<<?php echo $args['period_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $period_label_attributes ); ?>>
		<div class="c-timeline__period-label-inner u-text--bold u-text--center">
			<?php echo $period['label']; ?>
		</div>
	</<?php echo $args['period_tag']; ?>>

	<?php if ( !empty( $period['items'] ) ): ?>

		<ol class="c-timeline__items">

			<?php

				// Loop through items
				foreach ( $period['items'] as $index => $item ) {

					// Include the item template with each item
					include( __DIR__ . '/item.template.php' );
				}
			?>
		</ol>
	<?php endif; ?>
</li>
