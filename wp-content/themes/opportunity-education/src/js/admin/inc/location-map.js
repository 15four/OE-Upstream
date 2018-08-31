// Location Map

/* eslint-disable no-invalid-this */
/* eslint-disable no-magic-numbers */

/* global jQuery */

( function( $ ) {

	function locationMap( args = {} ) {

		// Return object
		const object = {
			config: {
				initEvent: 'load',
				locationMapClass: 'js-location-map--admin',
				offsetLeftInputClass: 'js-location-map__offset-left',
				offsetTopInputClass: 'js-location-map__offset-top',
				pickerClass: 'js-location-map__location--picker',
				parentToDelegateEvents: $( '#wpbody' )
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

			// Clicking on the map
			object.config.parentToDelegateEvents.on( 'click', '.' + object.config.locationMapClass, function( event ) {

				// Get map
				const targetMap = $( this );

				// Get map offset
				const mapOffset = targetMap.offset();

				// Get map dimensions
				const mapDimensions = targetMap[0].getBoundingClientRect();

				// Compute click offset relative to map by percentage
				const clickOffset = {
					top: ( event.pageY - mapOffset.top ) / mapDimensions.height * 100,
					left: ( event.pageX - mapOffset.left ) / mapDimensions.width * 100
				};

				// Set location
				object.setLocation( targetMap, clickOffset.top, clickOffset.left );
			} );
		};

		// Set location
		object.setLocation = function( targetMap, top, left ) {

			// Set the value of the offset inputs
			targetMap.find( '.' + object.config.offsetTopInputClass ).val( top );
			targetMap.find( '.' + object.config.offsetLeftInputClass ).val( left );

			// Set picker location
			targetMap.find( '.' + object.config.pickerClass )
				.css( {
					top: top + '%',
					left: left + '%'
				} );
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
