<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Opportunity_Education
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			// If there are posts, start main loop
			if ( have_posts() ):

				// Start main loop
				while ( have_posts() ) {

					// Set up post object
					the_post();

					// Get post template part
					get_template_part( 'template-parts/content/post', get_post_type() );
				}

				// Reset post data
				wp_reset_postdata();

			// Otherwise, output a snarky section
			else:

				// Add brandscape
				\ui\brandscape(
					array(
						'sections' => [
							array(
								'content' => '<h1>Huh, That\'s Weird</h1>'
							)
						]
					)
				);
		?>

		<section id="section-1" class="c-section u-background--light u-background--rich-white u-padding-top--section u-padding-bottom--section">
			<div class="c-section__content">
				<div class="c-container">
					<div class="c-grid u-flex--justify-center">
						<div class="c-grid__column c-grid__column--12 c-grid__column--8@lg">
							<h2 class="u-text--align-center">
								We Can't Find Anything Here
							</h2>
							<p class="u-text--align-center">
								We actually have no idea how you got here, but there is good news! You can always go <a href="<?php echo home_url(); ?>">home</a> or <a href="<?php echo get_the_permalink( \constants\IMPORTANT_PAGES['contact_us'] ); ?>">contact us</a> if you need help finding your way!
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
