<?php
namespace template;

/**
 * Template for the related posts
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-related-posts '
		. $args['additional_classes']
);

// Grab global post
global $post;

// Grab date format
$date_format = get_option( 'date_format' );

// Get post type
$post_type = get_post_type();

// Get tag ids
$tag_ids = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );

// Get categories
$cat_ids = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );

// Get related posts by tag
$related_posts = get_posts(
	array(
		'posts_per_page' => $args['post_count'],
		'post_type'      => $post_type,
		'tag__in'        => $tag_ids,
		'category_in'    => empty( $tag_ids )
			? $category_ids
			: []
	)
);

// Get post relation language
$post_relation = empty( $tag_ids ) && empty( $cat_ids )
	? 'More'
	: 'Related';

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<h2 class="c-related-posts__title u-text--body u-text--family-roboto u-text--tracked u-text--uppercase u-text--bold">
		<?php echo $post_relation . ' ' . get_post_type_object( $post_type )->labels->name; ?>
	</h2>

	<ol class="c-related-posts__post-list u-padding-left--none u-text--heading-sm u-text--family-meta-serif">

		<?php foreach( $related_posts as $related_post ): ?>

			<li class="c-related-posts__post u-padding-left--tiny u-margin-bottom--sm">
				<h3 class="c-related-posts__post-title u-margin-bottom--none">
					<a class="o-link--plain" href="<?php echo get_the_permalink( $related_post->ID ); ?>">
						<?php echo $related_post->post_title; ?>
					</a>
				</h3>
				<p class="c-related-posts__post-date u-text--caption u-text--family-roboto u-text--uppercase u-text--bold u-text--color-mid-gray">
					<?php echo get_the_date( $date_format, $related_post->ID ); ?>
				</p>
			</li>

		<?php endforeach; ?>

	</ol>

</div>
