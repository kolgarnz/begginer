<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?><?$APPLICATION->IncludeComponent("qsoft:stores.list", "stores_full", array(
	"IBLOCK_TYPE" => "salon",
	"IBLOCK_ID" => "23",
	"ELEMENT_SORT_FIELD" => "name",
	"ELEMENT_SORT_ORDER" => "desc",
	"IBLOCK_ELEMENT_COUNT" => "2",
	"IBLOCK_SHOW_MAP" => "Y",
	"IBLOCK_ALL_URL" => "",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"PARENT_SECTION" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "pagenavigation",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N"
	),
	false
);?>  <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>