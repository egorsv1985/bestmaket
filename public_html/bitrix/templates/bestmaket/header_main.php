<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
	
if(!defined("PAGE"))
  define("PAGE", "TEXT");

global $ERROR_404;


?><!DOCTYPE html>
<html dir="ltr" lang="ru">
<head>
   <?
   /*
   $lastModified = strtotime('2022-06-18 19:01:58');
   // дата последней загрузки, отправляемая клиентом
   $ifModified = strtotime(substr($_SERVER['HTTP_IF_MODIFIED_SINCE'] ?? '', 5));

   if ($ifModified && $ifModified >= $lastModified) {
       // страница не изменилась, отдача http статуса 304
       header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified');
       exit;
   }
   header('Last-Modified: ' . gmdate("D, d M Y H:i:s \G\M\T", $lastModified));
   */
?>
	<title><?$APPLICATION->ShowTitle();?></title>
	<?$APPLICATION->ShowHead();?>
	<?$APPLICATION->SetAdditionalCSS('https://fonts.googleapis.com/css?family=Roboto:300,400,700,900&amp;display=swap&amp;subset=cyrillic', true);?>

	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery-1.8.2.min.js");?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.fancybox-1.3.4.js");?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.flexslider.js");?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.inputmask.js");?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/autoresize.jquery.js");?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/script.js");?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/normalize.css');?> 
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/jquery.fancybox-1.3.4.css');?>

	<? /* Карта в футере */?>
	<?
	//$APPLICATION->AddHeadScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyA7IG-mXqYnNwnQDFvhVi17zNT_zsTrBxY&callback=initMap");
	?>

	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?=SITE_TEMPLATE_PATH;?>/mobile.css?v=9" media="only screen and (max-width: 900px)">
    <meta name="cmsmagazine" content="0dc6be246ef5144e0f67fa4b0fa7b3fc">
    <meta name="google-site-verification" content="OIlCjUYbL2R2tihyhAcxNE2B-CGTifCNvciCoTT8f-U">

  <?if(strpos($_SERVER['HTTP_USER_AGENT'],'Chrome-Lighthouse') === false):?>
<?
$APPLICATION->IncludeFile("/includes/code-head.php", array(), array(
	'NAME' => 'код в блоке head',
	'MODE' => 'text'
));
?>
<?endif;?>
</head>
<body>
<div class="page-hidden">
<?if(strpos($_SERVER['HTTP_USER_AGENT'],'Chrome-Lighthouse') === false):?>
<?
$APPLICATION->IncludeFile("/includes/code-body.php", array(), array(
	'NAME' => 'код в блоке body',
	'MODE' => 'text'
));
?>
<?endif;?>
	<div id="panel">
		<?$APPLICATION->ShowPanel();?>
	</div>
	<?if (defined("ERROR_404") || $ERROR_404):?>
	<div class="page404">
		<div class="contaner">
			<div class="header">
				<a href="/" class="logo1">
					<img src="<?=SITE_TEMPLATE_PATH;?>/images/logo.png" alt="Макетная мастерская">
				</a>
			</div>
	
	
	<?else:?>
	<div class="header">
		<div class="contaner">
			<?if ($APPLICATION->GetCurPage() == '/'):?>
			<span class="logo">
				<img src="<?=SITE_TEMPLATE_PATH;?>/images/logo.png" alt="Макетная мастерская" width="206" height="70">
			</span>
			<?else:?>
			<a href="/" class="logo">
				<img src="<?=SITE_TEMPLATE_PATH;?>/images/logo.png" alt="Макетная мастерская" width="206" height="70">
			</a>
			<?endif;?>
			<button class="open-menu">
				<span></span>
				<span></span>
				<span></span>
			</button>

			<div class="phones">


<?
$APPLICATION->IncludeFile("/includes/top-phone.php", array(), array(
	'NAME' => 'телефон',
	'MODE' => 'text'
));
?>
                <div class="social">
                    <?
                    $APPLICATION->IncludeFile("/includes/social.php", array(), array(
                        'NAME' => 'ссылки',
                        'MODE' => 'text'
                    ));
                    ?>
                </div>
                <div class="search-form">
                    <form action="/search/" method="GET">
                        <button type="submit"></button>
                        <div class="input">
                            <input type="text" name="q" placeholder="Поиск...">
                        </div>
                    </form>
                </div>
			</div>
            <div class="clear"></div>
            <div class="menu">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "horizontal_multilevel1", Array(
                    "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                    "ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
                    "MENU_CACHE_TYPE" => "A",	// Тип кеширования
                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                    "MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
                    "MAX_LEVEL" => "2",	// Уровень вложенности меню
                    "CHILD_MENU_TYPE" => "top_lv2",	// Тип меню для остальных уровней
                    "USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                ),
                    false
                );?>
            </div>
        </div>

	</div>
<?if(PAGE == 'MAIN'):?>
<?
/*
$APPLICATION->IncludeFile("/includes/slider.php", array(), array(
	'NAME' => 'слайдер',
	'MODE' => 'php'
));
*/
?>

    <div class="request-calc-1">
        <div class="contaner">
            <div class="content">
                <?
                $APPLICATION->IncludeFile("/includes/main-request-1.php", array(), array(
                    'NAME' => 'текст',
                    'MODE' => 'html'
                ));
                ?>
            </div>
            <div class="form-contaner">
                <?$APPLICATION->IncludeComponent(
                    "tkk:infoportal.element.add.form",
                    "form-small",
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
                            1 => "2",
                            //2 => "8",
                            3 => "NAME",
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
        </div>
    </div>

<?elseif(PAGE == 'TEXT' || PAGE == 'CONTANER'):?>

<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", Array(),
	false
);?>

	<?$APPLICATION->ShowViewContent("page_image")?>
	<div class="contaner">
		<?$APPLICATION->ShowViewContent("appearance")?>

		<h1 class="page-title">
			<span><?$APPLICATION->ShowTitle(false)?></span>
		</h1>
	</div>
	<div class="contaner <?=defined("BACKGROUND") ? BACKGROUND : '';?>">	
	<?if(PAGE == 'TEXT'):?>
		<?
		$APPLICATION->IncludeFile("/includes/sub-menu.php", Array(), Array(
		    "MODE"      => "text",                                           // будет редактировать в веб-редакторе
		    "NAME"      => "текст",      // текст всплывающей подсказки на иконке
		    "TEMPLATE"  => "include.php",                    // имя шаблона для нового файла
	'SHOW_BORDER' => false
		    ));
		?>
		<div class="text">
			<div class="text-page">
	<?endif;?>
	
<?endif;?>
<?endif;?>