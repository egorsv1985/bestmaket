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
<div class="works-items">

<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'].'-item', $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'].'-item', $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<!--
	<?
	//print_r($arItem['ID']);
	?>
	-->
	<?if (empty($arItem['PROPERTIES']['NUMBER']['VALUE'])):?>
	<div class="work-item item<?=$key++;?>" id="<?=$this->GetEditAreaId($arItem['ID'].'-item');?>">
		<a href="<?=$arItem['PROPERTIES']['LINK']['VALUE'];?>" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>');">
			<span class="bg">
				<span class="title">
				<?=$arItem['PREVIEW_TEXT'];?>
				</span>
			</span>
		</a>
	</div>
	<?else:?>
	<div class="work-item item<?=$key++;?> number" id="<?=$this->GetEditAreaId($arItem['ID'].'-item');?>">
		<a href="<?=$arItem['PROPERTIES']['LINK']['VALUE'];?>">
			<span class="bg">
				<span class="num">
					<?=$arItem['PROPERTIES']['NUMBER']['VALUE'];?>
				</span>
				<span class="label">
					<?=htmlspecialchars_decode($arItem['PREVIEW_TEXT']);?>
				</span>
			</span>
		</a>
	</div>
	<?endif;?>
<?endforeach;?>
	<div class="clear"></div>
</div>
