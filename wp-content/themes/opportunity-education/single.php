<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Opportunity_Education
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			// Start main loop
			while ( have_posts() ) {

				// Set up post object
				the_post();

				// Get post template part
				get_template_part( 'template-parts/content/post', get_post_type() );
			}

			// Reset post data
			wp_reset_postdata();
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
