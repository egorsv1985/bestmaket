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
?>
<div class="clients-slider">
	<ul class="slides">
		<? foreach ($arResult["ITEMS"] as $arItem) : ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			// print_r();

			if (CModule::IncludeModule("millcom.phpthumb")) {
				$LOGO = CMillcomPhpThumb::generateImg($arItem['PROPERTIES']['LOGO']['VALUE'], 10);
				$PREVIEW = CMillcomPhpThumb::generateImg($arItem["PREVIEW_PICTURE"]["SRC"], 11);
			}
			?>

			<li>
				<div class="slider-contaner " id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
					<div class="ms-auto position-relative box" style="height: auto; width: 88%; background: url('<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>') no-repeat 50% / cover;">

						<!-- <img src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= htmlspecialchars($arItem['NAME']); ?>"> -->

						<div class="intro">
							<div class="letter">
								<a href="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" class="fancy">
									<img src="<?= $PREVIEW; ?>" alt="<?= htmlspecialchars($arItem['NAME']) ?>" width="200" height="260">
								</a>
							</div>
							<div class="name">
								<?= $arItem['~PREVIEW_TEXT']; ?>
							</div>
							<div class="logo">
								<img src="<?= $LOGO; ?>" alt="<?= htmlspecialchars($arItem['NAME']) ?>" width="131" height="67">
							</div>
						</div>
						<div class="content">
							<div class="image">
								<!-- <img src="<?= $arItem["DETAIL_PICTURE"]["SRC"] ?>" alt="<?= htmlspecialchars($arItem['NAME']); ?>"> -->
							</div>
							<div class="description">
								<?= $arItem['DETAIL_TEXT']; ?>
							</div>
						</div>
					</div>

				</div>
			</li>
		<? endforeach; ?>
	</ul>
</div>