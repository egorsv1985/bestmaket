<?
define("PAGE", "MAIN");
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

$APPLICATION->SetTitle("Главная");

?>
<section class=" main position-relative">
	<div class="blur-overlay"></div>
	<div class="main__fon-text text-secondary position-absolute text-nowrap">Макетная мастерская</div>
	<div class="container">
		<h1 class="text-center fs-32">Изготовление архитектурных и промышленных макетов<br>Доставка по России и СНГ
		</h1>
		<div class="main__slider slider">
			<div class=" slider__item position-relative" style="height: 355px; background: url('<?= SITE_TEMPLATE_PATH; ?>/images/main.png') no-repeat 50% / cover;">

			</div>
			<div class=" slider__item position-relative" style="height: 355px; background: url('<?= SITE_TEMPLATE_PATH; ?>/images/main.png') no-repeat 50% / cover;">

			</div>
		</div>
		<div class=" slider__controls-btns"></div>
		<h2 class="text-center fs-56 fw-500">Сделаем ваш макет точно по ТЗ</h2>
		<p class="text-center fs-46">даже если нет чертежей и сроки 🔥"горят"</p>
	</div>
</section>
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
<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>