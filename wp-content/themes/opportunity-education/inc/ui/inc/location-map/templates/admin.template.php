<?php
namespace ui;

/**
 * Template for admin location maps
 *
 * @package Opportunity_Education
 */

// Grab global post
global $post;

// Set attributes
$attributes = array(
	'class' => 'c-location-map c-location-map--admin js-location-map--admin'
);

// Get location offset
$location_offset = array(
	'top'  => get_post_meta( $post->ID, 'location_offset_top', true ),
	'left' => get_post_meta( $post->ID, 'location_offset_left', true )
);

// Set picker attributes
$picker_attributes = array(
	'class' => 'c-location-map__location c-location-map__location--picker js-location-map__location--picker',
	'style' => array(
		'top'  => $location_offset['top']
			? $location_offset['top'] . '%'
			: '50%',
		'left' => $location_offset['left']
			? $location_offset['left'] . '%'
			: '50%',
	)
);

?>

<p>
	Click on the map to place this location!
</p>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<input id="location-offset-top" name="location_offset_top" type="hidden" class="c-location-map__top js-location-map__offset-top" value="50" />
	<input id="location-offset-left" name="location_offset_left" type="hidden" class="c-location-map__left js-location-map__offset-left" value="50" />

	<div class="c-location-map__background">
		<img src="<?php echo \helpers\get_current_directory_uri() . '/assets/img/background.png'; ?>" class="u-display__block u-block--full-width" />
	</div>

	<div class="c-location-map__locations">

		<?php

			foreach ( $args['locations'] as $index => $location ) {

				// Include location template for each location
				include( __DIR__ . '/location.template.php' );
			}

		?>

		<!-- Picker -->
		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $picker_attributes ); ?>>
			<?php
				\ui\svg(
					array(
						'name'               => 'map_marker',
						'tag'                => 'button',
						'color_1'            => 'mid-gray',
						'color_2'            => 'rich_white',
						'additional_classes' => 'c-location-map__location-marker js-location-map__location-marker'
					)
				);
			?>
		</div>

	</div>

</div>
