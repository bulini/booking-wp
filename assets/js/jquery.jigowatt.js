jQuery(document).ready(function(){

	jQuery('#reservationform').submit(function(){

		var action = jQuery(this).attr('action');

		jQuery("#message").slideUp(750,function() {
		jQuery('#message').hide();

 		jQuery('#submit')
			.after('<img src="images/ajax-loader.gif" class="loader" />')
			.attr('disabled','disabled');

		jQuery.post(action, {
			email: jQuery('#email').val(),
			room: jQuery('#room').val(),
			checkin: jQuery('#checkin').val(),			
			checkout: jQuery('#checkout').val(),
			adults: jQuery('#adults').val(),
			children: jQuery('#children').val(),
		},
			function(data){
				document.getElementById('message').innerHTML = data;
				jQuery('#message').slideDown('slow');
				jQuery('#reservationform img.loader').fadeOut('slow',function(){jQuery(this).remove()});
				jQuery('#submit').removeAttr('disabled');
				if(data.match('success') != null) jQuery('#reservationform .form-group, #reservationform .btn').slideUp('slow');

			}
		);

		});

		return false;

	});
	
	jQuery('#contactform').submit(function(){

		var action = jQuery(this).attr('action');

		jQuery("#message").slideUp(750,function() {
		jQuery('#message').hide();

 		jQuery('#submit')
			.after('<img src="assets/ajax-loader.gif" class="loader" />')
			.attr('disabled','disabled');

		jQuery.post(action, {
			name: jQuery('#name').val(),
			email: jQuery('#email').val(),
			subject: jQuery('#subject').val(),
			comments: jQuery('#comments').val(),
			verify: jQuery('#verify').val()
		},
			function(data){
				document.getElementById('message').innerHTML = data;
				jQuery('#message').slideDown('slow');
				jQuery('#contactform img.loader').fadeOut('slow',function(){jQuery(this).remove()});
				jQuery('#submit').removeAttr('disabled');
				if(data.match('success') != null) jQuery('#contactform .form-group, #contactform .btn').slideUp('slow');

			}
		);

		});

		return false;

	});

});