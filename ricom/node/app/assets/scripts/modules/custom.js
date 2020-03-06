jQuery(document).ready(function( $ ) {
  $(document).ready(function(){
    $('.main-carousel').flickity({
      wraparound: false,
      autoPlay: true,
      // pauseAutoPlayOnHover: false,
      // lazyLoad: 1,
      pageDots: true,
      prevNextButtons: false
    });
  });

  $('.slider .shell').flickity({
       // options
       cellAlign: 'left',
       contain: true,
       wraparound: true,
       autoPlay: 5500,
       // pauseAutoPlayOnHover: false,
       lazyLoad: 1,
       pageDots: false,
       prevNextButtons: false,
       // wraparound: true
     });

  $('.slider_2 .shell').flickity({
       // options
       cellAlign: 'left',
       contain: true,
       wraparound: true,
       autoPlay: 5000,
       // pauseAutoPlayOnHover: false,
       pageDots: false,
       prevNextButtons: true,
       // wraparound: true
       selectedAttraction: 0.01,
       friction: 0.15
     });

  $('.product_slider__top').flickity({
       // options
       cellAlign: 'left',
       contain: true,
       wraparound: true,
       autoPlay: 5500,
       pageDots: false,
       prevNextButtons: true,
     });

  $('.product_slider__nav').flickity({
    asNavFor: '.product_slider__top',
    contain: true,
    pageDots: false,
    pageDots: false,
    prevNextButtons: false,
    cellAlign: 'left',
  });

  $(".menu").click(function(){
     $( ".isotope .holder" ).toggleClass( "holder--expanded" );
   })

  // asNavFor can be set a selector string
  asNavFor: '.carousel-main'
  // or an element
  asNavFor: $('.carousel-main')[0]
  asNavFor: document.querySelector('.carousel-main')
  
  //nav
  $(".b").click(function () {
        $('body').toggleClass("ext");
        $('.back').toggleClass("back--vis");
        $('.h__logo').toggleClass("h__logo--ext");
    });

    $(".back").click(function () {
        $('body').removeClass("ext");
        $('.back').removeClass("back--vis");
        $('.h__logo').removeClass("h__logo--ext");
    });


  //Dropdown menu
  $( ".nav--mobile .menu-item-has-children a" ).click(function( event ) {
    event.preventDefault();
  });

  $( ".menu-item-has-children" ).append( '<span class="triger">+</span>' );
  
  $(".triger").click(function () {
      $(this).parent().toggleClass("menu-item-has-children--expanded");

      if ( $( this ).parent().hasClass( "menu-item-has-children--expanded" ) ) {
              $( this ).text('-');
       }

      if ( !$( this ).parent().hasClass( "menu-item-has-children--expanded" ) ) {
              $( this ).text('+');
       }
  });

  $(".menu-item-has-children>a").click(function () {
      $(this).parent().toggleClass("menu-item-has-children--expanded");  
  });

  $(".trigger").click(function () {
      $(this).toggleClass("trigger--open");  
      $('.menu').toggleClass("open"); 
      $('.h__menu').toggleClass("open"); 
  });
  

  $(".nav-trigger__menu").click(function () {
      $('.header').toggleClass("header--expanded");
  });

  $(".h__close").click(function(){
     $( ".h" ).toggleClass( "closed" );
   });

  $(".categories a span").click(function(){
     $(this).parent().parent().children('.sub-menu').toggleClass( "open" );
   });

  $(".categories .sub-menu span").click(function( event ) {
  event.preventDefault();
  $(this).parent().parent().parent().toggleClass( "open" );
   });

  //gallery
  $('.gallery').magnificPopup({
      type: 'image',
      delegate: 'a',
       gallery:{
         enabled:true
       }
    });

  $('.product_slider__top').magnificPopup({
      type: 'image',
      delegate: 'a',
       gallery:{
         enabled:true
       }
    });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,

      fixedContentPos: false
    });

  //smooth scroll
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });

    $( ".nolink" ).click(function( event ) {
      event.preventDefault();
     
    });
    
    $(".plus").click(function(){
      $( this ).parent().toggleClass( "open" );
    });
 });


