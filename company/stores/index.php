<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Наши салоны");
?><?$APPLICATION->IncludeComponent("qsoft:stores.list", "stores_full", array(
	"IBLOCK_TYPE" => "salon",
	"IBLOCK_ID" => "23",
	"ELEMENT_SORT_FIELD" => "name",
	"ELEMENT_SORT_ORDER" => "desc",
	"IBLOCK_ELEMENT_COUNT" => "4",
	"IBLOCK_SHOW_MAP" => "Y",
	"IBLOCK_NO_IMAGE" => "/bitrix/templates/.default/images/no-image.jpg",
	"IBLOCK_ALL_URL" => "/company/stores/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "pagenavigation"
	),
	false
);?>  <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>