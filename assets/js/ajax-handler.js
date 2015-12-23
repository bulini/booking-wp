jQuery('#book-single-button').click(function(event) {
	event.preventDefault();
	name = jQuery( "#name" ).val();
	email = jQuery( "#email" ).val();
	phone = jQuery( "#phone" ).val();
	checkin = jQuery( "#checkin" ).val();
	checkout = jQuery( "#checkout" ).val();
	room_id = jQuery( "#room_id" ).val();
	room = jQuery( "#room_select" ).val();
	room_number = jQuery( "#room_number" ).val();
	adults = jQuery( "#adults" ).val();
	children = jQuery( "#children" ).val();
	message = jQuery( "#booking-message" ).val();
	current_lang = jQuery( "#current_lang" ).val();
	jQuery.post(ajaxurl, { action: 'home_booking', name: name, email: email,phone: phone,checkin: checkin, checkout: checkout, room_id: room_id, room: room, room_number: room_number, adults: adults, children: children, message: message, current_lang: current_lang}, function(output) {
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


      jQuery(function(){
        jQuery("#address").geocomplete({
          map: ".map_canvas",
          details: "form ",
          markerOptions: {
            draggable: true
          }
        });

        jQuery("#address").bind("geocode:dragged", function(event, latLng){
          jQuery("input[name=lat]").val(latLng.lat());
          jQuery("input[name=lng]").val(latLng.lng());
          jQuery("#reset").show();
        });


        jQuery("#reset").click(function(){
          jQuery("#address").geocomplete("resetMarker");
          jQuery("#reset").hide();
          return false;
        });

        jQuery("#find").click(function(){
          jQuery("#address").trigger("geocode");
        }).click();
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
