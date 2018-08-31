<?php
namespace ui;

/**
 * Template for location maps
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-location-map js-location-map' . $args['additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<div class="c-location-map__background">
		<img src="<?php echo \helpers\get_current_directory_uri() . '/assets/img/background.png'; ?>" class="u-display__block" />
	</div>

	<div class="c-location-map__locations u-display--none u-display--block@lg">

		<?php

			foreach ( $args['locations'] as $index => $location ) {

				// Include location template for each location
				include( __DIR__ . '/location.template.php' );
			}

		?>

	</div>

</<?php echo $args['tag']; ?>>
