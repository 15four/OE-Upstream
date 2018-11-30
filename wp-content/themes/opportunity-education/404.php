<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Opportunity_Education
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			// Add brandscape
			\ui\brandscape(
				array(
					'sections' => [
						array(
							'content' => '<h1>We couldn\'t find the page you\'re looking for.</h1>'
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
									We're Here to Help.
								</h2>
								<p class="u-text--align-center">
									Please give our site's search a try, and if you're still feeling lost, feel free to <a href="<?php echo get_the_permalink( \constants\IMPORTANT_PAGES['contact_us'] ); ?>">contact us</a>.
								</p>
							</div>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
