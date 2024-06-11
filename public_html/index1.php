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
<section class="sample">
	<div class="container">
		<div class="d-flex">

			<div class="sample__description">
				<h2 class="sample__title fs-48 fw-500">Сделаем 3D эскиз</h2>
				<p class="fs-48 fw-500 ">чтобы вы знали каким будет ваш макет</p>
				<div class="sample__box-img">
					<img src="<?= SITE_TEMPLATE_PATH; ?>/images/eskiz.png" alt="" class="">

					<!-- <img src="./images/eskiz.png" alt="" class=""> -->
				</div>
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
			<div class="sample__links">
				<div class="fs-25">Напишите в мессенджер, обсудим проект</div>
				<div class="d-flex flex-column">

					<a href="" class="sample__link fs-30 sample__link--tg">Написать в Telegram</a>
					<a href="" class="sample__link fs-30 sample__link--whatsapp">Написать в WhatsApp</a>
				</div>
			</div>
		</div>
	</div>
</section>
<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>