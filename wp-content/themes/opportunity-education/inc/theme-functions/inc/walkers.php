<?php
namespace theme;

/**
 * Walker classes
 *
 * @package Opportunity_Education
 */

/**
 * Custom walker class for menus - cleaner markup and descriptions enabled
 */
class MainMenu extends \Walker_Nav_Menu {

	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"sub-menu site-header__sub-menu\">\n";
	}

	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent</ul>\n";
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

		global $wp_query;

		// Set class names and values
		$class_names = '';

		// Set indent
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		// Set classes for menu item
		$menu_item_attributes = array(
			'id'    => 'menu-item-' . $item->ID,
			'class' => join( ' ', apply_filters( 'nav_menu_css_class', array_filter( empty( $item->classes ) ? array() : ( array ) $item->classes ), $item ) )
				. ' site-header__menu-item js-site-header__menu-item'
				. ( $depth > 0
					? ' site-header__sub-menu-item'
					: '' )
		);

		// Set classes for anchor
		$anchor_attributes = array(
			'class'    => 'menu-link site-header__menu-link js-site-header__menu-link u-display--block u-display--inline@lg u-text--family-meta-serif u-text--family-roboto@lg',
			'title'    => $item->attr_title,
			'target'   => $item->target,
			'rel'      => $item->xfn,
			'href'     => $item->url,
			'tabindex' => $item->url
				? ''
				: '0'
		);

		// Begin adding markup to output
		$output .= $indent . '<li ' . \fifteen_four\helpers\get_attributes_from_array( $menu_item_attributes ) . '>';

		// Add before
		$item_output = $args->before;

		// Start link
		$item_output .= '<a '. \fifteen_four\helpers\get_attributes_from_array( $anchor_attributes ) .'>';

		// Add link text
		$item_output .= $args->link_before;
		$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= $args->link_after;

		// Add description
		/* if (  $item->description ) {
			$item_output .= $depth === 0
				? '<span class="menu-description site-header__menu-description u-text--color-text-gray u-display--block u-display--hidden@md u-margin--tiny">' . $item->description . '</span>'
				: '<span class="menu-description site-header__menu-description u-text--tiny u-text--color-text-gray u-display--hidden u-display--block@md u-margin--tiny">' . $item->description . '</span>';
		} */

		// End link
		$item_output .= '</a>';

		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

?>
