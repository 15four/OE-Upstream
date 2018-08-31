// Location Map

/* eslint-disable no-invalid-this */

/* global jQuery */

( function( $ ) {

	function locationMap( args = {} ) {

		// Return object
		const object = {
			config: {
				initEvent: 'load',
				locationMapClass: 'js-location-map',
				parentToDelegateEvents: $( '.site-main' )
			},
			locationMaps: []
		};

		// Overwrite default config
		Object.assign( object.config, args );

		// Init
		object.init = function() {

			// Query up location maps based on selector
			object.locationMaps = $( '.' + object.config.locationMapClass );

			// If there are location maps on the page, initialize
			if ( object.locationMaps.length ) {

				// Initialize everything on the correct event
				$( window ).on( object.config.initEvent, object.events );
			}
		};

		// Events
		object.events = function() {

			// Get jQueryatized window
			const jQueryWindow = $( window );

			// Location marker click listener (delegated from parent)
			object.config.parentToDelegateEvents.on( 'click', '.' + object.config.locationMapClass + '__location-marker', function() {
				object.setActiveLocation( this );
			} );

			// Close click listener (delegated from parent)
			object.config.parentToDelegateEvents.on( 'click', '.' + object.config.locationMapClass + '__close', function() {

				// jQueryatize trigger
				const trigger = $( this );

				// Get parent location map
				const parentLocationMap = trigger.closest( '.' + object.config.locationMapClass );

				// Get parent location map
				object.clearActiveLocations( parentLocationMap );
			} );
		};

		// Set active location
		object.setActiveLocation = function( trigger ) {

			// jQueryatize trigger
			trigger = $( trigger );

			// Get parent location map
			const parentLocationMap = trigger.closest( '.' + object.config.locationMapClass );

			// Remove all active locations
			object.clearActiveLocations( parentLocationMap );

			// Get parent location
			const parentLocation = trigger.closest( '.' + object.config.locationMapClass + '__location' );

			// Add active class to parent location
			parentLocation.addClass( 'is-active' );
		};

		// Clear active locations
		object.clearActiveLocations = function( theLocationMap ) {

			// Remove active class from all locations in parent location map
			theLocationMap.find( '.' + object.config.locationMapClass + '__location' ).removeClass( 'is-active' );
		};

		return object;
	}

	// Instantiate the Location map
	function summonLocationMap( args = {} ) {
		return Object.create( locationMap( args ) );
	}

	// Instantiate and initialize new location map
	const theLocationMap = summonLocationMap();
	theLocationMap.init();

}( jQuery ) );
