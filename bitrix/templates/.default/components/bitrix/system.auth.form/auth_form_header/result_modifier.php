<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(strlen($_REQUEST['backurl']) > 0 && $APPLICATION->GetCurDir() == '/auth/') {
    $arResult['BACKURL'] = $_REQUEST['backurl'];
}

?>
