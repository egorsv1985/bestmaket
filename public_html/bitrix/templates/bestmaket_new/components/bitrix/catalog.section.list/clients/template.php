<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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


$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<div class="clients-list d-flex">
	<ul class="d-flex">
		<?
		foreach ($arResult['SECTIONS'] as $key => &$arSection) :
			$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

			if (CModule::IncludeModule("millcom.phpthumb")) {
				$arSection['PICTURE']['SRC'] = CMillcomPhpThumb::generateImg($arSection['PICTURE']['SRC'], 7);
			}

			if ($key >= $arParams['COUNT'] && $arParams['COUNT'] > 0)
				continue;
		?>
			<li class="d-flex flex-column" <?= (!($key % 3) ? 'class=""' : ''); ?> id="<?= $this->GetEditAreaId($arSection['ID']); ?>" style="background-image: url('<?= $arSection['PICTURE']['SRC']; ?>');"> <strong><?= $arSection['NAME']; ?></strong>

				<? $APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"list",
					array(
						"COMPONENT_TEMPLATE" => "list",
						"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
						"IBLOCK_ID" => $arParams['IBLOCK_ID'],
						"SECTION_ID" => $arSection["ID"],
						"SECTION_CODE" => "",
						"SECTION_USER_FIELDS" => array(
							0 => "",
							1 => "",
						),
						"FILTER_NAME" => "",
						"INCLUDE_SUBSECTIONS" => "Y",
						"SHOW_ALL_WO_SECTION" => "N",
						"ELEMENT_SORT_FIELD" => "sort",
						"ELEMENT_SORT_ORDER" => "asc",
						"ELEMENT_SORT_FIELD2" => "id",
						"ELEMENT_SORT_ORDER2" => "desc",
						"PAGE_ELEMENT_COUNT" => "200",
						"LINE_ELEMENT_COUNT" => "10",
						"PROPERTY_CODE" => array(
							0 => "LINK",
							1 => "",
						),
						"OFFERS_LIMIT" => "5",
						"BACKGROUND_IMAGE" => "-",
						"SECTION_URL" => "",
						"DETAIL_URL" => "",
						"SECTION_ID_VARIABLE" => "SECTION_ID",
						"SEF_MODE" => "N",
						"AJAX_MODE" => "N",
						"AJAX_OPTION_JUMP" => "N",
						"AJAX_OPTION_STYLE" => "Y",
						"AJAX_OPTION_HISTORY" => "N",
						"AJAX_OPTION_ADDITIONAL" => "",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "7200",
						"CACHE_GROUPS" => "Y",
						"SET_TITLE" => "N",
						"SET_BROWSER_TITLE" => "N",
						"BROWSER_TITLE" => "-",
						"SET_META_KEYWORDS" => "N",
						"META_KEYWORDS" => "-",
						"SET_META_DESCRIPTION" => "N",
						"META_DESCRIPTION" => "-",
						"SET_LAST_MODIFIED" => "N",
						"USE_MAIN_ELEMENT_SECTION" => "N",
						"ADD_SECTIONS_CHAIN" => "N",
						"CACHE_FILTER" => "N",
						"ACTION_VARIABLE" => "action",
						"PRODUCT_ID_VARIABLE" => "id",
						"PRICE_CODE" => array(),
						"USE_PRICE_COUNT" => "N",
						"SHOW_PRICE_COUNT" => "1",
						"PRICE_VAT_INCLUDE" => "Y",
						"BASKET_URL" => "/personal/basket.php",
						"USE_PRODUCT_QUANTITY" => "N",
						"PRODUCT_QUANTITY_VARIABLE" => "quantity",
						"ADD_PROPERTIES_TO_BASKET" => "Y",
						"PRODUCT_PROPS_VARIABLE" => "prop",
						"PARTIAL_PRODUCT_PROPERTIES" => "N",
						"PRODUCT_PROPERTIES" => array(),
						"DISPLAY_COMPARE" => "N",
						"PAGER_TEMPLATE" => ".default",
						"DISPLAY_TOP_PAGER" => "N",
						"DISPLAY_BOTTOM_PAGER" => "Y",
						"PAGER_TITLE" => "Товары",
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_DESC_NUMBERING" => "N",
						"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
						"PAGER_SHOW_ALL" => "N",
						"PAGER_BASE_LINK_ENABLE" => "N",
						"SET_STATUS_404" => "N",
						"SHOW_404" => "N",
						"MESSAGE_404" => "",
						"COMPATIBLE_MODE" => "Y",
						"DISABLE_INIT_JS_IN_COMPONENT" => "N"
					),
					false
				); ?>
			</li>
		<? endforeach; ?>
	</ul>

	<? if ($arParams['COUNT']) : ?>
		<div class="btn-all">
			<a href="/clients/">все отзывы</a>
		</div>
	<? endif; ?>
</div>