<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?><?$APPLICATION->IncludeComponent(
	"qsoft:stores.list",
	"stores_full",
	Array(
		"IBLOCK_TYPE" => "salon",
		"IBLOCK_ID" => "23",
		"IBLOCK_ELEMENT_COUNT" => "0",
		"IBLOCK_SHOW_MAP" => "N",
		"IBLOCK_ALL_URL" => "/",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"PARENT_SECTION" => ""
	)
);?> 
<div>
<?$APPLICATION->IncludeComponent("bitrix:map.yandex.view", ".default", array(
	"INIT_MAP_TYPE" => "MAP",
	"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";d:55.73829999999371;s:10:\"yandex_lon\";d:37.59459999999997;s:12:\"yandex_scale\";i:10;}",
	"MAP_WIDTH" => "600",
	"MAP_HEIGHT" => "500",
	"CONTROLS" => array(
		0 => "ZOOM",
		1 => "TYPECONTROL",
	),
	"OPTIONS" => array(
		0 => "ENABLE_SCROLL_ZOOM",
		1 => "ENABLE_DRAGGING",
	),
	"MAP_ID" => "salon"
	),
	false
);?></div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>