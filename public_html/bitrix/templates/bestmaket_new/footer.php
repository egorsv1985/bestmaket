<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>

<? if (defined("ERROR_404") || $ERROR_404) : ?>
	</div>
	</div>
<? else : ?>
	<? if (PAGE == 'MAIN') : ?>
	<? elseif (PAGE == 'TEXT' || PAGE == 'CONTANER') : ?>
		<? if (PAGE == 'TEXT') : ?>
			</div>
			</div>
		<? endif; ?>
		</div>
		<? if (defined("MAP")) : ?>
			<div class="contaner">
				<div class="contact-text">
					<?
					$APPLICATION->IncludeFile($APPLICATION->GetCurPage() . "/contact-text.php", array(), array(
						'NAME' => 'текст',
						'MODE' => 'text'
					));
					?>
				</div>
				<div class="form-main contact">
					<? $APPLICATION->IncludeComponent(
						"tkk:infoportal.element.add.form",
						"form-large",
						array(
							"FORM_ID" => 'contactForm',
							"TITLE" => "Написать сообщение",
							"CONTACT" => "Y",
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
								2 => "NAME",
								3 => "PREVIEW_TEXT",
								4 => "8",
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
							"COMPONENT_TEMPLATE" => ".default"
						),
						false
					); ?>

				</div>
			</div>
			<div class="map <?= MAP; ?>">
				<?
				$APPLICATION->IncludeFile("/includes/map.php", array(), array(
					'NAME' => 'карту',
					'MODE' => 'php'
				));
				?>
			</div>
		<? else : ?>
			<?
			$APPLICATION->IncludeFile("/includes/footer.php", array(), array(
				'NAME' => 'футер',
				'MODE' => 'php',
				'SHOW_BORDER' => false
			));
			?>
		<? endif; ?>
	<? endif; ?>
	<section class="main-contacts mt-5 py-5">
		<div class="container">
			<div class="d-flex justify-content-between flex-column flex-lg-row">
				<div class="main-contacts__box">

					<div class="large-title fs-64">
						Контакты
					</div>

					<div class="address">
						199048, г.Санкт-Петербург,
						13-ая линия В.О., д.72, Арт-Муза.
					</div>
					<div class="phone d-flex flex-column">
						<a href="tel:+78126470637" class="">+7 (812) 647-06-37</a>
						<a href="tel:88007778504" class="">8 800 777 85 04</a>
					</div>
					<div class="schedule">
						Пн-Пт. с 10.00 до 19.00
					</div>
					<div class="d-flex mb-5 flex-column flex-lg-row">
						<div class="messenger__text">или напишите в мессенджер</div>
						<ul class="messenger__list d-flex gap-2">
							<li>
								<a href="#" aria-label="whatsapp" rel="nofollow" class="whatsapp" target="_blank"></a>
							</li>
							<li>
								<a href="#" aria-label="telegram" rel="nofollow" class="tg" target="_blank"></a>
							</li>
						</ul>
					</div>
					<div class="main-contacts__text fs-24 mb-4">

						<p>
							Вы узнали немного о нашей команде, расскажите и вы немного о своей задаче, напишите свой вопрос или позвоните
						</p>
					</div>
					<div class="fs-36 main-contacts__text d-flex align-items-end">
						<p>Будем рады знакомству. Сморите о нас в соц. сетях</p>
						<ul class="social__list d-flex gap-3">
							<li>
								<a href="https://vk.com/bestmaket" rel="nofollow" class="vk" target="_blank"></a>
							</li>
							<li>
								<a href="https://www.youtube.com/channel/UCXVbP9nnQMCAkPImrL9T9uQ/videos" rel="nofollow" class="you" target="_blank"></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="form-main contact">
					<? $APPLICATION->IncludeComponent(
						"tkk:infoportal.element.add.form",
						"form-small",
						array(
							"COMPONENT_TEMPLATE" => "form-small",
							"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
							"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
							"CUSTOM_TITLE_DETAIL_PICTURE" => "",
							"CUSTOM_TITLE_DETAIL_TEXT" => "",
							"CUSTOM_TITLE_IBLOCK_SECTION" => "",
							"CUSTOM_TITLE_NAME" => "Ваше имя",
							"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
							"CUSTOM_TITLE_PREVIEW_TEXT" => "Сообщение",
							"CUSTOM_TITLE_TAGS" => "",
							"DEFAULT_INPUT_SIZE" => "30",
							"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
							"ELEMENT_ASSOC" => "CREATED_BY",
							"FORM_ID" => "topMainForm",
							"GROUPS" => array(
								0 => "2",
							),
							"IBLOCK_ID" => "2",
							"IBLOCK_TYPE" => "system",
							"LEVEL_LAST" => "Y",
							"LIST_URL" => "",
							"MAX_FILE_SIZE" => "0",
							"MAX_LEVELS" => "100000",
							"MAX_USER_ENTRIES" => "100000",
							"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
							"PROPERTY_CODES" => array(
								0 => "1",
								1 => "2",
								2 => "8",
								3 => "NAME",
							),
							"PROPERTY_CODES_REQUIRED" => array(
								0 => "1",
								1 => "8",
								2 => "NAME",
							),
							"RESIZE_IMAGES" => "N",
							"SEF_MODE" => "N",
							"STATUS" => "ANY",
							"STATUS_NEW" => "N",
							"USER_MESSAGE_ADD" => "",
							"USER_MESSAGE_EDIT" => "",
							"USE_CAPTCHA" => "N"
						),
						false
					); ?>
				</div>
			</div>
		</div>
	</section>
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





	<div class="contact-text">
		<?
		$APPLICATION->IncludeFile($APPLICATION->GetCurPage() . "/contact-text.php", array(), array(
			'NAME' => 'текст',
			'MODE' => 'text'
		));
		?>
	</div>
	<div class="footer">
		<div class="container">
			<div class="d-flex flex-column w-100">
				<div class="menu">
					<? $APPLICATION->IncludeComponent(
						"bitrix:menu",
						"top-menu",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"ROOT_MENU_TYPE" => "bottom",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_CACHE_GET_VARS" => array(),
							"MAX_LEVEL" => "1",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N"
						),
						false
					); ?>
				</div>
				<div class="info">
					<?
					$APPLICATION->IncludeFile("/includes/copy.php", array(), array(
						'NAME' => 'текст',
						'MODE' => 'text'
					));
					?>
				</div>
				<div class="polity d-flex gap-3">
					<a href="/policy.pdf" target="_blank">Соглашение о конфиденциальности.</a>
				<div class="copy">
					Разработка сайта <a href="https://target-kc.ru/" target="_blank" rel="nofollow">Таргет Консалт Компани</a>
				</div>
				</div>
			</div>
			<div class="contact-text">
				<?
				$APPLICATION->IncludeFile($APPLICATION->GetCurPage() . "/contact-text.php", array(), array(
					'NAME' => 'текст',
					'MODE' => 'text'
				));
				?>
			</div>


		</div>
	</div>
	<div class="popup">
		<div id="popupOrder">
			<div class="form-popup">
				<? $APPLICATION->IncludeComponent(
					"tkk:infoportal.element.add.form",
					"form-large",
					array(
						"FORM_ID" => "popupForm",
						"TITLE" => "Заказать звонок",
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
							2 => "8",
							3 => "NAME",
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
						"COMPONENT_TEMPLATE" => ".default"
					),
					false
				); ?>
			</div>
		</div>
		<div id="orderPrice">
			<div class="form-popup">
				<? $APPLICATION->IncludeComponent(
					"tkk:infoportal.element.add.form",
					"form-large",
					array(
						"FORM_ID" => "popupForm",
						"TITLE" => "Узнать стоимость",
						"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
						"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
						"CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
						"CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
						"CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
						"CUSTOM_TITLE_NAME" => "Ваше имя",	// * наименование *
						"CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
						"CUSTOM_TITLE_PREVIEW_TEXT" => "Ваше сообщение",	// * текст анонса *
						"CUSTOM_TITLE_TAGS" => "",	// * теги *
						"DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
						"DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
						"ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
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
							2 => "8",
							3 => "NAME",
							4 => "PREVIEW_TEXT"
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
						"COMPONENT_TEMPLATE" => ".default"
					),
					false
				); ?>
			</div>
		</div>
		<div id="askQuestion">
			<div class="form-popup">
				<? $APPLICATION->IncludeComponent(
					"tkk:infoportal.element.add.form",
					"form-large",
					array(
						"FORM_ID" => "popupForm",
						"TITLE" => "Задать вопрос",
						"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
						"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
						"CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
						"CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
						"CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
						"CUSTOM_TITLE_NAME" => "Ваше имя",	// * наименование *
						"CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
						"CUSTOM_TITLE_PREVIEW_TEXT" => "Вопрос",	// * текст анонса *
						"CUSTOM_TITLE_TAGS" => "",	// * теги *
						"DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
						"DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
						"ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
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
							2 => "8",
							3 => "NAME",
							4 => "PREVIEW_TEXT"
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
						"COMPONENT_TEMPLATE" => ".default"
					),
					false
				); ?>
			</div>
		</div>
	</div>
<? endif; ?>
<?
$APPLICATION->IncludeFile("/includes/code-footer.php", array(), array(
	'NAME' => 'нижний код в блоке body',
	'MODE' => 'text'
));
?>
</div>
</body>

</html>
<?
if (isset($_GET['PAGEN_1']) && $_GET['PAGEN_1'] > 1) {
	$TITLE = $APPLICATION->GetPageProperty("TITLE");
	$APPLICATION->SetPageProperty("TITLE", $TITLE . ' - Страница ' . $_GET['PAGEN_1']);
	$DESCRIPTION = $APPLICATION->GetPageProperty("DESCRIPTION");
	$APPLICATION->SetPageProperty("DESCRIPTION", $DESCRIPTION . ' - Страница ' . $_GET['PAGEN_1']);
	$APPLICATION->AddHeadString('<link rel="canonical" href="https://' . $_SERVER['SERVER_NAME'] . $APPLICATION->GetCurDir() . '" />', true);
}
?>