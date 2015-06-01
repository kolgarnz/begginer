<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="basket_block inline-block">
	<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="basket_product_count inline-block"><?=$arResult["NUM_PRODUCTS"];?></a>
	<a <?if (IntVal($arResult["NUM_PRODUCTS"])>0):?>href="<?=$arParams["PATH_TO_BASKET"]?>"<?endif?> class="order_button pie <?if (IntVal($arResult["NUM_PRODUCTS"])>0):?>active<?endif?>"><?=GetMessage('TSB1_MAKE_ORDER')?></a>
</div>
