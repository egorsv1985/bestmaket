<? if (defined("NOBOTTOMFORM") && NOBOTTOMFORM != 'Y') : ?>
	<div class="familiarity">
		<div class="title">
			Будем рады познакомиться с Вами
		</div>
		<p>
			Вы узнали немного о нашей команде,<br>
			расскажите и вы немного о своей задаче, напишите свой вопрос<br>
			или позвоните по телефонам указанным ниже
		</p>
	</div>
	<div class="footer-form">
		<div class="contaner">
			<div class="form-main">
				<? $APPLICATION->IncludeComponent(
					"tkk:infoportal.element.add.form",
					"form-large",
					array(
						"COMPONENT_TEMPLATE" => ".default",
						"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
						"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
						"CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
						"CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
						"CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
						"CUSTOM_TITLE_NAME" => "Ваше имя",	// * наименование *
						"CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
						"CUSTOM_TITLE_PREVIEW_TEXT" => "Сообщение",	// * текст анонса *
						"CUSTOM_TITLE_TAGS" => "",	// * теги *
						"DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
						"DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
						"ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
						"FORM_ID" => "bottomForm",
						"GROUPS" => array(	// Группы пользователей, имеющие право на добавление/редактирование
							0 => "2",
						),
						"IBLOCK_ID" => "2",	// Инфо-блок
						"IBLOCK_TYPE" => "system",	// Тип инфо-блока
						"LEVEL_LAST" => "Y",	// Разрешить добавление только на последний уровень рубрикатора
						"LIST_URL" => "",	// Страница со списком своих элементов
						"MAX_FILE_SIZE" => "0",	// Максимальный размер загружаемых файлов, байт (0 - не ограничивать)
						"MAX_LEVELS" => "100000",	// Ограничить кол-во рубрик, в которые можно добавлять элемент
						"MAX_USER_ENTRIES" => "100000",	// Ограничить кол-во элементов для одного пользователя
						"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования текста анонса
						"PROPERTY_CODES" => array(	// Свойства, выводимые на редактирование
							0 => "1",
							1 => "2",
							2 => "8",
							3 => "NAME",
							4 => "PREVIEW_TEXT",
						),
						"PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
							0 => "1",
							1 => "8",
							2 => "NAME",
						),
						"RESIZE_IMAGES" => "N",	// Использовать настройки инфоблока для обработки изображений
						"SEF_MODE" => "N",	// Включить поддержку ЧПУ
						"STATUS" => "ANY",	// Редактирование возможно
						"STATUS_NEW" => "N",	// Деактивировать элемент
						"USER_MESSAGE_ADD" => "",	// Сообщение об успешном добавлении
						"USER_MESSAGE_EDIT" => "",	// Сообщение об успешном сохранении
						"USE_CAPTCHA" => "N",	// Использовать CAPTCHA
					)
				); ?>
			</div>
		</div>
	</div>
<? endif; ?>
<div class="main-contants">
	<div class="contaner">
		<div class="large-title">
			Контакты
		</div>
		<div class="contact-block">
			<?
			$APPLICATION->IncludeFile("/includes/contact-left.php", array(), array(
				'NAME' => 'контакты',
				'MODE' => 'text'
			));
			?>
		</div>

		<div class="clear">
		</div>
	</div>
	<div class="maps">
		<script data-skip-moving="true" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7IG-mXqYnNwnQDFvhVi17zNT_zsTrBxY&callback=initMap" async defer></script>
		<script data-skip-moving="true">
			function initMap() {
				var styledMapType = new google.maps.StyledMapType(
					[{
							"featureType": "administrative.land_parcel",
							"stylers": [{
									"color": "#2c6fb3"
								},
								{
									"visibility": "simplified"
								}
							]
						},
						{
							"featureType": "landscape.man_made",
							"elementType": "geometry.fill",
							"stylers": [{
								"color": "#e6eff9"
							}]
						},
						{
							"featureType": "landscape.man_made",
							"elementType": "geometry.stroke",
							"stylers": [{
								"color": "#afcdec"
							}]
						},
						{
							"featureType": "poi.park",
							"elementType": "geometry.fill",
							"stylers": [{
								"color": "#c6dbf1"
							}]
						},
						{
							"featureType": "poi.park",
							"elementType": "labels.text.fill",
							"stylers": [{
								"color": "#2b6cae"
							}]
						},
						{
							"featureType": "water",
							"stylers": [{
								"color": "#bcd5ef"
							}]
						}
					], {
						name: 'Стиль'
					});


				var map1 = new google.maps.Map(document.getElementById('map1'), {
					center: {
						lat: 59.94821017035078,
						lng: 30.27223597015389
					},
					zoom: 17,
					mapTypeControlOptions: {
						mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain', 'styled_map']
					}
				});

				var coordinates = {
					lat: 59.94821017035078,
					lng: 30.27223597015389
				};
				var popupContent = '<p class="map-balloon">г.Санкт-Петербург,<br>7-ая линия В.О., д.78</p>';
				var imgMarker = '<?= SITE_TEMPLATE_PATH; ?>/images/marker.png';
				marker1 = new google.maps.Marker({
					position: coordinates,
					map: map1,
					icon: imgMarker,
				});
				infowindow1 = new google.maps.InfoWindow({
					content: popupContent
				});

				marker1.addListener('click', function() {
					infowindow1.open(map1, marker1);
				});







				map1.mapTypes.set('styled_map', styledMapType);
				map1.setMapTypeId('styled_map');
				
			}
		</script>
		<div class="left">
			<?
			$APPLICATION->IncludeFile("/includes/map-left.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'html',
				'SHOW_BORDER' => false
			));
			?>
		</div>

	</div>
	<!--
	<div class="bottom-btn">
		<div class="left">
			 Остались вопросы?
		</div>
		<div class="right">
 <a href="#askQuestion" class="fancy">Задайте нам вопрос</a>
		</div>
		<div class="clear">
		</div>
	</div>
	-->
</div>
<br>