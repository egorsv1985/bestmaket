<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>
	<ul class="d-flex justify-content-between gap-1 gap-lg-4 menu-mob__list">

		<?
		$previousLevel = 0;
		$noSubmenuCount = 0; // Счетчик для элементов без подменю
		foreach ($arResult as $key => $arItem) :
			$liClass = '';
			if ($key == 4) { // Второй элемент имеет индекс 1, так как индексация начинается с 0
				$liClass = 'second-item';
			} elseif (!$arItem["IS_PARENT"] && $arItem["DEPTH_LEVEL"] == 1) {
				$noSubmenuCount++;
				if ($noSubmenuCount > 1) { // Пропускаем первый элемент без подменю
					$liClass = 'no-submenu';
				}
			}
		?>

			<? if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) : ?>
				<?= str_repeat("</ul ></li>", ($previousLevel - $arItem["DEPTH_LEVEL"])); ?>
			<? endif ?>

			<? if ($arItem["IS_PARENT"]) : ?>

				<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
					<li class="<?= $liClass ?>"><a href="<?= $arItem["LINK"] ?>" class="text-nowrap <? if ($arItem["SELECTED"]) : ?>contactsActive submenu-link<? else : ?><? endif ?>"><?= $arItem["TEXT"] ?></a>

						<ul class="submenu">
						<? else : ?>
							<li<? if ($arItem["SELECTED"]) : ?> class="contactsActive" <? endif ?>><a href="<?= $arItem["LINK"] ?>" class="text-nowrap contactsActive"><?= $arItem["TEXT"] ?></a>
								<ul>
								<? endif ?>
							<? else : ?>
								<? if ($arItem["PERMISSION"] > "D") : ?>
									<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
										<li class="<?= $liClass ?>"><a href="<?= $arItem["LINK"] ?>" class="text-nowrap <? if ($arItem["SELECTED"]) : ?>contactsActive<? else : ?><? endif ?>"><?= $arItem["TEXT"] ?></a></li>
									<? else : ?>
										<li<? if ($arItem["SELECTED"]) : ?> class="text-nowrap contactsActive" <? endif ?>><a class="asd selected" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
					</li>
				<? endif ?>
			<? else : ?>
				<? if ($arItem["DEPTH_LEVEL"] == 1) : ?>
					<li class="<?= $liClass ?>"><a href="" class="text-nowrap <? if ($arItem["SELECTED"]) : ?>selected<? else : ?><? endif ?>" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
				<? else : ?>
					<li class="<?= $liClass ?>"><a href="" class="text-nowrap denied" title="<?= GetMessage("MENU_ITEM_ACCESS_DENIED") ?>"><?= $arItem["TEXT"] ?></a></li>
				<? endif ?>
			<? endif ?>
		<? endif ?>
		<? $previousLevel = $arItem["DEPTH_LEVEL"]; ?>

	<? endforeach ?>
	<? if ($previousLevel > 1) : //close last item tags
	?>
		<?= str_repeat("</ul></li>", ($previousLevel - 1)); ?>
	<? endif ?>
	</ul>
<? endif ?>