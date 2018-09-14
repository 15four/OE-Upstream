<?php
/**
 * Template for periods
 *
 * @package Opportunity_Education
 */

// Merge period with defaults
$period = array_merge(
	array(
        'title'              => '',
        'excerpt'            => '',
		'content'            => '',
		'additional_classes' => ''
	),
	$period
);

// Set attributes
$attributes = array(

    // Date data
    'data-date' => $index,

	// Classes
	'class'     => 'c-horizontal-timeline__period js-horizontal-timeline__period '

		// Determine if period is active
		. ( $index === 0
			? 'is-selected'
			: '' ) . ' '

		// Additional classes
		. $args['period_additional_classes'] . ' ' . $period['additional_classes']
);

?>

<li <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<?php echo $period['content']; ?>
</li>
