<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="number-items pt-5 ">
	<div class="number-item title">
		<h2 class="fs-72 number__title"> Цифры / Факты

		</h2>
	</div>
	<div class="number-item large">
		<div class="number-container" style="background-image:url('<?= SITE_TEMPLATE_PATH; ?>/images/facts1.png'); background-repeat: no-repeat"></div>
	</div>
	<div class="number-item small">
		<div class="number-container" style="background-image:url('<?= SITE_TEMPLATE_PATH; ?>/images/facts2.png'); background-repeat: no-repeat"></div>
	</div>
	<div class="number__box d-flex flex-wrap justify-content-between position-relative">

		<div class="number-item green border-right">
			<div class="number-container">
				<div class="number fw-300">300</div>
				<div class="name">
					реализованных макетов </div>
			</div>
		</div>
		<div class="number-item blue border-right">
			<div class="number-container">
				<div class="number fw-300">60</div>
				<div class="name">
					РЕАЛИЗОВАННЫХ МАКЕТОВ</div>
			</div>
		</div>
		<div class="number-item green">
			<div class="number-container">
				<div class="number fw-300">15</div>
				<div class="name">
					реализованных макетов </div>
			</div>
		</div>
		<div class="number-item blue border-right">
			<div class="number-container">
				<div class="number fw-300">80</div>
				<div class="name">
					ГОРОДОВ, В КОТОРЫЕ ДОСТАВЛЕН МАКЕТ </div>
			</div>
		</div>
		<div class="number-item green border-right">
			<div class="number-container">
				<div class="number fw-300">35</div>
				<div class="name">
					СПЕЦИАЛИСТОВ В ШТАТЕ </div>
			</div>
		</div>
		<div class="number-item blue">
			<div class="number-container">
				<div class="number fw-300">147</div>
				<div class="name">
					МАКЕТЧИКОВ ПОДГОТОВИЛИ В СВОЕМ УЧЕБНОМ ЦЕНТРЕ </div>
			</div>
		</div>
	</div>
</div>