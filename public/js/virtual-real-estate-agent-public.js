(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$('.chat_plugin').html('<iframe id="frame" src="' + php_vars.chatUrl + '" />');

	$('.chat_trigger').on('click', function() {
		if ( $('.chat_plugin').is(":hidden") ) {
			$('.icon_close').show();
			$('.icon_message').hide();
		}
		else {
			$('.icon_close').hide();
			$('.icon_message').show();
		}

		$('.chat_plugin').slideFadeToggle();
		$('#chat_integration_script').width('100%');
	});

	$.fn.slideFadeToggle = function(speed, easing, callback) {
		return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
	};
})( jQuery );
