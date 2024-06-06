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
