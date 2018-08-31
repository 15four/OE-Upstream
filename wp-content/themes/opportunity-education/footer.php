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
			'index'            => 'newsletter',
			'background_color' => 'zest',
			'content'          => \fifteen_four\helpers\get_include( get_template_directory() . '/template-parts/content/newsletter-subscribe.php' )
		);

		// Echo the section
		\ui\section( $newsletter_subscribe_section_args );

	?>

	<footer id="colophon" class="site-footer">
		<div class="site-footer__info u-background--dark u-background--victoria u-padding-top--section u-padding-bottom--section">
			<div class="c-container">
				<div class="c-grid c-grid--single-row@xl">

					<div class="c-grid__column c-grid__column--12 c-grid__column--4@xl">
						<div class="site-footer__logo u-block--centered u-block--centered u-margin-bottom--std u-margin-bottom--section@lg u-margin-left--none@lg">
							<?php the_custom_logo(); ?>
						</div>
						<p class="u-text--align-center u-text--align-left@lg u-margin-bottom--std u-margin-bottom--none@xl">
							<a class="o-button o-button--style-zest-on-white u-text--caption" href="<?php echo get_the_permalink( \constants\IMPORTANT_PAGES['get_quest_forward'] ); ?>">Get Quest Forward</a>
						</p>
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
				<div class="site-footer__secondary-info u-display--flex@lg u-text--align-center u-text--align-left@lg">
					<div class="site-footer__copyright-info u-text--caption u-margin-right--sm@lg">
						<strong>&copy; 2018 Opportunity Education Foundation, Inc.<br class="u-display--none@md" /></strong> All rights reserved.
					</div>
					<?php dynamic_sidebar( 'sidebar-subfooter' ); ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
