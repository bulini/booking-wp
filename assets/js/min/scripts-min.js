!function($){"use strict";var e=$("body");$(document).ready(function(){$.fn.uouSelectBox=function(){var a=$(this),t=a.find("select");a.prepend('<ul class="select-clone custom-list"></ul>');var i=t.data("placeholder")?t.data("placeholder"):t.find("option:eq(0)").text(),n=a.find(".select-clone");a.prepend('<input class="value-holder" type="text" disabled="disabled" placeholder="'+i+'"><i class="fa fa-sort arrow-down"></i>');var s=a.find(".value-holder");$.fn.placeholder&&a.find("input, textarea").placeholder(),t.find("option").each(function(){$(this).attr("value")&&n.append('<li data-value="'+$(this).val()+'">'+$(this).text()+"</li>")}),a.click(function(){var t=e();t>991&&(n.slideToggle(100),a.toggleClass("active"))}),n.find("li").click(function(){s.val($(this).text()),t.find('option[value="'+$(this).attr("data-value")+'"]').attr("selected","selected"),a.hasClass("links")&&(window.location.href=t.val())}),a.bind("clickoutside",function(e){n.slideUp(100)}),a.hasClass("links")&&t.change(function(){window.location.href=t.val()})};var e=function(){$("#media-query-breakpoint").length<1&&$("body").append('<var id="media-query-breakpoint"><span></span></var>');var e=$("#media-query-breakpoint").css("content");return"undefined"!=typeof e?(e=e.replace('"',"").replace('"',"").replace("'","").replace("'",""),isNaN(parseInt(e,10))&&($("#media-query-breakpoint span").each(function(){e=window.getComputedStyle(this,":before").content}),e=e.replace('"',"").replace('"',"").replace("'","").replace("'","")),isNaN(parseInt(e,10))&&(e=1199)):e=1199,e};$(".slider-range-container").each(function(){if($.fn.slider){var e=$(this),a=e.find(".slider-range"),t=a.data("min")?a.data("min"):100,i=a.data("max")?a.data("max"):2e3,n=a.data("step")?a.data("step"):100,s=a.data("default-min")?a.data("default-min"):100,o=a.data("default-max")?a.data("default-max"):500,l=a.data("currency")?a.data("currency"):"$",r=e.find(".range-from"),d=e.find(".range-to");r.val(l+" "+s),d.val(l+" "+o),a.slider({range:!0,min:t,max:i,step:n,values:[s,o],slide:function(e,a){r.val(l+" "+a.values[0]),d.val(l+" "+a.values[1])}})}}),$(".calendar").each(function(){var e=$(this).find("input"),a=e.data("dateformat")?e.data("dateformat"):"d/m/y",t=$(this).find(".fa"),i=e.datepicker("widget");e.datepicker({dateFormat:a,minDate:0,beforeShow:function(){e.addClass("active")},onClose:function(){e.removeClass("active"),i.hide(),i.parent().is("body")||i.detach().appendTo($("body"))}}),t.click(function(){e.focus()})}),$(".header-login").each(function(){var e=$(this),t=e.find(".header-form"),i=e.find(".header-btn");e.hover(function(){a>991&&(e.find(".header-btn").addClass("hover"),t.stop(!0,!0).slideDown(200))},function(){a>991&&(e.find(".header-btn").removeClass("hover"),t.stop(!0,!0).delay(10).slideUp(200))}),t.find("form").submit(function(){var e=$(this);return e.uouFormValid()?void e.find(".alert-message.warning:visible").slideUp(300):(e.find(".alert-message.warning").slideDown(300),!1)}),i.click(function(){991>=a&&(e.find(".header-btn").toggleClass("hover"),t.stop(!0,!0).slideToggle(200))})}),$.fn.uouToggle=function(){var e=$(this),a=e.find(".toggle-title"),t=e.find(".toggle-content");a.click(function(){e.toggleClass("closed"),t.slideToggle(400)})},$("#header-toggle").click(function(){$("#header").slideToggle(300)}),$(".navbar-nav").each(function(){var e=$(this);e.find("li.has-submenu").hover(function(){a>991&&($(this).addClass("hover"),$(this).find("> ul").stop(!0,!0).fadeIn(200))},function(){a>991&&($(this).removeClass("hover"),$(this).find("> ul").stop(!0,!0).delay(10).fadeOut(200))}),e.find("li.has-submenu>ul>li.has-submenu>a").each(function(){$(this).append('<button class="submenu-toggle"><i class="fa fa-angle-right"></i></button>')}),e.find("li.has-submenu").each(function(){$(this).append('<button class="submenu-toggle"><i class="fa fa-chevron-down"></i></button>')}),e.find(".submenu-toggle").each(function(){$(this).click(function(){$(this).parent().find("> .sub-menu").slideToggle(200),$(this).find(".fa").toggleClass("fa-chevron-up fa-chevron-down")})})}),$.fn.uouCheckboxInput=function(){var e=$(this),a=e.find("input");a.is(":checked")?e.addClass("active"):e.removeClass("active"),a.change(function(){a.is(":checked")?e.addClass("active"):e.removeClass("active")})},$(".header-language").each(function(){var e=$(this),t=e.find(".header-nav"),i=e.find(".header-btn");e.hover(function(){a>991&&(e.find(".header-btn").addClass("hover"),e.find(".header-nav").show(),e.find(".header-nav ul").stop(!0,!0).slideDown(200))},function(){a>991&&(e.find(".header-btn").removeClass("hover"),e.find(".header-nav ul").stop(!0,!0).delay(10).slideUp(200,function(){e.find(".header-nav").hide()}))}),i.click(function(){991>=a&&(e.find(".header-btn").toggleClass("hover"),t.stop(!0,!0).slideToggle(200))})}),$("#banner .banner-bg").each(function(){var e=$(this),a=e.find(".banner-bg-item");a.each(function(){var e=$(this).find("img");e.length>0&&($(this).css("background-image","url("+e.attr("src")+")"),e.hide())}),$.fn.owlCarousel&&e.owlCarousel({autoPlay:5e3,transitionStyle:"fade",slideSpeed:400,pagination:!0,navigation:!0,paginationSpeed:800,singleItem:!0,navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],addClassActive:!0,afterMove:function(){var a=e.find(".owl-item.active").index();$(".banner-search-inner .tab-title:eq("+a+")").trigger("click")}});var t=$(".banner-bg-item.active, .banner-search-inner .tab-title.active").index();0!==t&&e.trigger("owl.jumpTo",t)}),$(".banner-search-inner").each(function(){var e=$(this),a=e.find(".tab-title"),t=e.find(".tab-content");a.click(function(){if(!$(this).hasClass("active")){var e=$(this).index();a.filter(".active").removeClass("active"),$(this).addClass("active"),t.filter(".active").hide().removeClass("active"),t.filter(":eq("+e+")").fadeToggle().addClass("active"),$.fn.owlCarousel&&$("#banner .banner-bg").trigger("owl.goTo",e)}})}),$("#map").gmap3({marker:{values:[{address:"Viale Carlo Felice, 103, 00185 Roma RM",options:{icon:"http://www.google.com/mapfiles/marker.png"}}]},map:{options:{zoom:15,mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU},navigationControl:!0,scrollwheel:!0,streetViewControl:!0}}}),$("#location-map").gmap3({marker:{values:[{latLng:[41.88783,12.5109413,17],options:{icon:"http://www.google.com/mapfiles/marker.png"}}]},map:{options:{zoom:16,mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU},navigationControl:!1,scrollwheel:!1,streetViewControl:!0,styles:[{featureType:"all",elementType:"all",stylers:[{saturation:-800},{lightness:25},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]}}}),$("#contact-map").gmap3({marker:{values:[{latLng:[41.88783,12.5109413,17],options:{icon:"img/marker.png"}}]},map:{options:{zoom:6,mapTypeControl:!0,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU},navigationControl:!1,scrollwheel:!1,streetViewControl:!0,styles:[{featureType:"all",elementType:"all",stylers:[{saturation:-800},{lightness:25},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}]}}}),$(".contact-box, #contact-map").matchHeight(),$('a[data-toggle="tab"]').on("shown.bs.tab",function(){});var a=e();$(".select-box").each(function(){$(this).uouSelectBox()}),$(".toggle-container").each(function(){$(this).uouToggle()}),$(".checkbox-input").each(function(){$(this).uouCheckboxInput()}),$("#room .sidebar, #room .room-content").matchHeight(),$("#owl-testimonials").owlCarousel({slideSpeed:300,paginationSpeed:400,singleItem:!0}),$(".thumbnail-slider").owlCarousel({slideSpeed:300,paginationSpeed:400,singleItem:!0,navigation:!0,navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]}),$(".background-slider").owlCarousel({autoPlay:3e3,slideSpeed:300,transitionStyle:"fade",paginationSpeed:400,singleItem:!0,navigation:!0,navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]}),$(".background-slider .owl-item").each(function(){$(this).css("height",$(".header-slider .background-slider").height())}),$("#clients-slider").owlCarousel({items:5,navigation:!1,autoPlay:!0}),$(".background-slider").each(function(){var e=$(this),a=e.find(".owl-item");a.each(function(){var e=$(this).find("img");e.length>0&&($(this).css("background-image","url("+e.attr("src")+")"),e.hide())})}),$(".supertabs .tab-content").each(function(){var e=$(this),a=e.find(".tab-pane");a.each(function(){var e=$(this).find("img");e.length>0&&($(this).css("background-image","url("+e.attr("src")+")"),e.hide())})}),$(".supertabs .tab-content, .supertabs .tab-navigation ul, .supertabs .tab-pane").each(function(){$(this).css("height",$(".supertabs .tab-navigation").height())}),$(window).resize(function(){e()!==a&&(a=e(),$("#header").removeAttr("style"))})});var a=!1;e.on("touchmove",function(){a=!0}),e.on("touchstart",function(){a=!1})}(jQuery);