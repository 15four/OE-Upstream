<?php
/**
 * The template for displaying archive pages
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

			// Add brandscape
			\ui\brandscape(
				array(
					'sections' => [
						array(
							'content' => '<h1>' . get_the_archive_title() . '</h1>'
						)
					]
				)
			);

			// Get the index template part
			get_template_part( 'template-parts/indexes/index' );
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
