<?php

/*
 * School template
 *
 * @package Fifteen_Four_2018
 */


// Set attributes
$attributes = array(
	'class' => 'c-card c-card--school '
		. 'c-card--image-' . $args['image_side'] . ' '
		. ( $args['image_side'] !== 'top'
			? 'u-display--flex@lg'
			: '' ) . ' '
		. ( $args['link']
			? 'c-card--has-link'
			: '' ) . ' '
		. \helpers\prepare_background_class_names( $args['background_color'] ) . ' '
		. $args['additional_classes']
);

// Set image container attributes
$image_container_attributes = array(
	'class' => 'c-card__image-container '
		. ( $args['image_side'] === 'right'
			? 'u-flex--order-1@lg '
			: '' )
		. $args['image_container_additional_classes']
);

// Set image attributes
$image_attributes = array(
	'class' => 'c-card__image u-block--full-height '
		. $args['image_additional_classes'],
	'style' => array(
		'background-image' => 'url("' . $args['image'] . '")'
	)
);

// Set content attributes
$content_attributes = array(
	'class' => 'c-card__content '
		. $args['content_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( $args['link'] ): ?>
		<a class="c-card__link o-link--plain u-display--flex@lg u-block--full-width" href="<?php echo $args['link']; ?>">
	<?php endif; ?>

	<header <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_container_attributes ); ?>>
		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $image_attributes ); ?>>
    </header>    

    <div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_attributes ); ?>>

        <div class="c-grid">

            <div class="c-grid__column c-grid__column--12">
    
                <?php if ( $args['school_name'] ): ?>
                    <h2 class="u-text--heading-md"><?php echo $args['school_name']; ?></h2>
                <?php endif; ?>

            </div>

            <div class="c-grid__column c-grid__column--12 c-grid__column--6@md">

                <h4><?php echo $args['school_leader']; ?></h4>
                <p><strong>Phone:</strong> <?php echo $args['school_phone']; ?></p>
                <p><strong>Email:</strong> <a href="mailto:<?php echo $args['school_email']; ?>"><?php echo $args['school_email']; ?></a></p>

            </div>

            <div class="c-grid__column c-grid__column--12 c-grid__column--6@md">

                <p><strong>Address:</strong> <?php echo $args['school_address']; ?></p>
                <p><strong>Total Students:</strong> <?php echo $args['total_students']; ?>, <strong>Quest Forward Students:</strong> <?php echo $args['quest_forward_students']; ?></p>
                <p><strong>Total Teachers:</strong> <?php echo $args['total_teachers']; ?>, <strong>Quest Forward Mentors:</strong> <?php echo $args['quest_forward_mentors']; ?></p>
                <p><strong>Streams:</strong> <?php echo $args['streams']; ?></p>

            </div>

        </div>

	</div>

	<?php if ( $args['link'] ): ?>
		</a>
	<?php endif; ?>

</<?php echo $args['tag']; ?>>
