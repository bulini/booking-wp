jQuery("#send-offer").click(function(e){e.preventDefault(),booking_id=jQuery("#booking_id").val(),status=jQuery("#status").val(),owner_price=jQuery("#owner_price").val(),owner_message=jQuery("#owner_message").val(),link_cc=jQuery("#link_cc").val(),jQuery.post(ajaxurl,{action:"send_ajax",booking_id:booking_id,status:status,owner_price:owner_price,owner_message:owner_message,link_cc:link_cc},function(e){return jQuery("#response").fadeIn("slow"),jQuery("#response").html(e),!1})}),jQuery("#addcamere").click(function(){jQuery.post(ajaxurl,{action:"test_ajax",data:jQuery("#room_form").serialize()},function(e){jQuery("#wait_room").hide(),jQuery("#resultcamere").append(e),jQuery("#resultcamere").fadeIn("slow")})}),jQuery(".input").addClass("form-control"),jQuery(".cmb_text_medium").addClass("form-control"),jQuery(".cmb_text_medium").addClass("form-control"),jQuery(".cmb_textarea_small").addClass("form-control"),jQuery(".cmb_select").addClass("form-control"),jQuery(".button-primary").addClass("btn btn-success"),jQuery(".button").addClass("btn btn-success"),jQuery(document).ready(function(){jQuery().prettyPhoto&&(jQuery("a[data-rel]").each(function(){jQuery(this).attr("rel",jQuery(this).data("rel"))}),jQuery("a[rel^='prettyPhoto']").prettyPhoto({social_tools:!1,animation_speed:"normal",slideshow:5e3,autoplay_slideshow:!1,opacity:.8,show_title:!0,allow_resize:!0,default_width:500,default_height:344,counter_separator_label:"/",theme:"pp_default",horizontal_padding:20,hideflash:!1,wmode:"opaque",autoplay:!0,modal:!1,deeplinking:!0,overlay_gallery:!0,keyboard_shortcuts:!0,changepicturecallback:function(){},callback:function(){}})),jQuery("[rel='tooltip']").tooltip(),jQuery(".toggler").click(function(){jQuery(".gmappanel").removeClass("hide-map").addClass("show-map").css("height","600"),jQuery(".toggler").css("display","none"),jQuery(".toggler-hide").css("display","block"),address_field=jQuery("#map").attr("data-address"),lat_field=jQuery("#map").attr("data-lat"),lng_field=jQuery("#map").attr("data-lng");var e=jQuery("#map");google.maps.event.addDomListener(window,"resize",function(){map.setCenter(homeLatlng)}),e.length&&e.gMap({address:address_field,zoom:14,markers:[{latitude:lat_field,longitude:lng_field,html:"<h5>"+address_field+"</h5>"}]})}),jQuery(".toggler-hide").click(function(){jQuery(".gmappanel").removeClass("show-map").addClass("hide-map").css("height","0"),jQuery(".toggler").css("display","block"),jQuery(".toggler-hide").css("display","none")})}),function($){$("[data-numeric]").payment("restrictNumeric"),$(".cc-number").payment("formatCardNumber"),$(".cc-exp").payment("formatCardExpiry"),$(".cc-cvc").payment("formatCardCVC"),$.fn.toggleInputError=function(e){return this.parent(".form-group").toggleClass("has-error",e),this},$("#confirm").click(function(e){var a=$.payment.cardType($(".cc-number").val());$(".cc-number").toggleInputError(!$.payment.validateCardNumber($(".cc-number").val())),$(".cc-exp").toggleInputError(!$.payment.validateCardExpiry($(".cc-exp").payment("cardExpiryVal"))),$(".cc-cvv").toggleInputError(!$.payment.validateCardCVC($(".cc-cvv").val(),a)),$(".cc-brand").text(a),$(".validation").removeClass("text-danger text-success"),$(".validation").addClass($(".has-error").length?"text-danger":"text-success");var r=$.payment.validateCardNumber($("input.cc-number").val());return r?!0:(e.preventDefault(),alert("Your card is not valid!"),!1)})}(jQuery);