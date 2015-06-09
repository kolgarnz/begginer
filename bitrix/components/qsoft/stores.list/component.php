<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

CPageOption::SetOptionString("main", "nav_page_in_session", "N");

/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"])) {
    $arParams["CACHE_TIME"] = 3600;
}

if(strlen($arParams["ELEMENT_SORT_FIELD"])<=0) {
    $arParams["ELEMENT_SORT_FIELD"] = "sort";
}
	
if(!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["ELEMENT_SORT_ORDER"])) {
    $arParams["ELEMENT_SORT_ORDER"] = "asc";
}

//custom component fields
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

$arParams["IBLOCK_ELEMENT_COUNT"] = intval($arParams["IBLOCK_ELEMENT_COUNT"]);
if($arParams["IBLOCK_ELEMENT_COUNT"] <= 0) {
    $arParams["IBLOCK_ELEMENT_COUNT"] = 1;
}
	
if("Y"===$arParams["IBLOCK_SHOW_MAP"]) {
	$arParams["IBLOCK_SHOW_MAP"] = true;
} else {
    $arParams["IBLOCK_SHOW_MAP"] = false;
}

$arParams['IBLOCK_NO_IMAGE'] = trim($arParams['IBLOCK_NO_IMAGE']);
if(strlen($arParams['IBLOCK_NO_IMAGE']) > 0) {
    $arParams['IBLOCK_NO_IMAGE'] = addslashes($arParams['IBLOCK_NO_IMAGE']);
} else {
    $arParams['IBLOCK_NO_IMAGE'] = '';
}

$arParams['IBLOCK_ALL_URL'] = trim($arParams['IBLOCK_ALL_URL']);
if(strlen($arParams['IBLOCK_ALL_URL']) > 0) {
    $arParams['IBLOCK_ALL_URL'] = addslashes($arParams['IBLOCK_ALL_URL']);
} else {
    $arParams['IBLOCK_ALL_URL'] = '';
}

//Постраничная навигация
$arParams["DISPLAY_TOP_PAGER"] = $arParams["DISPLAY_TOP_PAGER"]=="Y";
$arParams["DISPLAY_BOTTOM_PAGER"] = $arParams["DISPLAY_BOTTOM_PAGER"]!="N";
$arParams["PAGER_TITLE"] = trim($arParams["PAGER_TITLE"]);

$arParams["PAGER_SHOW_ALWAYS"] = $arParams["PAGER_SHOW_ALWAYS"]!="N";
$arParams["PAGER_TEMPLATE"] = trim($arParams["PAGER_TEMPLATE"]);


if($arParams["DISPLAY_TOP_PAGER"] || $arParams["DISPLAY_BOTTOM_PAGER"]) {
    $arNavParams = array(
        "nPageSize" => $arParams["IBLOCK_ELEMENT_COUNT"],
    );
    $arNavigation = CDBResult::GetNavParams($arNavParams);
} else {
    $arNavParams = array(
        "nTopCount" => $arParams["IBLOCK_ELEMENT_COUNT"],
    );
    $arNavigation = false;
}
//end of Постраничная навигация

if($arParams["IBLOCK_ID"] > 0 && $this->StartResultCache(false, array(($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()), $arNavigation, $arParams["IBLOCK_ELEMENT_COUNT"])))
{
	if(!CModule::IncludeModule("iblock"))
	{
		$this->AbortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}

	
	//SELECT
	$arSelect = array(
		"ID",
        "IBLOCK_ID",
		"NAME",
		"PREVIEW_PICTURE",
		"PROPERTY_WORK_HOURS",
		"PROPERTY_PHONE",
		"PROPERTY_ADDRESS",
	);

	if($arParams["IBLOCK_SHOW_MAP"]) {
        $arSelect[] = "PROPERTY_MAP";
    }
	
	//WHERE
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE_DATE" => "Y",
		"ACTIVE"=>"Y",
		"CHECK_PERMISSIONS"=>"Y",
	);
	
	//ORDER BY
	$arSort = array(
		$arParams["ELEMENT_SORT_FIELD"] => $arParams["ELEMENT_SORT_ORDER"],
	);
	
	//EXECUTE
	$rsIBlockElement = CIBlockElement::GetList($arSort, $arFilter, false, $arNavParams, $arSelect);

    while($temp = $rsIBlockElement->GetNext(true,false)) {

        if(strlen($temp["PREVIEW_PICTURE"]) > 0) {
        $temp["PICTURE"] = CFile::GetPath($temp["PREVIEW_PICTURE"]);
        } elseif(strlen($arParams['IBLOCK_NO_IMAGE']) > 0) {
            $temp["PICTURE"] = $arParams['IBLOCK_NO_IMAGE'];
        } else {
            $temp["PICTURE"] = '';
        }

        $arResult['ITEMS'][$temp['ID']] = $temp;
        if ($arParams["IBLOCK_SHOW_MAP"] && strlen($temp['PROPERTY_MAP_VALUE'] > 0)) {
            list($arResult['POSITION']['yandex_lat'], $arResult['POSITION']['yandex_lon']) = explode(',', $temp['PROPERTY_MAP_VALUE']);
            $arResult['POSITION']['PLACEMARKS'][] = array(
                'LAT' => $arResult['POSITION']['yandex_lat'],
                'LON' => $arResult['POSITION']['yandex_lon'],
                'TEXT' => $temp['PROPERTY_ADDRESS_VALUE']
            );
        }
        $arButtons = CIBlock::GetPanelButtons(
            $temp["IBLOCK_ID"],
            $temp["ID"],
            0,
            array("SECTION_BUTTONS"=>false, "SESSID"=>false)
        );

        $arResult['ITEMS'][$temp['ID']]["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
        $arResult['ITEMS'][$temp['ID']]["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
        unset($temp);
    }

    if($arNavigation && (count($arResult['ITEMS']) >= $arParams['IBLOCK_ELEMENT_COUNT'] || $arNavigation["PAGEN"] > 0)) {
        $arResult["NAV_STRING"] = $rsIBlockElement->GetPageNavStringEx($navComponentObject, $arParams["PAGER_TITLE"], $arParams["PAGER_TEMPLATE"]);
        $arResult["NAV_CACHED_DATA"] = $navComponentObject->GetTemplateCachedData();
        $arResult["NAV_RESULT"] = $rsIBlockElement;
        $this->SetResultCacheKeys(array("NAV_CACHED_DATA"));
    }
    echo '<!--  '.json_encode($arResult).'  -->';


    $this->SetResultCacheKeys(array(
        "ITEMS",
        "POSITION",
    ));
	$this->IncludeComponentTemplate();
}


if(isset($arResult["ITEMS"]) && $arResult["NAV_CACHED_DATA"]) {
    $this->SetTemplateCachedData($arResult["NAV_CACHED_DATA"]);
}

if($USER->IsAuthorized() && $arParams["IBLOCK_ID"] > 0)	{
	if(	$APPLICATION->GetShowIncludeAreas()	&& CModule::IncludeModule("iblock")) {
        $arButtons = CIBlock::GetPanelButtons(
            $arParams["IBLOCK_ID"],
            0,
            $arResult["ID"],
            array("ELEMENT_ADD"=>true)
        );
        unset($arButtons['submenu']['add_section']);
        unset($arButtons['configure']['add_section']);
        unset($arButtons['edit']['add_section']);
        if($APPLICATION->GetShowIncludeAreas()) {
            $this->AddIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
        }
    }
}

