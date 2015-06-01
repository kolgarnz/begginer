<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
//Порядок отображения фильтров в смартфильтре
$NEW_ORDER = array('KPP' => '','BASE' => '','COLOR' => '');


foreach($arResult["ITEMS"] as $arItem)
{
    $NEW_ORDER[($arItem['CODE'])] = $arItem;
}
$arResult["ITEMS"] = $NEW_ORDER;
unset($NEW_ORDER);

//Блок проверки и подстройки HTML_VALUE
if(isset($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"])) {
    $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] = intval($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"]);
    if(
        $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] < intval($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"])
        || $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] > intval($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"])
    ) {
        unset($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"]);
    }
}

if(isset($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"])) {
    $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] = intval($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"]);
    if(
        $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] > intval($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"])
        || $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] < intval($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"])
    ) {
        unset($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"]);
    }
}

if(
    isset($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"]) && isset($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"])
    && $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] > $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"]
) {
    unset($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"]);
    unset($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"]);
}



