<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Opportunity_Education
 */

// Get post type
$post_type = get_post_type();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php

		// Set hero image brandscape section args
		$brandscape_section_args = array(
			'is_static' => true,
			'content'   => '<div class="u-text--caption u-text--family-roboto u-text--bold u-text--uppercase u-underline u-underline--small u-underline--animated u-margin-bottom--tiny js-animation--scroll">'
				. get_the_date()
				. '</div>'
				. '<h1>' . get_the_title() . '</h1>'
		);

		// Get the image used for the hero
		$hero_image = \fifteen_four\helpers\acf\get_image( get_field( 'hero_image' ), 'section' );

		// If there is a hero image specified, add it to the brandscape section args
		if ( $hero_image ) {
			$brandscape_section_args['background_subject'] = $hero_image;
		}

		// Add brandscape
		\ui\brandscape(
			array(
				'sections'           => [$brandscape_section_args]
			)
		);
	?>

	<section id="section-1" class="c-section u-background--light u-background--light-gray u-padding-top--section u-padding-bottom--section">
		<div class="c-section__content">
			<div class="c-container">
				<div class="c-grid u-flex--justify-center">
					<div class="c-grid__column c-grid__column--12 c-grid__column--8@lg">

						<div class="o-block s-long-form">
							<?php the_content(); ?>
						</div>

						<?php if ( $post_type === 'post' ): ?>

							<div class="o-block">
								<?php
									\ui\bio_card( get_the_author_meta( 'ID') );
								?>
							</div>

							<?php get_template_part( 'template-parts/content/post-navigation', get_post_type() ); ?>

						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</section>

</article><!-- #post-<?php the_ID(); ?> -->
