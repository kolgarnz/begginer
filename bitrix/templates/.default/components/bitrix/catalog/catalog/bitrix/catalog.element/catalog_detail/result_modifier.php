<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult['SECTION']['PATH'][] = array(
    'NAME' => $arResult['NAME'],
    'PATH' => ' ');

$toShow = array();

if(is_array($arResult["DETAIL_PICTURE"])) {
    $toShow[] = $arResult['DETAIL_PICTURE']['SRC'];
}
if(
    is_array($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"])
    && !empty($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"])
) {
    foreach($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"] as $imgId) {
        if(count($toShow) >= 3) {
            break;
        }
        $imgId = intval($imgId);
        if($imgId <= 0) {
            continue;
        }
        $img = CFile::GetPath($imgId);
        if(strlen($img) > 0) {
            $toShow[] = $img;
        }
        unset($img);
    }
}
$arResult['TO_SHOW'] = $toShow;
unset($toShow);
