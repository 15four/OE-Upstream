// Dynamic Height Guy

/* global jQuery */

function dynamicHeightGuy( args = {} ) {

	// Return object
	const object = {
		config: {
			dynamicHeightGuyClass: 'js-dynamic-height-guy',
			animationDuration: 625
		}
	};

	// Overwrite default config
	Object.assign( object.config, args );

	// Remove loading state
	object.removeLoadingState = function( targetDynamicHeightGuys ) {

		// Loop through each guy and remove loading state
		targetDynamicHeightGuys.each( function( index, guy ) {

			// JQueryatize the guy
			guy = jQuery( guy );

			// Remove the loading class
			guy.removeClass( object.config.dynamicHeightGuyClass + '--loading' );
		} );

		// After the last guy is done animating, fire the load event
		window.setTimeout(
			function() {
				jQuery( window ).trigger( 'dynamicheightguyload' );
			},
			object.config.animationDuration
		);
	};

	// Set height
	object.setHeight = function( targetDynamicHeightGuys, innersOverride = [], includeParents = false ) {

		// Loop through each guy and resize
		for ( let i = 0; i < targetDynamicHeightGuys.length; i++ ) {

			// Reference and jQueryatize the guy
			const guy = jQuery( targetDynamicHeightGuys[i] );

			// Get the inners except for the excluded ones
			const inners = innersOverride.length
				? innersOverride
				: guy.closestChild( '.' + object.config.dynamicHeightGuyClass + '__inner' );

			// Get largest height of all inners
			const largestInnerHeight = Math.max.apply(
				null,
				inners.map(
					function( index ) {
						return jQuery( inners[index] ).outerHeight();
					}
				)
			);

			// Get difference in height of current guy vs largest inner
			const heightDifference = largestInnerHeight - guy.outerHeight();

			// Get guys that are the parents of this one
			const parentGuys = guy.parents( '.' + object.config.dynamicHeightGuyClass );

			// Set the guy's height to the largest height of all inners
			guy.css( 'height', largestInnerHeight );

			// If parents are included, modify the height of all parent guys
			if ( includeParents ) {

				// Loop through the parent guys
				for ( let c = 0; c < parentGuys.length; c++ ) {

					// Reference and jQueryatize the parent guy
					const parentGuy = jQuery( parentGuys[c] );

					// Change parent guy's height by the height difference
					parentGuy.css( 'height', parseInt( parentGuy.css( 'height' ), 10 ) + heightDifference );
				}
			}

			// After the guy is done animating, fire the resize event adn animate the
			window.setTimeout(
				function() {
					jQuery( window ).trigger( 'dynamicheightguyresize' );
				},
				object.config.animationDuration
			);
		}
	};

	// If there are no dynamic height guys on the page, trigger the dynamicheightguyload event
	jQuery( window ).on( 'load', function() {
		if ( !jQuery( '.' + object.config.dynamicHeightGuyClass ).length ) {
			jQuery( window ).trigger( 'dynamicheightguyload' );
		}
	} );

	return object;
}

// Instantiate the Dynamic Height Guy
function summonDynamicHeightGuy( args = {} ) {
	return Object.create( dynamicHeightGuy( args ) );
}

export const theDynamicHeightGuy = summonDynamicHeightGuy();
