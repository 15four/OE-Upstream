// Setup

/* eslint-disable wrap-iife */
/* eslint-disable complexity */
/* eslint-disable max-statements */

/* global jQuery */

( function( $ ) {

	function setup( config = {} ) {

		// Create return object
		const object = {
			config: {
				initEvent: 'load',
				browserClass: '_browser',
				deviceClass: '_device'
			},
			browser: null,
			device: null
		};

		// Overwrite default config
		Object.assign( object.config, config );

		// Init
		object.init = function() {

			// Get jQueryatized window
			const jQueryWindow = $( window );

			// Initialize everything on the correct event
			jQueryWindow.on( object.config.initEvent, function() {

				// Sniff and set browser classes
				object.sniffBrowsers();

				// Trigger setupfinish event
				jQueryWindow.trigger( 'setupfinish' );
			} );
		};

		// Sniff browsers and add their classes to the body
		object.sniffBrowsers = function() {

			// Get the user agent
			const userAgent = window.navigator.userAgent;

			// If the user agent contains these browser strings, add their browser class to the body and set the browser variable

			// Lynx
			if ( userAgent.indexOf( 'Lynx' ) !== -1 ) {
				$( 'body' ).addClass( object.config.browserClass + '--lynx' );
				object.browser = 'lynx';
			}

			// Edge
			else if ( userAgent.indexOf( 'Edge' ) !== -1 ) {
				$( 'body' ).addClass( object.config.browserClass + '--edge' );
				object.browser = 'edge';
			}

			// Chrome
			else if ( userAgent.toLowerCase().indexOf( 'chrome' ) !== -1 ) {
				$( 'body' ).addClass( object.config.browserClass + '--chrome' );
				object.browser = 'chrome';
			}

			// Safari
			else if ( userAgent.toLowerCase().indexOf( 'safari' ) !== -1 ) {
				$( 'body' ).addClass( object.config.browserClass + '--safari' );
				object.browser = 'safari';
			}

			// IE
			else if (
				userAgent.indexOf( 'MSIE' ) !== -1
				|| userAgent.indexOf( 'Trident' ) !== -1
			) {
				$( 'body' ).addClass( object.config.browserClass + '--ie' );
				object.browser = 'ie';
			}

			// Gecko
			else if ( userAgent.indexOf( 'Gecko' ) !== -1 ) {
				$( 'body' ).addClass( object.config.browserClass + '--gecko' );
				object.browser = 'gecko';
			}

			// Opera
			else if ( userAgent.indexOf( 'Opera' ) !== -1 ) {
				$( 'body' ).addClass( object.config.browserClass + '--opera' );
				object.browser = 'opera';
			}

			// Netscape (what?)
			else if ( userAgent.indexOf( 'Nav' ) !== -1 && userAgent.indexOf( 'Mozilla/4.' ) !== -1 ) {
				$( 'body' ).addClass( object.config.browserClass + '--ns4' );
				object.browser = 'ns4';
			}

			// Unknown
			else {
				$( 'body' ).addClass( object.config.browserClass + '--unknown' );
			}

			// If the browser is Safari and there is a 'mobile' string in the UA
			if ( object.browser === 'safari' && userAgent.toLowerCase().indexOf( 'mobile' ) !== -1 ) {
				$( 'body' ).addClass( object.config.deviceClass + '--ios' );
				object.device = 'ios';
			}
		};

		return object;
	}

	// Instantiate the setup
	function summonSetup( args = {} ) {
		return Object.create( setup( args ) );
	}

	// Instantiate and initialize a new setup object
	const theSetup = summonSetup();
	theSetup.init();

} )( jQuery );
