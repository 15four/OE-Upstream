/* eslint-disable consistent-this */
/* eslint-disable no-invalid-this */
/* eslint-disable no-magic-numbers */

/* global jQuery */

// ------------------------------------------ /
// ----------   Timeline Module   ----------- /
// ------------------------------------------ /

( function( $ ) {

	var div = '<div class="c-slider__controls c-slider__controls--regular o-button-container u-block--full-width u-flex--justify-between">' +
          '    <button id="prev-btn" data-slider-direction="prev" class="c-slider__control c-slider__control--regular js-slider__control o-button--even-padding o-button--solid">' +
          '        <div class="c-svg c-svg--left-facing-chevron">' +
          '        <div class="c-svg__inner" style="padding-top: 100%;">' +
          '    <svg class="c-svg__svg" viewBox="0 0 100 100">' +
		  '    <line class="c-svg__component c-svg__component--stroke" x1="25" y1="50" x2="75" y2="10"></line>' +
		  '		<line class="c-svg__component c-svg__component--stroke" x1="25" y1="50" x2="75" y2="90"></line>' +
		  '		</svg>' +
		  '		</div>' +
		  '		</div>' +
		  '		</button>' +
		  '		<button id="next-btn" data-slider-direction="next" class="c-slider__control c-slider__control--regular js-slider__control o-button--even-padding o-button--solid">' +
		  '		<div class="c-svg c-svg--right-facing-chevron">' +
		  '		<div class="c-svg__inner" style="padding-top: 100%;">' +
		  '		<svg class="c-svg__svg" viewBox="0 0 100 100">' +
		  '		<line class="c-svg__component c-svg__component--stroke" x1="25" y1="10" x2="75" y2="50"></line>' +
		  '		<line class="c-svg__component c-svg__component--stroke" x1="25" y1="85" x2="75" y2="50"></line>' +
		  '		</svg>' +
		  '		</div>' +
		  '		</div>' +
		  '		</button>' +
          '</div>';

$( div ).appendTo( '.c-timeline-line' );

}( jQuery ) );
