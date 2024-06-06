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
<div class="main-content">
	<div class="blog-items">

<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	if (!($key%2))
		$class = 'clear left-item';
	else
		$class = 'right-item';
	?>
		<div class="blog-item <?=$class;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">   
<?
  if (CModule::IncludeModule("millcom.phpthumb")) {
  	if ($arItem["PREVIEW_PICTURE"]["SRC"])
    	$arItem["PREVIEW_PICTURE"]["SRC"] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 4);
  	else
    	$arItem["PREVIEW_PICTURE"]["SRC"] = CMillcomPhpThumb::generateImg($arItem["DETAIL_PICTURE"]["SRC"], 4);
	}
?>
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
				<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]? $arItem["PREVIEW_PICTURE"]["ALT"] : $arItem['NAME'];?>" title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]? $arItem["PREVIEW_PICTURE"]["TITLE"] : $arItem['NAME'];?>"/>
				<span class="name">
					<?=$arItem['NAME'];?>
				</span>	
			</a>	
			<div class="preview">
				<?=$arItem["PREVIEW_TEXT"];?>
			</div>
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<div class="date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
		<?endif?>
	</div>
<?endforeach;?>
	</div>

</div>
<div class="sidebar">
<?
$APPLICATION->IncludeFile("/includes/sidebar.php", Array(), Array(
    "MODE"      => "php",                                           // будет редактировать в веб-редакторе
    "NAME"      => "сайдбар",      // текст всплывающей подсказки на иконке
    "TEMPLATE"  => "include.php"                    // имя шаблона для нового файла
    ));
?>
</div>
<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
