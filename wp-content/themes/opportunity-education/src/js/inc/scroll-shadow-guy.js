// Scroll Shadow Guy

/* eslint-disable no-invalid-this */

/* global jQuery */

import throttle from 'throttle-debounce/throttle';
import debounce from 'throttle-debounce/debounce';

( function( $ ) {

	function scrollShadowGuy( config = {} ) {

		// Return object
		const object = {
			config: {
				initEvent: 'load',
				scrollShadowGuyClass: 'js-scroll-shadow-guy',
				scrollListenerThrottle: 75
			},
			scrollShadowGuys: [],
			scrollShadowGuyContents: []
		};

		// Overwrite default config
		Object.assign( object.config, config );

		// Init
		object.init = function() {

			// Query up scroll shadow guys based on selector
			object.scrollShadowGuys = $( '.' + object.config.scrollShadowGuyClass );

			// If there are scroll shadow guys on the page, initialize
			if ( object.scrollShadowGuys.length ) {

				// Query up scroll shadow guy contents based on selector
				object.scrollShadowGuyContents = $( '.' + object.config.scrollShadowGuyClass + '__content' );

				// Go through and set element scroll widths
				object.setElementScrollWidths();

				// Initialize everything on the correct event
				$( window ).on( object.config.initEvent, object.events );
			}
		};

		// Events
		object.events = function() {

			// Get jQueryatized window
			const jQueryWindow = $( window );

			// Place shadow on init event
			object.placeShadow( object.scrollShadowGuyContents );

			// Scroll listener on the content
			object.scrollShadowGuys.closestChild( '.' + object.config.scrollShadowGuyClass + '__content' )
				.on( 'scroll', throttle( object.scrollListenerThrottle, function() {
					object.placeShadow( $( this ) );
				} )	);

			// Resize event listener
			jQueryWindow.on( 'resize.scrollShadowGuyResize', debounce( object.config.scrollListenerThrottle, function() {

				// Reset element scroll widths
				object.setElementScrollWidths();

				// Place shadow
				object.placeShadow( object.scrollShadowGuyContents );
			} ) );
		};

		// Place the shadows
		object.placeShadow = function( targetScrollShadowGuyContents ) {

			// Loop through target scroll shadow guy contents
			targetScrollShadowGuyContents.each( function( index, targetScrollShadowGuyContent ) {

				// Get scroll difference
				const scrollDifference = targetScrollShadowGuyContent.scrollWidthForScrollShadow - targetScrollShadowGuyContent.widthForScrollShadow;

				// jQueryatize target scroll shadow guy
				targetScrollShadowGuyContent = $( targetScrollShadowGuyContent );

				// Get scroll left
				const scrollLeft = targetScrollShadowGuyContent.scrollLeft();

				// Get parent scrollSliderGuy
				const parentScrollShadowGuy = targetScrollShadowGuyContent.closest( '.' + object.config.scrollShadowGuyClass );

				// If the scroll difference is zero, it does not need to be scrolled
				if ( scrollDifference === 0 ) {

					// Remove other scroll state classes
					parentScrollShadowGuy.removeClass( 'is-not-scrolled' );
					parentScrollShadowGuy.removeClass( 'is-partially-scrolled' );
					parentScrollShadowGuy.removeClass( 'is-fully-scrolled' );
				}

				// Otherwise, if the scroll left is 0, the guy isn't scrolled
				else if ( scrollLeft === 0 ) {

					// Remove other scroll state classes
					parentScrollShadowGuy.removeClass( 'is-partially-scrolled' );
					parentScrollShadowGuy.removeClass( 'is-fully-scrolled' );

					// Add is not scrolled class
					parentScrollShadowGuy.addClass( 'is-not-scrolled' );
				}

				// If the scroll left is the same as the scroll difference, the guy is fully scrolled
				else if ( scrollLeft === scrollDifference ) {

					// Remove other scroll state classes
					parentScrollShadowGuy.removeClass( 'is-not-scrolled' );
					parentScrollShadowGuy.removeClass( 'is-partially-scrolled' );

					// Add is fully scrolled class
					parentScrollShadowGuy.addClass( 'is-fully-scrolled' );
				}

				// Otherwise, the guy is partially scrolled
				else {

					// Remove other scroll state classes
					parentScrollShadowGuy.removeClass( 'is-not-scrolled' );
					parentScrollShadowGuy.removeClass( 'is-fully-scrolled' );

					// Add is fully scrolled class
					parentScrollShadowGuy.addClass( 'is-partially-scrolled' );
				}
			} );
		};

		// Set element scroll widths
		object.setElementScrollWidths = function() {

			// Loop through scrollShadowGuys and set scroll widths
			for ( let i = 0; i < object.scrollShadowGuyContents.length; i++ ) {

				// Reference element
				const element = object.scrollShadowGuyContents[i];

				// jQueryatize element
				const jQueryElement = $( element );

				// Set width
				element.widthForScrollShadow = jQueryElement.outerWidth();

				// Set scroll width
				element.scrollWidthForScrollShadow = element.scrollWidth;
			}
		};

		return object;
	}

	// Instantiate the scroll shadow guy
	function summonScrollShadowGuy( args = {} ) {
		return Object.create( scrollShadowGuy( args ) );
	}

	// Instantiate and initialize new scroll shadow guy
	const theScrollShadowGuy = summonScrollShadowGuy();
	theScrollShadowGuy.init();

}( jQuery ) );
