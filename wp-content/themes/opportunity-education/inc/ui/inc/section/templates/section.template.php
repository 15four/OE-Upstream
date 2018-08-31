<?php
namespace ui;

/**
 * Template for sections
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(

	// ID
	'id'    => 'section-' . $args['index'],

	// Classes
	'class' => 'c-section '

		// Background utility classes
		. \helpers\prepare_background_class_names( $args['background_color'] ) . ' '

		// Padding utility classes
		. implode(
			' ',
			preg_filter(
				'/^.*/',
				'u-padding-$0--' . $args['padding_style'],
				$args['padding']
			)
		) . ' '

		// Additional classes
		. $args['additional_classes'],

	// Style
	'style' => array(
		'background-image' => $args['background_image']
			? 'url("' . $args['background_image'] . '")'
			: null,
		'background-size'  => $args['background_image']
			? $args['background_image_style']
			: null,
		'background-repeat' => $args['background_image_style'] !== 'tile'
			? 'no-repeat'
			: null
	)
);

// Set content attributes
$content_attributes = array(
	'class' => 'c-section__content ' . $args['content_additional_classes']
)

?>

<!-- #section-<?php echo $args['index'] ?> -->
<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( !empty( $args['background_layers'] ) ): ?>
		<div class="c-section__background-layers">

			<?php

				// Loop through background layers
				foreach ( $args['background_layers'] as $background_layer ) {

					// Set background layer attributes
					$background_layer_attributes = array(
						'class' => 'c-section__background-layer '
							. 'c-section__background-layer--' . $background_layer['type'] . ' '
							. 'c-section__background-layer--' . $background_layer['position'] . ' '
							. 'u-display--none u-display--block@lg'
					);

					// Determine SVG color
					$svg_color = $background_layer['color'] === 'auto'
						? ( in_array( \fifteen_four\helpers\clean_class_name( $args['background_color'] ), \constants\LIGHT_BACKGROUND_CLASS_NAMES )
							? 'translucent_dark'
							: 'translucent_light' )
						: $background_layer['color'];

					// Set SVG args
					$svg_args = array(
						'name'    => $background_layer['type'],
						'color_1' => $svg_color
					);

					// Output a background layer with the appropriate SVG inside of it
					echo \fifteen_four\helpers\wrap_with_tag(
						\ui\get_svg( $svg_args ),
						'div',
						$background_layer_attributes
					);
				}
			?>
		</div>
	<?php endif; ?>

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_attributes ); ?>>
		<?php
			echo \fifteen_four\helpers\conditionally_wrap_with_tag(
					$args['constrain_content'],
					$args['content'],
					'div',
					array(
						'class' => 'c-container'
					)
				);
		?>
	</div>
</<?php echo $args['tag']; ?>><!-- #section-<?php echo $args['index'] ?> -->
