$(document).ready(function () {
	var borderTop = $('header').css('border-top-width').replace('px', '')
	$(window).scroll(function (event) {
		var body = $('body').scrollTop()
		if (body == 0) {
			var body = $('html').scrollTop()
		}
		var top = $('.page').offset().top + Number(borderTop)
		if (body > top) {
			$('header').addClass('fixed')
			$('header').addClass('border-t-0')
			$('header').addClass('bg-white/90')
			
			$('header').removeClass('absolute')
			$('header').removeClass('border-t-[32px]')
			
			
		} else {
			$('header').removeClass('fixed')
			$('header').removeClass('border-t-0')
			$('header').removeClass('bg-white/90')
	
			$('header').addClass('absolute')
			$('header').addClass('border-t-[32px]')
		
			
		}
	})
})

jQuery(document).ready(function () {
	var e = document.querySelectorAll('.form-phone')
	jQuery(e).inputmask({
		mask: ['+7 (999) 999 99 99', '8 (999) 999 99 99'],
		greedy: !1,
		placeholder: '_',
	})
})

// set the modal menu element
const $targetEl = document.getElementById('callback-modal')

// options with default values
const options = {
	placement: 'bottom-right',
	backdrop: 'dynamic',
	backdropClasses: 'bg-gray_500/50  fixed inset-0 z-40',
	closable: true,
	onHide: () => {
		console.log('modal is hidden')
	},
	onShow: () => {
		console.log('modal is shown')
	},
	onToggle: () => {
		console.log('modal has been toggled')
	},
}

// instance options object
const instanceOptions = {
	id: 'callback-modal',
	override: true,
}

$(document).ready(function () {
	$('.branding__slider').slick({
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: true,
		cssEase: 'linear',
		slidesToShow: 2,
		slidesToScroll: 1,
		appendArrows: $('.slider__controls-btns'),
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
	$('.development__slider').slick({
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: true,
		cssEase: 'linear',
		slidesToShow: 2,
		slidesToScroll: 1,
		appendArrows: $('.slider__controls-btns'),
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
	$('.promotion__slider').slick({
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: true,
		cssEase: 'linear',
		slidesToShow: 2,
		slidesToScroll: 1,
		appendArrows: $('.slider__controls-btns'),
		responsive: [
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
	$('.sale__slider').slick({
		infinite: true,
		speed: 500,
		autoplay: false,
		autoplaySpeed: 5000,
		swipe: true,
		arrows: true,
		cssEase: 'linear',
		slidesToShow: 3,
		slidesToScroll: 1,
		appendArrows: $('.sale-slider__controls-btns'),
		responsive: [
			{
				breakpoint: 900,
				settings: {
					slidesToShow: 2,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
	$('.reviews__slider').slick({
		infinite: true,
		speed: 2000,
		autoplay: true,
		autoplaySpeed: 0,
		swipe: true,
		arrows: true,
		pauseOnHover: false,
		cssEase: 'linear',
		slidesToShow: 5,
		slidesToScroll: 1,
		appendArrows: $('.reviews-slider__controls-btns'),
		responsive: [
			{
				breakpoint: 1500,
				settings: {
					slidesToShow: 4,
				},
			},
			{
				breakpoint: 1100,
				settings: {
					slidesToShow: 3,
				},
			},
			{
				breakpoint: 900,
				settings: {
					slidesToShow: 2,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
	$('.instrument__slider').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 2000,
		cssEase: 'linear',
		infinite: true,
		arrows: false,
		centerMode: true,
		centerPadding: '15',
		pauseOnHover: false,
		rows: 2,
		responsive: [
			{
				breakpoint: 1100,
				settings: {
					slidesToShow: 4,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
				},
			},
		],
	})
	$('.result__slider').slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 2000,
		cssEase: 'linear',
		infinite: true,
		arrows: false,
		centerMode: true,
		centerPadding: '20',
		pauseOnHover: false,
		rows: 2,
		responsive: [
			{
				breakpoint: 1100,
				settings: {
					slidesToShow: 2,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
				},
			},
		],
	})
	$('.services__slider1').slick({
		slidesToShow: 2,
		slidesToScroll: 2,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 5000,
		cssEase: 'linear',
		vertical: true, // Вертикальная ориентация для первого слайдера
		verticalSwiping: true,
		infinite: true,
		arrows: false,
		centerMode: true,
		centerPadding: '0',
		pauseOnHover: false,
		verticalReverse: true,
	})

	$('.services__slider2').slick({
		slidesToShow: 2,
		slidesToScroll: 2,
		autoplay: true,
		autoplaySpeed: 0,
		speed: 5000,
		cssEase: 'linear',
		vertical: true, // Вертикальная ориентация для второго слайдера
		verticalSwiping: false,
		infinite: true,
		arrows: false,
		centerMode: true,
		centerPadding: '0',
		pauseOnHover: false, // Прокрутка не останавливается при наведении
	})
})
