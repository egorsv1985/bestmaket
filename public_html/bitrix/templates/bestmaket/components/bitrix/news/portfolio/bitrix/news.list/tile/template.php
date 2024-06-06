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
	<a href="<?=$APPLICATION->GetCurPageParam("view=list", array("view", "display", "clear_cache", "PAGEN_1"));?>" class="list" title="Списком">Списком</a>
	<span class="tile" title="Плиткой">Плиткой</span>
</div>
<?$this->EndViewTarget();?>

<div class="portfolio-tile-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$IMAGES = array();
	
  if (CModule::IncludeModule("millcom.phpthumb")) {
  	if ($arItem["PREVIEW_PICTURE"]["SRC"])
    	$IMAGES[] = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 1);
  	else
    	$IMAGES[] = CMillcomPhpThumb::generateImg($arItem["DETAIL_PICTURE"]["SRC"], 1);

    $arItem['PROPERTIES']['IMAGES']['VALUE'] = array_slice($arItem['PROPERTIES']['IMAGES']['VALUE'], 0, 4);
  	foreach ($arItem['PROPERTIES']['IMAGES']['VALUE'] as $img) {
    	$IMAGES[] = CMillcomPhpThumb::generateImg($img, 1);
		}
	}
	$class = 'center-item';
	if (!($key%3))
		$class = 'left-item';
	elseif (!(($key+1)%3))
		$class = 'right-item';
		

	?>
	<div class="portfolio-item <?=$class;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="images">
			<div class="images-slide">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
					<ul class="slides">
						<?foreach ($IMAGES as $keyImg => $IMAGE):?>
						<li class="image<?=$keyImg;?><?=($keyImg==0 ? ' active' : '');?>">
							<img src="<?=$IMAGE;?>" alt="<?=htmlspecialchars($arItem["NAME"]).($keyImg>0 ? ' '.$keyImg : '');?>"> 
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
		<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name"><?=$arItem["NAME"]?></a>
		<div class="btn clear">
			<a href="#orderPrice" class="fancy">Узнать цену</a>
		</div>
	</div>
<?endforeach;?>
	<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>



<?
$arFilter = Array('IBLOCK_ID' => $arParams['IBLOCK_ID'],'ID' => $arParams['PARENT_SECTION']);
$db_list = CIBlockSection::GetList(Array("timestamp_x"=>"DESC"), $arFilter, false, Array("UF_RECOMMEND"));
if ($uf_value = $db_list->GetNext()):?>
<?if ($uf_value['UF_RECOMMEND']):
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE", "PROPERTY_TOP_IMAGE");
	$arFilter = Array("IBLOCK_ID" => 13, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $uf_value['UF_RECOMMEND']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
?>
<div class="recommend-block">
	<h3>Рекомендуем к прочтению</h3>
	<ul>
<?while($arElement = $res->GetNext()):
  if (CModule::IncludeModule("millcom.phpthumb"))
    $arElement["PREVIEW_PICTURE"] = CMillcomPhpThumb::generateImg(($arElement['PROPERTY_TOP_IMAGE_VALUE'] ? $arElement['PROPERTY_TOP_IMAGE_VALUE'] : $arElement['DETAIL_PICTURE']), 4);
?>
		<li>
			<a href="<?=$arElement['DETAIL_PAGE_URL'];?>" title="<?=$arElement['NAME'];?>">
				<img src="<?=$arElement["PREVIEW_PICTURE"];?>" alt="<?=$arElement['NAME'];?>">
				<strong><?=$arElement['NAME'];?></strong>
			</a>
		</li>
<?endwhile;?>
	</ul>
</div>
<hr>
<?endif;?>
<?endif;?>