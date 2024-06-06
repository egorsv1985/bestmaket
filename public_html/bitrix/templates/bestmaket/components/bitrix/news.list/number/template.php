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
	  		<div class="number-items">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		//print_r($arItem);
	?>
	  			<div class="number-item <?=$arItem['PROPERTIES']['SIZE']['VALUE_XML_ID'];?> <?=$arItem['PROPERTIES']['COLOR']['VALUE_XML_ID'];?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<?if ($arItem['PREVIEW_PICTURE']['SRC']):?>
	  				<div class="number-contaner" style="background-image:url('<?=$arItem['PREVIEW_PICTURE']['SRC']?>')"></div>
	<?else:?>
	  				<div class="number-contaner">
	  					<div class="number"><?=$arItem['PROPERTIES']['NUMBER']['VALUE'];?></div>
	  					<div class="name">
								<?=$arItem['~NAME'];?>
							</div>
						</div>
	<?endif;?>
	  			</div>
<?endforeach;?>
	  			<div class="clear"></div>
	  		</div>