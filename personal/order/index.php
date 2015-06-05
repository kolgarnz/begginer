<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent("bitrix:sale.personal.order", "lk_orders", Array(
	"PROP_1" => "",	// Не показывать свойства для типа плательщика "Физическое лицо" (s1)
	"PROP_2" => "",	// Не показывать свойства для типа плательщика "Юридическое лицо" (s1)
	"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
	"SEF_FOLDER" => "/personal/order/",	// Каталог ЧПУ (относительно корня сайта)
	"ORDERS_PER_PAGE" => "10",	// Количество заказов на одной странице
	"PATH_TO_PAYMENT" => "/payments.php",	// Страница подключения платежной системы
	"PATH_TO_BASKET" => "/personal/cart/",	// Страница с корзиной
	"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
	"SAVE_IN_SESSION" => "Y",	// Сохранять установки фильтра в сессии пользователя
	"NAV_TEMPLATE" => "",	// Имя шаблона для постраничной навигации
	"SEF_URL_TEMPLATES" => array(
		"list" => "index.php",
		"detail" => "detail/#ID#/",
		"cancel" => "order_cancel.php?ID=#ID#",
	),
	"VARIABLE_ALIASES" => array(
		"cancel" => array(
			"ID" => "ID",
		),
	)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>