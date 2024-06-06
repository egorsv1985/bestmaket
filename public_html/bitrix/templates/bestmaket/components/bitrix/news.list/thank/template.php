<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
		<div class="thank-items">
<?foreach($arResult["ITEMS"] as $arItem):
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
			<div class="thank-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<a href="#" class="link">
<?if($arItem['DETAIL_PICTURE']):?>
					<div class="image" style="background-image: url('<?=$arItem['DETAIL_PICTURE']['SRC']?>');">
					</div>
<?else:?>
					<div class="icon" style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>');">
					</div>
					<div class="name">
						<?=$arItem["NAME"]?>
					</div>
<?endif;?>
				</a>
			</div>
<?endforeach;?>
			<div class="clear"></div>
		</div>