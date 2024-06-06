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

$this->SetViewTarget("page_image");?>
<div class="top-image" style="background-image: url('<?=$arResult["DETAIL_PICTURE"]["SRC"]?>');"></div>
<?$this->EndViewTarget();?>


<?

$content = $arResult["DETAIL_TEXT"];
preg_match_all("|<p class=\"gallery\">(.*?)</p>|is", $content, $match);
if (!empty($match)) {
	foreach ($match[1] as $key => $title) {
		$title = trim($title);
		$script = '';
	  $form = '
</div>
<script>
$(window).load(function() {
	$("#gallery_'.$key.' .small").flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: $("#gallery_'.$key.' .small").width()/7,
		itemMargin: 7,
		asNavFor: "#gallery_'.$key.' .large"
  });
	$("#gallery_'.$key.' .large").flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#gallery_'.$key.' .small"
	});
});
</script>
  <div class="gallery-slide" id="gallery_'.$key.'">
	<div class="large">
		<ul class="slides">';

		$count = explode('-', $title);

		if (isset($count[0])) {
		  $count_start = trim($count[0]);
		} else {
			$count_start = 0;
		}


		if (isset($count[1])) {
		  $count_end = trim($count[1]);
		} else {
			$count_end = count($arResult['PROPERTIES']['IMAGES']['VALUE']);
		}

		if ($count_end > count($arResult['PROPERTIES']['IMAGES']['VALUE']))
			$count_end = count($arResult['PROPERTIES']['IMAGES']['VALUE']);

		for ($i=$count_start; $i<$count_end; $i++) {
			if ($arResult['PROPERTIES']['IMAGES']['VALUE'][$i]) {
				$img = $arResult['PROPERTIES']['IMAGES']['VALUE'][$i];
				CModule::IncludeModule("millcom.phpthumb");
				$IMAGE = CMillcomPhpThumb::generateImg($img, 2);
				$ALT = $arResult['PROPERTIES']['IMAGES']['DESCRIPTION'][$i] ? $arResult['PROPERTIES']['IMAGES']['DESCRIPTION'][$i] : $arResult["NAME"];
				$form .= '
				<li>
					<img src="'.$IMAGE.'" alt="'.$ALT.'" title="'.$ALT.'">
				</li>';
			}
		}




	  $form .= '
	  </ul>
	</div>
	<div class="small">
		<ul class="slides">';

		$count = explode('-', $title);

		if (isset($count[0])) {
		  $count_start = trim($count[0]);
		} else {
			$count_start = 0;
		}


		if (isset($count[1])) {
		  $count_end = trim($count[1]);
		} else {
			$count_end = count($arResult['PROPERTIES']['IMAGES']['VALUE']);
		}

		if ($count_end > count($arResult['PROPERTIES']['IMAGES']['VALUE']))
			$count_end = count($arResult['PROPERTIES']['IMAGES']['VALUE']);

		for ($i=$count_start; $i<$count_end; $i++) {
			if ($arResult['PROPERTIES']['IMAGES']['VALUE'][$i]) {
				$img = $arResult['PROPERTIES']['IMAGES']['VALUE'][$i];
				CModule::IncludeModule("millcom.phpthumb");
				$IMAGE = CMillcomPhpThumb::generateImg($img, 3);
				$ALT = $arResult['PROPERTIES']['IMAGES']['DESCRIPTION'][$i] ? $arResult['PROPERTIES']['IMAGES']['DESCRIPTION'][$i] : $arResult["NAME"];
				$form .= '
				<li>
					<span><img src="'.$IMAGE.'" alt="'.$ALT.'" title="'.$ALT.'" itemprop="contentUrl"></span>
				</li>';
			}
		}
	  $form .= '
	  </ul>
	</div>
</div>
<div itemprop="description" class="portfolio-text text">
	';
		$content = str_replace($match[0][$key], $form, $content);
	}
}

?>

<div class="block-intro">
	<ul class="options">
<?
$strlenMax = 0;
foreach ($arResult['PROPERTIES']['OPTIONS']['VALUE'] as $key => $value) {
	if ($strlenMax < strlen($arResult['PROPERTIES']['OPTIONS']['DESCRIPTION'][$key]))
  	$strlenMax = strlen($arResult['PROPERTIES']['OPTIONS']['DESCRIPTION'][$key]);
}
foreach ($arResult['PROPERTIES']['OPTIONS']['VALUE'] as $key => $value):?>
		<li>
			<small>
				<?=$value;?>
			</small>
			<?
			if ($strlenMax/2 > strlen($arResult['PROPERTIES']['OPTIONS']['DESCRIPTION'][$key]))
				echo str_replace(' ', '&nbsp;', $arResult['PROPERTIES']['OPTIONS']['DESCRIPTION'][$key]);
			else
				echo str_replace(' ', ' ', $arResult['PROPERTIES']['OPTIONS']['DESCRIPTION'][$key]);
			?>
		</li>
<?endforeach;?>
	</ul>
	<?if(!empty($arResult['PROPERTIES']['INTRO']['VALUE'])):?>
	<div itemprop="description" class="intro-text">
		<?=$arResult['PROPERTIES']['INTRO']['VALUE']['TEXT'];?>
	</div>
	<?endif;?>
</div>
<div class="btn-large top-btn">
	<a href="#orderPrice" class="fancy">Узнать стоимость подобного макета</a>
</div>
<div itemprop="description" class="portfolio-text text">
	<?
	$content = str_replace('#popupOrder', '#orderPrice', $content);
	?>
	<?=$content;?>

</div>


<?if ($arResult['PROPERTIES']['RECOMMEND']['VALUE']):
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "DETAIL_PICTURE", "PROPERTY_TOP_IMAGE");
	$arFilter = Array("IBLOCK_ID" => 13, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "ID" => $arResult['PROPERTIES']['RECOMMEND']['VALUE']);
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
				<img src="<?=$arElement["PREVIEW_PICTURE"];?>" alt="<?=$arElement['NAME']; ?>"itemprop="contentUrl">
				<strong><?=$arElement['NAME'];?></strong>
			</a>
		</li>
<?endwhile;?>
	</ul>
</div>
<?endif;?>

<div class="prev-next">


<?
$arSort = array(
	$arParams["SORT_BY1"] => $arParams["SORT_ORDER1"],
	$arParams["SORT_BY2"] => $arParams["SORT_ORDER2"],
);
$arFilter = array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID" => $arResult['SECTION']['PATH'][0]['ID']);


$rs=CIBlockElement::GetList($arSort, $arFilter, false, array( "nElementID" => $arResult["ID"], "nPageSize"=>1), array("ID", "NAME", "SORT", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"));
	while($ar=$rs->GetNext()) { $page[] = $ar; }
	?>
	<?if (count($page) == 2 && $arResult["ID"] == $page[0]["ID"]):?>
			<a href="<?=$page[1]['DETAIL_PAGE_URL']?>" title="<?=$page[1]['NAME']?>" class="next">Следующий проект</a>
	<?elseif (count($page) == 3):?>
			<a href="<?=$page[0]['DETAIL_PAGE_URL']?>" title="<?=$page[0]['NAME']?>" class="prev">Предыдущий проект </a>
			<a href="<?=$page[2]['DETAIL_PAGE_URL']?>" title="<?=$page[2]['NAME']?>" class="next">Следующий проект</a>
	<?elseif (count($page) == 2 && $arResult["ID"] == $page[1]["ID"]):?>
			<a href="<?=$page[0]['DETAIL_PAGE_URL']?>" title="<?=$page[0]['NAME']?>" class="prev">&lt; Предыдущий проект </a>
	<?endif;?>
			<a href="<?=$arResult['LIST_PAGE_URL'];?>" class="back">назад в портфолио</a>
		<div class="clear"></div>
</div>

<?return false;?>
<div class="news-detail">
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>" itemprop="contentUrl"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>