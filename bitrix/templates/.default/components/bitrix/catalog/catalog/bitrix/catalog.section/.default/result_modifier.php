<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ITEMS'] as $key => $arItem) {
    if(intval($arItem['CATALOG_PRICE_1']) <= 0) {
        unset($arResult['ITEMS'][$key]);
        unset($arResult['ELEMENTS'][$arItem['ID']]);
        continue;
    }
    $arResult['ITEMS'][$key]['ACTION'] = '';
    if($arItem['PROPERTIES']['SALE']['VALUE'] == 'TRUE') {
        $arResult['ITEMS'][$key]['ACTION'] = 'sale';
    } elseif($arItem['PROPERTIES']['NEW']['VALUE'] == 'TRUE') {
        $arResult['ITEMS'][$key]['ACTION'] = 'new';
    }

}
sort($arResult['ITEMS']);
if(strlen($arParams['CATALOG_NO_IMAGE']) <= 0) {
    $arParams['CATALOG_NO_IMAGE'] = NO_IMAGE_LINK;
}