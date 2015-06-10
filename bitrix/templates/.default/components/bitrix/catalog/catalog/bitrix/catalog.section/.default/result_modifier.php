<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ITEMS'] as $key => $arItem) {
    if(intval($arItem['CATALOG_PRICE_1']) <= 0) {
        unset($arResult['ITEMS'][$key]);
        unset($arResult['ELEMENTS'][$arItem['ID']]);
    }
}
sort($arResult['ITEMS']);