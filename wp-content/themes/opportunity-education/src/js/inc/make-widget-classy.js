/* eslint-disable wrap-iife */

/* global jQuery */

// Preloader

( function( $ ) {

	$( 'select#cat' ).addClass('o-field--small');

	var dropdown = document.getElementById( 'cat' );

	function onCatChange() {
		if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
			dropdown.parentNode.submit();
		}
		else if ( dropdown.options[dropdown.selectedIndex].value === 0 ) {
			location.href = '/recent-news';
		}
	}

	if ( dropdown ) {
		dropdown.onchange = onCatChange;
	}

} )( jQuery );
