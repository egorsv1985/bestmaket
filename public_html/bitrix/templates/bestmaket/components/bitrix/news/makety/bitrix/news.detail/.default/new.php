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

?>

<?$APPLICATION->AddHeadString("
<style>
.page-title { display: none; }
.breadcrumb { margin-bottom: 0; background: #f4f4f4; position: relative; }
.breadcrumb:before { position: absolute; top: 0; right: 100%; width: 3000px; content: ''; height: 100%; background: #f4f4f4; }
.breadcrumb:after { position: absolute; top: 0; left: 100%; width: 3000px; content: ''; height: 100%; background: #f4f4f4; }
.form-main.contact, .contact-text { display: none; }
.main-contants { padding-top: 0; }
</style>");?>
<div itemscope itemtype="https://schema.org/Product">
	<meta itemprop="name" content="<?=$arResult['NAME'];?>">
	<meta itemprop="sku" content="<?=$arResult['ID'];?>">

	<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<meta itemprop="ratingValue" content="5" />
		<meta itemprop="reviewCount" content="1" />
		<meta itemprop="bestRating" content="5" />
		<meta itemprop="worstRating" content="1" />
	</div>
	<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
		<?if ($arResult['PROPERTIES']['PRICE']['~VALUE']):?>
		<meta itemprop="price" content="<?=$arResult['PROPERTIES']['PRICE']['~VALUE'];?>" />
		<?endif;?>
		<meta itemprop="priceCurrency" content="RUB" />
		<link itemprop="availability" href="http://schema.org/InStock" />
		<link itemprop="url" href="<?=$arResult['DETAIL_PAGE_URL'];?>" />
	</div>


<div class="top-page">
	<div class="top-description">
		<div class="h1"><?$APPLICATION->ShowTitle(false)?></div>
		<div itemprop="description">
			<?=$arResult['PROPERTIES']['TOP_DESCRIPTION']['~VALUE']['TEXT'];?>
		</div>
	</div>
<?if ($arResult['PROPERTIES']['BTN_CALC']['~VALUE']):?>
	<a href="<?=$arResult['PROPERTIES']['BTN_CALC']['~VALUE'];?>" class="btn-marquiz">Узнать стоимость</a>
<?else:?>
<?$APPLICATION->IncludeComponent(
	"tkk:infoportal.element.add.form",
	"horizontal",
	array(
	"COMPONENT_TEMPLATE" => "horizontal",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",	// * дата начала *
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",	// * дата завершения *
		"CUSTOM_TITLE_DETAIL_PICTURE" => "",	// * подробная картинка *
		"CUSTOM_TITLE_DETAIL_TEXT" => "",	// * подробный текст *
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",	// * раздел инфоблока *
		"CUSTOM_TITLE_NAME" => "Ваше имя",	// * наименование *
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",	// * картинка анонса *
		"CUSTOM_TITLE_PREVIEW_TEXT" => "Сообщение",	// * текст анонса *
		"CUSTOM_TITLE_TAGS" => "",	// * теги *
		"DEFAULT_INPUT_SIZE" => "30",	// Размер полей ввода
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования подробного текста
		"ELEMENT_ASSOC" => "CREATED_BY",	// Привязка к пользователю
		"FORM_ID" => "topMainFormSlides",
		"GROUPS" => array(	// Группы пользователей, имеющие право на добавление/редактирование
			0 => "2",
		),
		"IBLOCK_ID" => "2",	// Инфо-блок
		"IBLOCK_TYPE" => "system",	// Тип инфо-блока
		"LEVEL_LAST" => "Y",	// Разрешить добавление только на последний уровень рубрикатора
		"LIST_URL" => "",	// Страница со списком своих элементов
		"MAX_FILE_SIZE" => "0",	// Максимальный размер загружаемых файлов, байт (0 - не ограничивать)
		"MAX_LEVELS" => "100000",	// Ограничить кол-во рубрик, в которые можно добавлять элемент
		"MAX_USER_ENTRIES" => "100000",	// Ограничить кол-во элементов для одного пользователя
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования текста анонса
		"PROPERTY_CODES" => array(	// Свойства, выводимые на редактирование
			0 => "1",
			//1 => "2",
			//2 => "8",
			3 => "NAME",
			//4 => "PREVIEW_TEXT",
		),
		"PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
			0 => "1",
		),
		"RESIZE_IMAGES" => "N",	// Использовать настройки инфоблока для обработки изображений
		"SEF_MODE" => "N",	// Включить поддержку ЧПУ
		"STATUS" => "ANY",	// Редактирование возможно
		"STATUS_NEW" => "N",	// Деактивировать элемент
		"USER_MESSAGE_ADD" => "",	// Сообщение об успешном добавлении
		"USER_MESSAGE_EDIT" => "",	// Сообщение об успешном сохранении
		"USE_CAPTCHA" => "N",	// Использовать CAPTCHA
	)
);?>
<?endif;?>
	<div class="top-description-small">
		<?=$arResult['PROPERTIES']['TOP_DESCRIPTION_2']['~VALUE']['TEXT'];?>
	</div>
	<div class="top-description-image" style="background-size:<?=($arResult['PROPERTIES']['TOP_IMAGE_FORMAT']['VALUE_XML_ID'] ? $arResult['PROPERTIES']['TOP_IMAGE_FORMAT']['VALUE_XML_ID'] : 'cover');?>; background-image: url('<?=CFile::GetPath($arResult['PROPERTIES']['TOP_IMAGE']['VALUE']);?>');"></div>
</div>
<?if(isset($arResult['PROPERTIES']['BLOCK_7_TEXT']['~VALUE']['TEXT']) && $arResult['PROPERTIES']['BLOCK_7_TEXT']['~VALUE']['TEXT']):?>
<div class="block-number block-large">
	<div class="block-number-text">
    <?=$arResult['PROPERTIES']['BLOCK_7_TEXT']['~VALUE']['TEXT'];?>
	</div>
</div>
<div class="price-items">
	<?if($arResult['PROPERTIES']['BLOCK_7_IMAGE_1']):?>
	<div class="price-item">
		<div class="price-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="url" src="<?=CFile::GetPath($arResult['PROPERTIES']['BLOCK_7_IMAGE_1']['VALUE']);?>" alt="<?=htmlspecialchars($arResult['PROPERTIES']['BLOCK_7_TITLE_1']['~VALUE']);?>">
		</div>
		<div class="name"><?=$arResult['PROPERTIES']['BLOCK_7_TITLE_1']['~VALUE'];?></div>
		<div class="price"><?=$arResult['PROPERTIES']['BLOCK_7_PRICE_1']['~VALUE'];?></div>
		<div class="description">
			<?=$arResult['PROPERTIES']['BLOCK_7_DESCR_1']['~VALUE']['TEXT'];?>
		</div>
	</div>
	<?endif;?>
	<?if($arResult['PROPERTIES']['BLOCK_7_IMAGE_2']):?>
	<div class="price-item">
		<div class="price-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="url" src="<?=CFile::GetPath($arResult['PROPERTIES']['BLOCK_7_IMAGE_2']['VALUE']);?>" alt="<?=htmlspecialchars($arResult['PROPERTIES']['BLOCK_7_TITLE_2']['~VALUE']);?>">
		</div>
		<div class="name"><?=$arResult['PROPERTIES']['BLOCK_7_TITLE_2']['~VALUE'];?></div>
		<div class="price"><?=$arResult['PROPERTIES']['BLOCK_7_PRICE_2']['~VALUE'];?></div>
		<div class="description">
			<?=$arResult['PROPERTIES']['BLOCK_7_DESCR_2']['~VALUE']['TEXT'];?>
		</div>
	</div>
	<?endif;?>
	<?if($arResult['PROPERTIES']['BLOCK_7_IMAGE_3']):?>
	<div class="price-item">
		<div class="price-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="url" src="<?=CFile::GetPath($arResult['PROPERTIES']['BLOCK_7_IMAGE_3']['VALUE']);?>" alt="<?=htmlspecialchars($arResult['PROPERTIES']['BLOCK_7_TITLE_3']['~VALUE']);?>">
		</div>
		<div class="name"><?=$arResult['PROPERTIES']['BLOCK_7_TITLE_3']['~VALUE'];?></div>
		<div class="price"><?=$arResult['PROPERTIES']['BLOCK_7_PRICE_3']['~VALUE'];?></div>
		<div class="description">
			<?=$arResult['PROPERTIES']['BLOCK_7_DESCR_3']['~VALUE']['TEXT'];?>
		</div>
	</div>
	<?endif;?>
	<?if($arResult['PROPERTIES']['BLOCK_7_IMAGE_4']):?>
	<div class="price-item">
		<div class="price-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
			<img itemprop="url" src="<?=CFile::GetPath($arResult['PROPERTIES']['BLOCK_7_IMAGE_4']['VALUE']);?>" alt="<?=htmlspecialchars($arResult['PROPERTIES']['BLOCK_7_TITLE_4']['~VALUE']);?>">
		</div>
		<div class="name"><?=$arResult['PROPERTIES']['BLOCK_7_TITLE_4']['~VALUE'];?></div>
		<div class="price"><?=$arResult['PROPERTIES']['BLOCK_7_PRICE_4']['~VALUE'];?></div>
		<div class="description">
			<?=$arResult['PROPERTIES']['BLOCK_7_DESCR_4']['~VALUE']['TEXT'];?>
		</div>
	</div>
	<?endif;?>

	<div class="clear"></div>
</div>
<?endif;?>

<?if($arResult['PROPERTIES']['TOP_DESCRIPTION_3']['~VALUE']['TEXT']):?>
<div class="image-descr-block">
	<div class="top-descr-block-image" itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
		<img itemprop="url" src="<?=CFile::GetPath($arResult['PROPERTIES']['TOP_IMAGE_2']['VALUE']);?>" alt="<?=htmlspecialchars($arResult['NAME']);?>">
	</div>
	<div class="top-descr-text">
		<?=$arResult['PROPERTIES']['TOP_DESCRIPTION_3']['~VALUE']['TEXT'];?>
	</div>
	<div class="top-descr-block-bg" style="background-image: url('<?=CFile::GetPath($arResult['PROPERTIES']['TOP_IMAGE_2']['VALUE']);?>');"></div>
	<div class="clear"></div>
</div>
<?endif;?>
<div class="small-slider">
	<h3><?=$arResult['PROPERTIES']['SLIDER_3_TITLE']['VALUE'];?></h3>
	<?if ($arResult['PROPERTIES']['BLOCK_3_VIDEO']['VALUE']):?>
	<div class="video-items">
		<?
		$arFilter = Array(
		 "IBLOCK_ID" => 19,
		 "ID" => $arResult['PROPERTIES']['BLOCK_3_VIDEO']['VALUE']
		);

		$res = CIBlockElement::GetList(Array("SORT"=>"ASC", "PROPERTY_PRIORITY" => "ASC"), $arFilter, false, false, Array("*", 'PROPERTY_VIDEO_CODE'));
		while($ar_fields = $res->GetNext()):
			if (CModule::IncludeModule("millcom.phpthumb"))
				$SRC = CMillcomPhpThumb::generateImg($ar_fields["PREVIEW_PICTURE"], 4);
				$value = $ar_fields['~PROPERTY_VIDEO_CODE_VALUE'];
				preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $value, $match);
				/*
				preg_match('/embed\/(.+)\?/is', $value, $m);
				if ($m[1] == '') {
					preg_match('/embed\/(.+)\" fra/is', $value, $m);
				}
				$image = 'https://i1.ytimg.com/vi/'.$m[1].'/hqdefault.jpg';
*/
				?>
		<div class="video-item">
			<a href="/ajax.php?url=<?=$match[0][0];?>" class="fancy">
				<img src="<?=$SRC;?>" alt="<?=htmlspecialchars($ar_fields['NAME']);?>">
				<span class="mask">
					<span class="name"><?=$ar_fields['NAME']?></span>
					<span class="btn">Смотреть</span>
				</span>
			</a>
		</div>
		<?endwhile;?>
		<div class="clear"></div>
	</div>
	<?elseif ($arResult['PROPERTIES']['SLIDER_3_IMAGES']['VALUE']):?>
	<div class="slider">
		<ul class="slides">
			<?foreach ($arResult['PROPERTIES']['SLIDER_3_IMAGES']['VALUE'] as $key => $value):
				if (CModule::IncludeModule("millcom.phpthumb"))
					$SRC = CMillcomPhpThumb::generateImg($value, 12);
				$DESCRIPTION = explode('|', $arResult['PROPERTIES']['SLIDER_3_IMAGES']['~DESCRIPTION'][$key]);
				$DESCRIPTION[0] = str_replace('“', '"' , $DESCRIPTION[0]);
				$DESCRIPTION[0] = str_replace('”', '"' , $DESCRIPTION[0]);
				if (!$DESCRIPTION[1]) {
					preg_match('/"(.+)"/is', $DESCRIPTION[0], $m);
					if ($m[1]) {
						$arFilter = Array(
							"IBLOCK_ID" => 4,
							"%NAME" => $m[1]
						);
						print_r($arFilter);
						$res = CIBlockElement::GetList(false, $arFilter, false, false, Array("*"));
						while($ar_fields = $res->GetNext()) {
							$DESCRIPTION[1] = $ar_fields['DETAIL_PAGE_URL'];
						}
					}
				}
			?>
			<li itemprop="image" itemscope itemtype="http://schema.org/ImageObject">
				<?if ($DESCRIPTION[1]):?>
				<a href="<?=$DESCRIPTION[1];?>" target="_blank">
					<img itemprop="url" src="<?=$SRC;?>" alt="<?=($DESCRIPTION[0] ? htmlspecialchars($DESCRIPTION[0]) : 'Примеры работ');?>">
				</a>
				<?else:?>
				<img itemprop="url" src="<?=$SRC;?>" alt="<?=($DESCRIPTION[0] ? htmlspecialchars($DESCRIPTION[0]) : 'Примеры работ');?>">
				<?endif;?>
				<div><?=$DESCRIPTION[0];?></div>
			</li>
			<?endforeach;?>
		</ul>
	</div>
	<?endif;?>
</div>

<div class="block-number">
	<?if($arResult['PROPERTIES']['BLOCK_4_TITLE']['VALUE']):?>
	<h3 class="title"><?=$arResult['PROPERTIES']['BLOCK_4_TITLE']['VALUE'];?></h3>
	<?endif;?>
	<?if ($arResult['PROPERTIES']['BLOCK_4_NUMBER']['VALUE']):?>
	<div class="number-items">
  <?foreach ($arResult['PROPERTIES']['BLOCK_4_NUMBER']['VALUE'] as $key => $value):?>
  	<div class="number-item <?=($key%2 ? 'blue' : 'green')?>">
			<div class="number-contaner">
				<div class="number"><?=$value;?></div>
				<div class="name"><?=$arResult['PROPERTIES']['BLOCK_4_NUMBER']['DESCRIPTION'][$key];?></div>
			</div>
  	</div>
  <?endforeach;?>
  	<div class="clear"></div>
  </div>
  <?endif?>
  <div class="block-number-text">
  <?=$arResult['PROPERTIES']['BLOCK_4_TEXT']['~VALUE']['TEXT'];?>
  </div>
</div>

<div class="block-video">
	<?if($arResult['PROPERTIES']['BLOCK_5_TITLE']['VALUE']):?>
	<h3 class="title"><?=$arResult['PROPERTIES']['BLOCK_5_TITLE']['VALUE'];?></h3>
	<?endif;?>
	<div class="videos">
		<?foreach ($arResult['PROPERTIES']['BLOCK_5_VIDEO']['~VALUE'] as $key => $value):?>
<?
preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $value, $match);


preg_match('/embed\/(.+)\?/is', $value, $m);
if ($m[1] == '') {
	preg_match('/embed\/(.+)\" fra/is', $value, $m);
}

if ($m[1] != '') {
	$image = 'https://i1.ytimg.com/vi/'.$m[1].'/hqdefault.jpg';
/*
	$pathinfo = pathinfo('http://i1.ytimg.com/vi/'.$m[1].'/hqdefault.jpg');
	$image = 'assets/images/youtube/'.$m[1].'.'.$pathinfo['extension'];
	if (!file_exists($modx->config['base_path'].$image)) {
		$file_content = @file_get_contents('http://i1.ytimg.com/vi/'.$m[1].'/hqdefault.jpg');
		if ($pageDocument === false || $file_content == '') {
			$image = '';
		} else {
			if (!isset($pathinfo['extension']) || $pathinfo['extension'] == '') $pathinfo['extension'] = 'jpg';
			$handle = fopen($modx->config['base_path'].$image, "w");
			fwrite($handle, $file_content);
			fclose($handle);
		}
	}
	*/
} else {
	$image = '/bitrix/templates/bestmaket/images/video_bg.jpg';
}


?>
		<div class="video">
			<a href="/ajax.php?url=<?=$match[0][0];?>" class="fancy" data-type="ajax" >
				<img src="<?=$image;?>" alt="Видео">
				<span class="mask"><span></span></span>
			</a>
		</div>
		<?endforeach;?>
		<div class="clear"></div>
	</div>
</div>
<div class="text-bottom">
	<?=$arResult['PROPERTIES']['BLOCK_6_TEXT']['~VALUE']['TEXT'];?>
</div>
</div>