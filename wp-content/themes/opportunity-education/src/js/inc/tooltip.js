/* eslint-disable consistent-this */
/* eslint-disable no-invalid-this */
/* eslint-disable no-magic-numbers */

/* global jQuery */

// ------------------------------------------ /
// -----------   Tooltip Module   ----------- /
// ------------------------------------------ /

( function( $ ) {

	// Get Window Size
	var windowWidth = $(window).width();
	if(windowWidth > 1024){
		
		// Tooltip only Text
		$('.cd-horizontal-timeline .events a').hover(function(){
			
			// Create tooltip on hover
			var title = $(this).attr('data-tooltip');
			$(this).data('tipText', title).removeAttr('data-tooltip');
			$('<div class="o-tooltip"></div>')
			.text(title)
			.appendTo('body')
			.fadeIn('slow');

		}, function() {

			// Remove tooltip on hover out
			$(this).attr('data-tooltip', $(this).data('tipText'));
			$('.o-tooltip').remove();

		}).hover(function() {

			// Position tooltip
			var left = $(this).offset().left;
			var top = $(this).offset().top;
			$('.o-tooltip')
			.css({ top: top+'px', left: left+'px'})

		});
	}

}( jQuery ) );
