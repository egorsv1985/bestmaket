		<div class="sub-menu">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top-menu", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	),
	array(
		'HIDE_ICON' => 'Y'
	)
);?>
		</div>