<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h2 class="push_right" xmlns="http://www.w3.org/1999/html"><?=GetMessage('CATALOG_MODELS_WEEK')?></h2>

<section class="product_line">
	<?foreach($arResult["ROWS"] as $arItems):?>
		<?foreach($arItems as $arElement):?>
            <?if(is_array($arElement)):?>
            <?
            $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
            ?>
                <figure class="product_item" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
                    <?if($arElement['DISPLAY_PROPERTIES']['SALE']['VALUE'] == 'TRUE'):?>
                        <div class="product_item_label sale"></div>
                    <?elseif($arElement['DISPLAY_PROPERTIES']['NEW']['VALUE'] == 'TRUE'):?>
                        <div class="product_item_label new"></div>
                    <?endif?>
                    <div class="product_item_pict">
                        <?if(is_array($arElement["PREVIEW_PICTURE"])):?>
                            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                                <img border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" />
                            </a>
                        <?else:?>
                            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                                <img border="0" src="/bitrix/templates/.default/images/no-image.jpg" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" />
                            </a>
                        <?endif?>
                    </div>
                    <figcaption>
                        <h3><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h3>

                        <?if($arResult["bDisplayPrices"]):?>
                            <?foreach($arElement["PRICES"] as $code=>$arPrice):?>
                                <?if($arPrice["CAN_ACCESS"]):?>
                                    <?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
                                        <p class="product_item_price dark_grey">
                                            <s><?=$arPrice["PRINT_VALUE"]?></s> <span class="catalog-price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></span>
                                        </p>
                                    <?else:?>
                                        <p class="product_item_price dark_grey"><?=$arPrice["PRINT_VALUE"]?></p>
                                    <?endif?>
                                <?endif;?>
                            <?endforeach;?>
                        <?endif?>
                        <?if($arResult["bDisplayButtons"]):?>
                            <?if($arElement["CAN_BUY"] && $arElement["CATALOG_QUANTITY"] > 0):?>
                                <a class="buy_button inverse inline-block pie" href="<?echo $arElement["ADD_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_ADD")?></a>
                            <?elseif((count($arResult["PRICES"]) > 0) || is_array($arElement["PRICE_MATRIX"])):?>
                                <b><?=GetMessage("CATALOG_NOT_AVAILABLE")?></b>
                            <?endif?>
                        <?endif;?>
                    </figcaption>
                </figure>
            <?endif;?>
        <?endforeach?>
    <?endforeach?>
</section>