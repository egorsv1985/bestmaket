<?
define("PAGE", "MAIN");
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("description", "Изготовление макетов любой сложности и комплектации в БэстМакет. ✔ Качественно и быстро. 🆓 Делаем бесплатно эскиз макета. ☎ Звоните! ✔ Работаем с любой тематикой по всей России.");
$APPLICATION->SetPageProperty("keywords", "макетная, мастерская, изготовление, макет, студия, создание, Москва, макетирование,Санкт-Петербург, Спб, Россия, заказ, разработка, выставка, выставочные, срочно.");
$APPLICATION->SetPageProperty("title", "Макетная мастерская - Изготовление макетов - Бэст  макет Санкт-Петербург");
$APPLICATION->SetTitle("Главная");
$APPLICATION->IncludeFile($APPLICATION->GetCurPage()."/page-index.php", array(), array(
	'NAME' => 'текст',
	'MODE' => 'html'
));
?><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>