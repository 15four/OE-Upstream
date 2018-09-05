/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */

/* eslint-disable wrap-iife */
/* eslint-disable consistent-this */
/* eslint-disable one-var */
/* eslint-disable no-invalid-this */

/* global jQuery */

import throttle from 'throttle-debounce/throttle';
import debounce from 'throttle-debounce/debounce';

( function( $ ) {

	function navigation( config = {} ) {

		// Create return object
		const object = {
			config: {
				siteHeaderClass: 'js-site-header',
				menuBreakpoint: 1024,
				scrollAnimationDuration: 100,
				scrollListenerThrottle: 225,
				resizeListenerDebounce: 25,
				stickyAnimationDuration: 200,
				parentToDelegateEvents: $( '.site' )
			},
			lastScrollY: 0,
			lastTouchY: 0,
			isSticky: false,
			stickyNavScrollThreshold: window.innerHeight,
			isMenuToggled: false,
			isSearchToggled: false
		};

		// Create object config
		object.config = Object.assign( object.config, config );

		// Init
		object.init = function() {

			// Set relevant elements
			object.siteHeader = $( '.' + object.config.siteHeaderClass );
			object.toggleButton = $( '.' + object.config.siteHeaderClass + '__toggle-button' );
			object.searchButton = $( '.' + object.config.siteHeaderClass + '__search-button' );
			object.navigation = $( '.' + object.config.siteHeaderClass + '__navigation' );
			object.menu = $( '.' + object.config.siteHeaderClass + '__menu' );
			object.searchForm = $( '.' + object.config.siteHeaderClass + '__search-form' );
			object.menuItems = $( '.' + object.config.siteHeaderClass + '__menu-item' );
			object.menuLinks = $( '.' + object.config.siteHeaderClass + '__menu-link' );

			// Initially set sticky nav scroll threshold
			object.setStickyNavScrollThreshold();

			// Fire off events
			object.events();
		};

		// Events
		object.events = function() {

			// jQueryatize window
			const jQueryWindow = $( window );

			// Init toggle button click listener
			object.config.parentToDelegateEvents.on( 'click', '.' + object.config.siteHeaderClass + '__toggle-button', function() {

				// If the screen size is sufficiently small, toggle the menu
				if ( window.innerWidth < object.config.menuBreakpoint ) {

					// Do the thing
					if ( object.isMenuToggled ) {
						object.closeMenu();
					}
					else {
						object.openMenu();
					}
				}
			} );

			// Init search button click listener
			object.config.parentToDelegateEvents.on( 'click', '.' + object.config.siteHeaderClass + '__search-button', function() {

				// Do the thing
				if ( object.isSearchToggled ) {
					object.closeSearch();
				}
				else {
					object.openSearch();
				}
			} );

			// If ontouchstart exists int the window object, init the link click listener
			if ( 'ontouchstart' in window ) {

				// Init link click listener
				object.config.parentToDelegateEvents.on( 'touchstart', function( event ) {

					// Get event target
					const eventTarget = $( event.target );

					// Get closest menu item
					const closestMenuItem = eventTarget.closest( '.' + object.config.siteHeaderClass + '__menu-item' );

					// If the screen size is above the menu breakpoint and the target is a menu link that has a sub menu as a sibling, prevent default
					if (
						window.innerWidth >= object.config.menuBreakpoint
						&& eventTarget.is( '.' + object.config.siteHeaderClass + '__menu-link' )
						&& eventTarget.siblings( '.sub-menu' ).length
					) {

						// Prevent default
						event.preventDefault();

						// If the closest menu item does not have focus, add it
						if ( !closestMenuItem.hasClass( 'has-focus' ) ) {

							// Add focus class to the closest menu item
							closestMenuItem.addClass( 'has-focus' );

							// Remove focus from all sibling menu items
							closestMenuItem.siblings( '.' + object.config.siteHeaderClass + '__menu-item' );

							// Return false to keep link from doing its thing
							return false;
						}

						// Otherwise, trigger a click on the event target and then visit its
						eventTarget.trigger( 'click' );
						window.location = eventTarget.attr( 'href' );
					}

					// Otherwise, remove the focus class form all menu items
					else {
						object.menuItems.removeClass( 'has-focus' );
					}

					// Resume event propagation
					return true;
				} );
			}

			// Init menu link focus and blur listener'
			object.menuLinks.on( 'focus blur', function() {
				object.toggleFocus( $( this ) );
			} );

			// Init resize listener
			jQueryWindow.on( 'resize.navigationResize', debounce( object.config.resizeListenerDebounce, object.processResize ) );

			// Init scroll listener
			jQueryWindow.on( 'scroll', throttle( object.config.scrollListenerThrottle, object.processScroll ) );
		};

		// Open the menu
		object.openMenu = function() {

			// Add lock class to HTML
			$( 'html' ).addClass( 'locked-by-popover' );

			// Set isMenuToggled to true
			object.isMenuToggled = true;

			// Add the header class
			object.siteHeader.addClass( 'is-toggled' );

			// Add the ARIA attributes
			object.toggleButton.attr(
				'aria-expanded',
				true
			);
			object.menu.attr(
				'aria-expanded',
				true
			);

			// Start the touchmove listener
			$( window ).on( 'touchmove.stopSafariFromSucking', function( event ) {

				// Get last touchY
				const lastTouchY = object.lastTouchY;

				// Set lastTouchY
				object.lastTouchY = event.originalEvent.touches[0].clientY;

				// If the screen is small enough, begin touchmove logic
				if ( window.innerWidth < object.config.menuBreakpoint ) {

					// If the target is not a child of the nav, stop all event activity
					if ( !object.navigation.closestChild( event.target ).length ) {
						event.preventDefault();
						event.stopPropagation();
						return false;
					}

					// Otherwise, if it is, but the menu container is scrolled all the way and the gesture is to scroll down, stop all event activity
					else if (
						object.navigation.scrollTop() + object.navigation.outerHeight() >= object.navigation[0].scrollHeight
						&& event.originalEvent.touches[0].clientY <= lastTouchY
					) {
						event.preventDefault();
						event.stopPropagation();
						return false;
					}
				}

				return true;
			} );

			// If the menu is toggled and we are below the sticky nav scroll threshold, scroll up to the top of the page
			if ( window.pageYOffset < object.stickyNavScrollThreshold ) {
				$( 'html, body' ).animate(
					{
						scrollTop: 0
					},
					object.scrollAnimationDuration
				);
			}
		};

		// Close the menu
		object.closeMenu = function() {

			// Remove lock class from HTML
			$( 'html' ).removeClass( 'locked-by-popover' );

			// Set isMenuToggled to false
			object.isMenuToggled = false;

			// Remove the header class
			object.siteHeader.removeClass( 'is-toggled' );

			// Remove the ARIA attributes
			object.toggleButton.attr(
				'aria-expanded',
				false
			);
			object.menu.attr(
				'aria-expanded',
				false
			);

			// Remove touchmove listener
			$( window ).off( 'touchmove.stopSafariFromSucking' );

			// Close the search
			object.closeSearch();
		};

		// Opens the search form
		object.openSearch = function() {

			// Add the header class
			object.siteHeader.addClass( 'is-search-toggled' );

			// Set isSearchToggled to true
			object.isSearchToggled = true;

			// Add the ARIA attributes
			object.searchButton.attr(
				'aria-expanded',
				true
			);
			object.searchForm.attr(
				'aria-expanded',
				true
			);

			// If the menu is not open and the screen is sufficiently small, open it
			if ( !object.isMenuToggled && window.innerWidth < object.config.menuBreakpoint ) {
				object.openMenu();
			}

			// If the screen is large enough, focus the search form
			if ( window.innerWidth >= object.config.menuBreakpoint ) {
				object.searchForm.find( 'input' ).focus();
			}
		};

		// Closes the search form
		object.closeSearch = function() {

			// Remove the header class
			object.siteHeader.removeClass( 'is-search-toggled' );

			// Set isSearchToggled to false
			object.isSearchToggled = false;

			// Remove the ARIA attributes
			object.searchButton.attr(
				'aria-expanded',
				false
			);
			object.searchForm.attr(
				'aria-expanded',
				false
			);
		};

		// Toggles the focus of a menu item
		object.toggleFocus = function( targetLink ) {

			// Get all menu items up until the main menu
			const parentMenuItems = targetLink.parentsUntil( '.' + object.config.siteHeaderClass, '.' + object.config.siteHeaderClass + '__menu-item' );

			// Toggle the 'has-focus' class
			parentMenuItems.toggleClass( 'has-focus' );
		};

		// Sets the sticky nav scroll threshold
		object.setStickyNavScrollThreshold = function() {

			// Gets first section element
			const firstSection = $( '#section-1' );

			// Get the offset of the first element
			const firstSectionOffset = firstSection.offset();

			// Sets sticky nav threshold to be the lesser of windowHeight or the first section's offset
			object.stickyNavScrollThreshold = Math.min(
				window.innerHeight,
				firstSectionOffset
					? firstSectionOffset.top
					: Infinity
			);
		};

		// Remove toggle on menu and search if the screen size changes
		object.processResize = function() {

			// Reset sticky nav scroll threshold
			object.setStickyNavScrollThreshold();

			// If the screen size is larger than the breakpoint, close the menu
			if ( window.innerWidth >= object.config.menuBreakpoint ) {
				object.closeMenu();
			}
		};

		// Processes scroll
		object.processScroll = function() {

			// Get scrollPosition
			const scrollY = window.pageYOffset;

			// If the scrollY is greater than the sticky nav scroll threshold and less than it was before, add the sticky class only if it's not already sticky
			if ( scrollY > object.stickyNavScrollThreshold && scrollY <= object.lastScrollY ) {

				// If the nav isn't already sticky, add the sticky class
				if ( !object.isSticky ) {

					// Add sticky class
					object.siteHeader.addClass( 'is-sticky' );

					// Add sticky-coming class after a tick
					window.setTimeout(
						function() {
							object.siteHeader.addClass( 'is-sticky-coming' );
						},
						0
					);

					// Set to be sticky
					object.isSticky = true;
				}
			}

			// Otherwise, remove the sticky class
			else if ( object.isSticky ) {

				// Remove is-sticky-coming class
				object.siteHeader.removeClass( 'is-sticky-coming' );

				// Add is-sticky-leaving class
				object.siteHeader.addClass( 'is-sticky-leaving' );

				// Wait until animation is done, then remove both sticky classes
				window.setTimeout(
					function() {
						object.siteHeader.removeClass( 'is-sticky-leaving' );
						object.siteHeader.removeClass( 'is-sticky' );
					},
					object.config.stickyAnimationDuration
				);

				// Set to be not sticky
				object.isSticky = false;
			}

			// Set new scrollY
			object.lastScrollY = scrollY;
		};

		return object;
	}

	// Instantiate and initialize a new navigation object
	const theNavigation = Object.create( navigation() );
	theNavigation.init();

} )( jQuery );
