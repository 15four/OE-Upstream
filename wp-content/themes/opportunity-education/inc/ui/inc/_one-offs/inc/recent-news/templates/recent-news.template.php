<?php
namespace ui;

/**
 * Template for recent news
 *
 * @package Opportunity_Education
 */

// Get featured post
$featured_post = $args['featured_post'] !== null
	? get_post( $featured_post )
	: wp_get_recent_posts(
		array(
			'numberposts' => 1
		),
		OBJECT
	)[0];

// Get args for other posts
$other_posts_args = array(
	'numberposts' => $args['post_count'],
	'exclude'     => [$featured_post->ID]
);

// Get other posts
$other_posts = get_posts( $other_posts_args );

?>

<div class="c-grid c-grid--single-row@lg">

	<div class="c-grid__column c-grid__column--12 c-grid__column--6@lg">
		<a class="o-link--plain" href="<?php echo get_the_permalink( $featured_post ); ?>">
		<?php
			echo get_the_post_thumbnail(
				$featured_post,
				'card-thin',
				array(
					'class' => 'u-display--block u-margin-bottom--sm'
				)
			);
		?>
		</a>
		<div class="u-text--caption u-text--uppercase u-text--bold u-text--color-mid-gray">
			<?php echo get_the_date( 'F j, Y', $featured_post ); ?>
		</div>
		<a class="o-link--plain u-display--block u-margin-bottom--sm" href="<?php echo get_the_permalink( $featured_post ); ?>">
			<h3 class="u-text--heading-lg u-margin-bottom--none">
				<?php echo get_the_title( $featured_post ); ?>
			</h3>
		</a>
		<p>
			<?php \template\the_better_excerpt( $featured_post, 200 ); ?>
		</p>
	</div>

	<div class="c-grid__column c-grid__column--12 c-grid__column--6@lg">

		<?php

			// Loop through other posts and create bars
			foreach ( $other_posts as $index => $other_post ) {

				// Echo an animation with a bar inside of it
				\ui\animation(
					array(
						'content' => \ui\get_bar_from_post( $other_post ),
						'stagger' => $index
					)
				);
			}
		?>
	</div>

</div>
