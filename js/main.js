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
		$('.header__nav').css('height', function (index) {
			let windowHeight = $(window).height();
			let scrollTop = $(window).scrollTop();
			let headerHeight =  $('header').outerHeight();
			let accountHeight =  $('.account').outerHeight();
			if (scrollTop < accountHeight)
				return windowHeight - headerHeight - accountHeight + scrollTop
			else
				return windowHeight - headerHeight
		});
	});
	$('a[href^="#"]').click(function () {
		let headerHeight = $('header').outerHeight();
		let target = $(this).attr('href');
		$('html, body').animate({
			scrollTop: $(target).offset().top - headerHeight - 20
		}, 500);
	});
	$('.search-wrap__btn').on('click', function () {
		$('.search').toggleClass('search_active')
	});

	// При клике на кнопку входа
	$('.account__link:first-of-type').on('click', function () {
		$('.nav-item:first-child .nav-link').addClass('active') // show active
		$('.tab-pane:first-child').addClass('show active')
	});

	// При клике на кнопку регистрации
	$('.account__link:last-of-type').on('click', function () {
		$('.nav-item:last-child .nav-link').addClass('active')
		$('.tab-pane:last-child').addClass('show active')
	});

	// При клике на кнопку редактирования
	$('.main-inner__btn:first-of-type').on('click', function () {
		$('.nav-item:first-child .nav-link').addClass('active')
		$('.tab-pane:first-child').addClass('show active')
	});

	// При клике на кнопку удаления
	$('.main-inner__btn:last-of-type').on('click', function () {
		$('.nav-item:last-child .nav-link').addClass('active')
		$('.tab-pane:last-child').addClass('show active')
	});

	// Убирает не нужные классы
	$('.close').on('click', function () {
		if ($('.modal-dialog').css('display', 'block')) {
			$('.nav-item .nav-link').removeClass('active')
			$('.tab-pane').removeClass('show active')
		}
	});
	$('.folow_anchor').on('click', function () {
		$('.folow_anchor').toggleClass('folow_active')
	})
});