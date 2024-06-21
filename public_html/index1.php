<?
define("PAGE", "MAIN");

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Главная");

?>
<div class="position-relative    ">
	<div class="position-relative d-flex flex-column h-100 overflow-hidden ">
		<div class="position-relative  hero__animation animate-translate">


		</div>

	</div>
</div>
<section class=" main position-relative ">
	<!-- <div class="blur-overlay"></div> -->
	<div class="position-absolute circle1  overflow-hidden  animate-left-right0 ">

	</div>
	<div class="position-absolute circle2 overflow-hidden  animate-left-right1 ">

	</div>
	<div class="position-absolute circle3 overflow-hidden  animate-left-right2 ">

	</div>
	<div class="position-absolute circle4 overflow-hidden  animate-left-right3 ">

	</div>

	<div class="main__fon-text text-secondary position-absolute text-nowrap" data-text="Макетная мастерская">Макетная мастерская</div>

	<div class="container">
		<h1 class="text-center fs-32  fw-300 position-relative">Изготовление архитектурных и промышленных макетов<br>Доставка по России и СНГ
		</h1>

		<div class="main-slider position-relative ">
			<ul class="slides">
				<li class=" position-relative d-flex justify-content-center">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/images/main.png" alt="">
				</li>
				<li class=" position-relative d-flex justify-content-center">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/images/main.png" alt="">
				</li>
				<li class=" position-relative d-flex justify-content-center">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/images/main.png" alt="">
				</li>


			</ul>
		</div>
		<h2 class="text-center fs-56 fw-600 text-uppercase  position-relative">Сделаем ваш макет точно по ТЗ</h2>
		<p class="text-center fs-46 position-relative">даже если нет чертежей и сроки 🔥"горят"</p>
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
<section class="sample ">
	<div class="container">
		<h2 class="sample__title fs-48 fw-600 mb-0 position-relative d-inline-block">Получите 3D эскиз</h2>
		<p class="fs-48 fw-600 sample__desc mb-5 mb-lg-4">чтобы увидеть каким будет макет еще на старте работ</p>
		<div class="d-flex sample__box flex-column flex-lg-row">
			<div class="sample__box-content">
				<div class="sl-container">
					<div class="view view-after">
						<img src="<?= SITE_TEMPLATE_PATH; ?>/images/eskiz-black.png" alt="До" />
					</div>
					<div class="view view-before">
						<img src="<?= SITE_TEMPLATE_PATH; ?>/images/eskiz.png" alt="После" />
					</div>
					<div class="dragme">
						<div class="dr-circle d-lg-none">
							<svg class=" position-absolute svg-left " width="3" height="5" viewBox="0 0 3 5" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M0.825683 2.65582L2.91075 0.729717L2.91075 4.58191L0.825683 2.65582Z" fill="#525252" />
							</svg>
							<svg class=" position-absolute svg-right" width="3" height="5" viewBox="0 0 3 5" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M2.60986 2.65571L0.5248 4.58181L0.5248 0.729609L2.60986 2.65571Z" fill="#525252" />
							</svg>


						</div>
						<div class="dr-circle d-none d-lg-block  ">

							<svg class=" position-absolute svg-left " width="4" height="8" viewBox="0 0 4 8" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M-1.74846e-07 4L3.75 0.535898L3.75 7.4641L-1.74846e-07 4Z" fill="#525252" />
							</svg>
							<svg class=" position-absolute svg-right " width="4" height="8" viewBox="0 0 4 8" fill="none" xmlns="http://www.w3.org/2000/svg">
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
				<div class="d-flex flex-column sample__wrapper">

					<a href="" class="sample__link d-inline-block fs-30 fw-500 sample__link--tg position-relative  "> <span class="position-relative">Написать в Telegram</span> </a>
					<a href="" class="sample__link d-inline-block fs-30 fw-500 sample__link--whatsapp position-relative  "> <span class="position-relative">Написать в WhatsApp</span> </a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="number-section ">
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
<section class="request-calc-2 py-lg-5 py-4 blue">
	<div class="container">
		<h2 class="title fs-64 mb-5">
			<?
			$APPLICATION->IncludeFile("/includes/calc-2-title.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'html'
			));
			?>
		</h2>

		<div class="form-container">
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
		<div class="d-flex mtn-5 flex-column flex-lg-row justify-content-end gap-5">
			<div class="messenger__text">или напишите в мессенджер</div>
			<ul class="messenger__list d-flex gap-4">
				<li>
					<a href="#" aria-label="whatsapp" rel="nofollow" class="whatsapp" target="_blank"></a>
				</li>
				<li>
					<a href="#" aria-label="telegram" rel="nofollow" class="tg" target="_blank"></a>
				</li>
			</ul>
		</div>
	</div>
</section>
<div class="clients-main py-5">
	<div class="container">
		<div class="large-title fs-64">
			Отзывы. Клиенты о нашей работе <small class="d-none d-lg-block">Что говорят люди, которые уже работают с нами?</small>
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
<section class="request-calc-2 py-5 gray">
	<div class="container">
		<h2 class="title fs-64 mb-5">
			<?
			$APPLICATION->IncludeFile("/includes/calc-2-title.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'html'
			));
			?>
		</h2>

		<div class="form-container">
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
		<div class="d-flex mtn-5 flex-column flex-lg-row justify-content-end gap-5 ">
			<div class="messenger__text">или напишите в мессенджер</div>
			<ul class="messenger__list d-flex gap-4 ">
				<li>
					<a href="#" aria-label="whatsapp" rel="nofollow" class="whatsapp" target="_blank"></a>
				</li>
				<li>
					<a href="#" aria-label="telegram" rel="nofollow" class="tg" target="_blank"></a>
				</li>
			</ul>
		</div>
	</div>
</section>
<? if ($USER->IsAdmin() || true) : ?>
	<section class="main-makets py-5">
		<div class="container">


			<h2 class="title">
				Виды макетов
			</h2>
			<div class="layouts-items d-flex flex-wrap ">
				<?
				$arFilter = array('IBLOCK_ID' => 13, 'ACTIVE' => 'Y');
				$rsSections = CIBlockSection::GetList(array('SORT' => 'ASC'), $arFilter);
				$key = 0;
				while ($arSection = $rsSections->Fetch()) : ?>
					<div class="layouts-item py-4 d-flex flex-column position-relative" id="section-<?= $arSection['ID']; ?>">
						<div class="mb-4">
							<img src="<?= CFile::GetPath($arSection['PICTURE']); ?>" width="35" height="35" alt="" class="">
						</div>
						<div class="name mb-4"><?= $arSection['NAME'];  ?></div>
						<ul class="item-list">
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
									<li class="small ">
										<button class="display-all" aria-label="показать все"></button>
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

			</div>


		</div>
	</section>
<? endif; ?>

<section class="why-work py-5">
	<div class="container">
		<h2 class="fs-64 mb-5 fw-300">Почему Вам стоит работать с нами</h2>
		<div class="why-work__content">
			<div class="fs-24 fw-300 why-work__text why-work__text--left px-3 px-lg-4 py-4 py-lg-5 position-relative"><strong class="fw-400">Макетная мастерская “Бэст
					макет”.</strong> Мы
				изготавливаем качественные архитектурные, интерактивные и промышленные макеты для выставок, презентаций и
				в
				офисы продаж.</div>
			<div class="fs-24 fw-300 why-work__text why-work__text--right py-5 px-4 ps-lg-5 pe-lg-4 position-relative">
				<p>Архитектурные, промышленные и интерактивные макеты - наиболее мощный по силе воздействия инструмент
					продвижения жилой и коммерческой недвижимости, промышленных и других объектов. Макет продемонстрирует
					преимущества и особенности проекта, поможет произвести наиболее сильное впечатление на клиента или
					инвестора.
				</p>
				<p>
					Если вы ищете нестандартное, оригинальное решение в мире макетов, если вам необходим эффект “wow!”, наша
					макетная мастерская рада представить вам интерактивный макет. Это совмещение классического
					архитектурного
					макета и мультимедийной видео презентации.
				</p>
			</div>
		</div>
	</div>
</section>
<section class="instruments py-5">
	<div class="container">
		<h2 class="fs-36 instruments__title fw-300 mb-5 ">Какими инструментами наша макетная <span>мастерская</span> <span>решит</span> Вашу задачу?
		</h2>
		<ul class="fs-24 d-flex flex-column  instruments__list fw-300">
			<li>Опыт. 9 лет создаем макеты. Реализовали более 200 проектов. </li>
			<li>Отлаженная технология удаленного согласования и отчетности при разработке архитектурного макета.</li>
			<li>Производство макета с учетом мельчайших деталей проекта.</li>
			<li>Офисы в Москве и Санкт-Петербурге.</li>
			<li> Доставка макетов в любой город России и за рубеж. </li>
			<li> Персональный менеджер </li>
			<li>Качественный сервис</li>
			<li> Гарантийный срок на все макеты: архитектурные, промышленные, интерактивные. </li>
			<li> Создание срочных макетов. Макеты по неполным исходным данным</li>
		</ul>
	</div>
</section>
<section class="advantages py-5">
	<div class="container">
		<h2 class="fs-36 mb-3 advantages__title d-lg-none fw-300">Ещё 3 очевидных преимущества</h2>
		<div class="advantages__content d-flex gap-lg-5 align-items-lg-end ">
			<div class="advantages__box-img">
				<img src="<?= SITE_TEMPLATE_PATH; ?>/images/advantage.png" alt="" class="">
			</div>
			<div class="advantages__box-text pb-3">
				<h2 class="fs-36 mb-5 advantages__title d-none d-lg-block fw-300">Ещё 3 очевидных преимущества</h2>
				<ul class="d-flex fs-20 justify-content-between  flex-column flex-lg-row">
					<li class="">Готовы сделать срочный проект!</li>
					<li class="">Отдельная рабочая группа на каждый проект</li>
					<li class="">Даем гарантию на макет и соблюдаем ее</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>