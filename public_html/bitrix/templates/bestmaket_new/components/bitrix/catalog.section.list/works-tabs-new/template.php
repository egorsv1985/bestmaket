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

$arViewModeList = $arResult['VIEW_MODE_LIST'];

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));

?>

<div class="works-tab tabs">
	<ul class="portfolio__list tabs    d-flex portfolio__list ">
		<? foreach ($arResult['SECTIONS'] as $key => &$arSection) : ?>

			<?
			//print_r($arSection);
			$this->AddEditAction($arSection['ID'] . '-item', $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'] . '-item', $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
			?>

			<li class=" <?= ($key == 0 ? 'active ' : ''); ?>item<?= $arSection['ID']; ?>" id="<?= $this->GetEditAreaId($arSection['ID'] . '-item'); ?>">
				<a href="#" class="fs-20 fw-400 text-nowrap">
					<?= $arSection['NAME']; ?>
				</a>
			</li>
		<? endforeach; ?>
	</ul>

	<? foreach ($arResult['SECTIONS'] as $key => &$arSection) : ?>
		<div class="tab<?= ($key == 0 ? ' active' : ''); ?>">
			<? $APPLICATION->IncludeComponent(
				"bitrix:news.list",
				"works-items",
				array(
					"KEY" => $arSection["ID"],
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "Y",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "N",
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "N",
					"DISPLAY_PICTURE" => "N",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array(
						0 => "ID",
						1 => "NAME",
						2 => "PREVIEW_TEXT",
						3 => "PREVIEW_PICTURE",
						4 => "",
					),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => IBLOCK_PORTFOLIO,
					"IBLOCK_TYPE" => "system",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "Y",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "4",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => $arSection["ID"],
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array(
						0 => "",
						1 => "LINK",
						2 => "NUMBER",
						3 => "",
					),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "SORT",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N",
					"COMPONENT_TEMPLATE" => "works-items"
				),
				false
			); ?>
		</div>
	<? endforeach; ?>
</div>
<?
return false;
$arViewStyles = array(
	'LIST' => array(
		'CONT' => 'bx_sitemap',
		'TITLE' => 'bx_sitemap_title',
		'LIST' => 'bx_sitemap_ul',
	),
	'LINE' => array(
		'CONT' => 'bx_catalog_line',
		'TITLE' => 'bx_catalog_line_category_title',
		'LIST' => 'bx_catalog_line_ul',
		'EMPTY_IMG' => $this->GetFolder() . '/images/line-empty.png'
	),
	'TEXT' => array(
		'CONT' => 'bx_catalog_text',
		'TITLE' => 'bx_catalog_text_category_title',
		'LIST' => 'bx_catalog_text_ul'
	),
	'TILE' => array(
		'CONT' => 'bx_catalog_tile',
		'TITLE' => 'bx_catalog_tile_category_title',
		'LIST' => 'bx_catalog_tile_ul',
		'EMPTY_IMG' => $this->GetFolder() . '/images/tile-empty.png'
	)
);
$arCurView = $arViewStyles[$arParams['VIEW_MODE']];



?>
<div class="<? echo $arCurView['CONT']; ?>">
	<?
	if ('Y' == $arParams['SHOW_PARENT_NAME'] && 0 < $arResult['SECTION']['ID']) {
		$this->AddEditAction($arResult['SECTION']['ID'], $arResult['SECTION']['EDIT_LINK'], $strSectionEdit);
		$this->AddDeleteAction($arResult['SECTION']['ID'], $arResult['SECTION']['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

	?><h1 class="<? echo $arCurView['TITLE']; ?>" id="<? echo $this->GetEditAreaId($arResult['SECTION']['ID']); ?>"><a href="<? echo $arResult['SECTION']['SECTION_PAGE_URL']; ?>"><?
																																																																																									echo (
																																																																																										isset($arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]) && $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"] != ""
																																																																																										? $arResult['SECTION']["IPROPERTY_VALUES"]["SECTION_PAGE_TITLE"]
																																																																																										: $arResult['SECTION']['NAME']
																																																																																									);
																																																																																									?></a></h1><?
																																																																																																																			}
																																																																																																																			if (0 < $arResult["SECTIONS_COUNT"]) {
																																																																																																																				?>
		<ul class="<? echo $arCurView['LIST']; ?>">
			<?
																																																																																																																				switch ($arParams['VIEW_MODE']) {
																																																																																																																					case 'LINE':
																																																																																																																						foreach ($arResult['SECTIONS'] as &$arSection) {
																																																																																																																							$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
																																																																																																																							$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

																																																																																																																							if (false === $arSection['PICTURE'])
																																																																																																																								$arSection['PICTURE'] = array(
																																																																																																																									'SRC' => $arCurView['EMPTY_IMG'],
																																																																																																																									'ALT' => (
																																																																																																																										'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
																																																																																																																										? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
																																																																																																																										: $arSection["NAME"]
																																																																																																																									),
																																																																																																																									'TITLE' => (
																																																																																																																										'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
																																																																																																																										? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
																																																																																																																										: $arSection["NAME"]
																																																																																																																									)
																																																																																																																								);
			?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
							<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="bx_catalog_line_img" style="background-image: url('<? echo $arSection['PICTURE']['SRC']; ?>');" title="<? echo $arSection['PICTURE']['TITLE']; ?>"></a>
							<h2 class="bx_catalog_line_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
																																																																																																																							if ($arParams["COUNT_ELEMENTS"]) {
																																																																				?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
																																																																																																																							}
																																																																																																?></h2><?
																																																																																																																							if ('' != $arSection['DESCRIPTION']) {
																																																																																																				?><p class="bx_catalog_line_description"><? echo $arSection['DESCRIPTION']; ?></p><?
																																																																																																																																												}
																																																																																																																																													?><div style="clear: both;"></div>
						</li><?
																																																																																																																						}
																																																																																																																						unset($arSection);
																																																																																																																						break;
																																																																																																																					case 'TEXT':
																																																																																																																						foreach ($arResult['SECTIONS'] as &$arSection) {
																																																																																																																							$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
																																																																																																																							$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

									?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
							<h2 class="bx_catalog_text_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
																																																																																																																							if ($arParams["COUNT_ELEMENTS"]) {
																																																																				?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
																																																																																																																							}
																																																																																																?></h2>
						</li><?
																																																																																																																						}
																																																																																																																						unset($arSection);
																																																																																																																						break;
																																																																																																																					case 'TILE':
																																																																																																																						foreach ($arResult['SECTIONS'] as &$arSection) {
																																																																																																																							$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
																																																																																																																							$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

																																																																																																																							if (false === $arSection['PICTURE'])
																																																																																																																								$arSection['PICTURE'] = array(
																																																																																																																									'SRC' => $arCurView['EMPTY_IMG'],
																																																																																																																									'ALT' => (
																																																																																																																										'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
																																																																																																																										? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_ALT"]
																																																																																																																										: $arSection["NAME"]
																																																																																																																									),
																																																																																																																									'TITLE' => (
																																																																																																																										'' != $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
																																																																																																																										? $arSection["IPROPERTY_VALUES"]["SECTION_PICTURE_FILE_TITLE"]
																																																																																																																										: $arSection["NAME"]
																																																																																																																									)
																																																																																																																								);
									?><li id="<? echo $this->GetEditAreaId($arSection['ID']); ?>">
							<a href="<? echo $arSection['SECTION_PAGE_URL']; ?>" class="bx_catalog_tile_img" style="background-image:url('<? echo $arSection['PICTURE']['SRC']; ?>');" title="<? echo $arSection['PICTURE']['TITLE']; ?>"> </a><?
																																																																																																																							if ('Y' != $arParams['HIDE_SECTION_NAME']) {
																																																																																																																	?><h2 class="bx_catalog_tile_title"><a href="<? echo $arSection['SECTION_PAGE_URL']; ?>"><? echo $arSection['NAME']; ?></a><?
																																																																																																																																																																															if ($arParams["COUNT_ELEMENTS"]) {
																																																																																																																																																																															?> <span>(<? echo $arSection['ELEMENT_CNT']; ?>)</span><?
																																																																																																																																																																																																										}
																																																																																																																																																																																																											?></h2><?
																																																																																																																																																																																																														}
																																																																																																																																																																																																															?>
						</li><?
																																																																																																																						}
																																																																																																																						unset($arSection);
																																																																																																																						break;
																																																																																																																					case 'LIST':
																																																																																																																						$intCurrentDepth = 1;
																																																																																																																						$boolFirst = true;
																																																																																																																						foreach ($arResult['SECTIONS'] as &$arSection) {
																																																																																																																							$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
																																																																																																																							$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);

																																																																																																																							if ($intCurrentDepth < $arSection['RELATIVE_DEPTH_LEVEL']) {
																																																																																																																								if (0 < $intCurrentDepth)
																																																																																																																									echo "\n", str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']), '<ul>';
																																																																																																																							} elseif ($intCurrentDepth == $arSection['RELATIVE_DEPTH_LEVEL']) {
																																																																																																																								if (!$boolFirst)
																																																																																																																									echo '</li>';
																																																																																																																							} else {
																																																																																																																								while ($intCurrentDepth > $arSection['RELATIVE_DEPTH_LEVEL']) {
																																																																																																																									echo '</li>', "\n", str_repeat("\t", $intCurrentDepth), '</ul>', "\n", str_repeat("\t", $intCurrentDepth - 1);
																																																																																																																									$intCurrentDepth--;
																																																																																																																								}
																																																																																																																								echo str_repeat("\t", $intCurrentDepth - 1), '</li>';
																																																																																																																							}

																																																																																																																							echo (!$boolFirst ? "\n" : ''), str_repeat("\t", $arSection['RELATIVE_DEPTH_LEVEL']);
									?><li id="<?= $this->GetEditAreaId($arSection['ID']); ?>">
							<h2 class="bx_sitemap_li_title"><a href="<? echo $arSection["SECTION_PAGE_URL"]; ?>"><? echo $arSection["NAME"]; ?><?
																																																																																																																							if ($arParams["COUNT_ELEMENTS"]) {
																																																																	?> <span>(<? echo $arSection["ELEMENT_CNT"]; ?>)</span><?
																																																																																																																							}
																																																																																													?></a></h2><?

																																																																																																																							$intCurrentDepth = $arSection['RELATIVE_DEPTH_LEVEL'];
																																																																																																																							$boolFirst = false;
																																																																																																																						}
																																																																																																																						unset($arSection);
																																																																																																																						while ($intCurrentDepth > 1) {
																																																																																																																							echo '</li>', "\n", str_repeat("\t", $intCurrentDepth), '</ul>', "\n", str_repeat("\t", $intCurrentDepth - 1);
																																																																																																																							$intCurrentDepth--;
																																																																																																																						}
																																																																																																																						if ($intCurrentDepth > 0) {
																																																																																																																							echo '</li>', "\n";
																																																																																																																						}
																																																																																																																						break;
																																																																																																																				}
																																																																																																			?>
		</ul>
	<?
																																																																																																																				echo ('LINE' != $arParams['VIEW_MODE'] ? '<div style="clear: both;"></div>' : '');
																																																																																																																			}
	?>
</div>