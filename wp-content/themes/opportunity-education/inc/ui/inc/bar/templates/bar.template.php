<?php
namespace ui;

/**
 * Template for bars
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-bar u-padding-bottom--std ' . $args['additional_classes']
);

// Set subtitle attributes
$subtitle_attributes = array(
	'class' => 'c-bar__subtitle u-text--caption u-text--uppercase u-text--bold' . $args['subtitle_additional_classes']
);

// Set link attributes
$link_attributes = array(
	'class' => 'c-bar__link o-link--plain',
	'href'  => $args['link']
);

// Set title attributes
$title_attributes = array(
	'class' => 'c-bar__title u-text--heading-sm' . $args['subtitle_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( $args['subtitle'] ): ?>
		<<?php echo $args['subtitle_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $subtitle_attributes ); ?>>
			<?php echo $args['subtitle']; ?>
		</<?php echo $args['subtitle_tag']; ?>>
	<?php endif; ?>

	<?php if ( $args['title'] ): ?>

		<?php if ( $args['link'] ): ?>
			<a <?php echo \fifteen_four\helpers\get_attributes_from_array( $link_attributes ); ?>>
		<?php endif; ?>

			<<?php echo $args['title_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $title_attributes ); ?>>
				<?php echo $args['title']; ?>
			</<?php echo $args['title_tag']; ?>>

		<?php if ( $args['link'] ): ?>
			</a>
		<?php endif; ?>

	<?php endif; ?>

</<?php echo $args['tag']; ?>>
