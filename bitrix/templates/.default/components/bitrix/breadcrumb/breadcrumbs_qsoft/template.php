<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult)) {
    return "";
}

$notShow = array();
$notShow[] = '/catalog/';
$notShow[] = '/company/';


$strReturn = '<nav class="nav_chain">';

for($index = 0, $itemSize = count($arResult); $index < $itemSize; $index++) {
    if(in_array($arResult[$index]['LINK'],$notShow)) {
        continue;
    }

	if($index > 0) {
		$strReturn .= '<span class="nav_arrow inline-block"></span>';
    }

	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	if($arResult[$index]["LINK"] <> "" && $index != ($itemSize - 1)) {
        $strReturn .= '<a href="' . $arResult[$index]["LINK"] . '">' . $title . '</a>';
    } else {
		$strReturn .= '<span>'.$title.'</span>';
    }
}
$strReturn .= '</nav>';
return $strReturn;

