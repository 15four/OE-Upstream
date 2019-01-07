<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Opportunity_Education
 */

?>

	</div><!-- #content -->

	<?php

		// Set up newsletter subscribe section
		$newsletter_subscribe_section_args = array(
			'index'              => 'newsletter',
			'background_color'   => 'zest',
			'content'            => \fifteen_four\helpers\get_include( get_template_directory() . '/template-parts/content/newsletter-subscribe.php' ),
			'additional_classes' => 's-no-print'
		);

		// Echo the section
        \ui\section( $newsletter_subscribe_section_args );
        
        // Grab current year for legal
        $curYear = date('Y');

	?>

	<footer id="colophon" class="site-footer s-no-print">
		<div class="site-footer__info u-background--dark u-background--victoria u-padding-top--section u-padding-bottom--section">
			<div class="c-container">
				<div class="c-grid c-grid--single-row@xl">

					<div class="c-grid__column c-grid__column--12 c-grid__column--4@xl">
						<?php dynamic_sidebar( 'sidebar-footer-main' ); ?>
					</div>

					<div class="c-grid__column c-grid__column--6 c-grid__column--2@xl">
						<?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
					</div>

					<div class="c-grid__column c-grid__column--6 c-grid__column--2@xl">
						<?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
					</div>

					<div class="c-grid__column c-grid__column--6 c-grid__column--2@xl">
						<?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
					</div>

					<div class="c-grid__column c-grid__column--6 c-grid__column--2@xl">
						<?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
					</div>

				</div>
			</div>
		</div><!-- .site-info -->
		<div class="site-footer__subfooter u-background--dark u-background--dark-victoria u-padding-top--tiny u-padding-bottom--tiny">
			<div class="c-container">
				<div class="u-display--flex u-flex--wrap u-flex--justify-center u-flex--justify-between@lg u-flex--align-center">
					<div class="site-footer__secondary-info u-display--flex@lg u-text--align-center u-text--caption u-text--align-left@lg u-block--full-width u-block--auto-width@lg u-margin-bottom--micro u-margin-bottom--none@lg">
						<div class="site-footer__copyright-info u-margin-right--sm@lg">
							<strong>&copy; <?php echo $curYear; ?> Opportunity Education Foundation, Inc.<br class="u-display--none@md" /></strong> All rights reserved.
						</div>
						<?php dynamic_sidebar( 'sidebar-subfooter' ); ?>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
