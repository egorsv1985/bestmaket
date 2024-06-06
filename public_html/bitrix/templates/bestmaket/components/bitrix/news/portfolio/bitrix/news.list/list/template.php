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

$this->SetViewTarget("appearance");?>
<div class="appearance">
	Показать работы:
	<span class="list">Списком</span>
	<a href="<?=$APPLICATION->GetCurPageParam("view=tile", array("view", "display", "clear_cache", "PAGEN_1"));?>" class="tile">Плиткой</a>
</div>
<?$this->EndViewTarget();?>

<div class="portfolio-list-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$IMAGES = array();
  if (CModule::IncludeModule("millcom.phpthumb")) {
    $IMAGES[] = CMillcomPhpThumb::generateImg($arItem["DETAIL_PICTURE"]["SRC"], 9);
    $arItem['PROPERTIES']['IMAGES']['VALUE'] = array_slice($arItem['PROPERTIES']['IMAGES']['VALUE'], 0, 4);
  	foreach ($arItem['PROPERTIES']['IMAGES']['VALUE'] as $img) {
    	$IMAGES[] = CMillcomPhpThumb::generateImg($img, 9);
		}
	}
  if (empty($arItem['PREVIEW_TEXT'])) {
		$arItem['PREVIEW_TEXT'] = substr(strip_tags($arItem['DETAIL_TEXT']), 0, 300);
	
	}
	?>
	<div class="portfolio-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="info">
			<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name"><?=$arItem["NAME"]?></a>
			<div class="preview">
				<?=$arItem['PREVIEW_TEXT'];?>
			</div>
			<div class="more">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">узнать о макете больше</a>
			</div>
		</div>
		<div class="images">
			<div class="images-slide">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<ul class="slides">
						<?foreach ($IMAGES as $keyImg => $IMAGE):?>
						<li class="image<?=$keyImg;?><?=($keyImg==0 ? ' active' : '');?>">
							<img src="<?=$IMAGE;?>" alt=""> 
						</li>
						<?endforeach;?>
					</ul>
					<span class="hover">
						<span class="image0 active" data-class="image0"></span>
						<span class="image1" data-class="image1"></span>
						<span class="image2" data-class="image2"></span>
						<span class="image3" data-class="image3"></span>
						<span class="image4" data-class="image4"></span>
					</span>
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?endforeach;?>
	<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
