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
	  		<div class="price-items">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		//print_r($arItem);
		
  if (CModule::IncludeModule("millcom.phpthumb"))
    $arItem['PREVIEW_PICTURE']['SRC'] = CMillcomPhpThumb::generateImg($arItem['PREVIEW_PICTURE']['SRC'], 13);

	?>
	  			<div class="price-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="price-image">
							<img src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>" alt="<?=htmlspecialchars($arItem['NAME']);?>">
						</div>
						<div class="name"><?=$arItem['~NAME'];?></div>
						<div class="price"><?=$arItem['PROPERTIES']['PRICE']['VALUE'];?></div>

  					<div class="description">
							<?=$arItem['PREVIEW_TEXT'];?>
						</div>

	  			</div>
<?endforeach;?>
	  			<div class="clear"></div>
	  		</div>