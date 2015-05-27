<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?><?$APPLICATION->IncludeComponent("qsoft:stores.list", "stores_full", array(
	"IBLOCK_TYPE" => "salon",
	"IBLOCK_ID" => "23",
	"IBLOCK_ELEMENT_COUNT" => "0",
	"IBLOCK_SHOW_MAP" => "N",
	"IBLOCK_ALL_URL" => "/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"PARENT_SECTION" => ""
	),
	false
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>