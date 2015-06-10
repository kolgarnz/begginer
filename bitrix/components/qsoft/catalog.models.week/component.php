<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

//$arParams['LINE_ELEMENT_COUNT'] = 4;
/*************************************************************************
	Processing of received parameters
*************************************************************************/
if(!isset($arParams["CACHE_TIME"]))
	$arParams["CACHE_TIME"] = 36000000;

unset($arParams["IBLOCK_TYPE"]); //was used only for IBLOCK_ID setup with Editor
$arParams["IBLOCK_ID"] = intval($arParams["IBLOCK_ID"]);

if(strlen($arParams["ELEMENT_SORT_FIELD"])<=0) {
    $arParams["ELEMENT_SORT_FIELD"] = "sort";
}

if(!preg_match('/^(asc|desc|nulls)(,asc|,desc|,nulls){0,1}$/i', $arParams["ELEMENT_SORT_ORDER"])) {
    $arParams["ELEMENT_SORT_ORDER"]="asc";
}

$arParams["SECTION_URL"]=trim($arParams["SECTION_URL"]);
$arParams["DETAIL_URL"]=trim($arParams["DETAIL_URL"]);
$arParams["BASKET_URL"]=trim($arParams["BASKET_URL"]);

if(strlen($arParams["BASKET_URL"])<=0) {
    $arParams["BASKET_URL"] = "/personal/cart/";
}

$arParams["ACTION_VARIABLE"] = trim($arParams["ACTION_VARIABLE"]);
if(strlen($arParams["ACTION_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["ACTION_VARIABLE"])) {
    $arParams["ACTION_VARIABLE"] = "action";
}

$arParams["PRODUCT_ID_VARIABLE"] = trim($arParams["PRODUCT_ID_VARIABLE"]);
if(strlen($arParams["PRODUCT_ID_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_ID_VARIABLE"])) {
    $arParams["PRODUCT_ID_VARIABLE"] = "id";
}

$arParams["PRODUCT_QUANTITY_VARIABLE"] = trim($arParams["PRODUCT_QUANTITY_VARIABLE"]);
if(strlen($arParams["PRODUCT_QUANTITY_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_QUANTITY_VARIABLE"])) {
    $arParams["PRODUCT_QUANTITY_VARIABLE"] = "quantity";
}

$arParams["PRODUCT_PROPS_VARIABLE"] = trim($arParams["PRODUCT_PROPS_VARIABLE"]);
if(strlen($arParams["PRODUCT_PROPS_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["PRODUCT_PROPS_VARIABLE"])) {
    $arParams["PRODUCT_PROPS_VARIABLE"] = "prop";
}

$arParams["SECTION_ID_VARIABLE"]=trim($arParams["SECTION_ID_VARIABLE"]);
if(strlen($arParams["SECTION_ID_VARIABLE"])<=0|| !preg_match("/^[A-Za-z_][A-Za-z01-9_]*$/", $arParams["SECTION_ID_VARIABLE"])) {
    $arParams["SECTION_ID_VARIABLE"] = "SECTION_ID";
}


$arParams["ELEMENT_COUNT"] = intval($arParams["ELEMENT_COUNT"]);
if($arParams["ELEMENT_COUNT"]<=0) {
    $arParams["ELEMENT_COUNT"] = 4;
}

if(!is_array($arParams["PROPERTY_CODE"])) {
    $arParams["PROPERTY_CODE"] = array();
}
foreach($arParams["PROPERTY_CODE"] as $k=>$v) {
    if(trim($v)==="") {
        unset($arParams["PROPERTY_CODE"][$k]);
    }
}

if(!is_array($arParams["PRICE_CODE"]))
	$arParams["PRICE_CODE"] = array();

$arParams["PRICE_VAT_INCLUDE"] = $arParams["PRICE_VAT_INCLUDE"] !== "N";

$arParams['NO_IMAGE'] = trim($arParams['NO_IMAGE']);
if(strlen($arParams['NO_IMAGE']) <= 0) {
    $arParams['NO_IMAGE'] = '/bitrix/templates/.default/images/no-image.jpg';
}


$arrFilter=array();
/*************************************************************************
			Processing of the Buy link
*************************************************************************/
$strError = "";
if(array_key_exists($arParams["ACTION_VARIABLE"], $_REQUEST) && array_key_exists($arParams["PRODUCT_ID_VARIABLE"], $_REQUEST))
{
	if(array_key_exists($arParams["ACTION_VARIABLE"]."ADD2BASKET", $_REQUEST)) {
        $action = "ADD2BASKET";
    } else {
        $action = strtoupper($_REQUEST[$arParams["ACTION_VARIABLE"]]);
    }

	$productID = intval($_REQUEST[$arParams["PRODUCT_ID_VARIABLE"]]);
	if ($action == "ADD2BASKET" && $productID > 0) {
		if (CModule::IncludeModule("sale") && CModule::IncludeModule("catalog") && CModule::IncludeModule('iblock')) {

		$rsItems = CIBlockElement::GetList(array(), array('ID' => $productID), false, false, array('ID', 'IBLOCK_ID'));
			if ($arItem = $rsItems->Fetch()) {
				$arItem['IBLOCK_ID'] = intval($arItem['IBLOCK_ID']);
			} else {
				$strError = GetMessage('CATALOG_PRODUCT_NOT_FOUND').".";
			}

			if(!$strError && Add2BasketByProductID($productID)) {
				LocalRedirect($APPLICATION->GetCurPageParam("", array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
			} else {
				if ($ex = $GLOBALS["APPLICATION"]->GetException())
					$strError = $ex->GetString();
				else
					$strError = GetMessage("CATALOG_ERROR2BASKET").".";
			}
		}
	}
}
if(strlen($strError)>0)
{
	ShowError($strError);
	return;
}

/*************************************************************************
			Work with cache
*************************************************************************/
if($this->StartResultCache(false, array($arrFilter, ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()))))
{
	if (!CModule::IncludeModule("iblock")) {
		$this->AbortResultCache();
		ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
		return;
	}
    
	$arResult["PRICES"] = CIBlockPriceTools::GetCatalogPrices($arParams["IBLOCK_ID"], $arParams["PRICE_CODE"]);

	/************************************
			Elements
	************************************/
	//SELECT
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"NAME",
		"IBLOCK_SECTION_ID",
		"DETAIL_PAGE_URL",
		"PREVIEW_PICTURE",
		"PROPERTY_*",
	);
	//WHERE
	$arrFilter["ACTIVE"] = "Y";
	if(intval($arParams["IBLOCK_ID"]) > 0) {
        $arrFilter["IBLOCK_ID"] = $arParams["IBLOCK_ID"];
    }
	$arrFilter["IBLOCK_LID"] = SITE_ID;
	$arrFilter["IBLOCK_ACTIVE"] = "Y";
	$arrFilter["ACTIVE_DATE"] = "Y";
	$arrFilter["CHECK_PERMISSIONS"] = "Y";
    $arrFilter[">CATALOG_PRICE_1"] = "0";
    $arrFilter["=PROPERTY_MODEL_WEEKS_VALUE"] = "TRUE";

	//ORDER BY
	$arSort = array(
		$arParams["ELEMENT_SORT_FIELD"] => $arParams["ELEMENT_SORT_ORDER"]
	);
	//PRICES
	$arPriceTypeID = array();

    foreach($arResult["PRICES"] as &$value) {
        $arSelect[] = $value["SELECT"];
        $arrFilter["CATALOG_SHOP_QUANTITY_".$value["ID"]] = '1';
        $arrFilter[">CATALOG_PRICE_".$value["ID"]] = '0';
    }
    if (isset($value)) {
        unset($value);
    }

	$arResult["ITEMS"] = array();
	$rsElements = CIBlockElement::GetList($arSort, $arrFilter, false, array("nTopCount" => $arParams["ELEMENT_COUNT"]), $arSelect);
	$rsElements->SetUrlTemplates($arParams["DETAIL_URL"]);

	while($obElement = $rsElements->GetNextElement(true,false)) {
		$arItem = $obElement->GetFields();

		$arButtons = CIBlock::GetPanelButtons(
			$arItem["IBLOCK_ID"],
			$arItem["ID"],
			$arItem["IBLOCK_SECTION_ID"],
			array("SECTION_BUTTONS"=>false, "SESSID"=>false, "CATALOG"=>true)
		);
		$arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
		$arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];

		$arItem["PREVIEW_PICTURE"] = CFile::GetPath($arItem["PREVIEW_PICTURE"]);

		if(count($arParams["PROPERTY_CODE"])) {
            $arItem["PROPERTIES"] = $obElement->GetProperties();
        }

		$arItem["DISPLAY_PROPERTIES"] = array();

        foreach($arParams["PROPERTY_CODE"] as $pid) {
			$prop = &$arItem["PROPERTIES"][$pid];
			if(
				(is_array($prop["VALUE"]) && count($prop["VALUE"])>0)
				|| (!is_array($prop["VALUE"]) && strlen($prop["VALUE"])>0)
			) {
				$arItem["DISPLAY_PROPERTIES"][$pid] = CIBlockFormatProperties::GetDisplayValue($arItem, $prop, "catalog_out");
			}
		}

        $arItem["PRICES"] = CIBlockPriceTools::GetItemPrices(
            $arParams["IBLOCK_ID"],
            $arResult["PRICES"],
            $arItem,
            $arParams['PRICE_VAT_INCLUDE']
        );

		$arItem["CAN_BUY"] = CIBlockPriceTools::CanBuy($arParams["IBLOCK_ID"], $arResult["PRICES"], $arItem);
		$arItem["ADD_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=ADD2BASKET&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arItem["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));


		$arResult["ITEMS"][]=$arItem;
		$arResult["ELEMENTS"][] = $arItem["ID"];
	}

	$this->SetResultCacheKeys(array(
	));
	$this->IncludeComponentTemplate();
}
?>