$(document).ready(function () {
	$('.main__slider').slick({
		infinite: true,
		speed: 500,
		autoplay: true,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: true,
		dots: true,
		cssEase: 'linear',
		slidesToShow: 1,
		slidesToScroll: 1,
		appendArrows: $('.slider__controls-btns'),
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
				},
			},
		],
	})

})
