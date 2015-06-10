<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Моя Корзина");
?><?$APPLICATION->IncludeComponent("qsoft:eshop.sale.basket.basket", "basket", array(
	"COUNT_DISCOUNT_4_ALL_QUANTITY" => "Y",
	"COLUMNS_LIST" => array(
		0 => "NUMBER",
		1 => "NAME",
		2 => "PICTURE",
		3 => "PRICE",
		4 => "TOTAL_PRICE",
		5 => "QUANTITY",
		6 => "DELETE",
	),
	"PROPERTY_LIST" => array(
		0 => "KPP",
		1 => "SALON",
		2 => "CLASS",
		3 => "YEAR",
		4 => "BODY",
		5 => "ENGINE",
		6 => "COLOR",
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