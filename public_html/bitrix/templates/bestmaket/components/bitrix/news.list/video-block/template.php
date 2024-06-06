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


<div class="block-video">
		<h3 class="title">Нам уже доверяют</h3>
<?foreach($arResult["ITEMS"] as $i => $arItem):
	$this->AddEditAction($arItem['ID'].'-1', $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'].'-1', $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));


preg_match_all('#\bhttps?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#', $arItem['PROPERTIES']['VIDEO']['~VALUE'], $match);


preg_match('/embed\/(.+)\?/is', $arItem['PROPERTIES']['VIDEO']['~VALUE'], $m);
if ($m[1] == '') {
	preg_match('/embed\/(.+)\" fra/is', $arItem['PROPERTIES']['VIDEO']['~VALUE'], $m);
}

if ($m[1] != '') {
	$image = 'http://i1.ytimg.com/vi/'.$m[1].'/hqdefault.jpg';
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
	<div class="video" id="<?=$this->GetEditAreaId($arItem['ID'].'-1');?>">
		<a href="/ajax.php?url=<?=$match[0][0];?>" class="fancy" data-type="ajax">
			<img src="<?=$image;?>" alt="<?=htmlspecialchars($arItem['NAME']);?>">
			<span class="mask"><span></span></span>
		</a>
	</div>
<?endforeach;?>
		<div class="clear"></div>
</div>
