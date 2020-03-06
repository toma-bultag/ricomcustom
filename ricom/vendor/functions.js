;(function($, window, document, undefined) {
	var $win = $(window);
	var $doc = $(document);

	$doc.ready(function() {
		$('.slider-main').on('init afterChange', function(event, slick, currentSlide, nextSlide){
			var $imageSrcNext = $(this).find('.slick-current.slick-active').next().find('img').attr('src');
			var $textNext = $(this).find('.slick-current.slick-active').next().find('img').attr('alt');

			var $imageSrcPrev = $(this).find('.slick-current.slick-active').prev().find('img').attr('src');
			var $textPrev = $(this).find('.slick-current.slick-active').prev().find('img').attr('alt');

			$('.slider-main .slick-next').css('background-image', 'url(' + $imageSrcNext + ')').html($textNext);
			$('.slider-main .slick-prev').css('background-image', 'url(' + $imageSrcPrev + ')').html($textPrev);
		});

		$('.slider-main').slick({
			dots: false,
			adaptiveHeight: true,
			cssEase: 'ease-in-out',
			responsive: [
			{
				breakpoint: 767,
				settings: {
					dots: true
				}
			}
			]
		});

		$('.slider-destination').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 3
		});

		// Disable page scroll when navigation is opened on mobile
		$('#navbarSupportedContent').on('show.bs.collapse', function () {
  			$('html').addClass('no-scroll')
  		})

  		$('#navbarSupportedContent').on('hidden.bs.collapse', function () {
  			$('html').removeClass('no-scroll')
  		})


		/*
		const $dropdown = $(".dropdown");
		const $dropdownToggle = $(".dropdown-toggle");
		const $dropdownMenu = $(".dropdown-menu");
		const showClass = "show";
 
		$(window).on("load resize", function() {
		  if (this.matchMedia("(min-width: 991px)").matches) {
		    $dropdown.hover(
		      function() {
		        const $this = $(this);
		        $this.addClass(showClass);
		        $this.find($dropdownToggle).attr("aria-expanded", "true");
		        $this.find($dropdownMenu).addClass(showClass);
		      },
		      function() {
		        const $this = $(this);
		        $this.removeClass(showClass);
		        $this.find($dropdownToggle).attr("aria-expanded", "false");
		        $this.find($dropdownMenu).removeClass(showClass);
		      }
		    );
		  } else {
		    $dropdown.off("mouseenter mouseleave");
		  }
		});
		*/
	});
})(jQuery, window, document);
