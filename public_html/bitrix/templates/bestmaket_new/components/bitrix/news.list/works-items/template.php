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
// Подключаем модуль инфоблоков
// if (!\Bitrix\Main\Loader::includeModule('iblock')) {
// 	return;
// }


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
<div class="works-items">

	<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
		<?
		$this->AddEditAction($arItem['ID'] . '-item', $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'] . '-item', $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>




		<div class="work-item item<?= $key++; ?>" id="<?= $this->GetEditAreaId($arItem['ID'] . '-item'); ?>">
			<a href="<?= $arItem['PROPERTIES']['LINK']['VALUE']; ?>" style="background-image: url('<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>');">
				<div class="bg">
					<div class="title">
						<?= $arItem['NAME']; ?>
					</div>
					<div class="title">
						<?= $arItem['SECTION_NAME']; ?>
					</div>
				</div>
			</a>
		</div>



	<? endforeach; ?>

</div>