<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Корзина");
?><?$APPLICATION->IncludeComponent("bitrix:eshop.sale.basket.basket", ".default", array(
	"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
	"COLUMNS_LIST" => array(
	),
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"PATH_TO_ORDER" => "/personal/order/make/",
	"HIDE_COUPON" => "Y",
	"QUANTITY_FLOAT" => "N",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"SET_TITLE" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>