jQuery(document).ready(function( $ ) {
	//  alert("Your book is overdue.");
	  //Az sym toma

  $(".menu-item-has-children").append("<span>></span>");
  
  $(".menu-item-has-children a").click(function(){
     $(this).siblings(".sub-menu").toggleClass( "opened" );
   });

  $(".sub-menu li:first-child").append("<span><</span>");

  $(".sub-menu li:first-child").click(function(){
  	$(this).parent().toggleClass( "opened" );
  });


  $(window).scroll(function(){
  	var scroll = $(window).scrollTop();

  	if (scroll >= 1000) {
  		$(".header").addClass("disappeared");
  	} else {
  		$(".header").removeClass("disappeared");
  	}

  	if (scroll >= 1500) {
  		$(".header").addClass("stickyHeader");
      if ($(window).width() < 1000) {
              $(".header__logo").addClass("noDisplay");
      }
  	} else {
  		$(".header").removeClass("stickyHeader");
      $(".header__logo").removeClass("noDisplay");
  	}

  });

 });