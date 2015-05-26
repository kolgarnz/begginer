<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 3600;

/*if(!is_array($arParams["IBLOCKS"]))
	$arParams["IBLOCKS"] = array($arParams["IBLOCKS"]);

$arIBlockFilter = array();
foreach($arParams["IBLOCKS"] as $IBLOCK_ID)
{
	$IBLOCK_ID=intval($IBLOCK_ID);
	if($IBLOCK_ID>0)
		$arIBlockFilter[]=$IBLOCK_ID;
}

if(count($arIBlockFilter)<=0)
{
	if(!CModule::IncludeModule("iblock"))
	{
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}
	$rsIBlocks = GetIBlockList($arParams["IBLOCK_TYPE"]);
	if($arIBlock = $rsIBlocks->GetNext())
		$arIBlockFilter[]=$arIBlock["ID"];
} 

unset($arParams["IBLOCK_TYPE"]);*/
$arParams["PARENT_SECTION"] = intval($arParams["PARENT_SECTION"]);

//custom component fields
$arParams["IBLOCK_ELEMENT_COUNT"] = intval($arParams["IBLOCK_ELEMENT_COUNT"]);
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

if($arParams["IBLOCK_ELEMENT_COUNT"] < 1)
	$arParams["IBLOCK_ELEMENT_COUNT"] = 1;
	
if(!isset($arParams["IBLOCK_SHOW_MAP"]))
	$arParams["IBLOCK_SHOW_MAP"] = false;

	

if($arParams["IBLOCK_ID"] > 0 && $this->StartResultCache(false, ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups())))
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
		"CODE",
		"IBLOCK_SECTION_ID",
		"NAME",
		"PREVIEW_PICTURE",
		"PROPERTY_WORK_HOURS",
		"PROPERTY_PHONE",
		"PROPERTY_ADDRESS",
		"PROPERTY_MAP"
	);
	//WHERE
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE_DATE" => "Y",
		"ACTIVE"=>"Y",
		"CHECK_PERMISSIONS"=>"Y",
	);
	
	
if($arParams["PARENT_SECTION"]>0)
	{
		$arFilter["SECTION_ID"] = $arParams["PARENT_SECTION"];
		$arFilter["INCLUDE_SUBSECTIONS"] = "Y";
	}
	
	
	//ORDER BY
	$arSort = array(
		"RAND"=>"DESC",
	);
	
	
	//EXECUTE
	$rsIBlockElement = CIBlockElement::GetList($arSort, $arFilter, false, false, $arSelect);
	$rsIBlockElement->SetUrlTemplates($arParams["IBLOCK_ALL_URL"]);

	
	for($i = 0;$i < $arParams["IBLOCK_ELEMENT_COUNT"]; $i++)
		{
		if($temp = $rsIBlockElement->GetNext())
		{
			$temp["PICTURE"] = CFile::GetFileArray($temp["PREVIEW_PICTURE"]);
			$this->SetResultCacheKeys(array(
			));
			$arResult[$temp['ID']] = $temp;
			unset($temp);
		}
		else
		{
			$this->AbortResultCache();
		}
	}
	$this->IncludeComponentTemplate();
}
?>
