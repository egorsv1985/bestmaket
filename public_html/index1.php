<?
define("PAGE", "MAIN");
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Главная");

?>
<section class=" main position-relative">
	<div class="blur-overlay"></div>
	<div class="main__fon-text text-secondary position-absolute text-nowrap">Макетная мастерская</div>
	<div class="container">
		<h1 class="text-center fs-32 mb-5">Изготовление архитектурных и промышленных макетов<br>Доставка по России и СНГ
		</h1>

		<div class="main-slider position-relative mb-5">
			<ul class="slides">
				<li class=" position-relative" style="height: 355px; background: url('<?= SITE_TEMPLATE_PATH; ?>/images/main.png') no-repeat 50% / cover;">
				</li>
				<li class=" position-relative" style="height: 355px; background: url('<?= SITE_TEMPLATE_PATH; ?>/images/main.png') no-repeat 50% / cover;">
				</li>
				<li class=" position-relative" style="height: 355px; background: url('<?= SITE_TEMPLATE_PATH; ?>/images/main.png') no-repeat 50% / cover;">
				</li>
				<li class=" position-relative" style="height: 355px; background: url('<?= SITE_TEMPLATE_PATH; ?>/images/main.png') no-repeat 50% / cover;">
				</li>
			</ul>
		</div>
		<h2 class="text-center fs-56 fw-600 text-uppercase mb-0">Сделаем ваш макет точно по ТЗ</h2>
		<p class="text-center fs-46">даже если нет чертежей и сроки 🔥"горят"</p>
	</div>
</section>
<section class="portfolio py-5">
	<div class="container">

		<?
		$APPLICATION->IncludeFile("/includes/works-info-new.php", array(), array(
			'NAME' => 'текст',
			'MODE' => 'text'
		));
		?>

		<? $APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"works-tabs-new",
			array(
				"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
				"CACHE_GROUPS" => "Y",	// Учитывать права доступа
				"CACHE_TIME" => "7200",	// Время кеширования (сек.)
				"CACHE_TYPE" => "N",	// Тип кеширования
				"COMPONENT_TEMPLATE" => "works-tabs",
				"COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
				"IBLOCK_ID" => IBLOCK_PORTFOLIO,	// Инфоблок
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
	</div>
</section>
<section class="sample py-5">
	<div class="container">
		<h2 class="sample__title fs-48 fw-600 mb-0 position-relative d-inline-block">Сделаем 3D эскиз</h2>
		<p class="fs-48 fw-600 sample__desc mb-4">чтобы вы знали каким будет ваш макет</p>
		<div class="d-flex sample__box">
			<div class="sample__box-content">


				<div class="sl-container">
					<div class="view view-after">
						<img src="<?= SITE_TEMPLATE_PATH; ?>/images/eskiz.png" />
					</div>
					<div class="view view-before">
						<img src="<?= SITE_TEMPLATE_PATH; ?>/images/eskiz.png" />
					</div>
					<div class="dragme">
						<div class="dr-circle">

							<svg class=" position-absolute svg-left" width="4" height="8" viewBox="0 0 4 8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M-1.74846e-07 4L3.75 0.535898L3.75 7.4641L-1.74846e-07 4Z" fill="#525252" />
							</svg>
							<svg class=" position-absolute svg-right" width="4" height="8" viewBox="0 0 4 8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M4 4L0.249999 7.4641L0.249999 0.535898L4 4Z" fill="#525252" />
							</svg>
						</div>
					</div>
				</div>
				<!-- <img src="./images/eskiz.png" alt="" class=""> -->
				<div class="sample__content d-flex justify-content-between">
					<div class="d-flex flex-column">
						<div class="fs-40">Эскиз</div>
						<div class="fs-25 text-primary">До</div>
					</div>
					<div class="d-flex flex-column">
						<div class="fs-40">Макет</div>
						<div class="fs-25 text-primary">После</div>
					</div>
				</div>
			</div>
			<div class="sample__links position-relative d-flex flex-column ">
				<div class="fs-25 sample__mess">Напишите в мессенджер, обсудим проект</div>
				<div class="d-flex flex-column gap-5">

					<a href="" class="sample__link d-inline-block fs-30 sample__link--tg position-relative ">Написать в Telegram</a>
					<a href="" class="sample__link d-inline-block fs-30 sample__link--whatsapp position-relative ">Написать в WhatsApp</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<section class="number py-5">
	
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

</section>
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
<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>