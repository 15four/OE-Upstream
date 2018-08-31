<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Opportunity_Education
 */

// Determine if this is the front page
$is_front_page = is_front_page();

// Set header attributes
$attributes = array(
	'id'    => 'masthead',
	'class' => 'site-header u-display--flex u-flex--wrap u-flex--align-start u-flex--align-center@lg '
		. 'u-background--dark u-background--custom-dark js-site-header'
);

// Set navigation attributes
$navigation_attributes = array(
	'id'    => 'site-navigation',
	'class' => 'site-header__navigation js-site-header__navigation u-flex--order-1 u-flex--order-0@lg u-display--flex@lg '
		. 'u-flex--align-center@lg u-margin-right--sm@lg'
);

// Set preloader attributes
$preloader_attributes = array(
	'id'    => 'site-preloader',
	'class' => 'preloader js-preloader is-active u-display--flex u-flex--justify-center u-flex--align-center '
		. 'u-block--full-width u-block--full-height u-background--light u-background--rich-white'
);

?>
<!doctype html>
<html <?php language_attributes(); ?> class="locked-by-popover">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'opportunity-education' ); ?></a>

	<!-- #masthead -->
	<header <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

		<!-- .site-branding -->
		<div class="site-header__branding">
			<?php

				// Add logo
				the_custom_logo();

				// Add site title
				echo \fifteen_four\helpers\wrap_with_tag(
					get_bloginfo( 'name' ),
					$is_front_page
						? 'h1'
						: 'p',
					array(
						'class' => 'screen-reader-text'
					)
				);
			?>
		</div>
		<!-- .site-branding -->

		<!-- #site-navigation -->
		<nav <?php echo \fifteen_four\helpers\get_attributes_from_array( $navigation_attributes ); ?>>

			<div class="site-header__search-form js-site-header__search-form u-block--full-width">
				<div class="site-header__search-form-inner u-padding-bottom--section u-padding-bottom--none@lg">
					<?php get_search_form(); ?>
				</div>
			</div>

			<?php

				// Main menu
				wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'menu_id'         => 'primary-menu',
					'menu_class'      => 'site-header__menu js-site-header__menu menu u-display--flex u-flex--wrap u-margin-bottom--none',
					'container_class' => 'site-header__menu-container',
					'walker'          => new \theme\MainMenu()
				) );
			?>
		</nav>
		<!-- #site-navigation -->

		<!-- .controls -->
		<div class="site-header__controls o-button-container o-button-container--spacious u-flex--justify-end u-flex--align-center">
			<button class="site-header__search-button o-button--unstyled u-display--block js-site-header__search-button">
				<?php
					\ui\svg(
						array(
							'name' => 'x'
						)
					);
					\ui\svg(
						array(
							'name'    => 'magnifying_glass'
						)
					);
				?>
			</button>
			<button class="site-header__toggle-button o-button--unstyled u-display--none@lg js-site-header__toggle-button" aria-controls="primary-menu" aria-expanded="false">
				<?php
					\ui\svg(
						array(
							'name' => 'x'
						)
					);
					\ui\svg(
						array(
							'name' => 'hamburger'
						)
					);
				?>
			</button>
		</div>
		<!-- .controls -->

	</header>
	<!-- #masthead -->

	<!-- #preloader -->
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $preloader_attributes ); ?>>
		<div class="preloader__inner">
			<img src="<?php echo get_template_directory_uri() . '/assets/img/sunburst-logo.png'; ?>" class="preloader__icon u-display--block" />
		</div>
	</div>
	<!-- #preloader -->

	<div id="content" class="site-content">
