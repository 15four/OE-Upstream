<?php
namespace ui;

/**
 * Template for the content of bio cards
 *
 * @package Opportunity_Education
 */

// Set title attributes
$title_attributes = array(
	'class' => 'u-text--heading-md'
);

?>

<div class="c-grid c-grid--compact c-grid--single-row@lg u-flex--justify-center">

	<div class="c-grid__column c-grid__column--4 c-grid__column--2@lg">
		<?php

			\ui\circle_guy_from_user( $args['user']->ID, 'square', array( 'size' => 'sm' ) );
		?>
	</div>

	<div class="c-grid__column c-grid__column--12 c-grid__column--10@lg">

		<<?php echo $args['title_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $title_attributes ); ?>>
			<?php echo $args['user']->display_name; ?>
		</<?php echo $args['title_tag']; ?>>

		<p class="u-text--caption">
			<?php echo $args['user']->description; ?>
		</p>

	</div>
</div>
