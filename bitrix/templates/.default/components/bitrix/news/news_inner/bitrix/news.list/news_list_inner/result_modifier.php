<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult["ITEMS"] as $key => $arItem) {
    if(is_array($arItem["PREVIEW_PICTURE"]) && !empty($arItem['PREVIEW_PICTURE'])) {
        $arResult["ITEMS"][$key]['PICTURE'] = $arItem["PREVIEW_PICTURE"]['SRC'];
    } elseif(strlen($arParams['LIST_NO_IMAGE']) > 0) {
        $arResult["ITEMS"][$key]['PICTURE'] = $arParams['LIST_NO_IMAGE'];
    } else {
        $arResult["ITEMS"][$key]['PICTURE'] = NO_IMAGE_LINK;
    }
}