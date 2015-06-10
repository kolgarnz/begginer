<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog")) {
    return;
}

$arIBlockType = CIBlockParameters::GetIBlockTypes();

$arIBlock = array();
$rsIBlock = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $arCurrentValues["IBLOCK_TYPE"], "ACTIVE"=>"Y"));
while($arr=$rsIBlock->Fetch()) {
    $arIBlock[$arr["ID"]] = "[".$arr["ID"]."] ".$arr["NAME"];
}

$arProperty = array();
if (0 < intval($arCurrentValues["IBLOCK_ID"])) {
    $rsProp = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("IBLOCK_ID"=>$arCurrentValues["IBLOCK_ID"], "ACTIVE"=>"Y"));
    while ($arr=$rsProp->Fetch()) {
        $code = $arr["CODE"];
        $label = "[".$arr["CODE"]."] ".$arr["NAME"];

        if($arr["PROPERTY_TYPE"] != "F") {
            $arProperty[$code] = $label;
        }

    }
}
$arPrice = array();
$rsPrice=CCatalogGroup::GetList($v1="sort", $v2="asc");

while($arr=$rsPrice->Fetch()) {
    $arPrice[$arr["NAME"]] = "[".$arr["NAME"]."] ".$arr["NAME_LANG"];
}


$arAscDesc = array(
    "asc" => GetMessage("IBLOCK_SORT_ASC"),
    "desc" => GetMessage("IBLOCK_SORT_DESC"),
);

$arComponentParameters = array(
    "GROUPS" => array(
        "PRICES" => array(
            "NAME" => GetMessage("IBLOCK_PRICES"),
        ),
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
            "ADDITIONAL_VALUES" => "Y",
            "VALUES" => $arIBlock,
            "REFRESH" => "Y",
        ),
        "ELEMENT_SORT_FIELD" => array(
            "PARENT" => "DATA_SOURCE",
            "NAME" => GetMessage("IBLOCK_ELEMENT_SORT_FIELD"),
            "TYPE" => "LIST",
            "VALUES" => array(
                "shows" => GetMessage("IBLOCK_SORT_SHOWS"),
                "sort" => GetMessage("IBLOCK_SORT_SORT"),
                "timestamp_x" => GetMessage("IBLOCK_SORT_TIMESTAMP"),
                "name" => GetMessage("IBLOCK_SORT_NAME"),
                "id" => GetMessage("IBLOCK_SORT_ID"),
                "active_from" => GetMessage("IBLOCK_SORT_ACTIVE_FROM"),
                "active_to" => GetMessage("IBLOCK_SORT_ACTIVE_TO"),
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
            "ADDITIONAL_VALUES" => "Y",
        ),
        "SECTION_URL" => CIBlockParameters::GetPathTemplateParam(
            "SECTION",
            "SECTION_URL",
            GetMessage("IBLOCK_SECTION_URL"),
            "",
            "URL_TEMPLATES"
        ),
        "DETAIL_URL" => CIBlockParameters::GetPathTemplateParam(
            "DETAIL",
            "DETAIL_URL",
            GetMessage("IBLOCK_DETAIL_URL"),
            "",
            "URL_TEMPLATES"
        ),
        "BASKET_URL" => array(
            "PARENT" => "URL_TEMPLATES",
            "NAME" => GetMessage("IBLOCK_BASKET_URL"),
            "TYPE" => "STRING",
            "DEFAULT" => "/personal/cart/",
        ),
        "ACTION_VARIABLE" => array(
            "PARENT" => "URL_TEMPLATES",
            "NAME"		=> GetMessage("IBLOCK_ACTION_VARIABLE"),
            "TYPE"		=> "STRING",
            "DEFAULT"	=> "action"
        ),
        "PRODUCT_ID_VARIABLE" => array(
            "PARENT" => "URL_TEMPLATES",
            "NAME"		=> GetMessage("IBLOCK_PRODUCT_ID_VARIABLE"),
            "TYPE"		=> "STRING",
            "DEFAULT"	=> "id"
        ),
        "PRODUCT_QUANTITY_VARIABLE" => array(
            "PARENT" => "URL_TEMPLATES",
            "NAME" => GetMessage("CP_BCT_PRODUCT_QUANTITY_VARIABLE"),
            "TYPE" => "STRING",
            "DEFAULT" => "quantity",
        ),
        "PRODUCT_PROPS_VARIABLE" => array(
            "PARENT" => "URL_TEMPLATES",
            "NAME" => GetMessage("CP_BCT_PRODUCT_PROPS_VARIABLE"),
            "TYPE" => "STRING",
            "DEFAULT" => "prop",
        ),
        "SECTION_ID_VARIABLE" => array(
            "PARENT" => "URL_TEMPLATES",
            "NAME"		=> GetMessage("IBLOCK_SECTION_ID_VARIABLE"),
            "TYPE"		=> "STRING",
            "DEFAULT"	=> "SECTION_ID"
        ),
        "ELEMENT_COUNT" => array(
            "PARENT" => "VISUAL",
            "NAME" => GetMessage("IBLOCK_ELEMENT_COUNT"),
            "TYPE" => "STRING",
            "DEFAULT" => "4",
        ),
        "PROPERTY_CODE" => array(
            "PARENT" => "VISUAL",
            "NAME" => GetMessage("IBLOCK_PROPERTY"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arProperty,
            "ADDITIONAL_VALUES" => "Y",
        ),
        "PRICE_CODE" => array(
            "PARENT" => "PRICES",
            "NAME" => GetMessage("IBLOCK_PRICE_CODE"),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => $arPrice,
        ),
        "PRICE_VAT_INCLUDE" => array(
            "PARENT" => "PRICES",
            "NAME" => GetMessage("IBLOCK_VAT_INCLUDE"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "CACHE_TIME"  =>  Array("DEFAULT"=>36000000),
        "CACHE_GROUPS" => array(
            "PARENT" => "CACHE_SETTINGS",
            "NAME" => GetMessage("CP_BCT_CACHE_GROUPS"),
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "NO_IMAGE" => array(
            "PARENT" => "VISUAL",
            "NAME" => GetMessage("NO_IMAGE"),
            "TYPE" => "STRING",
            "DEFAULT" => '/bitrix/templates/.default/images/no-image.jpg',
        ),
    ),
);
