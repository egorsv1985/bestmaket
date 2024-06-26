<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?
//echo "<pre>Template arParams: "; print_r($arParams); echo "</pre>";
//echo "<pre>Template arResult: "; print_r($arResult); echo "</pre>";
//exit();
global $FORM_ID;
if (!isset($FORM_ID))
	$FORM_ID = 0;
else
	$FORM_ID++;

?>


<div class="form-green ajax-form " id="smallForm_<?= $FORM_ID; ?>">
	<? if (count($arResult["ERRORS"])) : ?>
		<div class="alert">
			<div class="alert-contaner">
				<div class="error-popup">
					<div class="title">Ошибка!</div>
					<?= ShowError(implode("<br>", $arResult["ERRORS"])) ?>
				</div>
			</div>
		</div>
	<? endif ?>


	<? if (strlen($arResult["MESSAGE"]) > 0) : ?>
		<div class="alert">
			<div class="alert-contaner">
				<div class="top">
					<div class="title"><span>Благодарим вас за приглашение к сотрудничеству!</span></div>
					<p>Мы получили вашу заявку и свяжемся с вами сегодня.</p>
				</div>
				<div class="bottom">
					<div class="menu">
						А пока предлагаем вам ознакомиться с нашим портфолио
						Пока мы производим расчет, познакомьтесь<br>
					</div>
					<div class="link">
						<a href="/portfolio/">Посмотреть портфолио</a>
					</div>
				</div>
				<!--
			<?= ShowNote($arResult["MESSAGE"]) ?>
			-->
			</div>
		</div>
	<? endif ?>

	<form class="d-flex flex-wrap " name="iblock_add" action="<?= POST_FORM_ACTION_URI ?>" method="post" enctype="multipart/form-data" data-id="<?= $arParams['FORM_ID']; ?>">
		<input type="hidden" name="formID" value="<?= $arResult["formID"]; ?>">
		<input type="text" class="hidden" name="lastname" value="">
		<?= bitrix_sessid_post() ?>

		<? if ($arParams["MAX_FILE_SIZE"] > 0) : ?><input type="hidden" name="MAX_FILE_SIZE" value="<?= $arParams["MAX_FILE_SIZE"] ?>"><? endif ?>

		<? if (is_array($arResult["PROPERTY_LIST"]) && count($arResult["PROPERTY_LIST"]) > 0) : ?>

			<? foreach ($arResult["PROPERTY_LIST"] as $propertyID) : ?>


				<?
				//echo "<pre>"; print_r($arResult["PROPERTY_LIST_FULL"]); echo "</pre>";
				if (intval($propertyID) > 0) {
					if (
						$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "T"
						&&
						$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] == "1"
					)
						$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "S";
					elseif (
						(
							$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "S"
							||
							$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] == "N"
						)
						&&
						$arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] > "1"
					)
						$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "T";
				} elseif (($propertyID == "TAGS") && CModule::IncludeModule('search'))
					$arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"] = "TAGS";

				if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y") {
					$inputNum = ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) ? count($arResult["ELEMENT_PROPERTIES"][$propertyID]) : 0;
					$inputNum += $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE_CNT"];
				} else {
					$inputNum = 1;
				}

				if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"])
					$INPUT_TYPE = "USER_TYPE";
				else
					$INPUT_TYPE = $arResult["PROPERTY_LIST_FULL"][$propertyID]["PROPERTY_TYPE"];

				?>
				<div class="form-row<?= ($propertyID == 'NAME' ? ' ' : ''); ?>">
					<? if ($INPUT_TYPE != 'F') : ?>
						<label>
						<? endif; ?>
						<?

						switch ($INPUT_TYPE):
							case "USER_TYPE":
								for ($i = 0; $i < $inputNum; $i++) {
									if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) {
										$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["~VALUE"] : $arResult["ELEMENT"][$propertyID];
										$description = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["DESCRIPTION"] : "";
									} elseif ($i == 0) {
										$value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
										$description = "";
									} else {
										$value = "";
										$description = "";
									}
									echo call_user_func_array(
										$arResult["PROPERTY_LIST_FULL"][$propertyID]["GetPublicEditHTML"],
										array(
											$arResult["PROPERTY_LIST_FULL"][$propertyID],
											array(
												"VALUE" => $value,
												"DESCRIPTION" => $description,
											),
											array(
												"VALUE" => "PROPERTY[" . $propertyID . "][" . $i . "][VALUE]",
												"DESCRIPTION" => "PROPERTY[" . $propertyID . "][" . $i . "][DESCRIPTION]",
												"FORM_NAME" => "iblock_add",
											),
										)
									);
						?><?
								}
								break;
							case "TAGS":
								$APPLICATION->IncludeComponent(
									"bitrix:search.tags.input",
									"",
									array(
										"VALUE" => $arResult["ELEMENT"][$propertyID],
										"NAME" => "PROPERTY[" . $propertyID . "][0]",
										"TEXT" => 'size="' . $arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"] . '"',
									),
									null,
									array("HIDE_ICONS" => "Y")
								);
								break;
							case "HTML":
								$LHE = new CLightHTMLEditor;
								$LHE->Show(array(
									'id' => preg_replace("/[^a-z0-9]/i", '', "PROPERTY[" . $propertyID . "][0]"),
									'width' => '100%',
									'height' => '200px',
									'inputName' => "PROPERTY[" . $propertyID . "][0]",
									'content' => $arResult["ELEMENT"][$propertyID],
									'bUseFileDialogs' => false,
									'bFloatingToolbar' => false,
									'bArisingToolbar' => false,
									'toolbarConfig' => array(
										'Bold', 'Italic', 'Underline', 'RemoveFormat',
										'CreateLink', 'DeleteLink', 'Image', 'Video',
										'BackColor', 'ForeColor',
										'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyFull',
										'InsertOrderedList', 'InsertUnorderedList', 'Outdent', 'Indent',
										'StyleList', 'HeaderList',
										'FontList', 'FontSizeList',
									),
								));
								break;
							case "T":
								for ($i = 0; $i < $inputNum; $i++) {

									if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) {
										$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
									} elseif ($i == 0) {
										$value = intval($propertyID) > 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
									} else {
										$value = "";
									}
							?>
						<span class="row-name">
							<? if (intval($propertyID) > 0) : ?>
								<?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?>
							<? else : ?>
								<?= !empty($arParams["CUSTOM_TITLE_" . $propertyID]) ? $arParams["CUSTOM_TITLE_" . $propertyID] : GetMessage("IBLOCK_FIELD_" . $propertyID) ?>
							<? endif ?>
							<? if (in_array($propertyID, $arResult["PROPERTY_REQUIRED"])) : ?> <span class="starrequired">*</span><? endif ?>
						</span>
						<textarea class="inp-text" rows="1" name="PROPERTY[<?= $propertyID ?>][<?= $i ?>]"><?= $value ?></textarea>
					<?
								}
								break;

							case "S":
							case "N":
								for ($i = 0; $i < $inputNum; $i++) {
									if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) {
										$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
									} elseif ($i == 0) {
										$value = intval($propertyID) <= 0 ? "" : $arResult["PROPERTY_LIST_FULL"][$propertyID]["DEFAULT_VALUE"];
									} else {
										$value = "";
									}
					?>
						<span class="row-name">
							<? if (intval($propertyID) > 0) : ?>
								<?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["NAME"] ?>
							<? else : ?>
								<?= !empty($arParams["CUSTOM_TITLE_" . $propertyID]) ? $arParams["CUSTOM_TITLE_" . $propertyID] : GetMessage("IBLOCK_FIELD_" . $propertyID) ?>
							<? endif ?>
							<? if (in_array($propertyID, $arResult["PROPERTY_REQUIRED"])) : ?> <span class="starrequired">*</span><? endif ?>
						</span>
						<input type="text" name="PROPERTY[<?= $propertyID ?>][<?= $i ?>]" size="25" value="<?= $value ?>" class="inp-text"><?
																																																																if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["USER_TYPE"] == "DateTime") : ?><?
																																																																																																									$APPLICATION->IncludeComponent(
																																																																																																										'bitrix:main.calendar',
																																																																																																										'',
																																																																																																										array(
																																																																																																											'FORM_NAME' => 'iblock_add',
																																																																																																											'INPUT_NAME' => "PROPERTY[" . $propertyID . "][" . $i . "]",
																																																																																																											'INPUT_VALUE' => $value,
																																																																																																										),
																																																																																																										null,
																																																																																																										array('HIDE_ICONS' => 'Y')
																																																																																																									);
																																																																																																									?><br><small><?= GetMessage("IBLOCK_FORM_DATE_FORMAT") ?><?= FORMAT_DATETIME ?></small><?
																																																																																																																																																				endif
																																																																																																																																																					?><?
																																																																																																																																																					}
																																																																																																																																																					break;

																																																																																																																																																				case "F":
																																																																																																																																																					for ($i = 0; $i < $inputNum; $i++) {
																																																																																																																																																						$value = intval($propertyID) > 0 ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE"] : $arResult["ELEMENT"][$propertyID];
																																																																																																																																																						?>
						<div class="file-upload">
							<label>
								<input type="file" size="<?= $arResult["PROPERTY_LIST_FULL"][$propertyID]["COL_COUNT"] ?>" name="PROPERTY_FILE_<?= $propertyID ?>_<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i ?>"><br>

								<span class="text-label">Прикрепить файл</span>
							</label>
						</div>
						<input type="hidden" class="filename" name="PROPERTY[<?= $propertyID ?>][<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i ?>]" value="<?= $value ?>">

						<?

																																																																																																																																																						if (!empty($value) && is_array($arResult["ELEMENT_FILES"][$value])) {
						?>
							<input type="checkbox" name="DELETE_FILE[<?= $propertyID ?>][<?= $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] ? $arResult["ELEMENT_PROPERTIES"][$propertyID][$i]["VALUE_ID"] : $i ?>]" id="file_delete_<?= $propertyID ?>_<?= $i ?>" value="Y"><label for="file_delete_<?= $propertyID ?>_<?= $i ?>"><?= GetMessage("IBLOCK_FORM_FILE_DELETE") ?></label><br>
							<?

																																																																																																																																																							if ($arResult["ELEMENT_FILES"][$value]["IS_IMAGE"]) {
							?>
								<img src="<?= $arResult["ELEMENT_FILES"][$value]["SRC"] ?>" height="<?= $arResult["ELEMENT_FILES"][$value]["HEIGHT"] ?>" width="<?= $arResult["ELEMENT_FILES"][$value]["WIDTH"] ?>" border="0"><br>
							<?
																																																																																																																																																							} else {
							?>
								<?= GetMessage("IBLOCK_FORM_FILE_NAME") ?>: <?= $arResult["ELEMENT_FILES"][$value]["ORIGINAL_NAME"] ?><br>
								<?= GetMessage("IBLOCK_FORM_FILE_SIZE") ?>: <?= $arResult["ELEMENT_FILES"][$value]["FILE_SIZE"] ?> b<br>
								[<a href="<?= $arResult["ELEMENT_FILES"][$value]["SRC"] ?>"><?= GetMessage("IBLOCK_FORM_FILE_DOWNLOAD") ?></a>]<br>
							<?
																																																																																																																																																							}
																																																																																																																																																						}
																																																																																																																																																					}

																																																																																																																																																					break;
																																																																																																																																																				case "L":

																																																																																																																																																					if ($arResult["PROPERTY_LIST_FULL"][$propertyID]["LIST_TYPE"] == "C")
																																																																																																																																																						$type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "checkbox" : "radio";
																																																																																																																																																					else
																																																																																																																																																						$type = $arResult["PROPERTY_LIST_FULL"][$propertyID]["MULTIPLE"] == "Y" ? "multiselect" : "dropdown";

																																																																																																																																																					switch ($type):
																																																																																																																																																						case "checkbox":
																																																																																																																																																						case "radio":

																																																																																																																																																							//echo "<pre>"; print_r($arResult["PROPERTY_LIST_FULL"][$propertyID]); echo "</pre>";

																																																																																																																																																							foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum) {
																																																																																																																																																								$checked = false;
																																																																																																																																																								if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) {
																																																																																																																																																									if (is_array($arResult["ELEMENT_PROPERTIES"][$propertyID])) {
																																																																																																																																																										foreach ($arResult["ELEMENT_PROPERTIES"][$propertyID] as $arElEnum) {
																																																																																																																																																											if ($arElEnum["VALUE"] == $key) {
																																																																																																																																																												$checked = true;
																																																																																																																																																												break;
																																																																																																																																																											}
																																																																																																																																																										}
																																																																																																																																																									}
																																																																																																																																																								} else {
																																																																																																																																																									if ($arEnum["DEF"] == "Y") $checked = true;
																																																																																																																																																								}

							?>
								<input type="<?= $type ?>" name="PROPERTY[<?= $propertyID ?>]<?= $type == "checkbox" ? "[" . $key . "]" : "" ?>" value="<?= $key ?>" id="property_<?= $key ?>" <?= $checked ? " checked=\"checked\"" : "" ?>><label for="property_<?= $key ?>"><?= $arEnum["VALUE"] ?></label><br>
							<?
																																																																																																																																																							}
																																																																																																																																																							break;

																																																																																																																																																						case "dropdown":
																																																																																																																																																						case "multiselect":
							?>
							<select name="PROPERTY[<?= $propertyID ?>]<?= $type == "multiselect" ? "[]\" size=\"" . $arResult["PROPERTY_LIST_FULL"][$propertyID]["ROW_COUNT"] . "\" multiple=\"multiple" : "" ?>">
								<?
																																																																																																																																																							if (intval($propertyID) > 0) $sKey = "ELEMENT_PROPERTIES";
																																																																																																																																																							else $sKey = "ELEMENT";

																																																																																																																																																							foreach ($arResult["PROPERTY_LIST_FULL"][$propertyID]["ENUM"] as $key => $arEnum) {
																																																																																																																																																								$checked = false;
																																																																																																																																																								if ($arParams["ID"] > 0 || count($arResult["ERRORS"]) > 0) {
																																																																																																																																																									foreach ($arResult[$sKey][$propertyID] as $elKey => $arElEnum) {
																																																																																																																																																										if ($key == $arElEnum["VALUE"]) {
																																																																																																																																																											$checked = true;
																																																																																																																																																											break;
																																																																																																																																																										}
																																																																																																																																																									}
																																																																																																																																																								} else {
																																																																																																																																																									if ($arEnum["DEF"] == "Y") $checked = true;
																																																																																																																																																								}
								?>
									<option value="<?= $key ?>" <?= $checked ? " selected=\"selected\"" : "" ?>><?= $arEnum["VALUE"] ?></option>
								<?
																																																																																																																																																							}
								?>
							</select>
			<?
																																																																																																																																																							break;

																																																																																																																																																					endswitch;
																																																																																																																																																					break;
																																																																																																																																																			endswitch; ?>
			<? if ($INPUT_TYPE != 'F') : ?>
						</label>
					<? endif; ?>
				</div>
			<? endforeach; ?>
			<? if ($arParams["USE_CAPTCHA"] == "Y" && $arParams["ID"] <= 0) : ?>
				<tr>
					<td><?= GetMessage("IBLOCK_FORM_CAPTCHA_TITLE") ?></td>
					<td>
						<input type="hidden" name="captcha_sid" value="<?= $arResult["CAPTCHA_CODE"] ?>">
						<img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA">
					</td>
				</tr>
				<tr>
					<td><?= GetMessage("IBLOCK_FORM_CAPTCHA_PROMPT") ?> <span class="starrequired">*</span>:</td>
					<td><input type="text" name="captcha_word" maxlength="50" value=""></td>
				</tr>
			<? endif ?>

		<? endif ?>
		<div class="form-submit">
			<button type="submit" name="iblock_submit" value="1">Отправить</button>
		</div>
		<? if (strlen($arParams["LIST_URL"]) > 0 && $arParams["ID"] > 0) : ?><input type="submit" name="iblock_apply" value="<?= GetMessage("IBLOCK_FORM_APPLY") ?>" <? endif ?> <?/*<input type="reset" value="<?=GetMessage("IBLOCK_FORM_RESET")?>" />*/ ?> <? if (strlen($arParams["LIST_URL"]) > 0) : ?><a href="<?= $arParams["LIST_URL"] ?>"><?= GetMessage("IBLOCK_FORM_BACK") ?></a><? endif ?>

		<div class="private">
			<div class="check">
				<input type="checkbox" name="private" value="Y" id="check<?= $FORM_ID; ?>" checked="checked">

				<label for="check<?= $FORM_ID; ?>">
					Согласен на обработку <a href="/policy.pdf">персональных данных</a> Ставя отметку, я даю свое согласие на обработку моих персональных данных в соответствии с законом №152-ФЗ «О персональных данных» от 27.07.2006 и принимаю условия
				</label>
			</div>
			<!--
							<div class="comments">
								Ставя отметку, я даю свое согласие на обработку моих персональных данных в соответствии с законом №152-ФЗ «О персональных данных» от 27.07.2006 и принимаю условия
							</div>
							-->
		</div>
	</form>
</div>