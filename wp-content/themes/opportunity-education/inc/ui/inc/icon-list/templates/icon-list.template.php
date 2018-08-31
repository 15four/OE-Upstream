<?php
namespace ui;

/**
 * Template for icon lists
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-icon-list c-icon-list--' . $args['type'] . ' '
		. $args['additional_classes']
);

// Get tag
$tag = $args['type'] === 'numbered'
	? 'ol'
	: 'ul';

?>

<<?php echo $tag . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( $args['columns'] ): ?>
		<div class="c-grid">
	<?php endif; ?>

	<?php

		// Loop through list items
		foreach ( $args['items'] as $index => $item ) {

			// Include the list item template with each item
			include( __DIR__ . '/item.template.php' );
		}
	?>

	<?php if ( $args['columns'] ): ?>
		</div>
	<?php endif; ?>

</<?php echo $tag; ?>>
