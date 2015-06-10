<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
    "IBLOCK_SHOW_MAP" => array(
        "PARENT" => "VISUAL",
        "NAME" => GetMessage("IBLOCK_SHOW_MAP"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => false,
    ),
);