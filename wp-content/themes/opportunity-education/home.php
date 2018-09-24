<?php
/**
 * The template for displaying the posts page
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

			// Set post as queried object
			$post = get_queried_object();

			// Get hero template part
			get_template_part( 'template-parts/hero' );

			// Get the index template part
			get_template_part( 'template-parts/indexes/index' );
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
