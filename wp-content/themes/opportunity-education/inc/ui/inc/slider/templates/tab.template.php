<?php
/**
 * Template for tab sliders
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class'                    => 'c-slider c-slider--tab js-slider ' . $args['additional_classes'],
	'data-slider-index'        => '0',
	'data-slider-slide-count'  => count( $args['slides'] )
);

// Set controls attributes
$controls_attributes = array(
	'class' => 'c-slider__controls c-slider__controls--tab js-slider__controls o-scroll-shadow-guy js-scroll-shadow-guy ' . $args['controls_additional_classes']
);

// Set controls alignment justification class suffixes
$controls_alignment_justification_class_suffixes = array(
	'left'   => 'start',
	'center' => 'center',
	'right'  => 'end'
);

// Set controls inner attributes
$controls_inner_attributes = array(
	'class' => 'c-slider__controls-inner o-scroll-shadow-guy__content js-scroll-shadow-guy__content o-button-container o-button-container--single-row '
		. ( array_key_exists( $args['controls_alignment'], $controls_alignment_justification_class_suffixes )
			? 'u-flex--justify-' . $controls_alignment_justification_class_suffixes[$args['controls_alignment']] . '@lg'
			: '' )
);

// Set slides attributes
$slides_attributes = array(
	'class' => 'c-slider__slides js-slider__slides o-dynamic-height-guy js-dynamic-height-guy js-dynamic-height-guy--loading ' . $args['slides_additional_classes']
);

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<<?php echo $args['controls_tag'] . ' ' .  \fifteen_four\helpers\get_attributes_from_array( $controls_attributes ); ?>>

		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $controls_inner_attributes ); ?>>

			<?php

				// Loop through slides
				for ( $index = 0; $index < count( $args['slides'] ); $index++ ) {

					// Set control attributes
					$control_attributes = array(

						// Classes
						'class' => 'c-slider__control c-slider__control--tab o-button--unstyled js-slider__control '

							// Determine if control is active
							. ( $index === $args['active_slide']
								? 'is-active'
								: '' ) . ' '

							// Additional classes
							. $args['control_additional_classes'],

						// Slide target
						'data-slider-target' => ( string ) $index,

						'data-tooltip' => $args['slides'][$index]['tooltip']
					);

					// If the current control isn't null, echo the control's content, otherwise, echo a button with the slide's name in it
					echo \fifteen_four\helpers\wrap_with_tag(
						!is_null( $args['controls'][$index] )
							? $args['controls'][$index]['content']
							: $args['slides'][$index]['name'],
						'button',
						$control_attributes
					);
				}

			?>
		</div>
	</<?php echo $args['controls_tag']; ?>>

	<<?php echo $args['slides_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $slides_attributes ); ?>>

		<div class="c-slider__slides-inner js-slider__slides-inner o-dynamic-height-guy__inner js-dynamic-height-guy__inner">

			<?php

				// Loop through slides
				foreach ( $args['slides'] as $index => $slide ) {

					// Include the slide template with each image
					include( __DIR__ . '/slide.template.php' );
				}
			?>

		</div>
	</<?php echo $args['slides_tag']; ?>>
</div>
