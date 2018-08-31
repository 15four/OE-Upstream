<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Opportunity_Education
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php

			// Add brandscape
			\ui\brandscape(
				array(
					'is_static' => true,
					'sections'  => [
						array(
							'content' => '<h1>' . esc_html__( 'Search Results for: ' . get_search_query(), 'opportunity-education' ) . '</h1>'
						)
					]
				)
			);

			// Get the index template part
			get_template_part( 'template-parts/indexes/index' );
		?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
