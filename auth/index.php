<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if (isset($_REQUEST["backurl"]) && strlen($_REQUEST["backurl"])>0) 
	LocalRedirect($backurl);

$APPLICATION->SetTitle("Авторизация");
?><?php
define("NEED_AUTH",TRUE);

?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>