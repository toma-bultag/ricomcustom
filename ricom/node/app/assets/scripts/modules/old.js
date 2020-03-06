

jQuery(document).ready(function( $ ) {
	
    $( ".burger" ).click(function() {
        $( ".header-7__nav" ).toggleClass( "expanded" );
    });

    $( ".menu-item-has-children" ).click(function() {
        $( ".menu-item-has-children .sub-menu" ).toggleClass( "expanded" );
    });

    $( ".nav-trigger" ).click(function() {
        $( ".header-9" ).toggleClass( "visible" );
    });

    //home popup

     $( ".contact-us__item.phone" ).click(function() {
        $( ".contact-us__popup.phone" ).addClass( "visible" );
        $( ".contact-us" ).addClass( "visible" );
    });

     $( ".contact-us__item.mail" ).click(function() {
        $( ".contact-us__popup.mail" ).addClass( "visible" );
        $( ".contact-us" ).addClass( "visible" );
    });

     $( ".contact-us__item.address" ).click(function() {
        $( ".contact-us__popup.address" ).addClass( "visible" );
        $( ".contact-us" ).addClass( "visible" );
    });

     $( ".close" ).click(function() {
        $( ".contact-us__popup" ).removeClass( "visible" );
        $( ".contact-us" ).removeClass( "visible" );
    });


//Flicky


	//Show more and show less text
	// Configure/customize these variables.
    var showChar = 77;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Научи повече.";
    var lesstext = "Скрий.";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    }); 

    //Open & close checkout
    //Open checkout
  $(function() {                      
	  $(".cart").click(function() {  
	    $(".checkout").addClass("checkout--open");      
	  });
	});	
    //Close terms  
   $(function() {                      
    $(".checkout__close").click(function() {  
      $(".terms").removeClass("checkout--open");      
    });
  }); 
  //Checkout item
  $('.checkout-toggle').on('click', function(e) {
      $(this).toggleClass("extended"); 
      $(this).closest(".checkout-item").toggleClass("extended"); 
      e.preventDefault();
    });
  $('.product__addons').on('click', function(e) {
      $(".product__main-addons").toggleClass("product__main-addons--visible"); 
      e.preventDefault();
    });

  //print
  $('.js-print-link').on('click', function() {
  var printBlock = $(this).parents('.single-apartment-content').siblings('.single-apartment-content');
  printBlock.hide();
  window.print();
  printBlock.show();
});


//alert at scroll

$(window).scroll(function() {

clearTimeout($.data(this, 'scrollTimer'));
        $.data(this, 'scrollTimer', setTimeout(function() {
            var eTop = $('section#gallery').offset().top;
            if(eTop - ($(window).scrollTop()+$(window).height()) < 0) {
                $( ".ap-1__nav a" ).removeClass( "active" );
                $( "#gallery-link" ).addClass( "active" );

            }

            var eTop = $('section#contact-1').offset().top;
            if(eTop - ($(window).scrollTop()+$(window).height()) < 0) {
                $( ".ap-1__nav a" ).removeClass( "active" );
                $( "#contact-1-link" ).addClass( "active" );

            }

            var eTop = $('section#view').offset().top;
            if(eTop - ($(window).scrollTop()+$(window).height()) < 0) {
                $( ".ap-1__nav a" ).removeClass( "active" );
                $( "#view-link" ).addClass( "active" );

            }

             var eTop = $('section#ap-1__top').offset().top;
            if(eTop - ($(window).scrollTop()+$(window).height()) < 0) {
                $( ".ap-1__nav a" ).removeClass( "active" );
                $( "#ap-1__top-link" ).addClass( "active" );

            }

             var eTop = $('section#ap-1__similar').offset().top;
            if(eTop - ($(window).scrollTop()+$(window).height()) < 0) {
                $( ".ap-1__nav a" ).removeClass( "active" );
                $( "#ap-1__similar-link" ).addClass( "active" );

            }

            var eTop = $('section#contact-1').offset().top;
            if(eTop - ($(window).scrollTop()+$(window).height()) < 0) {
                $( ".ap-1__nav a" ).removeClass( "active" );
                $( "#contact-1-link" ).addClass( "active" );

            }
        }, 250));
});

});
