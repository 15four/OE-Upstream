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
				. \template\get_the_byline()
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
				'sections' => [$brandscape_section_args]
			)
		);
	?>

	<section id="section-1" class="c-section u-background--light u-background--light-gray u-padding-top--section u-padding-bottom--section">
		<div class="c-section__content">
			<div class="c-container">

				<?php \template\the_shares(); ?>

				<div class="c-grid c-grid--single-row@lg u-flex--justify-between">

					<div class="main-content-column c-grid__column c-grid__column--12 c-grid__column--7@lg">

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

					<div class="sidebar-column c-grid__column c-grid__column--12 c-grid__column--4@lg s-no-print">
						<?php \template\the_related_posts(); ?>
					</div>

				</div>
			</div>
		</div>
	</section>

	<?php

		// Set up recent news section args
		$recent_news_section_args = array(
			'index'              => 2,
			'background_layers'  => [
				array(
					'type'     => 'highlighter',
					'position' => 'top_right',
					'color'    => 'auto'
				),
				array(
					'type'     => 'scissors',
					'position' => 'bottom_right',
					'color'    => 'auto'
				),
				array(
					'type'     => 'squiggly_line_2',
					'position' => 'top_left',
					'color'    => 'auto'
				),
			],
			'content'            => '<div class="o-block">'
				. '<h2 class="u-text--align-center">Recent News</h2>'
				. '</div>'
				. '<div class="o-block">'
				. '<div class="c-grid u-flex--justify-center">'
				. '<div class="c-grid__column c-grid__column--12 c-grid__column--10@lg">'
				. \ui\get_recent_news()
				. '</div>'
				. '</div>'
				. '</div>'
				. '<p class="u-text--align-center">'
				. '<a href="' . get_the_permalink( get_option( 'page_for_posts' ) ) . '" class="o-button">'
				. 'View More News'
				. '</a>'
				. '</p>',
			'additional_classes' => 's-no-print u-display--none u-display--block@lg'
		);

		// Add recent news section
		\ui\section( $recent_news_section_args );

	?>

</article><!-- #post-<?php the_ID(); ?> -->
