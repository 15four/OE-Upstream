<?php
namespace ui;

/**
 * Template for header cards
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-card c-card--header '
		. ( $args['link']
			? 'c-card--has-link'
			: '' ) . ' '
		. \helpers\prepare_background_class_names( $args['background_color'] ) . ' '
		. $args['additional_classes']
);

// Set header attributes
$header_attributes = array(
	'class' => 'c-card__header '
		. \helpers\prepare_background_class_names( $args['header_background_color'] ) . ' '
		. $args['header_additional_classes']
);

// Set content attributes
$content_attributes = array(
	'class' => 'c-card__content ' . $args['content_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<header <?php echo \fifteen_four\helpers\get_attributes_from_array( $header_attributes ); ?>>
		<div class="c-card__header-inner">
			<?php echo $args['header_content']; ?>
		</div>
	</header>

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_attributes ); ?>>
		<?php echo $args['content']; ?>
	</div>
</<?php echo $args['tag'] ?>>
