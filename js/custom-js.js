
//Page Loader
jQuery(window).load(function(){

	$(".loader").fadeOut("slow");

});




jQuery(function($) {'use strict',

	
	
 //For Dropdown Hovers
   $('.dropdown').hover(
		function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
		}, 
		function() {
		  $(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp();
		}
   );
    $('.dropdown-menu').hover(
      function() {
        $(this).stop(true, true);
      },
      function() {
        $(this).stop(true, true).delay(200).slideUp();
      }
    );
		
		
 //Check to see if the window is top if not then display button
	  var offset =650;
	  var duration = 300;
	  $(window).scroll(function() {
		  if ($(this).scrollTop() > offset) {
			  $('.back-to-top').fadeIn(200);
		  } else {
			  $('.back-to-top').fadeOut(200);
		  }
	  });
	  $('.back-to-top').on("click",function(event) {
		  event.preventDefault();
		  $('html, body').animate({scrollTop: 0}, 500);
		  return false;
	  });

		
	  
	  
	    //Timer count
$(".number-counters").appear(function () {
	$(".number-counters [data-to]").each(function () {
		var e = $(this).attr("data-to");
		$(this).delay(6e3).countTo({
			from: 50,
			to: e,
			speed: 3e3,
			refreshInterval: 50
		})
	})

});

				
//services slider
      var sync1 = $("#services1");
      var sync2 = $("#services2");
     
      sync1.owlCarousel({
        singleItem : true,
        slideSpeed : 1000,
		autoPlay: true,
        navigation: false,
        pagination: false,
        afterAction : syncPosition,
        responsiveRefreshRate : 200,
      });
     
      sync2.owlCarousel({
        items :6,
        itemsDesktop      : [1199,10],
        itemsDesktopSmall     : [979,10],
        itemsTablet       : [768,8],
        itemsMobile       : [479,4],
        pagination:false,
        responsiveRefreshRate : 100,
        afterInit : function(el){
          el.find(".owl-item").eq(0).addClass("synced");
        }
      });
     
      function syncPosition(el){
        var current = this.currentItem;
        $("#services2")
          .find(".owl-item")
          .removeClass("synced")
          .eq(current)
          .addClass("synced")
        if($("#services2").data("owlCarousel") !== undefined){
          center(current)
        }
      }
     
      $("#services2").on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo",number);
      });
     
      function center(number){
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for(var i in sync2visible){
          if(num === sync2visible[i]){
            var found = true;
          }
        }
     
        if(found===false){
          if(num>sync2visible[sync2visible.length-1]){
            sync2.trigger("owl.goTo", num - sync2visible.length+2)
          }else{
            if(num - 1 === -1){
              num = 0;
            }
            sync2.trigger("owl.goTo", num);
          }
        } else if(num === sync2visible[sync2visible.length-1]){
          sync2.trigger("owl.goTo", sync2visible[1])
        } else if(num === sync2visible[0]){
          sync2.trigger("owl.goTo", num-1)
        }
        
      }
     


	
// ------- Sliders-------
 //#main-slider
  $('#main-slider.carousel').carousel({
	  interval: 8000,
	  singleItem : true,
	  transitionStyle : "fade"
  });
  
  
//Staff Slider
	$("#staff-slider").owlCarousel({
   
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		items : 4,
		itemsDesktop : [1199,3],
		itemsDesktopSmall : [979,3]
   
	});
     

  		
	//Client Testinomial Slider
	$("#testinomial-slider").owlCarousel({
		autoPlay:3000,
		navigation : false, // Show next and prev buttons
		slideSpeed : 300,
		pagination : false,
		singleItem: true,
	  
  });
	  
	  
	//About us  slider on about us apge Slider
	$("#about-slider").owlCarousel({
	  autoPlay:3000,
	  navigation : true, // Show next and prev buttons
	  slideSpeed : 300,
	  pagination : false,
	  singleItem: true,
	  navigationText: [
		"<i class='fa fa-angle-double-left'></i>",
		"<i class='fa fa-angle-double-right'></i>"],
		 
  });
  
  
  $('#sl2').slider();

	
		
/**** Animated images up Featured Items ***/
  $(function () {
	if (Modernizr.touch) {
		// handle the adding of hover class when clicked
		$(".img-items").on('click', function () {
			if (!$(this).hasClass("hover")) {
				$(this).addClass("hover");
			}
		});
  
	  } else {
		// handle the mouseenter functionality
		$(".img-items").mouseenter(function () {
			$(this).addClass("hover");
		})
		// handle the mouseleave functionality
		.mouseleave(function () {
			$(this).removeClass("hover");
		});
	  }
  });
  
  
  
  
  
  
	//Map 
	/*$('#us3').locationpicker({
		location: {latitude: 46.15242437752303, longitude: 2.7470703125},
		radius: 300,
		inputBinding: {
			latitudeInput: $('#us3-lat'),
			longitudeInput: $('#us3-lon'),
			radiusInput: $('#us3-radius'),
			locationNameInput: $('#us3-address')
		},
		enableAutocomplete: true,
		onchanged: function (currentLocation, radius, isMarkerDropped) {
			// Uncomment line below to show alert on each Location Changed event
			alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
		}
	});
*/
	
	//Initiat WOW JS
	new WOW().init();
	
	
	
	});
	
	
	
	
	
	