jQuery(document).ready(function( $ ) {

	var lastScrollTop = 0;
	$(window).scroll(function(event){
	   var st = $(this).scrollTop();
	   if (st > lastScrollTop){
	       $('.header').addClass( "header--scroll" );
	       $('.header2').addClass( "header2--scroll" );
	       $('.main').addClass( "main--scroll" );
	       $('.header2__links .btn:first-child').addClass( "btn--dark" );
	       $('.header2__links .btn:nth-child(2)').removeClass( "btn--dark" );

	   } else {
	      $('.header').removeClass( "header--scroll" );
	      $('.header2').removeClass( "header2--scroll" );
	      $('.main').removeClass( "main--scroll" );
	      $('.header2__links .btn:first-child').removeClass( "btn--dark" );
	      $('.header2__links .btn:nth-child(2)').addClass( "btn--dark" );
	   }
	   lastScrollTop = st;
	});	

	function h(trigger) {
		  $('body').waypoint(function(direction)  {
		  	 if (direction === 'down'){
		  	 	$('.h__bottom').addClass( "h__bottom--sticky" );
		  	 	$('.h__top').addClass( "h__top--sticky" );
		  	 	$('.h').addClass( "h--sticky" );
		  	 }	    
		  }, 
		  {offset: '-150'},
		  );

		  $('body').waypoint(function(direction)  {
		  	 if (direction === 'up'){
		  	 	// $('.header').removeClass( "header--scroll" );
		  	 	$('.h__bottom').removeClass( "h__bottom--sticky" );
		  	 	$('.h__top').removeClass( "h__top--sticky" );
		  	 	$('.h').removeClass( "h--sticky" );
		  	 }	    
		  }, 
		  {offset: '-150'},
		  );

		  $('body').waypoint(function(direction)  {
		  	 if (direction === 'down'){
		  	 	$('.h__bottom').addClass( "h__bottom--sticky_2" );
		  	 }	    
		  }, 
		  {offset: '-200'},
		  );

		  $('body').waypoint(function(direction)  {
		  	 if (direction === 'up'){
		  	 	// $('.header').removeClass( "header--scroll" );
		  	 	$('.h__bottom').removeClass( "h__bottom--sticky_2" );
		  	 }	    
		  }, 
		  {offset: '-200'},
		  );
	}
	h();	
 });



