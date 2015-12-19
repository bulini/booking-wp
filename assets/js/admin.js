jQuery(function(){
  jQuery("#address").geocomplete({
    //map: ".map_canvas",
    details: "post ",
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
    jQuery("#geocomplete").geocomplete("resetMarker");
    jQuery("#reset").hide();
    return false;
  });

  jQuery("#find").click(function(){
    jQuery("#geocomplete").trigger("geocode");
  }).click();
});
jQuery('.icp-auto').iconpicker();
