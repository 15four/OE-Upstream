<?php
namespace ui;

/**
 * Template for timeline items
 *
 * @package Opportunity_Education
 */

// Merge item with defaults
$item = array_merge(
	array(
		'content'            => '',
		'additional_classes' => '',
	),
	$item
);

// Set attributes
$attributes = array(
	'class' => 'c-timeline__item '	. $args['item_additional_classes'] . ' ' . $item['additional_classes']
);

?>

<li <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<?php echo $item['content']; ?>
</li>
