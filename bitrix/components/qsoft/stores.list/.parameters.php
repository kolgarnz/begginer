<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;

$arIBlockType = CIBlockParameters::GetIBlockTypes();


$arIBlock=array(
	"-" => GetMessage("IBLOCK_ANY"),
);
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while ($arr = $rsIBlock->Fetch()) {
	$arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}


$arAscDesc = array(
	"asc" => GetMessage("IBLOCK_SORT_ASC"),
	"desc" => GetMessage("IBLOCK_SORT_DESC"),
);



$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"IBLOCK_TYPE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_TYPE"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlockType,
			"REFRESH" => "Y",
		),
		"IBLOCK_ID" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("IBLOCK_IBLOCK"),
			"TYPE" => "LIST",
			"VALUES" => $arIBlock,
			"REFRESH" => "Y",
		),

		"CACHE_TIME"  =>  Array("DEFAULT"=>CACHED_b_file),
		"CACHE_GROUPS" => array(
			"PARENT" => "CACHE_SETTINGS",
			"NAME" => GetMessage("CP_BPR_CACHE_GROUPS"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "Y",
		),
		"ELEMENT_SORT_FIELD" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => GetMessage("IBLOCK_ELEMENT_SORT_FIELD"),
			"TYPE" => "LIST",
			"VALUES" => array(
				"name" => GetMessage("IBLOCK_SORT_NAME"),
				"id" => GetMessage("IBLOCK_SORT_ID"),
			),
			"ADDITIONAL_VALUES" => "Y",
			"DEFAULT" => "sort",
		),
		"ELEMENT_SORT_ORDER" => array(
			"PARENT" => "DATA_SOURCE",
			"NAME" => GetMessage("IBLOCK_ELEMENT_SORT_ORDER"),
			"TYPE" => "LIST",
			"VALUES" => $arAscDesc,
			"DEFAULT" => "asc",
			"ADDITIONAL_VALUES" => "N",
		),	
		//custom component fields
		"IBLOCK_ELEMENT_COUNT" => array(
			"PARENT" => "VISUAL",
			"NAME" => GetMessage("IBLOCK_ELEMENT_COUNT"),
			"TYPE" => "STRING",
			"DEFAULT" => 2,
		
		),
        "IBLOCK_NO_IMAGE" => array(
            "PARENT" => "VISUAL",
            "NAME" => GetMessage("IBLOCK_NO_IMAGE"),
            "TYPE" => "STRING",
            "DEFAULT" => NO_IMAGE_LINK,
        ),
		"IBLOCK_ALL_URL" => CIBlockParameters::GetPathTemplateParam(
				"DETAIL",
				"DETAIL_URL",
				GetMessage("IBLOCK_ALL_URL"),
				"",
				"URL_TEMPLATES"
			),
		),
);
CIBlockParameters::AddPagerSettings($arComponentParameters, GetMessage("IBLOCK_DESK_PAGGER_SALON"), false, false);

