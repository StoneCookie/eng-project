$(function () {
	$('.burger').on('click', function () {
		$(this).toggleClass('on');
		$('.header__nav').toggleClass('on')
		$('.scrollbar').css('overflow', function (index, value) {
			if (value !== 'hidden')
				return 'hidden';
			else
				return 'auto';
		});
	});
	$('.search__btn').on('click', function () {
		$('.search').toggleClass('search_active')
	});

	// При клике на кнопку входа
	$('.account__link:first-of-type').on('click', function () {
		$('.nav-item:first-child .nav-link').addClass('active') // show active
		$('.tab-pane:first-child').addClass('show').addClass('active')
	});

	// При клике на кнопку регистрации
	$('.account__link:last-of-type').on('click', function () {
		$('.nav-item:nth-child(2) .nav-link').addClass('active')
		$('.tab-pane:last-child').addClass('show active')
	});
	$('.close').on('click', function () {
		if ($('.modal-dialog').css('display', 'block')) {
			$('.nav-item .nav-link').removeClass('active')
			$('.tab-pane').removeClass('show active')
		}
	});

});