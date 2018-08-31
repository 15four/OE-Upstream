<?php
namespace ui;

/**
 * Template for brandscapes
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(

	// Classes
	'class' => 'c-brandscape js-brandscape '

		// Type
		. ( $args['type'] === 'blurscape'
			? 'c-brandscape--blurscape js-brandscape--blurscape'
			: '' ) . ' '

		// Static
		. ( $args['is_static'] && count( $args['sections'] ) === 1
			? 'c-brandscape--static js-brandscape--static'
			: '' ) . ' '

		// Background
		. \helpers\prepare_background_class_names( 'victoria' ) . ' '

		// Additional classes
		. $args['additional_classes'],
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php

		// If the type is a blurscape, create the brandscape background
		if ( $args['type'] === 'blurscape' ):

			// Set up background attributes
			$background_attributes = array(
				'class' => 'c-brandscape__background js-brandscape__background u-block--full-width u-block--full-height',
				'style' => array(
					'background-image' => 'url("' . $args['background_image'] . '")'
				)
			);
	?>

		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $background_attributes ); ?>></div>

	<?php endif; ?>

	<?php

		// Loop through sections
		foreach ( $args['sections'] as $index => $section ) {

			// Include the section template with each section
			include( __DIR__ . '/brandscape-section.template.php' );
		}

		// If there are more than two sections, output the controls
		if ( count( $args['sections'] ) > 2 ):

			// Set up controls attributes
			$controls_attributes = array(
				'class' => 'c-brandscape__controls js-brandscape__controls u-display--flex u-flex--justify-end u-flex--align-center u-block--full-width u-block--full-height'
			);
	?>

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $controls_attributes ) ; ?>>
		<div class="c-brandscape__controls-inner o-button-container o-button-container--vertical u-margin-right--tiny">

		<?php
			// Loop through sections and add a control for each
			for ( $i = 0; $i < count( $args['sections'] ); $i++ ):

				// Set up control attributes
				$control_attributes = array(
					'class' => 'c-brandscape__control o-button--unstyled js-brandscape__control '
						. ( $i === 0
							? 'is-active'
							: '' ) . ' ',
					'data-brandscape-section-target' => ( string ) $i,
				);
		?>

			<button <?php echo \fifteen_four\helpers\get_attributes_from_array( $control_attributes ); ?>>
			</button>

		<?php endfor; ?>

		</div>
	</div>

	<?php endif; ?>

</<?php echo $args['tag']; ?>>
