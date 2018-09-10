/* eslint-disable wrap-iife */

/* global jQuery */

// Cookies consent bar

( function( $ ) {

	function cookiesConsentBar( config = {} ) {

		// Create return object
		const object = {
			config: {
				initEvent: 'setupfinish',
				cookiesConsentBarClass: 'cookies-consent-bar',
				cookiesConsentBarJsClass: 'js-cookies-consent-bar',
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

				// If the cookie for the consent bar does not exist, remove the hidden class
				if ( document.cookie.indexOf( 'opportunity-education-cookie-consent=true' ) === -1 ) {
					object.cookiesConsentBars.removeClass( object.config.cookiesConsentBarClass + '--hidden' );
				}

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
			object.config.parentToDelegateEvents.one( 'click', '.' + object.config.cookiesConsentBarJsClass + '__closer', function( event ) {

				// jQueryatize closer
				const closer = $( event.target );

				// Set cookie
				document.cookie = 'opportunity-education-cookie-consent=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/';

				// Hide the cookies consent bar
				closer.closest( '.' + object.config.cookiesConsentBarJsClass ).addClass( object.config.cookiesConsentBarClass + '--hidden' );
			} );
		};

		return object;
	}

	// Instantiate and initialize a new cookies consent bar object
	const theCookiesConsentBar = Object.create( cookiesConsentBar() );
	theCookiesConsentBar.init();

} )( jQuery );
