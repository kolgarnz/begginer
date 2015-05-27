<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"qsoft:stores.list",
	"",
	Array(
		"IBLOCK_TYPE" => "salon",
		"IBLOCK_ID" => "23",
		"PARENT_SECTION" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"ELEMENT_SORT_FIELD" => "RAND",
		"ELEMENT_SORT_ORDER" => "asc",
		"IBLOCK_ELEMENT_COUNT" => "2",
		"IBLOCK_SHOW_MAP" => "N",
		"IBLOCK_ALL_URL" => ""
	),
false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>