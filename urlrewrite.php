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
		"CONDITION"	=>	"#auth.php#",
		"RULE"	=>	"",
		"ID"	=>	"",
		"PATH"	=>	"/auth/index.php",
	),
);

?>