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
	<div class="map">
		<?
		$APPLICATION->IncludeFile("/includes/map.php", array(), array(
			'NAME' => 'карту',
			'MODE' => 'php'
		));
		?>
	</div>
	
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
	<div class="footer">
		<div class="contaner">
			<div class="contact-text">
				<?
				$APPLICATION->IncludeFile($APPLICATION->GetCurPage() . "/contact-text.php", array(), array(
					'NAME' => 'текст',
					'MODE' => 'text'
				));
				?>
			</div>
			<div class="social">
				<?
				$APPLICATION->IncludeFile("/includes/social.php", array(), array(
					'NAME' => 'ссылки',
					'MODE' => 'text'
				));
				?>
			</div>
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
			<div class="polity">
				<div class="copy">
					Разработка сайта <a href="https://target-kc.ru/" target="_blank" rel="nofollow">Таргет Консалт Компани</a>
				</div>
				<a href="/policy.pdf" target="_blank">Соглашение о конфиденциальности.</a>
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