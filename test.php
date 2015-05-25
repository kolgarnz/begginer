<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("test");
?><?$APPLICATION->IncludeComponent(
	"qsoft:main.banner",
	"",
	Array(
		"TYPE" => "MAIN_PAGE",
		"NOINDEX" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>