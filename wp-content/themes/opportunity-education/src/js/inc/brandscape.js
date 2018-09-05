// Brandscape

/* eslint-disable no-nested-ternary */
/* eslint-disable no-invalid-this */
/* eslint-disable no-magic-numbers */

/* global jQuery */

import helpers from './helpers';
import throttle from 'throttle-debounce/throttle';
import debounce from 'throttle-debounce/debounce';

( function( $ ) {

	function brandscape( args = {} ) {

		// Return object
		const object = {
			config: {

				// Class config
				initEvent: 'load',
				brandscapeClass: 'js-brandscape',
				scrollListenerThrottle: 46,
				resizeListenerDebounce: 25,
				landscapeThreshold: 1500 / 844,
				blurReset: 0,
				parentToDelegateEvents: $( '.site-main' ),

				// Animation constants

				// Scrolling
				snapScrollDuration: 750,

				// Background
				backgroundBlurStartThreshold: 0.1,
				backgroundBlurMin: 0,
				backgroundBlurMax: 45,

				// Section background overlay
				sectionBackgroundOverlayOpacityModifier: 1.35,
				sectionBackgroundOverlayOpacityMin: 0,
				sectionBackgroundOverlayOpacityMax: 1,

				// Section background subject
				sectionBackgroundSubjectParallaxMin: 0,
				sectionBackgroundSubjectParallaxMax: 20,
				sectionBackgroundSubjectScaleMin: 1,
				sectionBackgroundSubjectScaleMax: 1.35,

				// Content
				contentOpacityModifier: 1.5,
				contentOpacityMin: 0,
				contentOpacityMax: 1,
				contentParallaxMin: 0,
				contentParallaxMax: 9,
				contentBlurStartThreshold: 0.35,
				contentBlurMin: 0,
				contentBlurMax: 10
			},
			brandscapes: [],
			blurscapes: [],
			brandscapeSections: [],
			bradscapeSectionBackgroundOverlays: [],
			brandscapeSectionBackgroundSubjects: [],
			brandscapeContents: [],
			brandscapeControls: [],
			windowHeight: window.innerHeight
		};

		// Overwrite default config
		Object.assign( object.config, args );

		// Init
		object.init = function() {

			// Query up brandscapes based on selector
			object.brandscapes = $( '.' + object.config.brandscapeClass );

			// Query up blurscapes based on selector
			object.blurscapes = $( '.' + object.config.brandscapeClass + '--blurscape' );

			// Query up backgrounds based on selector
			object.brandscapeBackgrounds = $( '.' + object.config.brandscapeClass + '__background' );

			// Query up brandscape sections based on selector
			object.brandscapeSections = $( '.' + object.config.brandscapeClass + '__section' );

			// Query up brandscape background overlays based on selector
			object.brandscapeSectionBackgroundOverlays = $( '.' + object.config.brandscapeClass + '__section-background-overlay' );

			// Query up brandscape background subjects based on selector
			object.brandscapeSectionBackgroundSubjects = $( '.' + object.config.brandscapeClass + '__section-background-subject' );

			// Query up brandscape contents based on selector
			object.brandscapeContents = $( '.' + object.config.brandscapeClass + '__content' );

			// Query up brandscape controls based on selector
			object.brandscapeControls = $( '.' + object.config.brandscapeClass + '__controls' );

			// If there are brandscapes on the page, initialize
			if ( object.brandscapes.length ) {

				// Initialize everything on the correct event
				$( window ).on( object.config.initEvent, function() {

					// Initially set all component offsets
					object.setComponentOffsets();

					// Set all control parents
					object.setControlParents();

					// Initially set all orientations
					object.setOrientations();

					// Wire up events
					object.events();
				} );
			}
		};

		// Events
		object.events = function() {

			// Get jQueryatized window
			const jQueryWindow = $(window);

			// Process as if scrolled
			object.processScroll();

			// Scroll listener
			jQueryWindow.on( 'scroll.brandscapeScroll', throttle( object.config.scrollListenerThrottle, object.processScroll ) );

			// Resize listener
			jQueryWindow.on( 'resize.brandscapeResize', debounce( object.config.resizeListenerDebounce, function() {

				// Reset windowHeight
				object.windowHeight = window.innerHeight;

				// Reset offsets of components
				object.setComponentOffsets();

				// Reset orientations
				object.setOrientations();

				// Process as if scrolled
				object.processScroll();
			} ) );

			// Control click listener
			object.config.parentToDelegateEvents.on( 'click', '.' + object.config.brandscapeClass + '__control', function() {
				object.processControlClick( this );
			} );

			// Trigger the brandscapeloadevent
			jQueryWindow.trigger( 'brandscapeload' );
		};

		// Process scroll
		object.processScroll = function() {

			// Get scrollTop
			const scrollTop = window.pageYOffset;

			// Process blurscape scroll
			if ( object.blurscapes.length ) {
				object.processBlurscapeScroll( scrollTop );
			}

			// Process section scroll
			object.processSectionScroll( scrollTop );

			// Process controls scroll
			if ( object.brandscapeControls.length ) {
				object.processControlsScroll( scrollTop );
			}
		};

		// Process blurscape scroll
		object.processBlurscapeScroll = function( scrollTop ) {

			// Loop through blurscapes
			for ( let i = 0; i < object.blurscapes.length; i++ ) {

				// Reference blurscape
				const blurscape = object.blurscapes[i];

				// If the blurscape is in the viewport, start processing its motion
				if ( scrollTop > blurscape.offsetForScroll.top && scrollTop < blurscape.offsetForScroll.bottom ) {

					// Get ratio between bottom offset of blurscape and scrollTop
					const scrollRatio = Math.abs( ( scrollTop - blurscape.offsetForScroll.top ) / blurscape.heightForScroll );

					// Calculate blur
					const blur = helpers.clamp(
						( scrollRatio - object.config.backgroundBlurStartThreshold ) * object.config.backgroundBlurMax,
						object.config.backgroundBlurMin,
						object.config.backgroundBlurMax
					);

					// Apply content styles
					object.brandscapeBackgrounds.eq( i ).css( {
						filter: 'blur(' + blur + 'px)'
					} );

					blurscape.brandscapeTransform = true;
				}

				// Otherwise, if the brandscape has been transformed, undo the transforms
				else if ( blurscape.brandscapeTransform ) {

					// Reset styles
					object.brandscapeBackgrounds.eq( i ).css( {
						filter: 'blur(' + object.config.blurReset + 'px)'
					} );
				}
			}
		};

		// Process section scroll
		object.processSectionScroll = function( scrollTop ) {

			// Loop through brandscape sections
			for ( let i = 0; i < object.brandscapeSections.length; i++ ) {

				// Get section
				const section = object.brandscapeSections[i];

				// If the section is in the viewport, start processing its motion
				if ( scrollTop > section.offsetForScroll.top && scrollTop < section.offsetForScroll.bottom ) {

					// Get ratio between bottom offset of section and scrollTop
					const scrollRatio = Math.abs( ( scrollTop - section.offsetForScroll.top ) / section.heightForScroll );

					// Calculate background overlay opacity
					const backgroundOverlayOpacity = helpers.clamp(
						scrollRatio * object.config.sectionBackgroundOverlayOpacityModifier,
						object.config.sectionBackgroundOverlayOpacityMin,
						object.config.sectionBackgroundOverlayOpacityMax
					);

					// Apply background overlay styles
					object.brandscapeSectionBackgroundOverlays.eq( i ).css( {
						opacity: backgroundOverlayOpacity
					} );

					// Calculate background subject scale
					const backgroundSubjectScale = helpers.clamp(
						object.config.sectionBackgroundSubjectScaleMin + ( object.config.sectionBackgroundSubjectScaleMax - object.config.sectionBackgroundSubjectScaleMin ) * scrollRatio,
						object.config.sectionBackgroundSubjectScaleMin,
						object.config.sectionBackgroundSubjectScaleMax
					);

					// Calculate background subject parallax
					const backgroundSubjectParallax = helpers.clamp(
						scrollRatio * object.config.sectionBackgroundSubjectParallaxMax,
						object.config.sectionBackgroundSubjectParallaxMin,
						object.config.sectionBackgroundSubjectParallaxMax
					);

					// Apply background subject styles
					object.brandscapeSectionBackgroundSubjects.eq( i ).css( {
						transform: 'scale(' + backgroundSubjectScale + ') translate3d(0, ' + backgroundSubjectParallax + 'rem, 0)'
					} );

					// If the parent brandscape is not static, transform the content
					if ( !section.isClosestBrandscapeStatic ) {

						// Calculate content opacity
						const contentOpacity = helpers.clamp(
							object.config.contentOpacityMax - scrollRatio * object.config.contentOpacityModifier,
							object.config.contentOpacityMin,
							object.config.contentOpacityMax
						);

						// Calculate content parallax
						const contentParallax = helpers.clamp(
							scrollRatio * object.config.contentParallaxMax,
							object.config.contentParallaxMin,
							object.config.contentParallaxMax
						);

						// Calculate content blur
						const contentBlur = helpers.clamp(
							( scrollRatio - object.config.contentBlurStartThreshold ) * object.config.contentBlurMax,
							object.config.contentBlurMin,
							object.config.contentBlurMax
						);

						// Apply content styles
						object.brandscapeContents.eq( i ).css( {
							opacity: contentOpacity,
							transform: 'translate3d(0, -' + contentParallax + 'rem, 0)',
							filter: 'blur(' + contentBlur + 'px)'
						} );
					}

					// Set the section's transform status to true
					section.brandscapeTransform = true;
				}

				// Otherwise, if the section has been transformed, undo the transforms
				else if ( section.brandscapeTransform ) {

					// Reset overlay styles
					object.brandscapeSectionBackgroundOverlays.eq( i ).css( {
						opacity: object.config.sectionBackgroundOverlayOpacityMin
					} );

					// Reset background subject styles
					object.brandscapeSectionBackgroundSubjects.eq( i ).css( {
						transform: 'scale(' + object.config.sectionBackgroundSubjectScaleMin + ') translate3d(0, ' + object.config.sectionBackgroundSubjectParallaxMin + 'rem, 0)'
					} );

					// Reset content styles
					object.brandscapeContents.eq( i ).css( {
						opacity: object.config.contentOpacityMax,
						transform: 'translate3d(0, -' + object.config.contentParallaxMin + 'rem, 0)',
						filter: 'blur(' + object.config.blurReset + ')'
					} );
				}
			}
		};

		// Process controls scroll
		object.processControlsScroll = function( scrollTop ) {

			// Loop through controls
			for ( let i = 0; i < object.brandscapeControls.length; i++ ) {

				// Reference control
				const control = object.brandscapeControls[i];

				// Get parent brandscape
				const jQueryParentBrandscape = control.parentBrandscapeForScroll;
				const parentBrandscape = jQueryParentBrandscape.get(0);

				// If the parent brandscape is in the viewport and isn't scrolled past the last section, add the active class to the control
				if ( parentBrandscape.offsetForScroll.bottom - scrollTop >= object.windowHeight ) {

					// Add active class if it needs it
					object.brandscapeControls.eq( i ).addClass( 'is-active' );

					// Get all brandscape sections in parent brandscape
					const parentBrandscapeSections = jQueryParentBrandscape.find( '.' + object.config.brandscapeClass + '__section' );

					// Create an array of all section top offsets
					const sectionTopScrollOffsets = parentBrandscapeSections.toArray()
						.map( ( brandscapeSection ) => Math.abs( scrollTop - brandscapeSection.offsetForScroll.top ) );

					// Get index of closest offset
					const closestSectionIndex = sectionTopScrollOffsets.indexOf(
						Math.min.apply(
							null,
							sectionTopScrollOffsets
						)
					);

					// If the parent brandscape's current active section index isn't the same as the computed one, set it
					if ( parentBrandscape.activeSectionForScroll !== closestSectionIndex ) {

						// Set the active section index
						parentBrandscape.activeSectionForScroll = closestSectionIndex;

						// Set the active control
						object.setActiveControl( parentBrandscape, closestSectionIndex );
					}
				}

				// Otherwise, remove the class
				else {
					object.brandscapeControls.eq( i ).removeClass( 'is-active' );
				}
			}
		};

		// Process control click
		object.processControlClick = function( targetControl ) {

			// jQueryatize target control
			targetControl = $( targetControl );

			// Get target section index
			const targetSectionIndex = targetControl.data( 'brandscape-section-target' );

			// Get parent brandscape
			const parentBrandscape = targetControl.closest( '.' + object.config.brandscapeClass );

			// Scroll to target section
			$( 'html, body' ).animate(
				{
					scrollTop: parentBrandscape.find( '.' + object.config.brandscapeClass + '__section' )
						.eq( targetSectionIndex )
						.offset().top
				},
				object.config.snapScrollDuration
			);
		};

		// Set active control
		object.setActiveControl = function( targetBrandscape, nextIndex = 0 ) {

			// jQueryatize target brandscape
			targetBrandscape = $( targetBrandscape );

			// Get all controls in target brandscape
			const controls = targetBrandscape.find( '.' + object.config.brandscapeClass + '__controls .' + object.config.brandscapeClass + '__control' );

			// Remove is-active class from all of the brandscape's controls
			controls.removeClass( 'is-active' );

			// Add it in for the correct one
			controls.eq( nextIndex ).addClass( 'is-active' );
		};

		// Set component offsets
		object.setComponentOffsets = function() {

			// Combine brandscapes and sections
			const brandscapeComponents = object.brandscapes.add( object.brandscapeSections );

			// Loop through brandscapes and sections and set offsets
			for ( let i = 0; i < brandscapeComponents.length; i++ ) {

				// Reference component
				const component = brandscapeComponents[i];

				// Get jQueryatized component
				const jQueryComponent = $( component );

				// Get closest brandscape
				const closestBrandscape = jQueryComponent.closest( '.' + object.config.brandscapeClass );

				// Set up offsets array
				if ( !component.offsetForScroll ) {
					component.offsetForScroll = {};
				}

				// Set offsets and other info
				component.heightForScroll = component.getBoundingClientRect().height;
				component.offsetForScroll.top = jQueryComponent.offset().top;
				component.offsetForScroll.bottom = component.offsetForScroll.top + component.heightForScroll;
				component.isClosestBrandscapeStatic = closestBrandscape.hasClass( object.config.brandscapeClass + '--static' );
			}
		};

		// Set control parents
		object.setControlParents = function() {

			// Loop through brandscapes and set offsets
			for ( let i = 0; i < object.brandscapeControls.length; i++ ) {

				// Connect parent brandscape to control
				object.brandscapeControls[i].parentBrandscapeForScroll = $( object.brandscapeControls[i] ).closest( '.' + object.config.brandscapeClass );
			}
		};

		// Set orientations
		object.setOrientations = function() {

			// Loop through brandscapes and set their orientations
			for ( let i = 0; i < object.brandscapes.length; i++ ) {

				// Reference brandscape
				const targetBrandscape = $( object.brandscapes[i] );

				// Get the first section
				const section = targetBrandscape.find( '.' + object.config.brandscapeClass + '__section' );

				// If the section is landscape oriented, add the class to the brandscape
				if ( section.outerWidth() / section.outerHeight() >= object.config.landscapeThreshold ) {
					targetBrandscape.addClass( 'is-landscape' );
				}

				// Otherwise, remove the class
				else {
					targetBrandscape.removeClass( 'is-landscape' );
				}
			}
		};

		return object;
	}

	// Instantiate the brandscape
	function summonBrandscape( args = {} ) {
		return Object.create( brandscape( args ) );
	}

	// Instantiate and initialize new brandscape
	const theBrandscape = summonBrandscape();
	theBrandscape.init();

}( jQuery ) );
