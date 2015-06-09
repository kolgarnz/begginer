<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

//Params
$arParams["TYPE"] = (isset($arParams["TYPE"]) ? trim($arParams["TYPE"]) : "");

if($arParams["NOINDEX"] <> "Y") {
	$arParams["NOINDEX"] = "N";
}

if (
    $arParams["CACHE_TYPE"] == "Y" || (
        $arParams["CACHE_TYPE"] == "A" &&
        COption::GetOptionString("main", "component_cache_on", "Y") == "Y"
        )
) {
	$arParams["CACHE_TIME"] = intval($arParams["CACHE_TIME"]);
} else {
    $arParams["CACHE_TIME"] = 0;
}

$arResult = array();
if($this->StartResultCache(
    false,
    array(
        ($arParams["CACHE_GROUPS"]==="N"? false: $USER->GetGroups()),
        $arParams["TYPE"]
        )
    )
) {
	if(!CModule::IncludeModule("advertising")) {
        $this->AbortResultCache();
		return;
    }

	$rs = CAdvBanner::GetList(
        $by="s_id",
        $order="desc",
        array(
            "TYPE_SID" => $arParams["TYPE"],
            "TYPE_SID_EXACT_MATCH" => "Y",
            "ACTIVE" => "Y"
        ),
        $if_filtered,
        "N"
    );

	while($ar = $rs->GetNext(true,false)) {
        $ar['IMAGE_ID'] = intval($ar['IMAGE_ID']);

        if($ar['IMAGE_ID'] > 0 && strlen($ar['URL']) > 0) {
            $imgUrl = CFile::GetPath($ar['IMAGE_ID']);
            if(strlen($imgUrl) > 0) {
                $arResult['BANNERS'][$ar['ID']] = array(
                    'NAME' => $ar['NAME'],
                    'IMG' => $imgUrl,
                    'URL' => $ar['URL'],
                    'CODE' => str_replace('#BANNER_URL#', $ar['URL'], $ar['CODE']),
                );
            }
        }
	}
    $this->SetResultCacheKeys(array(
        'BANNERS'
    ));
	$this->IncludeComponentTemplate();
}

if(isset($arResult["BANNERS"])) {
    $this->SetTemplateCachedData($arResult["BANNERS"]);
}

