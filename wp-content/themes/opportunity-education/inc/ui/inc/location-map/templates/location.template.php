<?php
namespace ui;

/**
 * Template for locations
 *
 * @package Opportunity_Education
 */

// Set color key based on type
$type_color_key = array(
	'quest-forward-academy'       => 'zest',
	'quest-forward-school'        => 'zest',
	'quest-forward-program'       => 'zest',
	'primary-program-school'      => 'victoria',
	'quest-forward-sister-school' => 'emerald',
	'admin'                       => 'light-mid-gray'
);

// Merge location with defaults
$location = array_merge(
	array(
		'type' => 'quest-forward-program',
	),
	$location
);

// Set attributes
$attributes = array(
	'class' => 'c-location-map__location '
		. 'c-location-map__location--' . $location['type'] . ' '
		. 'js-location-map__location ' . $args['location_additional_classes'],
	'style' => array(
		'top'  => $location['offset']['top'] . '%',
		'left' => $location['offset']['left'] . '%'
	)
);

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<?php

		// The map marker
        \ui\svg(
            array(
                'name'               => 'map_marker',
				'tag'                => 'button',
                'color_1'            => $type_color_key[$location['type']],
                'color_2'            => 'rich_white',
                'additional_classes' => 'c-location-map__location-marker js-location-map__location-marker o-button--unstyled o-animation o-animation--scroll o-animation--fade-down js-animation--scroll'
            )
		);

		// The location card header content
		$location_card_header_content = \fifteen_four\helpers\get_include( __DIR__ . '/location-card-header-content.template.php', $location );

		// The location card
		\ui\card(
			array(
				'type'                       => 'header',
				'header_background_color'    => $type_color_key[$location['type']],
				'header_content'             => $location_card_header_content,
				'header_additional_classes'  => 'u-padding--tiny',
				'content'                    => $location['content'],
				'content_additional_classes' => 'u-text--caption u-text--compact u-padding--tiny',
				'additional_classes'         => 'c-location-map__location-card'
			)
		)
    ?>
</div>
