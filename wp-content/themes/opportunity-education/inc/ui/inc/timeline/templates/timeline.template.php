<?php
namespace ui;

/**
 * Template for timelines
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-timeline ' . $args['additional_classes']
);

?>

<ol <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php

		// Loop through periods
		foreach ( $args['periods'] as $index => $period ) {

			// Include the period template with each item
			include( __DIR__ . '/period.template.php' );
		}
	?>
</ol>
