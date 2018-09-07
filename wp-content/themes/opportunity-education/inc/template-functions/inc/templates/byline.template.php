<?php
namespace template;

/**
 * Template for the byline
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-byline u-display--flex u-flex--align-center '
		. $args['additional_classes']
);

// Get the author
$author = get_userdata( get_the_author_meta( 'id' ) );

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php \ui\circle_guy_from_user(
		$author->ID,
		'square',
		array(
			'size' => 'micro',
			'additional_classes' => 'c-byline__picture o-circle-guy--bare u-margin-right--tiny u-margin-bottom--none'
		)
	); ?>

	<div class="c-byline__name u-text--color-light-gray">
		By <a class="u-text--regular" href="<?php echo get_author_posts_url( $author->ID ); ?>"><?php echo $author->display_name; ?></a>
	</div>

</div>
