jQuery('#book-single-button').click(function(event) {
	event.preventDefault();
	name = jQuery( "#name" ).val();
	email = jQuery( "#email" ).val();
	phone = jQuery( "#phone" ).val();
	checkin = jQuery( "#checkin" ).val();
	checkout = jQuery( "#checkout" ).val();
	room = jQuery( "#room" ).val();
	room_number = jQuery( "#room_number" ).val();
	adults = jQuery( "#adults" ).val();
	children = jQuery( "#children" ).val();
	message = jQuery( "#booking-message" ).val();
	current_lang = jQuery( "#current_lang" ).val();
	jQuery.post(ajaxurl, { action: 'home_booking', name: name, email: email,phone: phone,checkin: checkin, checkout: checkout, room: room, room_number: room_number, adults: adults, children: children, message: message, current_lang: current_lang}, function(output) {
	jQuery('#message').fadeIn('slow');
	jQuery('#message').html(output);
});
});


jQuery('#send-offer').click(function(event) {
	event.preventDefault();
	booking_id = jQuery( "#booking_id" ).val();
	status = jQuery( "#status" ).val();
	owner_price = jQuery( "#owner_price" ).val();
	owner_message = jQuery("#owner_message").val();
	link_cc = jQuery("#link_cc").val();


	jQuery.post(ajaxurl, { action: 'send_ajax', booking_id: booking_id, status: status, owner_price: owner_price, owner_message: owner_message, link_cc: link_cc}, function(output) {
	jQuery('#response').fadeIn('slow');
	jQuery('#response').html(output);
	return false;
});
});



jQuery('#addcamere').click(function() {
	jQuery.post(ajaxurl, { action: 'test_ajax', data:jQuery("#room_form").serialize() }, function(output) {
	jQuery('#wait_room').hide();
	jQuery('#resultcamere').append(output);
	jQuery('#resultcamere').fadeIn('slow');
});
});


jQuery('.input').addClass('form-control');
jQuery('.cmb_text_medium').addClass('form-control');
jQuery('.cmb_text_medium').addClass('form-control');
jQuery('.cmb_textarea_small').addClass('form-control');
jQuery('.cmb_select').addClass('form-control');
jQuery('.button-primary').addClass('btn btn-success');
jQuery('.button').addClass('btn btn-success');



 jQuery(document).ready(function(){
	 //PrettyPhoto
    if (jQuery().prettyPhoto) {

        jQuery('a[data-rel]').each(function () {
            jQuery(this).attr('rel', jQuery(this).data('rel'));
        });

        jQuery("a[rel^='prettyPhoto']").prettyPhoto({
            social_tools: false,
            animation_speed: 'normal', // fast/slow/normal
            slideshow: 5000, // false OR interval time in ms
            autoplay_slideshow: false, // true/false
            opacity: 0.80, // Value between 0 and 1
            show_title: true, // true/false
			allow_resize: true, // Resize the photos bigger than viewport. true/false
            default_width: 500,
            default_height: 344,
            counter_separator_label: '/', // The separator for the gallery counter 1 "of" 2
            theme: 'pp_default', // light_rounded / dark_rounded / light_square / dark_square / facebook
            horizontal_padding: 20, // The padding on each side of the picture
            hideflash: false, // Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto
            wmode: 'opaque', // Set the flash wmode attribute
            autoplay: true, // Automatically start videos: True/False
            modal: false, // If set to true, only the close button will close the window
            deeplinking: true, // Allow prettyPhoto to update the url to enable deeplinking.
            overlay_gallery: true, // If set to true, a gallery will overlay the fullscreen image on mouse over
            keyboard_shortcuts: true, // Set to false if you open forms inside prettyPhoto
            changepicturecallback: function () {}, // Called everytime an item is shown/changed
            callback: function () {}, // Called when prettyPhoto is closed
        });
    }


	jQuery("[rel='tooltip']").tooltip();
	jQuery('.toggler').click(function(){
	jQuery('.gmappanel').removeClass('hide-map').addClass('show-map').css('height', '600');
	jQuery('.toggler').css('display', 'none');

	jQuery('.toggler-hide').css('display', 'block');
	address_field = jQuery('#map').attr("data-address");
	lat_field = jQuery('#map').attr("data-lat");
	lng_field = jQuery('#map').attr("data-lng");

	//alert(address_field);
			var $map = jQuery('#map');
			google.maps.event.addDomListener(window, 'resize', function() {
				map.setCenter(homeLatlng);
			});
			if( $map.length ) {

				$map.gMap({
					address: address_field,
					zoom: 14,
					markers: [
						{ 'latitude': lat_field, 'longitude': lng_field, 'html': '<h5>'+address_field+'</h5>'}
					]
				});

			}


	});
	jQuery('.toggler-hide').click(function(){
	jQuery('.gmappanel').removeClass('show-map').addClass('hide-map').css('height', '0');
	jQuery('.toggler').css('display', 'block');
	jQuery('.toggler-hide').css('display', 'none');
	});
});



/*cc validator */


(function($) {
	$('[data-numeric]').payment('restrictNumeric');
	$('.cc-number').payment('formatCardNumber');
	$('.cc-exp').payment('formatCardExpiry');
	$('.cc-cvc').payment('formatCardCVC');

	$.fn.toggleInputError = function(erred) {
		this.parent('.form-group').toggleClass('has-error', erred);
		return this;
	};

	$('#confirm').click(function(e) {


		var cardType = $.payment.cardType($('.cc-number').val());
		$('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
		$('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
		$('.cc-cvv').toggleInputError(!$.payment.validateCardCVC($('.cc-cvv').val(), cardType));
		$('.cc-brand').text(cardType);

		$('.validation').removeClass('text-danger text-success');
		$('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');

		var valid = $.payment.validateCardNumber($('input.cc-number').val());

		if (!valid) {
			e.preventDefault();
		  alert('Your card is not valid!');
		  return false;
		} else {
			return true;
		}

	});

}( jQuery ) );




/*
jQuery(document).ajaxSend(function() {
  alert('ajax');
});
*/
