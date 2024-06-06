<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<div class="main-top">
	<div class="contaner">
		<div class="content">
			<div class="title">
				<strong>СОЗДАЕМ</strong>
				В СРОК ОТ 3-Х ДНЕЙ,<br>
				даже если нет чертежей и сроки "горят"
				<div class="clear"></div>
			</div>
			<div class="items">
				<div class="item item1">
					<div class="title-item">
						Макеты
					</div>
					<div class="btn">
						<a href="/portfolio/">Посмотреть работы</a>
					</div>
				</div>
				<div class="item item2">
					<div class="title-item">
						<strong>3D</strong>
						АНИМАЦИЮ
					</div>
					<div class="btn">
						<a href="/portfolio/3d-animatsiya/">Посмотреть работы</a>
					</div>
				</div>
				<div class="item item3">
					<div class="title-item">
						<strong>3D</strong>
						ВИЗУАЛИЗАЦИЮ
					</div>
					<div class="btn">
						<a href="/portfolio/3d-vizualizatsiya/">Посмотреть работы</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="works-main">
	<div class="contaner">
		<div class="works-info">
			<?
			$APPLICATION->IncludeFile("/includes/works-info.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'text'
			));
			?>
		</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"works-tabs",
			array(
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"CACHE_TIME" => "7200",	// Время кеширования (сек.)
				"CACHE_TYPE" => "N",	// Тип кеширования
				"COMPONENT_TEMPLATE" => "works-tabs",
				"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
				"IBLOCK_ID" => IBLOCK_WORKS,	// Инфоблок
				"IBLOCK_TYPE" => "system",	// Тип инфоблока
				"SECTION_CODE" => "",	// Код раздела
				"SECTION_FIELDS" => array(	// Поля разделов
					0 => "ID",
					1 => "NAME",
					2 => "DESCRIPTION",
					3 => "",
				),
				"SECTION_ID" => "0",	// ID раздела
				"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
				"SECTION_USER_FIELDS" => array(	// Свойства разделов
					0 => "",
					1 => "",
				),
				"SHOW_PARENT_NAME" => "Y",
				"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
				"VIEW_MODE" => "LINE"
			),
			false
		); ?>
		<div class="clear">
		</div>
	</div>
</div>
<div class="main-sample">
	<div class="contaner">
		<div class="descr">
			<div class="title">
				<?
				$APPLICATION->IncludeFile("/includes/sample-title.php", array(), array(
					'NAME' => 'заголовок',
					'MODE' => 'html'
				));
				?>
			</div>
			<div class="info">
				<?
				$APPLICATION->IncludeFile("/includes/sample-info.php", array(), array(
					'NAME' => 'текст',
					'MODE' => 'html'
				));
				?>
			</div>
			<div class="clear">
			</div>
		</div>
		<div class="accordion">
			<ul>
				<li class="item1 active"> <a href="#" class="title">
						<?
						$APPLICATION->IncludeFile("/includes/accordion-title-1.php", array(), array(
							'NAME' => 'заголовок',
							'MODE' => 'html'
						));
						?> </a>
					<div class="content">
						<?
						$APPLICATION->IncludeFile("/includes/accordion-text-1.php", array(), array(
							'NAME' => 'текст',
							'MODE' => 'html'
						));
						?>
					</div>
				</li>
				<li class="item2"> <a href="#" class="title">
						<?
						$APPLICATION->IncludeFile("/includes/accordion-title-2.php", array(), array(
							'NAME' => 'заголовок',
							'MODE' => 'html'
						));
						?> </a>
					<div class="content">
						<?
						$APPLICATION->IncludeFile("/includes/accordion-text-2.php", array(), array(
							'NAME' => 'текст',
							'MODE' => 'html'
						));
						?>
					</div>
				</li>
				<li class="item3"> <a href="#" class="title">
						<?
						$APPLICATION->IncludeFile("/includes/accordion-title-3.php", array(), array(
							'NAME' => 'заголовок',
							'MODE' => 'html'
						));
						?> </a>
					<div class="content">
						<?
						$APPLICATION->IncludeFile("/includes/accordion-text-3.php", array(), array(
							'NAME' => 'текст',
							'MODE' => 'html'
						));
						?>
					</div>
				</li>
			</ul>
		</div>
		<div class="clear">
		</div>
	</div>
</div>
<div class="request-calc-2">
	<div class="contaner">
		<div class="info">
			<div class="title">
				<?
				$APPLICATION->IncludeFile("/includes/calc-2-title.php", array(), array(
					'NAME' => 'текст',
					'MODE' => 'html'
				));
				?>
			</div>
			<?
			$APPLICATION->IncludeFile("/includes/calc-2-text.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'html'
			));
			?>
		</div>
		<div class="form-contaner">
			<? $APPLICATION->IncludeComponent(
				"tkk:infoportal.element.add.form",
				"form-blue",
				array(
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
					"FORM_ID" => "bottomMainForm",
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
						1 => "8",
						2 => "NAME",
						3 => "PREVIEW_TEXT",
					),
					"PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
						0 => "NAME",
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
		<div class="clear">
		</div>
	</div>
</div>

<div class="about-main">
	<div class="contaner">
		<div class="tabs">
			<ul class="tabs">
				<li class="active"><a href="#">Цифры</a></li>
				<li><a href="#">Факты</a></li>
				<li><a href="#">Особенности работы</a></li>
				<li><a href="#">Этапы работы</a></li>
			</ul>
			<div class="clear">
			</div>
			<div class="tab active">
				<? $APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"number",
					array(
						"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
						"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
						"AJAX_MODE" => "N",	// Включить режим AJAX
						"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
						"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
						"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
						"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
						"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
						"CACHE_GROUPS" => "Y",	// Учитывать права доступа
						"CACHE_TIME" => "7200",	// Время кеширования (сек.)
						"CACHE_TYPE" => "A",	// Тип кеширования
						"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
						"COMPONENT_TEMPLATE" => ".default",
						"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
						"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
						"DISPLAY_DATE" => "N",
						"DISPLAY_NAME" => "N",
						"DISPLAY_PICTURE" => "N",
						"DISPLAY_PREVIEW_TEXT" => "N",
						"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
						"FIELD_CODE" => array(	// Поля
							0 => "ID",
							1 => "NAME",
							2 => "SORT",
							3 => "PREVIEW_TEXT",
							4 => "PREVIEW_PICTURE",
							5 => "DETAIL_TEXT",
							6 => "DETAIL_PICTURE",
							7 => "",
						),
						"FILTER_NAME" => "",	// Фильтр
						"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
						"IBLOCK_ID" => "11",	// Код информационного блока
						"IBLOCK_TYPE" => "bestmaket",	// Тип информационного блока (используется только для проверки)
						"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
						"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
						"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
						"NEWS_COUNT" => "20",	// Количество новостей на странице
						"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
						"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
						"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
						"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
						"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
						"PAGER_TITLE" => "Новости",	// Название категорий
						"PARENT_SECTION" => "0",	// ID раздела
						"PARENT_SECTION_CODE" => "",	// Код раздела
						"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
						"PROPERTY_CODE" => array(	// Свойства
							0 => "NUMBER",
							1 => "COLOR",
							2 => "SIZE",
						),
						"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
						"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
						"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
						"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
						"SET_STATUS_404" => "N",	// Устанавливать статус 404
						"SET_TITLE" => "N",	// Устанавливать заголовок страницы
						"SHOW_404" => "N",	// Показ специальной страницы
						"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
						"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
						"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
						"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
						"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
					)
				); ?>
			</div>
			<div class="tab">
				<div class="data-list">
					<?
					$APPLICATION->IncludeFile("/includes/data-list.php", array(), array(
						'NAME' => 'текст',
						'MODE' => 'html'
					));
					?>
				</div>
			</div>
			<div class="tab">
				<div class="features">
					<div class="title">
						Особенности работы с нами:
					</div>
					<?
					$APPLICATION->IncludeFile("/includes/features-list.php", array(), array(
						'NAME' => 'текст',
						'MODE' => 'html'
					));
					?>
				</div>
			</div>
			<div class="tab">
				<div class="work_steps">
					<div class="title">
						Этапы работы над макетом или арт-объектом
					</div>
					<div class="subtitle">
						Наш основной профиль - создание макетов по эскизу или словесному описанию заказчика,
						на основании которых разрабатывается задание для мастеров
					</div>
					<?
					$APPLICATION->IncludeFile("/includes/steps-list.php", array(), array(
						'NAME' => 'текст',
						'MODE' => 'html'
					));
					?>
				</div>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
</div>
<? $APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"service-slide",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "7200",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "ID",
			1 => "XML_ID",
			2 => "NAME",
			3 => "DETAIL_TEXT",
			4 => "DETAIL_PICTURE",
			5 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => IBLOCK_SERVICE,	// Код информационного блока
		"IBLOCK_TYPE" => "bestmaket",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "0",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "TITLE_LARGE",
			1 => "VIDEO",
			2 => "WIDTH",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
		"SORT_BY2" => "ID",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "DESC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	)
); ?>
<div class="clients-main">
	<div class="contaner">
		<div class="large-title">
			Клиенты о нас <small>Что говорят люди, которые уже работают с нами?</small>
		</div>
		<? $APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"clients-slider",
			array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"AJAX_MODE" => "N",	// Включить режим AJAX
				"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
				"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
				"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
				"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
				"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"CACHE_TIME" => "7200",	// Время кеширования (сек.)
				"CACHE_TYPE" => "A",	// Тип кеширования
				"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
				"COMPONENT_TEMPLATE" => ".default",
				"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
				"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "N",
				"DISPLAY_PICTURE" => "N",
				"DISPLAY_PREVIEW_TEXT" => "N",
				"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
				"FIELD_CODE" => array(	// Поля
					0 => "ID",
					1 => "NAME",
					2 => "SORT",
					3 => "PREVIEW_TEXT",
					4 => "PREVIEW_PICTURE",
					5 => "DETAIL_TEXT",
					6 => "DETAIL_PICTURE",
					7 => "",
				),
				"FILTER_NAME" => "",	// Фильтр
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
				"IBLOCK_ID" => IBLOCK_REVIEWS,	// Код информационного блока
				"IBLOCK_TYPE" => "bestmaket",	// Тип информационного блока (используется только для проверки)
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
				"INCLUDE_SUBSECTIONS" => "N",	// Показывать элементы подразделов раздела
				"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
				"NEWS_COUNT" => "20",	// Количество новостей на странице
				"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
				"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
				"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
				"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
				"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
				"PAGER_TITLE" => "Новости",	// Название категорий
				"PARENT_SECTION" => "0",	// ID раздела
				"PARENT_SECTION_CODE" => "",	// Код раздела
				"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
				"PROPERTY_CODE" => array(	// Свойства
					0 => "",
					1 => "LOGO",
					2 => "",
				),
				"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
				"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
				"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
				"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
				"SET_STATUS_404" => "N",	// Устанавливать статус 404
				"SET_TITLE" => "N",	// Устанавливать заголовок страницы
				"SHOW_404" => "N",	// Показ специальной страницы
				"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
				"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
				"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
				"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
				"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
			)
		);
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"clients",
			array(
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"CACHE_TIME" => "7200",	// Время кеширования (сек.)
				"CACHE_TYPE" => "A",	// Тип кеширования
				"COMPONENT_TEMPLATE" => ".default",
				"COUNT" => "3",
				"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
				"IBLOCK_ID" => IBLOCK_CLIENTS,	// Инфоблок
				"IBLOCK_TYPE" => "bestmaket",	// Тип инфоблока
				"SECTION_CODE" => "",	// Код раздела
				"SECTION_FIELDS" => array(	// Поля разделов
					0 => "ID",
					1 => "NAME",
					2 => "DETAIL_PICTURE",
					3 => "PICTURE",
				),
				"SECTION_ID" => "0",	// ID раздела
				"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
				"SECTION_USER_FIELDS" => array(	// Свойства разделов
					0 => "",
					1 => "",
				),
				"SHOW_PARENT_NAME" => "Y",
				"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
				"VIEW_MODE" => "LINE"
			)
		); ?>
	</div>
</div>

<? if ($USER->IsAdmin() || true) : ?>
	<div class="main-makets">
		<div class="contaner">
			<div class="text">
				<div class="text-page">
					<div class="title">
						Виды макетов
					</div>
					<div class="layouts-items">
						<?
						$arFilter = array('IBLOCK_ID' => 13, 'ACTIVE' => 'Y');
						$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter);
						$key = 0;
						while ($arSection = $rsSections->Fetch()) : ?>
							<div class="layouts-item<?= (!($key % 3) ? ' clear' : '') ?>" style="background-image:url('<?= CFile::GetPath($arSection['PICTURE']); ?>');" id="section-<?= $arSection['ID']; ?>">
								<div class="name"><?= $arSection['NAME']; ?></div>
								<ul>
									<?
									$arFilter = array(
										"IBLOCK_ID" => $arSection['IBLOCK_ID'],
										"SECTION_ID" => $arSection['ID'],
										"ACTIVE" => "Y",
									);
									$rsElements = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false);
									$keyrow = 0;
									while ($arElements = $rsElements->GetNext()) :
										$keyrow++;
										if ($keyrow == 3) : ?>
											<li class="small">
												<a href="#" class="display-all">Показать все</a>
											</li>
										<? endif; ?>
										<li class="<?= ($keyrow > 2) ? 'none' : '' ?>">
											<a href="<?= $arElements['DETAIL_PAGE_URL']; ?>" id="elements-<?= $arElements['ID']; ?>">
												<?= $arElements['NAME']; ?>
											</a>
										</li>
									<? endwhile; ?>
								</ul>
							</div>
						<?
							$key++;
						endwhile; ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<? endif; ?>

<? $APPLICATION->IncludeFile("/includes/footer.php", array(), array(
	'NAME' => 'текст',
	'MODE' => 'html',
	'SHOW_BORDER' => false
)); ?>
<div class="text-main">
	<div class="contaner">
		<div class="label">
			<?
			$APPLICATION->IncludeFile("/includes/text-main-label.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'html'
			));
			?>
		</div>
		<div class="content">
			<?
			$APPLICATION->IncludeFile("/includes/text-main.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'html'
			));
			?>
		</div>
	</div>
</div>