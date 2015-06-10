<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты поиска");
?><?$APPLICATION->IncludeComponent("bitrix:search.page", "clear_ris", array(
	"RESTART" => "N",
	"NO_WORD_LOGIC" => "N",
	"CHECK_DATES" => "N",
	"USE_TITLE_RANK" => "N",
	"DEFAULT_SORT" => "rank",
	"FILTER_NAME" => "",
	"arrFILTER" => array(
		0 => "iblock_news",
		1 => "iblock_salon",
		2 => "iblock_catalog",
	),
	"arrFILTER_iblock_news" => array(
		0 => "all",
	),
	"arrFILTER_iblock_salon" => array(
		0 => "all",
	),
	"arrFILTER_iblock_catalog" => array(
		0 => "all",
	),
	"SHOW_WHERE" => "Y",
	"arrWHERE" => array(
		0 => "iblock_news",
		1 => "iblock_salon",
		2 => "iblock_catalog",
	),
	"SHOW_WHEN" => "N",
	"PAGE_RESULT_COUNT" => "20",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"DISPLAY_TOP_PAGER" => "Y",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Результаты поиска",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "search",
	"USE_LANGUAGE_GUESS" => "Y",
	"USE_SUGGEST" => "N",
	"SHOW_ITEM_TAGS" => "N",
	"SHOW_ITEM_DATE_CHANGE" => "Y",
	"SHOW_ORDER_BY" => "Y",
	"SHOW_TAGS_CLOUD" => "N",
	"SHOW_RATING" => "N",
	"RATING_TYPE" => "",
	"PATH_TO_USER_PROFILE" => "",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>