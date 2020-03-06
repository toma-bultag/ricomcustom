jQuery(document).ready(function( $ ) {
	 //alert("Alert in intro.");
	  //Az sym toma

jQuery(function ($) {
        var checkList = $('.dropdown-check-list');
        checkList.on('click', 'span.anchor', function(event){
            var element = $(this).parent();

            if ( element.hasClass('visible') )
            {
                element.removeClass('visible');
            }
            else
            {
                element.addClass('visible');             
            }

        });

    });



/*
		    $(document).ready(function () {
		        $(this).click(function (e) {
		            var element1 = $(e.target);
					var myClasses = element1.classList;

					if (!element1.parent().parent().hasClass('visible') 
						&& !element1.parent().parent().parent().hasClass('visible')) {
						alert("u clicked outside dropdown");
					}
		        });
		    });
*/
/*
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
*/
 });

jQuery(document).ready(function( $ ) {
    alert("asdasda");

 });

jQuery(document).ready(function( $ ) {
    $('.js-multiple').select2({
      closeOnSelect: false,
      placeholder: "Всички"
    }); 

 });


/*
    containerCss: { 'background-color': 'blue'}
*/