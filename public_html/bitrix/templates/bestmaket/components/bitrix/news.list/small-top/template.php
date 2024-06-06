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
<div class="small-list">
	<div class="title">Популярные статьи</div>

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="small-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<?

	  if (CModule::IncludeModule("millcom.phpthumb")) {
	  	if ($arItem["PREVIEW_PICTURE"]["SRC"])
	    	$arItem["PREVIEW_PICTURE"]["SRC"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 6);
	  	else
	    	$arItem["PREVIEW_PICTURE"]["SRC"] = CMillcomPhpThumb::generateImg($arItem["DETAIL_PICTURE"]["SRC"], 6);
		}
		
		?>

		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
			<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?$arItem["PREVIEW_PICTURE"]["ALT"]:$arItem["NAME"];?>" title="<?=$arItem["NAME"]?>" />
		  <span class="name">
		  	<?=$arItem["NAME"]?>
		  </span>
		  <span class="preview">
		  	<?=$arItem["PREVIEW_TEXT"]?>
		  </span>
		</a>
		<div class="clear"></div>
	</div>
<?endforeach;?>
</div>