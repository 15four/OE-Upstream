<?php
namespace ui;

/**
 * Template for tiles
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-tile '
		. $args['additional_classes']
);

// Set header attributes
$header_attributes = array(
	'class' => 'c-tile__header '
		. ( $args['content']
			? 'u-margin-bottom--sm'
			: '' ) . ' '
		. \helpers\prepare_background_class_names( $args['header_background_color'] ) . ' '
		. $args['header_additional_classes']
);

// Set link attributes
$link_attributes = array(
	'class'  => 'c-tile__link u-display--block',
	'href'   => $args['link'],
	'target' => $args['link_target']
);

// Set image element attributes
$image_container_attributes = array(
	'class' => 'c-tile__image-container ' . $args['image_additional_classes']
);

// Set image attributes
$image_attributes = array(
	'src' => $args['image'],
	'class' => 'u-display--block'
);

// Text container attributes
$text_container_attributes = array(
	'class' => 'c-tile__text-container u-display--flex u-flex--direction-column u-flex--justify-end u-block--full-width u-block--full-height u-padding--sm'
);

// Subtitle attributes
$subtitle_attributes = array(
	'class' => 'c-tile__subtitle u-text--body u-text--family-meta-serif u-text--italic u-margin-bottom--tiny u-underline u-underline--small '
		. $args['subtitle_additional_classes']
);

// Title attributes
$title_attributes = array(
	'class' => 'c-tile__title u-text--heading-sm ' . $args['title_additional_classes']
);

// Set content attributes
$content_attributes = array(
	'class' => 'c-tile__content '
		. $args['content_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<header <?php echo \fifteen_four\helpers\get_attributes_from_array( $header_attributes ); ?>>

		<?php if ( $args['link'] ): ?>
			<a <?php echo \fifteen_four\helpers\get_attributes_from_array( $link_attributes ); ?>>
		<?php endif; ?>

		<?php if ( $args['image'] ): ?>
			<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_container_attributes ); ?>>
				<?php echo \fifteen_four\helpers\wrap_with_tag( '', 'img', $image_attributes ); ?>
			</div>
		<?php endif; ?>

		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $text_container_attributes ); ?>>

			<<?php echo $args['subtitle_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $subtitle_attributes ); ?>>
				<?php echo $args['subtitle']; ?>
			</<?php echo $args['subtitle_tag']; ?>>

			<<?php echo $args['title_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $title_attributes ); ?>>
				<?php echo $args['title']; ?>
			</<?php echo $args['title_tag']; ?>>
		</div>

		<?php if ( $args['link'] ): ?>
			</a>
		<?php endif; ?>

	</header>

	<?php if ( $args['content'] ): ?>

		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_attributes ); ?>>
			<?php echo apply_filters( 'the_content', $args['content'] ); ?>
		</div>

	<?php endif; ?>

</<?php echo $args['tag']; ?>>
