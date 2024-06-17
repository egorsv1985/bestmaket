<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

if (!defined("PAGE"))
    define("PAGE", "TEXT");

global $ERROR_404;


?>
<!DOCTYPE html>
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
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <? $APPLICATION->ShowHead(); ?>
    <!-- <? $APPLICATION->SetAdditionalCSS('https://fonts.googleapis.com/css?family=Roboto:300,400,700,900&amp;display=swap&amp;subset=cyrillic', true); ?> -->


    <!-- <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery-1.8.2.min.js"); ?> -->
    <? $APPLICATION->AddHeadScript("https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.fancybox-1.3.4.js"); ?>
    <? $APPLICATION->AddHeadScript("https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.flexslider.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.inputmask.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/autoresize.jquery.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/bootstrap.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.event.move.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery.twentytwenty.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery-ui.min.js"); ?>
    <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/script.js"); ?>

    <? $APPLICATION->SetAdditionalCSS("https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/normalize.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/js/jquery.fancybox-1.3.4.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/js/jquery-ui.min.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/js/twentytwenty.css'); ?>
    <? $APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . '/bootstrap.css'); ?>

    <? /* Карта в футере */ ?>
    <?
    //$APPLICATION->AddHeadScript("https://maps.googleapis.com/maps/api/js?key=AIzaSyA7IG-mXqYnNwnQDFvhVi17zNT_zsTrBxY&callback=initMap");
    ?>

    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico?v=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="<?= SITE_TEMPLATE_PATH; ?>/mobile.css?v=9" media="only screen and (max-width: 992px)">
    <meta name="cmsmagazine" content="0dc6be246ef5144e0f67fa4b0fa7b3fc">
    <meta name="google-site-verification" content="OIlCjUYbL2R2tihyhAcxNE2B-CGTifCNvciCoTT8f-U">

    <? if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false) : ?>
        <?
        $APPLICATION->IncludeFile("/includes/code-head.php", array(), array(
            'NAME' => 'код в блоке head',
            'MODE' => 'text'
        ));
        ?>
    <? endif; ?>
</head>

<body>
    <div class="page-hidden">
        <? if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome-Lighthouse') === false) : ?>
            <?
            $APPLICATION->IncludeFile("/includes/code-body.php", array(), array(
                'NAME' => 'код в блоке body',
                'MODE' => 'text'
            ));
            ?>
        <? endif; ?>
        <div id="panel">
            <? $APPLICATION->ShowPanel(); ?>
        </div>
        <? if (defined("ERROR_404") || $ERROR_404) : ?>
            <div class="page404">
                <div class="container">
                    <div class="header py-5">
                        <a href="/" class="logo">
                            <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" alt="Макетная мастерская" width="182" height="62">
                        </a>
                    </div>


                <? else : ?>
                    <div class="header">
                        <div class="container">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-5 d-none d-lg-block">
                                    <div class="menu">
                                        <? $APPLICATION->IncludeComponent(
                                            "bitrix:menu",
                                            "horizontal_multilevel1",
                                            array(
                                                "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                                                "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                                                "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                                                "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                                                "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                                                "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                                                "MAX_LEVEL" => "2",    // Уровень вложенности меню
                                                "CHILD_MENU_TYPE" => "top_lv2",    // Тип меню для остальных уровней
                                                "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                                                "DELAY" => "N",    // Откладывать выполнение шаблона меню
                                                "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                                            ),
                                            false
                                        ); ?>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-3">

                                    <? if ($APPLICATION->GetCurPage() == '/') : ?>
                                        <span class="logo d-block  text-center">
                                            <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" class="w-100 h-auto" alt="Макетная мастерская" width="182" height="62">
                                        </span>
                                    <? else : ?>
                                        <a href="/" class="logo d-block text-center">
                                            <img src="<?= SITE_TEMPLATE_PATH; ?>/images/logo.png" class="w-100 h-auto" alt="Макетная мастерская" width="182" height="62">
                                        </a>
                                    <? endif; ?>
                                </div>
                                <div class="col-2 col-xl-3">
                                    <div class="d-lg-none">
                                        <a href="tel:88007778504" class="phone-link callibri_phone_800 text-nowrap" title="88007778504">
                                            <img src="<?= SITE_TEMPLATE_PATH; ?>/images/phone.svg"" alt=" phone" class="">
                                        </a>
                                    </div>
                                    <div class=" phones d-none d-lg-block">
                                        <?
                                        $APPLICATION->IncludeFile("/includes/top-phone-new.php", array(), array(
                                            'NAME' => 'телефон',
                                            'MODE' => 'text'
                                        ));
                                        ?>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-3 ">

                                    <button class="open-menu header__burger burger button  d-flex gap-3 align-items-center  position-relative border-0 bg-white">
                                        <span class="fs-17 text-uppercase d-none d-xl-block">МЕНЮ</span>
                                        <span class="burger__inner position-relative d-flex justify-content-center align-items-center">
                                            <span></span>
                                        </span>
                                    </button>
                                </div>
                            </div>


                            <div class="menu-mob ">
                                <div class="menu__title">Макетная мастерская “Бэст Макет”</div>
                                <? $APPLICATION->IncludeComponent(
                                    "bitrix:menu",
                                    "horizontal_multilevel1",
                                    array(
                                        "COMPONENT_TEMPLATE" => "horizontal_multilevel",
                                        "ROOT_MENU_TYPE" => "top",    // Тип меню для первого уровня
                                        "MENU_CACHE_TYPE" => "A",    // Тип кеширования
                                        "MENU_CACHE_TIME" => "3600",    // Время кеширования (сек.)
                                        "MENU_CACHE_USE_GROUPS" => "Y",    // Учитывать права доступа
                                        "MENU_CACHE_GET_VARS" => "",    // Значимые переменные запроса
                                        "MAX_LEVEL" => "2",    // Уровень вложенности меню
                                        "CHILD_MENU_TYPE" => "top_lv2",    // Тип меню для остальных уровней
                                        "USE_EXT" => "Y",    // Подключать файлы с именами вида .тип_меню.menu_ext.php
                                        "DELAY" => "N",    // Откладывать выполнение шаблона меню
                                        "ALLOW_MULTI_SELECT" => "N",    // Разрешить несколько активных пунктов одновременно
                                    ),
                                    false
                                ); ?>
                            </div>
                        </div>

                    </div>
                <? endif ?>