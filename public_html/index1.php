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
		<div class=" slider__controls-btns"></div>
		<h2 class="text-center fs-56 fw-600 text-uppercase">Сделаем ваш макет точно по ТЗ</h2>
		<p class="text-center fs-46">даже если нет чертежей и сроки 🔥"горят"</p>
	</div>
</section>
<section class="portfolio">
	<div class="container">
		<?
		$APPLICATION->IncludeFile("/includes/works-info-new.php", array(), array(
			'NAME' => 'текст',
			'MODE' => 'text'
		));
		?>
		<ul class="flex-wrap gap-3 d-flex portfolio__list">
			<li class="px-3 py-2 active "><a href="#" class="">Архитектурные макеты</a></li>
			<li class="px-3 py-2 "><a href="#" class="">Ландшафтные макеты</a></li>
			<li class="px-3 py-2 "><a href="#" class="">Макеты оборудования</a></li>
			<li class="px-3 py-2 "><a href="#" class="">Промышленные макеты</a></li>
			<li class="px-3 py-2 "><a href="#" class="">Макеты оборудования</a></li>
			<li class="px-3 py-2 "><a href="#" class="">Интерьерные макеты</a></li>
			<li class="px-3 py-2 "><a href="#" class="">Интерактивные макеты</a></li>
		</ul>
		<div class="portfolio__grid gap-4">
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio1.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">01</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio2.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">02</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item active">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio3.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">03</div>
						<div class="portfolio__text">Макет топливно заправочного комплекса для самолетов</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio1.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">04</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio2.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">05</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio3.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">06</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio1.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">07</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio2.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">08</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio3.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">09</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>
			<div class="portfolio__item">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="./images/portfolio1.png" alt="" class="">
					</div>
					<div class="portfolio__content mb-5 d-flex ">

						<div class="portfolio__num fs-64">10</div>
						<div class="portfolio__text">Макет остановки на Невском проспекте</div>
					</div>
					<div class="portfolio__title text-primary">Архитектурный макет</div>
				</div>
			</div>

		</div>
	</div>
</section>


<div class="works-main">
	<div class="container">
		<div class="works-info">
			<?
			$APPLICATION->IncludeFile("/includes/works-info-new.php", array(), array(
				'NAME' => 'текст',
				'MODE' => 'text'
			));
			?>
		</div>
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