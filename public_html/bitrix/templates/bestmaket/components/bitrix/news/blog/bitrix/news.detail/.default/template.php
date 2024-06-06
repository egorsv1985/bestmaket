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

<div itemscope itemtype="http://schema.org/Article" class="main-content">
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<div class="content-date"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></div>
	<?endif;?>
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):
     if (CModule::IncludeModule("millcom.phpthumb"))
				$arResult["DETAIL_PICTURE"]["SRC"] = CMillcomPhpThumb::generateImg($arResult["DETAIL_PICTURE"]["SRC"], 5);
	?>
	<div itemscope itemprop="image" itemtype="http://schema.org/ImageObject" class="page-top">
		<img itemprop="image" src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>" title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"/>
	</div>
	<?endif?>

	<div itemprop="articleBody" class="text">
	<?=$content;?>

		<?if ($arResult["TAGS"]):?>
		<p> 
		<?
		  $arrTags = explode(',', $arResult["TAGS"]);
		  $count = count($arrTags);
		  $i = 0;
		  
		  foreach($arrTags as $value):
		     $i++;
		     $value = trim($value);
		     echo '<a href="/search/?tags='.str_replace(' ', '+', $value).'">'.$value.'</a>';      
		     if($i != $count) echo ', ';
		  endforeach;
		?>
		</p>
		<?endif;?>
	</div>



		
		<?if ($arParams['QUIZ'] == 'Y'):?>
		<div class="marquiz__container marquiz__container_inline">
			<a class="marquiz__button marquiz__button_blicked marquiz__button_rounded marquiz__button_shadow" href="#popup:marquiz_5b6c2c730c7c7e004245ea9d" data-fixed-side="" data-alpha-color="rgba(211, 64, 133, 0.5)" data-color="#d34085" data-text-color="#ffffff">Пройти тест</a>
		</div>
		<?else:?>
			<div class="prev-next blog">
				<div class="prev-next-contaner">
		<?
		$arFilter = array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID" => $arResult['SECTION']['PATH'][0]['ID']);
		$rs=CIBlockElement::GetList(array('ID' => 'DESC'), $arFilter, false, array( "nElementID" => $arResult["ID"], "nPageSize"=>1), array("ID", "NAME", "SORT", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"));
		while($ar=$rs->GetNext()) { $page[] = $ar; } 
			if (count($page) == 2 && $arResult["ID"] == $page[0]["ID"]):
				$rs=CIBlockElement::GetList(array('ID' => 'ASC'), $arFilter, false, false, array("ID", "NAME", "SORT", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"));
				$ar=$rs->GetNext();?>
					<a href="<?=$ar['DETAIL_PAGE_URL']?>" title="<?=$ar['NAME']?>" class="prev">
						<span><?=$ar['NAME']?></span>
						предыдущий пост
					</a>
					<a href="<?=$page[1]['DETAIL_PAGE_URL']?>" title="<?=$page[1]['NAME']?>" class="next">
						<span><?=$page[1]['NAME']?></span>
						следующий пост
					</a>
			<?elseif (count($page) == 3):?>
					<a href="<?=$page[0]['DETAIL_PAGE_URL']?>" title="<?=$page[0]['NAME']?>" class="prev">
						<span><?=$page[0]['NAME']?></span>
						предыдущий пост
					</a>
					<a href="<?=$page[2]['DETAIL_PAGE_URL']?>" title="<?=$page[2]['NAME']?>" class="next">
						<span><?=$page[2]['NAME']?></span>
						следующий пост
					</a>
			<?elseif (count($page) == 2 && $arResult["ID"] == $page[1]["ID"]):?>
					<a href="<?=$page[0]['DETAIL_PAGE_URL']?>" title="<?=$page[0]['NAME']?>" class="prev">
						<span><?=$page[0]['NAME']?></span>
						предыдущий пост
					</a>
			<?
			$arSort = array('ID' => 'DESC');
			$rs=CIBlockElement::GetList($arSort, $arFilter, false, false, array("ID", "NAME", "SORT", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"));
			$ar=$rs->GetNext();?>
					<a href="<?=$ar['DETAIL_PAGE_URL']?>" title="<?=$ar['NAME']?>" class="next">
						<span><?=$ar['NAME']?></span>
						следующий пост
					</a>		
			<?endif;?>
				<div class="clear"></div>
			</div>
		</div>
		<div class="other-blog-items">
			<div class="title">Другие интересные статьи</div>
<?
$arFilter = array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arResult["IBLOCK_ID"], "SECTION_ID" => $arResult['SECTION']['PATH'][0]['ID']);
$rs=CIBlockElement::GetList(array('RAND' => 'rand'), $arFilter, false, array("nPageSize" => 2), array("DETAIL_PICTURE", "ID", "NAME", "SORT", "DETAIL_PAGE_URL", "IBLOCK_SECTION_ID"));
while($ar=$rs->GetNext()):
  if (CModule::IncludeModule("millcom.phpthumb")) {
    $ar["DETAIL_PICTURE"] = CMillcomPhpThumb::generateImg($ar["DETAIL_PICTURE"], 4);
	}
?>
			<div class="other-blog-item">
				<a href="<?=$ar['DETAIL_PAGE_URL'];?>">
					<img src="<?=$ar['DETAIL_PICTURE'];?>" alt="<?=$ar['NAME'];?>" title="<?=$ar['NAME'];?>">
					<?=$ar['NAME'];?>
				</a>
			</div>
<?endwhile;?>
			<div class="clear"></div>
		</div>
		<?endif;?>

	</div>

<div class="sidebar">
<?
$APPLICATION->IncludeFile("/includes/sidebar.php", Array(), Array(
    "MODE"      => "html",                                           // будет редактировать в веб-редакторе
    "NAME"      => "сайдбар",      // текст всплывающей подсказки на иконке
    "TEMPLATE"  => "include.php"                    // имя шаблона для нового файла
    ));
?>
</div>
<div class="clear"></div>
<!-- /end blog item-->