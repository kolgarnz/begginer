<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult['LIST_PAGE_URL'] = CIBlock::ReplaceDetailUrl($arResult['LIST_PAGE_URL']);
if(strlen($arParams['LIST_NO_IMAGE']) <= 0) $arParams['LIST_NO_IMAGE'] = NO_IMAGE_LINK;