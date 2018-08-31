<?php
/**
 * Template for regular sliders
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class'                    => 'c-slider c-slider--regular js-slider ' . $args['additional_classes'],
	'data-slider-index'        => '0',
	'data-slider-slide-count'  => count( $args['slides'] )
);

// Set slides attributes
$slides_attributes = array(
	'class' => 'c-slider__slides js-slider__slides o-dynamic-height-guy js-dynamic-height-guy js-dynamic-height-guy--loading ' . $args['slides_additional_classes']
);

// Set controls attributes
$controls_attributes = array(
	'class' => 'c-slider__controls c-slider__controls--regular o-button-container u-block--full-width u-flex--justify-between ' . $args['controls_additional_classes']
);

// Set control attributes
$control_attributes = array(
	'class' => 'c-slider__control c-slider__control--regular js-slider__control o-button--even-padding o-button--solid '	. $args['control_additional_classes']
);

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<<?php echo $args['slides_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $slides_attributes ); ?>>

		<div class="c-slider__slides-inner js-slider__slides-inner o-dynamic-height-guy__inner js-dynamic-height-guy__inner">

			<?php

				// Loop through slides
				foreach ( $args['slides'] as $index => $slide ) {

					// Include the slide template with each slide
					include( __DIR__ . '/slide.template.php' );
				}
			?>

		</div>
	</<?php echo $args['slides_tag']; ?>>

	<?php if ( count( $args['slides'] ) > 1 ): ?>

		<<?php echo $args['controls_tag'] . ' ' .  \fifteen_four\helpers\get_attributes_from_array( $controls_attributes ); ?>>
			<button data-slider-direction="prev" <?php echo \fifteen_four\helpers\get_attributes_from_array( $control_attributes ); ?>>
				<?php \ui\svg( array( 'name' => 'left_facing_chevron' ) ); ?>
			</button>
			<button data-slider-direction="next" <?php echo \fifteen_four\helpers\get_attributes_from_array( $control_attributes ); ?>>
				<?php \ui\svg( array( 'name' => 'right_facing_chevron' ) ); ?>
			</button>
		</<?php echo $args['controls_tag']; ?>>

	<?php endif; ?>

</div>
