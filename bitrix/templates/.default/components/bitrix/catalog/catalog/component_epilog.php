<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult['SECTION_ID'] = CIBlockFindTools::GetSectionID(
    $arResult['VARIABLES']['SECTION_ID'],
    $arResult['VARIABLES']['SECTION_CODE'],
    array('IBLOCK_ID' => $arParams['IBLOCK_ID'])
);