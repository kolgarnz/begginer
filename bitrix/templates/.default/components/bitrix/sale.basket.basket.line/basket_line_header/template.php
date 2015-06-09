<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="basket_block inline-block">
	<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="basket_product_count inline-block"><?=$arResult["NUM_PRODUCTS"];?></a>
	<a
        <?=intval($arResult["NUM_PRODUCTS"]) ? $arParams["PATH_TO_BASKET"] : '' ?>
        class="order_button pie <?=intval($arResult["NUM_PRODUCTS"]) ? 'active' : '' ?>
    ">
        <?=GetMessage('TSB1_MAKE_ORDER')?>
    </a>
</div>
