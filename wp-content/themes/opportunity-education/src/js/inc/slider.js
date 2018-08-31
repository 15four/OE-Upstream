// Slider

/* eslint-disable no-nested-ternary */
/* eslint-disable no-invalid-this */

/* global jQuery */

import { theDynamicHeightGuy } from './dynamic-height-guy';

( function( $ ) {

	function slider( args = {} ) {

		// Return object
		const object = {
			config: {
				initEvent: 'load',
				sliderClass: 'js-slider',
				parentToDelegateEvents: $( '.site-main' )
			},
			sliders: []
		};

		// Overwrite default config
		Object.assign( object.config, args );

		// Init
		object.init = function() {

			// Query up sliders based on selector
			object.sliders = $( '.' + object.config.sliderClass );

			// If there are sliders on the page, initialize
			if ( object.sliders.length ) {

				// Initialize everything on the correct event
				$( window ).on( object.config.initEvent, function() {

					// Wire up events
					object.events();

					// Remove loading states from slides
					theDynamicHeightGuy.removeLoadingState( object.sliders.find( '.' + object.config.sliderClass + '__slides' ) );

					// Set slider heights
					object.resizeSlider( object.sliders );
				} );
			}
		};

		// Events
		object.events = function() {

			// Get jQueryatized window
			const jQueryWindow = $( window );

			// Control click listener (delegated from parent)
			object.config.parentToDelegateEvents.on( 'click', '.' + object.config.sliderClass + '__control', function() {
				object.changeSlide( this );
			});

			// Resize listener
			jQueryWindow.on( 'resize opportunity-education-force-slider-resize', function() {
				object.resizeSlider( object.sliders );
			} );
		};

		// Change slider
		object.changeSlide = function( control, sliderOverride, directionOverride ) {

			// Jqueryatize the control
			control = $( control );

			// Set vars
			const direction = directionOverride || control.data( 'slider-direction' );
			const controlIndex = control.data( 'slider-target' );
			let parentSlider = '';
			let nextIndex = '';

			// Determine parent slider
			parentSlider = sliderOverride
				? sliderOverride
				: control.closest( '.' + object.config.sliderClass );

			// Set index and slide count
			const index = parseInt( parentSlider.data( 'slider-index' ), 10 );
			const slideCount = parseInt( parentSlider.data( 'slider-slide-count' ), 10 );

			// Set next index
			nextIndex = direction
				? direction === 'next'
					? ( index + 1 ) % slideCount
					: ( index - 1 ) % slideCount
				: controlIndex;

			// If the current index and the next index are not the same and the window has focus, change the slide
			if ( index !== nextIndex && document.hasFocus() ) {

				// Change slide
				object.setActiveSlide( parentSlider, nextIndex, nextIndex > index );

				// If there is not a direction specified, set the active control
				object.setActiveControl( parentSlider, nextIndex );
			}
		};

		// Get active slide
		object.getActiveSlide = function( targetSlider ) {
			return targetSlider.closestChild( '.' + object.config.sliderClass + '__slide.is-active' );
		};

		// Get active control
		object.getActiveControl = function( targetSlider ) {
			return targetSlider.closestChild( '.' + object.config.sliderClass + '__control.is-active');
		};

		// Set active slide
		object.setActiveSlide = function( targetSlider, newIndex, isGoingForward ) {

			// Get slides
			const slides = targetSlider.closestChild( '.' + object.config.sliderClass + '__slide' );

			// Give parent the correct slide direction class
			targetSlider.removeClass( object.config.sliderClass + '--forwards ' + object.config.sliderClass + '--backwards' );
			targetSlider.addClass( isGoingForward ? object.config.sliderClass + '--forwards' : object.config.sliderClass + '--backwards' );

			// Remove active class from active slide, add recently active class
			const currentSlide = object.getActiveSlide( targetSlider );
			slides.not( currentSlide ).removeClass( 'was-just-active' );
			currentSlide.removeClass( 'is-active' );
			currentSlide.addClass( 'was-just-active' );

			// Get new slide
			const newSlide = slides.eq( newIndex );

			// Add active class
			newSlide.addClass( 'is-active' );

			// Set height of slider
			object.resizeSlider( targetSlider, true );

			// Change index data attribute
			targetSlider.data( 'slider-index', newIndex );
		};

		// Set active control
		object.setActiveControl = function( targetSlider, newIndex ) {

			// Get controls
			const controls = targetSlider.closestChild( '.' + object.config.sliderClass + '__control' );

			// Remove active class from active control, add recently active class
			const currentControl = object.getActiveControl( targetSlider );
			controls.not( currentControl ).removeClass( 'was-just-active' );
			currentControl.removeClass( 'is-active' );
			currentControl.addClass( 'was-just-active' );

			// Add active class to new control
			const newControl = controls.eq( newIndex );
			newControl.addClass( 'is-active' );
		};

		// Resize sliders
		object.resizeSlider = function( targetSliders, includeParents = false ) {

			// Loop through target sliders
			for ( let i = 0; i < targetSliders.length; i++ ) {

				// Get target slider
				const targetSlider = $( targetSliders[i] );

				theDynamicHeightGuy.setHeight(
					targetSlider.closestChild( '.' + object.config.sliderClass + '__slides' ),
					object.getActiveSlide( targetSlider ).find( '.' + object.config.sliderClass + '__slides-inner' ),
					includeParents
				);
			}
		};

		return object;
	}

	// Instantiate the slider
	function summonSlider( args = {} ) {
		return Object.create( slider( args ) );
	}

	// Instantiate and initialize new slider
	const theSlider = summonSlider();
	theSlider.init();

}( jQuery ) );
