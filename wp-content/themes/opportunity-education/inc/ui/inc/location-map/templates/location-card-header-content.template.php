<?php
namespace ui;

/**
 * Template for location card header content
 *
 * @package Opportunity_Education
 */

// Here, the args are just the location
$location = $args;

?>

<div class="u-display--flex u-flex--justify-between u-flex--align-center">

	<h3 class="u-text--body u-text--family-roboto u-text--compact u-text--bold u-margin-right--tiny u-margin-bottom--none">
		<?php echo $location['title']; ?>
	</h3>

	<?php

		// Close button
		\ui\svg(
			array(
				'name'               => 'x',
				'tag'                => 'button',
				'additional_classes' => 'c-location-map__close js-location-map__close o-button--unstyled u-flex--shrink-0'
			)
		);
	?>
</div>
