<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("История заказов");
?><?$APPLICATION->IncludeComponent(
	"bitrix:sale.personal.order",
	"",
	Array(
		"SEF_MODE" => "N",
		"ORDERS_PER_PAGE" => "20",
		"PATH_TO_PAYMENT" => "payment.php",
		"PATH_TO_BASKET" => "/personal/basket/",
		"SET_TITLE" => "Y",
		"SAVE_IN_SESSION" => "Y",
		"NAV_TEMPLATE" => "",
		"PROP_1" => array(),
		"PROP_2" => array()
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>