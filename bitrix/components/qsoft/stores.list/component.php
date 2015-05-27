<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();


/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 3600;

	
if(strlen($arParams["ELEMENT_SORT_FIELD"])<=0)
	$arParams["ELEMENT_SORT_FIELD"]="sort";
	
if(!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["ELEMENT_SORT_ORDER"]))
	$arParams["ELEMENT_SORT_ORDER"]="asc";
	
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
		$arParams["ELEMENT_SORT_FIELD"] => $arParams["ELEMENT_SORT_ORDER"],
		"ID" => "ASC",
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
			$arButtons = CIBlock::GetPanelButtons(
				$temp["IBLOCK_ID"],
				$temp["ID"],
				0,
				array("SECTION_BUTTONS"=>false, "SESSID"=>false)
			);
			$arResult[$temp['ID']] = $temp;			
			$arResult[$temp['ID']]["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
			$arResult[$temp['ID']]["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];
			
			
			$this->SetResultCacheKeys(array(
			"NAME",
			"PATH",
			"IBLOCK_SECTION_ID",
			"ITEMS",
			"PRICES"
			));
			unset($temp);
			unset($arButtons);
		}
		else
		{
			break;
		}
	}
	while($i);
	

//echo "\r\n\r\n\r\n\r\n".json_encode($arParams)."\r\n\r\n\r\n";
if($USER->IsAuthorized())
	{
		if(
			$APPLICATION->GetShowIncludeAreas()
			|| (is_object($GLOBALS["INTRANET_TOOLBAR"]) && $arParams["INTRANET_TOOLBAR"]!=="N")
			|| $arParams["SET_TITLE"]
			|| isset($arResult[$arParams["BROWSER_TITLE"]])
		)
		{
		if(CModule::IncludeModule("iblock"))
			{
				$arButtons = CIBlock::GetPanelButtons(
					$arParams["IBLOCK_ID"],
					0,
					$arResult["ID"],
					array("ELEMENT_ADD"=>true)
				);
				
				unset($arButtons['submenu']['add_section']);
				unset($arButtons['configure']['add_section']);
				unset($arButtons['edit']['add_section']);
				if($APPLICATION->GetShowIncludeAreas())
				$this->AddIncludeAreaIcons(CIBlock::GetComponentMenu($APPLICATION->GetPublicShowMode(), $arButtons));
			
			}
		}
	}
$this->IncludeComponentTemplate();
}
?>
