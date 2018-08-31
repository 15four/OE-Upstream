<?php
/**
 * Template for brandscape sections
 *
 * @package Opportunity_Education
 */

// Merge section with defaults
$section = array_merge(
	array(
		'content'                 => '',
		'background_subject_type' => 'image',
		'background_subject'      => \constants\get_default_image( 'brandscape' )
	),
	$section
);

// Set attributes
$attributes = array(

	// Classes
	'class' => 'c-brandscape__section js-brandscape__section u-display--flex u-flex--align-end '

		// Additional classes
		. $args['section_additional_classes']
);

?>

<<?php echo $args['section_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( $args['type'] === 'brandscape' ): ?>

		<div class="c-brandscape__section-background js-brandscape__section-background u-block--full-width u-block--full-height">

			<?php

				// If the background subject exists, output the subject container with it in there
				if ( $section['background_subject'] ):
			?>

				<div class="c-brandscape__section-background-subject-container js-brandscape__section-background-subject-container u-display--flex u-flex--justify-center u-flex--align-center">

					<?php

						// Set up background subject attributes
						$background_subject_attributes = array(
							'class' => 'c-brandscape__section-background-subject c-brandscape__section-background-subject--' . $section['background_subject_type'] . ' '
								. 'js-brandscape__section-background-subject'
						);

						// If the subject is a video, output it
						if ( $section['background_subject_type'] === 'video' ) {

							// Get the video
							echo \fifteen_four\helpers\get_video(
								$section['background_subject'],
								array_merge (
									$background_subject_attributes,
									array(
										'controls' => false,
										'loop'     => true,
										'autoplay' => true,
										'muted'    => true
									)
								)
							);
						}

						// Otherwise, it is an image, so go get it
						else {
							echo \fifteen_four\helpers\wrap_with_tag(
								'',
								'img',
								array_merge(
									$background_subject_attributes,
									array(
										'src' => $section['background_subject']
									)
								)
							);
						}
					?>

				</div>

			<?php endif; ?>

			<div class="c-brandscape__section-background-overlay js-brandscape__section-background-overlay u-block--full-width u-block--full-height u-background--dark u-background--victoria"></div>
		</div>

	<?php endif; ?>

	<div class="c-brandscape__content js-brandscape__content u-block--full-width">
		<div class="c-container">
			<div class="o-animation o-animation--scroll o-animation--fade-up js-animation--scroll">
				<?php echo $section['content']; ?>
			</div>
		</div>

		<?php
			// If there are multiple sections and this is the first, add the little scroll indicator
			if ( $index === 0 && count( $args['sections'] ) > 1 ):
		?>

			<div class="c-brandscape__scroll-indicator u-display--flex u-flex--justify-center u-flex--align-center u-block--full-width">
				<button class="c-brandscape__scroll-indicator-arrow o-button--unstyled js-brandscape__control" data-brandscape-section-target="1">

					<?php

						// Add the little dude
						\ui\svg(
							array(
								'name'               => 'downward_facing_chevron'
							)
						);
					?>

				</button>
			</div>

		<?php endif; ?>
	</div>

</<?php echo $args['section_tag']; ?>>
