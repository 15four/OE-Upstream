<?php
/**
 * Template for event
 *
 * @package Opportunity_Education
 */

// Merge event with defaults
$event = array_merge(
	array(
        'title'   => '',
        'excerpt' => ''
	),
	$event
);

// Set attributes
$attributes = array(

	// Classes
	'class' => 'c-horizontal-timeline__event js-horizontal-timeline__event '

		// Determine if event is active
		. ( $index === 0
			? 'is-selected'
			: '' ) . ' '

);

// Link attributes
$link_attributes = array(

    // Data Attributes
    'data-date'    => $index,
	'data-tooltip' => $event['excerpt']
);

?>

<li <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
    <a <?php echo \fifteen_four\helpers\get_attributes_from_array( $link_attributes ); ?>><?php echo $event['title']; ?></a>
</li>
