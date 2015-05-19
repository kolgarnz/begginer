<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent("bitrix:socialnetwork.events_dyn", ".default", Array(
	"PATH_TO_USER"	=>	"/club/user/#user_id#/",
	"PATH_TO_GROUP"	=>	"/club/group/#group_id#/",
	"PATH_TO_MESSAGE_FORM"	=>	"/club/messages/form/#user_id#/",
	"PATH_TO_MESSAGE_FORM_MESS"	=>	"/club/messages/form/#user_id#/#message_id#/",
	"PATH_TO_MESSAGES_CHAT"	=>	"/club/messages/chat/#user_id#/",
	"PATH_TO_SMILE"	=>	"/bitrix/images/socialnetwork/smile/",
	"MESSAGE_VAR"	=>	"message_id",
	"PAGE_VAR"	=>	"page",
	"USER_VAR"	=>	"user_id",
	"NAME_TEMPLATE" => "",
	)
);
?>