/* eslint-disable wrap-iife */

/* global jQuery */

// Preloader

( function( $ ) {

	function preloader( config = {} ) {

		// Create return object
		const object = {
			config: {
				initEvents: ['setupfinish', 'brandscapeload', 'dynamicheightguyload'],
				preloaderClass: 'js-preloader',
				removalDelay: 100
			},
			preloaders: []
		};

		// Create object config
		object.config = Object.assign( object.config, config );

		// Init
		object.init = function() {

			// Query up preloaders based on selector
			object.preloaders = $( '.' + object.config.preloaderClass );

			// Add initEvents to object
			object.initEvents = object.config.initEvents;

			// Count down until all required initEvents have been triggered, then remove the preloader
			$( window ).one( object.initEvents.join( ' ' ), function( event ) {

				// Remove the initEvent from the array
				object.initEvents = object.initEvents.filter( ( initEvent ) => initEvent !== event.type );

				// If the initEvents are empty, remove the preloader
				if ( !object.initEvents.length ) {

					// Remove active class after delay time
					window.setTimeout(
						function() {

							// Remove active class
							object.preloaders.removeClass( 'is-active' );

							// Remove locked by popover class from HTML
							$( 'html' ).removeClass( 'locked-by-popover' );

							// Fire off event
							$( window ).trigger( 'preloaderremove' );
						},
						object.config.removalDelay
					);
				}
			} );
		};

		return object;
	}

	// Instantiate and initialize a new preloader object
	const thePreloader = Object.create( preloader() );
	thePreloader.init();

} )( jQuery );
