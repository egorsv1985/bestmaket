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


<div class="small-slider">
	<h3>Проекты<small>Убедитесь в качестве наших работ!</small></h3>
<?foreach($arResult["ITEMS"] as $i => $arItem):
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				if ($i > 0)
					continue;
?>
	
	<div class="slider" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<ul class="slides">
			<?foreach ($arItem['PROPERTIES']['IMAGES']['VALUE'] as $key => $value):

			  if (CModule::IncludeModule("millcom.phpthumb"))
			    $SRC = CMillcomPhpThumb::generateImg($value, 12);

			?>
			<li>
				<img src="<?=$SRC;?>" alt="<?=$arItem['PROPERTIES']['IMAGES']['DESCRIPTION'][$key];?>">
			  <div><?=$arItem['PROPERTIES']['IMAGES']['DESCRIPTION'][$key];?></div>
			</li>
			<?endforeach;?>
		</ul>
	</div>
<?endforeach;?>
</div>


<?return false;?>
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