<?
$arUrlRewrite = array(
	array(
		"CONDITION"	=>	"#^/personal/profile/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:main.profile",
		"PATH"	=>	"/personal/profile.php",
	),
	array(
		"CONDITION"	=>	"#^/personal/order/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:sale.personal.order",
		"PATH"	=>	"/personal/order.php",
	),
	array(
		"CONDITION"	=>	"#^/personal/cart/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:eshop.sale.basket.basket",
		"PATH"	=>	"/personal/cart.php",
	),
);

?>