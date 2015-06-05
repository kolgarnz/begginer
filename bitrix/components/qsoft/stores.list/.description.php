<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => GetMessage("T_IBLOCK_DESC_STORE_LIST"),
	"DESCRIPTION" => GetMessage("T_IBLOCK_DESC_STORE_DESC"),
	"ICON" => "/images/photo_view.gif",
	"CACHE_PATH" => "Y",
	"SORT" => 40,
	"PATH" => array(
		"ID" => "Рога и Сила",
		"CHILD" => array(
			"ID" => "stores.list",
			"NAME" => GetMessage("T_IBLOCK_DESC_STORE"),
			"SORT" => 20,
		                )
	                ),
    );
?>
