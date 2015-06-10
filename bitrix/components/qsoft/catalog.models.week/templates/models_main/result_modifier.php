<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
foreach($arResult["ITEMS"] as $key => $arItem) {
    $arResult['ITEMS'][$key]['ACTION'] = '';
    if($arItem['PROPERTIES']['SALE']['VALUE'] == 'TRUE') {
        $arResult['ITEMS'][$key]['ACTION'] = 'sale';
    } elseif($arItem['PROPERTIES']['NEW']['VALUE'] == 'TRUE') {
        $arResult['ITEMS'][$key]['ACTION'] = 'new';
    }
}