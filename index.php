<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?><?$APPLICATION->IncludeComponent("qsoft:main.banner", ".default", array(
	"TYPE" => "MAIN_PAGE",
	"NOINDEX" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600"
	),
	false
);?>

<?/*
echo '<h2 class="push_right">Модели недели</h2>';
$arrFilter = array('PROPERTY_MODEL_WEEKS_VALUE' => 'TRUE', '!=CATALOG_PRICE_1' => '0');
$APPLICATION->IncludeComponent("qsoft:catalog.models.week", "models_main", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "25",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "RAND",
	"ELEMENT_SORT_ORDER" => "asc",
	"FILTER_NAME" => "arrFilter",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"PAGE_ELEMENT_COUNT" => "4",
	"LINE_ELEMENT_COUNT" => "4",
	"PROPERTY_CODE" => array(
		0 => "MODEL_WEEKS",
		1 => "NEW",
		2 => "SALE",
		3 => "",
	),
	"OFFERS_LIMIT" => "4",
	"SECTION_URL" => "/catalog/#SECTION_CODE#/",
	"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
	"BASKET_URL" => "/personal/cart/",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "Y",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);*/?>
<?
$arrFilter = array('PROPERTY_MODEL_WEEKS_VALUE' => 'TRUE', '!=CATALOG_PRICE_1' => '0');
$APPLICATION->IncludeComponent("bitrix:catalog.top", "catalog.models.week", array(
    "IBLOCK_TYPE" => "catalog",
    "IBLOCK_ID" => "25",
    "ELEMENT_SORT_FIELD" => "RAND",
    "ELEMENT_SORT_ORDER" => "desc",
    "ELEMENT_COUNT" => "4",
    "LINE_ELEMENT_COUNT" => "4",
    "PROPERTY_CODE" => array(
        0 => "NEW",
        1 => "SALE",
        2 => "",
    ),
    "OFFERS_LIMIT" => "4",
    "SECTION_URL" => "/catalog/#SECTION_CODE#/",
    "DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
    "BASKET_URL" => "/personal/cart/",
    "ACTION_VARIABLE" => "action",
    "PRODUCT_ID_VARIABLE" => "id",
    "PRODUCT_QUANTITY_VARIABLE" => "quantity",
    "PRODUCT_PROPS_VARIABLE" => "prop",
    "SECTION_ID_VARIABLE" => "SECTION_ID",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "3600",
    "CACHE_GROUPS" => "Y",
    "DISPLAY_COMPARE" => "N",
    "PRICE_CODE" => array(
        0 => "BASE",
    ),
    "USE_PRICE_COUNT" => "N",
    "SHOW_PRICE_COUNT" => "1",
    "PRICE_VAT_INCLUDE" => "Y",
    "PRODUCT_PROPERTIES" => array(
    ),
    "USE_PRODUCT_QUANTITY" => "N",
    "CONVERT_CURRENCY" => "N"
),
    false
);?>
<?$APPLICATION->IncludeComponent("bitrix:news.list", "news_list_main", array(
	"IBLOCK_TYPE" => "news",
	"IBLOCK_ID" => "24",
	"NEWS_COUNT" => "3",
	"SORT_BY1" => "ACTIVE_FROM",
	"SORT_ORDER1" => "DESC",
	"SORT_BY2" => "SORT",
	"SORT_ORDER2" => "ASC",
	"FILTER_NAME" => "",
	"FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"CHECK_DATES" => "Y",
	"DETAIL_URL" => "",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "Y",
	"CACHE_GROUPS" => "Y",
	"PREVIEW_TRUNCATE_LEN" => "150",
	"ACTIVE_DATE_FORMAT" => "j M Y",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	"ADD_SECTIONS_CHAIN" => "N",
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",
	"PARENT_SECTION" => "",
	"PARENT_SECTION_CODE" => "",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Новости",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "forum",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "Y",
	"DISPLAY_DATE" => "Y",
	"DISPLAY_NAME" => "Y",
	"DISPLAY_PICTURE" => "Y",
	"DISPLAY_PREVIEW_TEXT" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>