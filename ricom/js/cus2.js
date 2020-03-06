jQuery(function($) {

	$('.datepicker').datepicker({
		dateFormat: 'yy-mm-dd'
	});

	$('.scroll-down-btn').click(function() {
		$('html, body').animate({
			scrollTop: $(document).scrollTop() + 600
		});

		return false;
	});

	$('.register__form').each(function() {
		$(this).find('.name-field').append('<i class="fas fa-user"></i>');
		$(this).find('.email-field').append('<i class="fas fa-envelope"></i>');
		$(this).find('.date-field').append('<i class="fas fa-calendar-alt"></i>');
		$(this).find('.persons-field').append('<i class="fas fa-users"></i>');
	});

	$('.filters__search input[type="checkbox"]').change(function() {
		$(this).closest('form').submit();
	});

	$('.go-back').click(function() {
		window.history.back();

		return false;
	});

	$('#car-rent-form').each(function() {
		var $form = $(this),
			$payment = $form.find('.payment');

		$form.change(function() {
			$.ajax({
				url: ajax.url,
				method: 'POST',
				data: {
					action: 'calculate_rent_total_price',
					car_id: $form.data('car-id'),
					pickup_date: $form.find('[name="pickup_date"]').val(),
					dropoff_date: $form.find('[name="dropoff_date"]').val(),
					to_address: +$form.find('[name="to_address"]').prop('checked'),
					gtrent_protect: +$form.find('[name="gtrent_protect"]').prop('checked')
				},
				success: function(total) {
					partial = total * +$form.data('partial-payment-percent') / 100;
					remainder = total - partial;

					$payment.find('.part .price').html( '&euro;' + Math.round( partial * 100) / 100 );
					$payment.find('.part .remainder').html( '&euro;' + Math.round( remainder * 100) / 100 );
					$payment.find('.full .price').html( '&euro;' + Math.round( total * 100) / 100 );
				}
			});
		}).change();
	});

	$('form.search_form').each(function() {
		var $form = $(this);

		$form.find('select[name="region"]').change(function() {
			$.ajax({
				url: ajax.url,
				data: {
					action: 'get_region_municipalities',
					region: $(this).val()
				},
				success: function(response) {
					var municipalities = $.parseJSON( response ),
						$municipalitySelect = $form.find('select[name="municipality"]');

					$municipalitySelect.children().not(':first').remove();

					$.each(municipalities, function(key, val) {
						$municipalitySelect.append('<option value="' + key + '">' + val + '</option>');
					});
				}
			});
		});
	});

	isotopeInit( $('.isotope .grid') );

	function isotopeInit($container) {
		var itemSelector = '.list_1__item';

		var $container = $container.isotope({
			itemSelector: itemSelector,
			masonry: {
			  columnWidth: itemSelector,
			  isFitWidth: true
			},
			getSortData: {
				'latest': '[data-timestamp] parseInt',
				'price': '[data-price] parseInt',
				'size': '[data-size] parseInt',
				'proximity-to-beach': '[data-proximity-to-beach] parseInt',
				'proximity-to-airport': '[data-proximity-to-airport] parseInt'
			},
			sortAscending: {
				'latest': false,
				'price': true,
				'size': false,
				'proximity-to-beach': true,
				'proximity-to-airport': true
			}
		});

		var responsiveIsotope = [
			[200, 1]
		];

		var itemsPerPageDefault = 5;
		var itemsPerPage = defineItemsPerPage();
		var currentNumberPages = 1;
		var currentPage = 1;
		var currentSortBy = 'latest';
		var sortAttribute = 'data-sort-by';
		var pageAtribute = 'data-page';
		var pagerClass = 'pagination';

		function changeSortBy(selector) {
			$container.isotope({
				filter: '',
				sortBy: currentSortBy
			});

			setPagination();

			$container.isotope({
				filter: selector,
				sortBy: currentSortBy
			});

			$(selector).siblings().removeClass('active');
			$(selector).addClass('active');
		}

		function goToPage(n) {
			currentPage = n;

			var selector = itemSelector;

			selector += '['+pageAtribute+'="'+currentPage+'"]';

			changeSortBy(selector);

			$('.' + pagerClass).find('a').removeClass('active');
			$('.' + pagerClass).find('[data-page="' + currentPage + '"]').addClass('active');

			$('.' + pagerClass).find('.prev').toggleClass( 'hidden', currentPage == 1 );
			$('.' + pagerClass).find('.next').toggleClass( 'hidden', currentPage == currentNumberPages );
		}

		function defineItemsPerPage() {
			var pages = itemsPerPageDefault;

			for( var i = 0; i < responsiveIsotope.length; i++ ) {
				if( $(window).width() <= responsiveIsotope[i][0] ) {
					pages = responsiveIsotope[i][1];
					break;
				}
			}

			return pages;
		}

		function animateToIsotopeTop() {
			$('html, body').animate({
				scrollTop: $('.isotope').offset().top - 100
			});
		}

		function setPagination() {
			var SettingsPagesOnItems = function(){
				var itemsLength = $container.children(itemSelector).length;

				var pages = Math.ceil(itemsLength / itemsPerPage);
				var item = 1;
				var page = 1;
				var selector = itemSelector;

				var gridItems = $container.isotope('getFilteredItemElements');

				$.each( gridItems, function(key, gridItem){
					if( item > itemsPerPage ) {
						page++;
						item = 1;
					}

					$(gridItem).attr(pageAtribute, page);

					item++;
				});

				currentNumberPages = page;
			}();

			var CreatePagers = function() {

				var $isotopePager = ( $('.'+pagerClass).length == 0 ) ? $('<div class="'+pagerClass+'"></div>') : $('.'+pagerClass);

				$isotopePager.html('');

				for( var i = 0; i < currentNumberPages; i++ ) {
					var $pager = $('<a href="#" '+pageAtribute+'="'+(i+1)+'" class="page"></a>');

					$pager.html(i + 1);

					$pager.click(function(){
						var page = $(this).eq(0).attr(pageAtribute);

						animateToIsotopeTop();

						setTimeout(function() {
							goToPage(page);
						}, 400);

						return false;
					});

					$pager.appendTo($isotopePager);
				}

				var $prev = $('<a href="#" class="prev">&#8592; prev</a>'),
					$next = $('<a href="#" class="next">next &#8594;</a>');

				$isotopePager.prepend( $prev );
				$isotopePager.append( $next );

				$prev.click(function() {
					animateToIsotopeTop();

					setTimeout(function() {
						goToPage( +currentPage - 1 );
					}, 400);

					return false;
				});

				$next.click(function() {
					animateToIsotopeTop();

					setTimeout(function() {
						goToPage( +currentPage + 1 );
					}, 400);

					return false;
				});

				$container.after($isotopePager);
			}();
		}

		setPagination();
		goToPage(1);

		$('.sort a').click(function() {
			var sortBy = $(this).attr(sortAttribute);

			currentSortBy = sortBy;

			$(this).closest('.sort').find('li.active').removeClass('active');
			$(this).parent().addClass('active');

			setPagination();
			goToPage(1);

			return false;
		});

		// $(window).resize(function(){
		// 	itemsPerPage = defineItemsPerPage();

		// 	setPagination();
		// 	goToPage(1);
		// });
	}

});