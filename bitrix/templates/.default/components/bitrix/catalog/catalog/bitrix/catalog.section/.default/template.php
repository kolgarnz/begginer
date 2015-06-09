<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arResult['ITEMS'] > 0):?>
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <section>
        <?for($i = 0; $i < count($arResult["NOT_ZERO"]); $i++):?>
            <?$arElement = $arResult["NOT_ZERO"][$i];?>
            <?
            $this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
            ?>

            <?if(
                count($arResult["NOT_ZERO"]) > 0 && count($arResult["NOT_ZERO"]) < $arParams['LINE_ELEMENT_COUNT'] || (
                    count($arResult["NOT_ZERO"]) % $arParams['LINE_ELEMENT_COUNT'] > 0 &&
                    $i > count($arResult["NOT_ZERO"]) - (count($arResult["NOT_ZERO"]) % $arParams['LINE_ELEMENT_COUNT']) - 1
                ) || (
                    count($arResult["NOT_ZERO"]) % $arParams['LINE_ELEMENT_COUNT'] == 0 &&
                    $i > count($arResult["NOT_ZERO"]) - $arParams['LINE_ELEMENT_COUNT'] - 1
                )
            ):?>
                <figure class="product_item last" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
            <?else:?>
                <figure class="product_item" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
            <?endif?>
                <?if($arElement['PROPERTIES']['SALE']['VALUE'] == 'TRUE'):?>
                    <div class="product_item_label sale"></div>
                <?elseif($arElement['PROPERTIES']['NEW']['VALUE'] == 'TRUE'):?>
                    <div class="product_item_label new"></div>
                <?endif?>
                <?if(is_array($arElement["PREVIEW_PICTURE"])):?>
                    <div class="product_item_pict">
                        <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                            <img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>"/>
                        </a>
                    </div>
                <?elseif(strlen($arParams['CATALOG_NO_IMAGE']) > 0):?>
                    <div class="product_item_pict">
                        <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                            <img src="<?=$arParams['CATALOG_NO_IMAGE']?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>"/>
                        </a>
                    </div>
                <?endif?>
                <figcaption>
                    <h3><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h3>
                        <?if($arElement["PRICES"]["BASE"]["CAN_ACCESS"]):?>
                            <p class="product_item_price dark_grey">
                            <?if($arElement["PRICES"]["BASE"]["DISCOUNT_VALUE"] < $arElement["PRICES"]["BASE"]["VALUE"]):?>
                                <s>
                                    <?=$arElement["PRICES"]["BASE"]["PRINT_VALUE"]?>
                                </s>
                                <span id="discount_price">
                                    <?=$arElement["PRICES"]["BASE"]["PRINT_DISCOUNT_VALUE"]?>
                                </span>
                            <?else:?>
                                <?=$arElement["PRICES"]["BASE"]["PRINT_VALUE"]?>
                            <?endif;?>
                            </p>
                        <?endif;?>
                    <?if($arElement["CATALOG_QUANTITY"]):?>
                            <a class="buy_button inverse inline-block pie" href="<?=$arElement["ADD_URL"]?>" rel="nofollow"><?=GetMessage("CATALOG_ADD")?></a>
                    <?else:?>
                        <b><?=GetMessage("CATALOG_NOT_AVAILABLE")?></b>
                    <?endif?>
                </figcaption>
            </figure>
        <?endfor?>
    <div class="clear"></div>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
    </section>
<?endif?>
