<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

//Params
$arParams["TYPE"] = (isset($arParams["TYPE"]) ? trim($arParams["TYPE"]) : "");

if($arParams["NOINDEX"] <> "Y") {
	$arParams["NOINDEX"] = "N";
}

if ($arParams["CACHE_TYPE"] == "Y" || ($arParams["CACHE_TYPE"] == "A" && COption::GetOptionString("main", "component_cache_on", "Y") == "Y"))
	$arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]);
else
	$arParams["CACHE_TIME"] = 0;


$obCache = new CPHPCache;
$cache_id = SITE_ID."|advertising.banner|".serialize($arParams)."|".$USER->GetGroups();
$cache_path = "/".SITE_ID.$this->GetRelativePath();

$arResult = array();
if ($obCache->StartDataCache($arParams["CACHE_TIME"], $cache_id, $cache_path)) {
	if(!CModule::IncludeModule("advertising")) {
		return;
    }

	$rs = CAdvBanner::GetList($by="s_id", $order="desc", array("TYPE_SID" => $arParams["TYPE"], "TYPE_SID_EXACT_MATCH" => "Y", "ACTIVE" => "Y"), $if_filtered, "N");
	while($ar = $rs->Fetch()) {
		$imgUrl = CFile::GetPath(intval($ar['IMAGE_ID']));
		
		if(strlen($ar['URL']) > 0 && $imgUrl) {
            $arResult[] = array(
                'URL' => $ar['URL'],
                'IMG_URL' => $imgUrl
            );
        }
		unset($ar);
		unset($imgUrl);
	}
	unset($rs);

	$this->IncludeComponentTemplate();

	$templateCachedData = $this->GetTemplateCachedData();

	$obCache->EndDataCache(
		Array(
			"arResult" => $arResult,
			"templateCachedData" => $templateCachedData
		)
	);
} else {
	$arVars = $obCache->GetVars();
	$arResult = $arVars["arResult"];
	$this->SetTemplateCachedData($arVars["templateCachedData"]);
}
?>