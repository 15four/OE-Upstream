<?php
namespace ui;

/**
 * Template for quest anatomies
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-quest-anatomy ' . $args['additional_classes']
);

// Set device screen attributes
$device_screen_attributes = array(
	'src'   => ( $args['image'] === null
		? \helpers\get_current_directory_uri() . '/assets/img/device-screen.jpg'
		: $args['image'] ),
	'class' => 'c-quest-anatomy__device-screen u-display--block'
);

// Set device body attributes
$device_body_attributes = array(
	'src'   => \helpers\get_current_directory_uri() . '/assets/img/device-body.png',
	'class' => 'c-quest-anatomy__device-body u-display--block'
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<div class="c-quest-anatomy__device u-block--centered@lg">
		<img <?php echo \fifteen_four\helpers\get_attributes_from_array( $device_screen_attributes ); ?> />
		<img <?php echo \fifteen_four\helpers\get_attributes_from_array( $device_body_attributes ); ?> />
	</div>

	<div class="c-quest-anatomy__attributes">

		<?php if ( $args['reviews_content'] ): ?>
			<div class="c-quest-anatomy__attribute c-quest-anatomy__attribute--reviews" style="top: <?php echo $args['reviews_offset']; ?>%;">
				<div class="u-block--full-width u-display--flex u-flex--align-center o-animation o-animation--scroll o-animation--fade-right o-animation--stagger-3 js-animation--scroll">
					<div class="c-quest-anatomy__attribute-card u-background--light u-background--rich-white">
						<?php echo $args['reviews_content']; ?>
					</div>
					<div class="c-quest-anatomy__attribute-line u-display--none u-display--block@lg">
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $args['effort_content'] ): ?>
			<div class="c-quest-anatomy__attribute c-quest-anatomy__attribute--effort" style="top: <?php echo $args['effort_offset']; ?>%;">
				<div class="u-block--full-width u-display--flex u-flex--align-center o-animation o-animation--scroll o-animation--fade-left o-animation--stagger-4 js-animation--scroll">
					<div class="c-quest-anatomy__attribute-card u-flex--order-1 u-background--light u-background--rich-white">
						<?php echo $args['effort_content']; ?>
					</div>
					<div class="c-quest-anatomy__attribute-line u-display--none u-display--block@lg">
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $args['artifacts_content'] ): ?>
			<div class="c-quest-anatomy__attribute c-quest-anatomy__attribute--artifacts" style="top: <?php echo $args['artifacts_offset']; ?>%;">
				<div class="u-block--full-width u-display--flex u-flex--align-center o-animation o-animation--scroll o-animation--fade-right o-animation--stagger-5 js-animation--scroll">
					<div class="c-quest-anatomy__attribute-card u-background--light u-background--rich-white">
						<?php echo $args['artifacts_content']; ?>
					</div>
					<div class="c-quest-anatomy__attribute-line u-display--none u-display--block@lg">
					</div>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( $args['driving_question_content'] ): ?>
			<div class="c-quest-anatomy__attribute c-quest-anatomy__attribute--driving-question" style="top: <?php echo $args['driving_question_offset']; ?>%;">
				<div class="u-block--full-width u-display--flex u-flex--align-center o-animation o-animation--scroll o-animation--fade-left o-animation--stagger-6 js-animation--scroll">
					<div class="c-quest-anatomy__attribute-card u-flex--order-1 u-background--light u-background--rich-white">
						<?php echo $args['driving_question_content']; ?>
					</div>
					<div class="c-quest-anatomy__attribute-line u-display--none u-display--block@lg">
					</div>
				</div>
			</div>
		<?php endif; ?>

	</div>

</<?php echo $args['tag']; ?>>
