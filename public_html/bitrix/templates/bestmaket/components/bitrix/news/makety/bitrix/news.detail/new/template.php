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
<div class="top-page">
	<div class="top-description">
		<?=$arResult['PROPERTIES']['TOP_DESCRIPTION']['~VALUE']['TEXT'];?>
	</div>
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

	<div class="top-description-small">
		<?=$arResult['PROPERTIES']['TOP_DESCRIPTION_2']['~VALUE']['TEXT'];?>
	</div>
	<div class="top-description-image" style="background-image: url('<?=CFile::GetPath($arResult['PROPERTIES']['TOP_IMAGE']['VALUE']);?>');"></div>
</div>
<?if($arResult['PROPERTIES']['TOP_DESCRIPTION_3']['~VALUE']['TEXT']):?>
<div class="image-descr-block">
	<div class="top-descr-block-image">
		<img src="<?=CFile::GetPath($arResult['PROPERTIES']['TOP_IMAGE_2']['VALUE']);?>" alt="<?=htmlspecialchars($arResult['NAME']);?>">
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
	<div class="slider">
		<ul class="slides">
			<?foreach ($arResult['PROPERTIES']['SLIDER_3_IMAGES']['VALUE'] as $key => $value):
				if (CModule::IncludeModule("millcom.phpthumb"))
					$SRC = CMillcomPhpThumb::generateImg($value, 12);

			?>
			<li>
				<img src="<?=$SRC;?>">
			  <div><?=$arResult['PROPERTIES']['SLIDER_3_IMAGES']['DESCRIPTION'][$key];?></div>
			</li>
			<?endforeach;?>
		</ul>
	</div>
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
	<?foreach ($arResult['PROPERTIES']['BLOCK_5_VIDEO']['~VALUE'] as $key => $value):?>
<?
preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $value, $match);

?>
	<div class="video">
		<a href="/ajax.php?url=<?=$match[0][0];?>" class="fancy" data-type="ajax">
			<img src="/bitrix/templates/bestmaket/images/video_bg.jpg" alt="Видео">
			<span class="mask"><span></span></span>
		</a>
	</div>
	<?endforeach;?>
	<div class="clear"></div>
</div>
<div class="text-bottom">
	<?=$arResult['PROPERTIES']['BLOCK_6_TEXT']['~VALUE']['TEXT'];?>
</div>
<?return false;?>
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

<div class="clear"></div>