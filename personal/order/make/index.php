<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?><?$APPLICATION->IncludeComponent("bitrix:sale.order.ajax", "order", array(
	"PAY_FROM_ACCOUNT" => "N",
	"COUNT_DELIVERY_TAX" => "N",
	"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
	"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
	"ALLOW_AUTO_REGISTER" => "N",
	"SEND_NEW_USER_NOTIFY" => "Y",
	"DELIVERY_NO_AJAX" => "N",
	"DELIVERY_NO_SESSION" => "N",
	"TEMPLATE_LOCATION" => ".default",
	"DELIVERY_TO_PAYSYSTEM" => "d2p",
	"USE_PREPAYMENT" => "N",
	"PROP_1" => array(
	),
	"PROP_2" => array(
	),
	"PATH_TO_BASKET" => "/personal/cart/",
	"PATH_TO_PERSONAL" => "/personal/",
	"PATH_TO_PAYMENT" => "payment.php",
	"PATH_TO_AUTH" => "/auth/",
	"SET_TITLE" => "Y"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>