<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Opportunity_Education
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php

		// Get hero template part
		get_template_part( 'template-parts/hero' );

		// Echo the sections
		\template\the_sections( 1 );
	?>

</article><!-- #post-<?php the_ID(); ?> -->
