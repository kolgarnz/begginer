<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 3600;

$arParams["PARENT_SECTION"] = intval($arParams["PARENT_SECTION"]);

//custom component fields
$arParams["IBLOCK_ELEMENT_COUNT"] = intval($arParams["IBLOCK_ELEMENT_COUNT"]);
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);


if($arParams["IBLOCK_ELEMENT_COUNT"] < 0)
	$arParams["IBLOCK_ELEMENT_COUNT"] = 0;
	
if(!isset($arParams["IBLOCK_SHOW_MAP"]))
	$arParams["IBLOCK_SHOW_MAP"] = false;


if($arParams["IBLOCK_ID"] > 0 && $this->StartResultCache(false, array(($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups())),$arParams["IBLOCK_ELEMENT_COUNT"]))
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

	
	$i = 0;
	do
	{
		if($i < $arParams["IBLOCK_ELEMENT_COUNT"] || $arParams["IBLOCK_ELEMENT_COUNT"] === 0) $i++;
		else break;
		
		if($temp = $rsIBlockElement->GetNext())
		{
			$temp["PICTURE"] = CFile::GetFileArray($temp["PREVIEW_PICTURE"]);
			$arResult[$temp['ID']] = $temp;
			
			$this->SetResultCacheKeys(array());
			unset($temp);
		}
		else
		{
			break;
		}
	}
	while($i);
	$this->IncludeComponentTemplate();
}
?>
