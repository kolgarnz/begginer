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

    if(is_array($arItem["PREVIEW_PICTURE"]) && !empty($arItem['PREVIEW_PICTURE'])) {
        $arResult["ITEMS"][$key]['PICTURE'] = $arItem["PREVIEW_PICTURE"]['SRC'];
    } elseif(strlen($arParams['CATALOG_NO_IMAGE']) > 0) {
        $arResult["ITEMS"][$key]['PICTURE'] = $arParams['CATALOG_NO_IMAGE'];
    } else {
        $arResult["ITEMS"][$key]['PICTURE'] = NO_IMAGE_LINK;
    }

}
sort($arResult['ITEMS']);