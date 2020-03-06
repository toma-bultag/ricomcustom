jQuery(function($) {

	$('.villa-datepicker').each(function() {
		var $datepicker = $(this),
			$input = $('.villa-datepicker-input');

		pickmeup('.villa-datepicker', {
			date: $input.val() ? $input.val().split(',') : [],
			default_date: false,
			format	: 'Y-m-d',
			mode: 'multiple',
			flat: true
		});

		$datepicker.on('pickmeup-change', function(e) {
			$input.val( e.detail.formatted_date );
		});
	});
});