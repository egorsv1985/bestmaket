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
// print_r($arResult);



$sectionNames = [];


foreach ($arResult["ITEMS"] as &$arItem) {

	$sectionId = $arItem["IBLOCK_SECTION_ID"];


	if (!isset($sectionNames[$sectionId])) {

		$sectionRes = \Bitrix\Iblock\SectionTable::getList([
			'filter' => ['ID' => $sectionId],
			'select' => ['NAME']
		]);

		if ($section = $sectionRes->fetch()) {

			$sectionNames[$sectionId] = $section['NAME'];
		}
	}


	$arItem["SECTION_NAME"] = $sectionNames[$sectionId];
}
unset($arItem);
?>
<div class="works-items ">

	<?
	
	foreach ($arResult["ITEMS"] as $key => $arItem) :
		
	?>
		<?
		$this->AddEditAction($arItem['ID'] . '-item', $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'] . '-item', $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>




		<div class="work-item portfolio__item h-100 item<?= $key++; ?>" id="<?= $this->GetEditAreaId($arItem['ID'] . '-item'); ?>">
			<a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="d-block h-100">
				<div class="portfolio__box d-flex flex-column">

					<div class="portfolio__box-img">
						<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>" class="">
					</div>
					<div class="portfolio__content  d-flex ">
						<div class="portfolio__num ">0<?= $key++ ?></div>
						<div class="portfolio__text "><?= $arItem['NAME']; ?></div>
					</div>
					<div class="portfolio__title "><?= $arItem['SECTION_NAME']; ?></div>
				</div>
			</a>
		</div>
	<? endforeach; ?>
</div>