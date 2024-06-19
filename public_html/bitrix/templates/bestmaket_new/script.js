var maskPhone = '+7 (999) 999-99-99'
$(window).load(function () {
	$('.gm-style-iw').prev().hide()
})
$(document).ready(function () {
	$('.layouts-item ul li .display-all').click(function () {
		$(this)
			.toggleClass('rotate')

			.parents('ul')
			.find('li.none, li.show')
			.each(function () {
				$(this).slideToggle('slow')
				if ($(this).hasClass('show')) {
					$(this).removeClass('show').addClass('none')
				} else {
					$(this).removeClass('none').addClass('show')
				}
			})
		return false
	})

	$('.pseudo-select .select').live('click', function () {
		$(this).parent().addClass('active').find('.options').fadeIn('fast')
	})
	$('.pseudo-select .options').live('mouseleave', function () {
		$(this).parent().removeClass('active')
		$(this).fadeOut('fast')
	})
	$('.pseudo-select').live('mouseleave', function () {
		$(this).removeClass('active')
		$(this).find('.options').fadeOut('fast')
	})
	$('.pseudo-select .options > div').live('click', function () {
		//if ($(this).attr('value')) {
		$(this).closest('.pseudo-select').find('.select').html($(this).text())
		$(this)
			.closest('.pseudo-select')
			.find('input')
			.attr('value', $(this).attr('value'))
		//}
		$.each($(this).parent().children('div.check'), function () {
			$(this).removeClass('check')
		})
		$(this).addClass('check')
		$(this).parents('.pseudo-select').removeClass('active')
		$(this).parent().fadeOut('fast')
	})

	$('.header .open-menu').click(function () {
		$('.header .menu-mob').slideToggle()
		$('.header').toggleClass('open')
		$('body').toggleClass('no-scroll')

		var menuText = $(this).find('.text-uppercase')
		if (menuText.text() === 'МЕНЮ') {
			menuText.text('ЗАКРЫТЬ')
		} else {
			menuText.text('МЕНЮ')
		}

		return false
	})
	// Обработчик для кликов на элементы списка, содержащие подменю
	$('ul.menu-mob__list > li')
		.has('ul.submenu')
		.click(function (event) {
			// Проверяем, является ли целевой элемент ссылкой
			if (!$(event.target).is('a')) {
				event.preventDefault() // Предотвращаем переход по ссылке для других элементов
				$(this).children('ul.submenu').stop(true, true).slideToggle(300) // Переключаем видимость подменю с анимацией
				$(this).toggleClass('item-open') // Добавляем/удаляем класс open для li
			}
		})

	// Обработчик для кликов на ссылки внутри подменю
	$('ul.submenu a').click(function (event) {
		event.stopPropagation() // Останавливаем всплытие события, чтобы не срабатывал обработчик на li
	})

	// Обработчик для кликов на ссылки в элементах списка с подменю
	$('ul.menu-mob__list > li > a').click(function (event) {
		var $submenu = $(this).siblings('ul.submenu') // Находим подменю, если оно есть
		var $parentLi = $(this).parent() // Находим родительский элемент li

		if ($submenu.length > 0) {
			event.preventDefault() // Предотвращаем переход по ссылке, если у нее есть подменю

			// Проверяем, открыто ли подменю
			if ($parentLi.hasClass('item-open')) {
				// Если подменю открыто, разрешаем переход по ссылке
				window.location.href = $(this).attr('href')
			} else {
				// Закрываем все открытые подменю
				$('ul.menu-mob__list > li.item-open')
					.removeClass('item-open')
					.children('ul.submenu')
					.slideUp(300)

				// Открываем текущее подменю
				$submenu.stop(true, true).slideToggle(300) // Переключаем видимость подменю с анимацией
				$parentLi.toggleClass('item-open') // Добавляем/удаляем класс open для li
			}
		}
	})

	$('.fancy').fancybox({})

	$(
		'input[name=phone], input[placeholder="Телефон*"], input[placeholder="Телефон"], input[name="PROPERTY[1][0]"]'
	).inputmask(maskPhone)

	$('.ajax-form .form-submit').on('click', 'button', function () {
		var form = $(this).parents('form')
		var error = 0
		$(form)
			.find('.required')
			.each(function (i, elem) {
				var val = $(elem).val()
				if (val) {
					$(elem).parents('.form-item').find('.message').text('')
					$(elem).parents('.form-item').removeClass('error')
				} else {
					$(elem)
						.parents('.form-item')
						.find('.message')
						.text('является обязательным полем')
					$(elem).parents('.form-item').addClass('error')
					error = 1
				}
			})
		if (error) return false
	})

	$('.ajax-form').on('submit', 'form', function () {
		var id = $(this).parents('.ajax-form').addClass('loader').attr('id')
		var href = $(this).attr('href')

		var formId = $(this).data('id')
		if (!formId) formId = 'otherForm'

		$(this).css('opacity', '0.5')
		/*
		dataLayer.push({
			'event': 'formSubmit'
		});
		*/

		formData = new FormData($(this)[0])
		if ($(this).find('[type=file]').size()) {
			var uploadfile = $(this).find('[type=file]').val()
			var uploadname = $(this).find('[type=file]').attr('name')
			formData.append(uploadname, $(this).find('[type=file]')[0].files[0])
		}
		formData.append('iblock_submit', '1')

		$.ajax({
			type: 'POST',
			url: href,
			//data: $(this).serialize() + '&' + uploadname + '=' + uploadfile + '&iblock_submit=1',
			processData: false,
			contentType: false,
			data: formData,
			cache: false,
			success: function (msg) {
				var content = $('#' + id, msg).html()
				$('#' + id)
					.html(content)
					.removeClass('loader')
				dataLayer.push({
					event: 'SendForm',
					formId: formId,
				})
				var popup = $('#' + id + ' .alert', msg)
				if (popup.size()) {
					if ($('#' + id + ' .error-popup', msg).size()) {
						$.fancybox('<div class="popup-alert">' + popup.html() + '</div>')
					} else {
						location = '/thank.php'
						document.location.href = '/thank.php'
						location.replace('/thank.php')
						window.location.reload('/thank.php')
						document.location.replace('/thank.php')
					}
				}
			},
		})
		return false
	})

	$('textarea.inp-text').autoResize({
		animate: false,
		extraSpace: 0,
		limit: 86,
	})

	$('ul.tabs a').click(function () {
		var index = $(this)
			.parents('ul.tabs')
			.find('li')
			.removeClass('active')
			.index($(this).parent().addClass('active'))
		$(this)
			.parents('div.tabs')
			.find('.tab')
			.removeClass('active')
			.eq(index)
			.addClass('active')

		$('.slider').resize()

		return false
	})
	$('.accordion .title').click(function () {
		var item = this
		if (!$(this).parent().hasClass('active')) {
			$(this).parents('.accordion').find('li .content').slideUp(300)
			$(this)
				.parent()
				.find('.content')
				.slideDown(300, function () {
					$(item).parents('.accordion').find('li').removeClass('active')
					$(item).parent().addClass('active')
				})
		}
		return false
	})
	/*
	$('.portfolio-tile-list .portfolio-item .slides a').mousemove(function(Event) {
		var width = $(this).width();
		var widthProc = Math.round(Event.offsetX/width*100);
    var index = 1;
		if (widthProc > 80) {
			index = 4;
		} else if (widthProc > 60) {
			index = 3;
		} else if (widthProc > 40) {
			index = 2;
		} else if (widthProc > 20) {
			index = 1;
		} else {
			index = 0;
		} 
		$(this).parents('.portfolio-item').find('.flex-control-paging a').eq(index).click();
	});
	$('.portfolio-tile-list .portfolio-item .images-slide').flexslider({
		animation: "fade",
		directionNav: false,
    controlNav: true,
    slideshow: false,
    animationSpeed: 100
	});	
	*/

	$('.portfolio-item .hover span').mouseover(function () {
		var index = $(this)
			.parents('.hover')
			.find('span')
			.removeClass('active')
			.index($(this).addClass('active'))
		console.log(index)
		$(this)
			.parents('div.portfolio-item')
			.find('.slides li')
			.removeClass('active')
			.eq(index)
			.addClass('active')

		return false
	})

	$('.video-slider').flexslider({
		animation: 'slide',
		directionNav: false,
		controlNav: true,
		slideshow: false,
	})

	$('.right-slider').flexslider({
		animation: 'fade',
		directionNav: false,
		controlNav: true,
		slideshow: false,
	})

	$('.clients-slider').flexslider({
		animation: 'slide',
		directionNav: false,
		controlNav: true,
		slideshow: false,
	})

	$('.slider').flexslider({
		animation: 'slide',
		directionNav: true,
		controlNav: true,
	})
	$('.slider-large').flexslider({
		animation: 'fade',
		directionNav: true,
		controlsContainer: $('.slider-large .controls .contaner'),
		controlNav: false,
	})
	$('.main-slider').flexslider({
		animation: 'slide',
		directionNav: true,
		controlsContainer: $('.main-slider .slider__controls-btns'),
		controlNav: true,
		touch: true,
	})

	const maxLength = 300 // Максимальная длина текста до обрезки
	const description = $('.desc-box')
	const originalText = description.html()
	const trimmedText =
		originalText.length > maxLength
			? originalText.substring(0, maxLength) + '...'
			: originalText

	function applyTextTrimming() {
		if ($(window).width() < 992) {
			if (originalText.length > maxLength) {
				description.html(trimmedText)
				$('.toggle-button').show().text('Показать еще')
			}
		} else {
			description.html(originalText)
			$('.toggle-button').hide()
		}
	}

	applyTextTrimming() // Применяем обрезку текста при загрузке страницы

	$(window).resize(function () {
		applyTextTrimming() // Применяем обрезку текста при изменении размера окна
	})

	$('.toggle-button').on('click', function () {
		if (description.hasClass('expanded')) {
			description.removeClass('expanded').html(trimmedText)
			$(this).text('Показать еще')
		} else {
			description.addClass('expanded').html(originalText)
			$(this).text('Скрыть')
		}
	})

	$('.file-upload input[type=file]').live('change', function () {
		var filename = $(this).val().replace(/.*\\/, '')
		if (!filename) filename = 'Прикрепить файл:'
		$(this).parent().find('.text-label').text(filename)
		$(this).parents('.file-upload').parent().find('.filename').val(filename)
	})
$(window).scroll(function (event) {
	var body = $('body').scrollTop()
	if (body == 0) {
		var body = $('html').scrollTop()
	}
	if (body > 0) {
		$('.header').addClass('fixed')
	} else {
		$('.header').removeClass('fixed')
	}
})
	/*
	$('.menu a').click(function() {
		var href = $(this).attr('href');
		var top = $(href).offset().top-100;
		$('html, body').animate({ scrollTop: top }, 600);

		return false;
	});


	
	$('input[name=phone]').inputmask("+7(999)999-99-99");

	$('#page4 .slider').flexslider({
		animation: "fade",
		directionNav: false,
    controlNav: true
	});
	
	$('.large-slider').flexslider({
		animation: "slide",
		directionNav: true,
    controlNav: false
	});
	
	
	var heightPage = $(window).height()-$('.header').height();
	$('#page7').css({
		'height': heightPage + 'px',
		'min-height': heightPage + 'px',
	});
	
	var width = $(window).width();
	var height = $(window).height();
	$('#test').text(width + 'x' + height);
	   
	$(window).resize(function() {
		width = $(window).width();
		height = $(window).height();
		$('#test').text(width + 'x' + height);
		
		heightPage = $(window).height()-$('.header').height();
		$('#page7').css({
			'height': heightPage + 'px',
			'min-height': heightPage + 'px',
		});
	});
	
	var position = $('.header .menu').offset();
	$(window).scroll(function(event){
		var body = $('body').scrollTop();
		if (body == 0) {
			var body = $('html').scrollTop();
		}

		
		
		if (body > 0) {
			$('.header').addClass('fixed');
		}	else
			$('.header').removeClass('fixed');
			
		heightPage = $(window).height()-$('.header').height();
		$('#page7').css({
			'height': heightPage + 'px',
			'min-height': heightPage + 'px',
		});
		
		var id;
		$('.page').each(function(i,elem) {
		 	var top = $(elem).offset().top;
		 	if (top < body+200)
		 		id = $(elem).attr('id');


		
		});
		$('.menu li').removeClass('active');
		$('.menu li.' + id).addClass('active');
	});	
*/

	;(function ($) {
		var $dragMe = $('.dragme'),
			$container = $('.sl-container'),
			$viewAfter = $('.view-after')
		$dragMe.draggable({
			containment: 'parent',
			drag: function () {
				$viewAfter.css({
					width: parseFloat($(this).css('left')) + 5,
				})
			},
		})
		$container.on('click', function (event) {
			var eventLeft = event.pageX - $container.offset().left - 15
			animateTo(eventLeft)
		})
		animateTo('50%')
		function animateTo(_left) {
			$dragMe.animate(
				{
					left: _left,
				},
				'slow',
				'linear'
			)
			$viewAfter.animate(
				{
					width: _left,
				},
				'slow',
				'linear'
			)
		}
	})(jQuery)
})
