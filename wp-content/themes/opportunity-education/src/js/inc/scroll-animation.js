// Scroll animations

/* eslint-disable wrap-iife */

/* global jQuery */

import helpers from './helpers';
import throttle from 'throttle-debounce/throttle';
import debounce from 'throttle-debounce/debounce';

( function( $ ) {

	function scrollAnimation( config = {} ) {

		// Create return object
		const object = {
			config: {
				initEvent: 'preloaderremove',
				scrollAnimationClass: 'js-animation--scroll',
				resolverClass: 'is-resolved',
				scrollListenerThrottle: 125,
				screenBottomOffset: 30
			},
			isSafari: false,
			animatedElements: [],
			windowHeight: window.innerHeight
		};

		// Create object config
		object.config = Object.assign( object.config, config );

		// Init
		object.init = function() {

			// Query up animated elements based on selector
			object.animatedElements = $( '.' + object.config.scrollAnimationClass );

			// If there are any scroll animation elements on the page, initialize
			if ( object.animatedElements.length ) {

				// Initialize everything on the correct event
				$( window ).one( object.config.initEvent, function() {

					// Set whether or not device is Safari
					object.isSafari = $( 'body' ).hasClass( '_browser--safari' );

					// Initially set all element offsets
					object.setElementOffsets();

					// Wire up animation events
					object.events();
				} );
			}
		};

		// Events
		object.events = function() {

			// Get jQueryatized window
			const jQueryWindow = $(window);

			// Scroll
			jQueryWindow.on( 'scroll.scrollAnimationScroll', throttle( object.config.scrollListenerThrottle, function() {

				// Process scroll
				object.processScroll();

				// If there are no animated elements left, remove the scroll event listener
				if ( !object.animatedElements.length ) {
					jQueryWindow.off( 'scroll.scrollAnimationScroll' );
				}
			}));

			// Resize
			jQueryWindow.on( 'resize.scrollAnimationResize dynamicheightguyresize', debounce( object.config.scrollListenerThrottle, function() {

				// Reset offsets of elements
				object.setElementOffsets();

				// Reset windowHeight
				object.windowHeight = window.innerHeight;

				// Process as if scrolled
				object.processScroll();

				// If there are no animated elements left, remove the resize event listener
				if ( !object.animatedElements.length ) {
					jQueryWindow.off( 'resize.scrollAnimationResize' );
				}
			}));

			// Process scroll first time
			object.processScroll();
		};

		// Set offsets
		object.setElementOffsets = function() {

			// Loop through animated elements and set offsets
			for ( let i = 0; i < object.animatedElements.length; i++ ) {

				// Reference element
				const element = object.animatedElements[i];

				// Get jQueryatized element
				const jQueryElement = $( element );

				// Set up offsets array
				if ( !element.offsetForScroll ) {
					element.offsetForScroll = {};
				}

				// Set offsets
				element.offsetForScroll.top = jQueryElement.offset().top;
				element.offsetForScroll.bottom = element.offsetForScroll.top + element.getBoundingClientRect().height;
			}
		};

		// Process the scrolls
		object.processScroll = function() {

			// Get scrollTop and scrollBottom
			const scrollTop = window.pageYOffset;
			const scrollBottom = scrollTop + object.windowHeight;

			// Loop through animated elements and resolve them
			for ( let i = 0; i < object.animatedElements.length; i++ ) {

				// Get element
				const element = object.animatedElements[i];

				// Resolve animation on element
				window.setTimeout(
					function() {
						object.resolveAnimation( element, scrollTop, scrollBottom );
					},
					0
				);
			}
		};

		// Resolve animations
		object.resolveAnimation = function( element, scrollTop, scrollBottom ) {

			// If the element is in the viewport, resolve the animation
			if ( helpers.isInViewport( element.offsetForScroll.top, element.offsetForScroll.bottom, scrollTop, scrollBottom, object.config.screenBottomOffset ) ) {

				// jQueryatize element
				const jQueryElement = $(element);

				// If element is an SVG, add the class manually
				if ( jQueryElement.is( 'svg, line, circle, path' ) ) {

					// Get current class
					const currentClass = jQueryElement.attr( 'class' );

					// Add the class
					jQueryElement.attr( 'class', currentClass + ' ' + object.config.resolverClass );
				}

				// Otherwise, just add resolver class
				else {
					jQueryElement.addClass( object.config.resolverClass );
				}

				// If the browser is Safari or whatever else makes it suck, make it not suck
				object.makeSafariNotSuck( jQueryElement );

				// Remove element from animated element array
				object.animatedElements = object.animatedElements.not( element );
			}
		};

		// Force animation to work on Safari
		object.makeSafariNotSuck = function( jQueryElement ) {

			// Get the animation name property
			const animationName = jQueryElement.css( 'animation-name' );

			// Determine what to change the animation name to temporarily
			const tempAnimationName = object.isSafari ? 'none' : '';

			// Reset that animation name
			jQueryElement.css( 'animation-name', tempAnimationName );

			// Immediately bring it back
			window.setTimeout(
				function() {
					jQueryElement.css( 'animation-name', animationName );
				},
				0
			);
		};

		return object;
	}

	// Instantiate the scroll animations
	function summonScrollAnimation( args = {} ) {
		return Object.create( scrollAnimation( args ) );
	}

	// Instantiate and initialize a new scrollAnimations object
	const theScrollAnimation = summonScrollAnimation();
	theScrollAnimation.init();

} )( jQuery );
