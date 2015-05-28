<?
$arUrlRewrite = array(
	array(
		"CONDITION"	=>	"#^/personal/profile/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:main.profile",
		"PATH"	=>	"/personal/profile.php",
	),
	array(
		"CONDITION"	=>	"#^/personal/cart/#",
		"RULE"	=>	"",
		"ID"	=>	"",
		"PATH"	=>	"/personal/cart.php",
	),
	array(
		"CONDITION"	=>	"#^/company/news/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/company/news/index.php",
	),
	array(
		"CONDITION"	=>	"#^/catalog/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:catalog",
		"PATH"	=>	"/catalog/test.php",
	),
	array(
		"CONDITION"	=>	"#^/catalog/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:catalog",
		"PATH"	=>	"/catalog/index.php",
	),
	array(
		"CONDITION"	=>	"#auth.php#",
		"RULE"	=>	"",
		"ID"	=>	"",
		"PATH"	=>	"/auth/index.php",
	),
);

?>