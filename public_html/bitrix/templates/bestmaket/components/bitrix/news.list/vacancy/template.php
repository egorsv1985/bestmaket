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
<div class="vacancy">
  <div class="contaner">

<?foreach($arResult["ITEMS"] as $key => $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	// ($key == 0 ? ' active' : '');
  ?>
	<div class="vacancy-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>" id="vacancy<?=$arItem['ID'];?>">
    <div class="vacancy-text">
      <div class="salary">
        <?=$arItem["PROPERTIES"]['SALARY']['VALUE'];?>
      </div>
      <div class="name"><?=$arItem["NAME"]?></div>
      <div class="text">
        <div class="preview">
          <?=$arItem["PREVIEW_TEXT"];?>
        </div>
        <div class="detail">
          <?=$arItem["DETAIL_TEXT"];?>
        </div>
        <!--
        <div class="open">
          <p><a href="#">Смотреть подробнее</a></p>
        </div>
        <div class="close">
          <p><a href="#">Свернуть подробнее</a></p>
        </div>
  -->
      </div>
		  <div class="date"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
      <div class="arrow">
        Вы с нами? тогда раскажите о себе
      </div>
    </div>
    <div class="vacancy-form">
    <?$APPLICATION->IncludeComponent(
	"tkk:infoportal.element.add.form",
	"form-vacancy",
	array(
	"COMPONENT_TEMPLATE" => "form-small",
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
		"FORM_ID" => "topMainForm",
		"GROUPS" => array(	// Группы пользователей, имеющие право на добавление/редактирование
			0 => "2",
		),
		"IBLOCK_ID" => "22",	// Инфо-блок
		"IBLOCK_TYPE" => "system",	// Тип инфо-блока
		"LEVEL_LAST" => "Y",	// Разрешить добавление только на последний уровень рубрикатора
		"LIST_URL" => "",	// Страница со списком своих элементов
		"MAX_FILE_SIZE" => "0",	// Максимальный размер загружаемых файлов, байт (0 - не ограничивать)
		"MAX_LEVELS" => "100000",	// Ограничить кол-во рубрик, в которые можно добавлять элемент
		"MAX_USER_ENTRIES" => "100000",	// Ограничить кол-во элементов для одного пользователя
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",	// Использовать визуальный редактор для редактирования текста анонса
		"PROPERTY_CODES" => array(	// Свойства, выводимые на редактирование
			0 => "72",
			1 => "NAME",
			2 => "73",
			//2 => "8",
      4 => 75,
      5 => 76
			//4 => "PREVIEW_TEXT",
		),
		"PROPERTY_CODES_REQUIRED" => array(	// Свойства, обязательные для заполнения
			//0 => "NAME",
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
    </div>
    <div class="clear"></div>
	</div>
<?endforeach;?>

  </div>
</div>
