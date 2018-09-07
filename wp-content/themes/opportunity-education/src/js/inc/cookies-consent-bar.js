/* eslint-disable wrap-iife */

/* global jQuery */

// Cookies consent bar

( function( $ ) {

	function cookiesConsentBar( config = {} ) {

		// Create return object
		const object = {
			config: {
				initEvent: 'setupfinish',
				cookiesConsentBarClass: 'js-cookies-consent-bar',
				parentToDelegateEvents: $( '.site' )
			},
			cookiesConsentBars: []
		};

		// Create object config
		object.config = Object.assign( object.config, config );

		// Init
		object.init = function() {

			// Query up cookies consent bars based on selector
			object.cookiesConsentBars = $( '.' + object.config.cookiesConsentBarClass );

			// If there are cookies consent bars on the page, initialize
			if ( object.cookiesConsentBars.length ) {

				// Initialize everything on the correct event
				$( window ).on( object.config.initEvent, function() {

					// Wire up events
					object.events();
				} );
			}
		};

		// Events
		object.events = function() {

			// Closer click listener
			object.config.parentToDelegateEvents.one( 'click', '.' + object.config.cookiesConsentBarClass + '__closer', function( event ) {

				// jQueryatize closer
				const closer = $( event.target );

				// Set cookie
				document.cookie = 'opportunity-education-cookie-consent=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';

				// Remove the cookies consent bar
				closer.closest( '.' + object.config.cookiesConsentBarClass ).remove();
			} );
		};

		return object;
	}

	// Instantiate and initialize a new cookies consent bar object
	const theCookiesConsentBar = Object.create( cookiesConsentBar() );
	theCookiesConsentBar.init();

} )( jQuery );
