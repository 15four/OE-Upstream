<?php
namespace ui;

/**
 * Template for stats list items
 *
 * @package Opportunity_Education
 */

// Merge item with defaults
$item = array_merge(
	array(
		'count' => 99,
		'stat'  => 'Bottles of Beer',
	),
	$item
);

// Set attributes
$attributes = array(
	'class' => 'c-stats-list__item u-display--flex u-flex--align-center'	. $args['item_additional_classes']
);

?>

<li <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<div class="c-stats-list__count">
		<?php echo $item['count']; ?>
	</div>

	<div class="c-stats-list__stat u-text--caption u-text--uppercase">
		<?php echo $item['stat']; ?>
	</div>
</li>
