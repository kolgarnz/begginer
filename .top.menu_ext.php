<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;
$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    Array(
        "IS_SEF" => "N",
        "ID" => $_REQUEST["ID"],
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "25",
        "SECTION_URL" => "/catalog/#SECTION_CODE#/",
        "DEPTH_LEVEL" => "2",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000"
    )
);
$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
?>
