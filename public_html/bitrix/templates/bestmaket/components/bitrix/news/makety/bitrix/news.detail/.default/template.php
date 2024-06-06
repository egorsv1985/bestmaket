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

if ($arResult['PROPERTIES']['NEW_PAGE']['VALUE'] == 'Да') {
	require("new.php");
	define("MAP", false);
	define("NOBOTTOMFORM", "N");
	return false;

}





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
		itemWidth: $("#gallery_'.$key.' .small").width()/5,
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
	</div>';
		if (($count_end-$count_start)>1):
	  $form .= '
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
					<span><img src="'.$IMAGE.'" alt="'.$ALT.'" title="'.$ALT.'"></span>
				</li>';			
			}
		}
	  $form .= '
	  </ul>
	</div>';
	endif;
	  $form .= '
</div>
	<div class="text">
	';
		$content = str_replace($match[0][$key], $form, $content);
	}
}	

?>

<div class="main-content">
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<div class="content-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
	<?endif;?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):
     if (CModule::IncludeModule("millcom.phpthumb"))
				$arResult["DETAIL_PICTURE"]["SRC"] = CMillcomPhpThumb::generateImg($arResult["DETAIL_PICTURE"]["SRC"], 5);
	?>
	<div class="page-top">
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"/>
	</div>
	<?endif?>

	<div class="text">
	<?=$content;?>
	</div>

</div>
<div class="sidebar">
<?
$APPLICATION->IncludeFile("/includes/sidebar-makety.php", Array(), Array(
    "MODE"      => "html",                                           // будет редактировать в веб-редакторе
    "NAME"      => "сайдбар",      // текст всплывающей подсказки на иконке
    "TEMPLATE"  => "include.php"                    // имя шаблона для нового файла
    ));
?>
</div>
<div class="clear"></div>