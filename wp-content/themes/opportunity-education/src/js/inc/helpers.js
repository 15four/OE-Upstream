// Helpers

/* eslint-disable max-params */
/* exported helpers */

const helpers = {

	// Determine if element is within viewport
	isInViewport: function( elementTop, elementBottom, scrollTop = null, scrollBottom = null, offset = 0 ) {

		// If scrollTop and scrollBottom are not defined, get them from the window object
		if ( scrollTop === null || scrollBottom === null ) {

			// Set scroll constants
			scrollTop = window.pageYOffset || document.documentElement.scrollTop;
			scrollBottom = scrollTop + window.innerHeight;
		}

		// Return whether or not the element is in the viewport
		return (
			// Top is between top and bottom of viewport
			elementTop >= scrollTop + offset && elementTop <= scrollBottom - offset

			// Bottom is between top and bottom of viewport
			|| elementBottom >= scrollTop + offset && elementBottom <= scrollBottom - offset

			// Top is above viewport while bottom is beneath (component is larger than viewport)
			|| elementTop <= scrollTop && elementBottom >= scrollBottom
		);
	},

	// Clamp a number
	clamp: function( number, min, max ) {
		return Math.min( Math.max( number, min ), max );
	},

	// Wraparound numbers
	wrapAround: function( number, min, max ) {

		// If the number is negative, return the max
		if ( number < 0 ) {
			return max;
		}

		// Otherwise, if the number is greater than the max, return the min
		else if ( number > max ) {
			return min;
		}

		// Otherwise, return the number
		return number;
	}
};

export default helpers;
