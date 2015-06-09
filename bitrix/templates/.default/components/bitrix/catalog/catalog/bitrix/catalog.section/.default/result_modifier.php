<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
foreach($arResult['ITEMS'] as $arItem) {
    if(intval($arItem['CATALOG_PRICE_1']) > 0) {
        $arResult['NOT_ZERO'][] = $arItem;
    }
}
