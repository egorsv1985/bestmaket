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
<div class="service-main">
	<div class="contaner">
		<div class="large-title">Что мы можем</div>
		<div class="tabs service-tab">
			<ul class="tabs">
<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	//	print_r($arItem);
	?>
	
				<li<?=($key == 0 ? ' class="active"' : '');?> style="width:<?=$arItem['PROPERTIES']['WIDTH']['VALUE']?>%;">
					<a href="#" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<?=(!empty($arItem['PROPERTIES']['TITLE_LARGE']['VALUE']) ? nl2br($arItem['PROPERTIES']['TITLE_LARGE']['VALUE'], false) : $arItem["NAME"] );?>
					</a>
				</li>
<?endforeach;?>
	  	</ul>
	  	<div class="clear"></div>
<?foreach($arResult["ITEMS"] as $key => $arItem):
	$this->AddEditAction($arItem['ID'].'-tab', $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'].'-tab', $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
	
			<div class="tab<?=($key == 0 ? ' active' : '');?> " id="<?=$this->GetEditAreaId($arItem['ID'].'-tab');?>">
				<div class="intro">
					<div class="title">
						<?=(!empty($arItem['PROPERTIES']['TITLE_LARGE']['VALUE']) ? nl2br($arItem['PROPERTIES']['TITLE_LARGE']['VALUE'], false) : $arItem["NAME"] );?>
					</div>
					<?=$arItem['DETAIL_TEXT']?>
				</div>
				<div class="images">
<?if ($arItem['PROPERTIES']['IMAGES']['VALUE']):?>
					<div class="slider">
						<ul class="slides">
<? $foreachIterator = 1;
foreach ($arItem['PROPERTIES']['IMAGES']['VALUE'] as $IMG):
								if (CModule::IncludeModule("millcom.phpthumb"))
									$IMG_THUMB = CMillcomPhpThumb::generateImg($IMG, 8);
							?>
							<li>
								<a href="<?=CFile::GetPath($IMG);?>" class="fancy" rel="gallery<?=$arItem['ID'];?>">
									<img src="<?=$IMG_THUMB;?>" alt="<?=htmlspecialchars(strip_tags(!empty($arItem['PROPERTIES']['TITLE_LARGE']['VALUE'])." ".$foreachIterator ? nl2br($arItem['PROPERTIES']['TITLE_LARGE']['VALUE'])." ".$foreachIterator : $arItem["NAME"]." ".$foreachIterator));?>" width="478" height="358">
								</a>
							</li>
<?
$foreachIterator++;
endforeach;?>
						</ul>
					</div>
					<?endif;?>
					<?if ($arItem['PROPERTIES']['VIDEO']['VALUE']):
				  if (CModule::IncludeModule("millcom.phpthumb"))
				  	$arItem['PROPERTIES']["VIDEO_IMAGE"]['VALUE'] = CMillcomPhpThumb::generateImg($arItem['PROPERTIES']["VIDEO_IMAGE"]['VALUE'], 8);
					
						preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $arItem['PROPERTIES']['VIDEO']['~VALUE'], $match);
					?>
					<div class="video">
						<a href="/ajax.php?url=<?=$match[0][0];?>" class="fancy" data-type="ajax">
							<img src="<?=$arItem['PROPERTIES']["VIDEO_IMAGE"]['VALUE'];?>" alt="<?=htmlspecialchars(strip_tags(!empty($arItem['PROPERTIES']['TITLE_LARGE']['VALUE']) ? nl2br($arItem['PROPERTIES']['TITLE_LARGE']['VALUE']) : $arItem["NAME"]));?>" width="478" height="358">
							<span class="mask"><span></span></span>
						</a>
					</div>
					<!--
					<div class="popup">
						<div class="" id="video<?=$arItem['ID'];?>">
							<?=$arItem['PROPERTIES']['VIDEO']['~VALUE'];?>
						</div>
					</div>
					-->
					<?endif;?>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
<?endforeach;?>

		</div>
		<div class="clear"></div>
	</div>
</div>
