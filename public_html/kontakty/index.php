<?
define("MAP", "SPB");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Макетная, мастерская, Санкт-Петербург, Спб, контакт, офис.");
$APPLICATION->SetPageProperty("description", "Контакты Бэст Макет в Санкт-Петербурге");
$APPLICATION->SetPageProperty("title", "Контакты офиса  мастерской БэстМакет в Санкт-Петербурге");
$APPLICATION->SetTitle("Контакты офиса в Санкт-Петербурге");
$APPLICATION->IncludeFile($APPLICATION->GetCurPage()."/contact-spb.php", array(), array(
	'NAME' => 'текст',
	'MODE' => 'html'
));
?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>