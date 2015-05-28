<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контактная информация");
?><?$APPLICATION->IncludeComponent("bitrix:main.feedback", "feedback", array(
	"USE_CAPTCHA" => "Y",
	"OK_TEXT" => "Ваше сообщение отправлено",
	"EMAIL_TO" => "kolgarn@yandex.ru",
	"REQUIRED_FIELDS" => array(
		0 => "NAME",
		1 => "EMAIL",
		2 => "MESSAGE",
	),
	"EVENT_MESSAGE_ID" => array(
		0 => "70",
	)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>