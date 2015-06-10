<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"]) > 0):?>
    <h2 class="push_right" xmlns="http://www.w3.org/1999/html"><?=GetMessage('CATALOG_MODELS_WEEK')?></h2>
    <section class="product_line">
        <?foreach($arResult["ITEMS"] as $arElement):?>
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
                        <?if(strlen($arElement["PREVIEW_PICTURE"])):?>
                            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                                <img border="0" src="<?=$arElement["PREVIEW_PICTURE"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" />
                            </a>
                        <?elseif($arParams['NO_IMAGE']):?>
                            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
                                <img border="0" src="<?=$arParams['NO_IMAGE']?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" />
                            </a>
                        <?endif?>
                    </div>
                    <figcaption>
                        <h3><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h3>
                            <?if($arElement["PRICES"]['BASE']["CAN_ACCESS"]):?>
                                <?if($arElement["PRICES"]['BASE']["DISCOUNT_VALUE"] < $arElement["PRICES"]['BASE']["VALUE"]):?>
                                    <p class="product_item_price dark_grey">
                                        <s><?=$arElement["PRICES"]['BASE']["PRINT_VALUE"]?></s> <span class="catalog-price"><?=$arElement["PRICES"]['BASE']["PRINT_DISCOUNT_VALUE"]?></span>
                                    </p>
                                <?else:?>
                                    <p class="product_item_price dark_grey"><?=$arElement["PRICES"]['BASE']["PRINT_VALUE"]?></p>
                                <?endif?>
                            <?endif;?>
                        <?if($arElement["CAN_BUY"] && $arElement["CATALOG_QUANTITY"] > 0):?>
                            <a class="buy_button inverse inline-block pie" href="<?=$arElement["ADD_URL"]?>" rel="nofollow"><?=GetMessage("CATALOG_ADD")?></a>
                        <?else:?>
                            <b><?=GetMessage("CATALOG_NOT_AVAILABLE")?></b>
                        <?endif?>
                    </figcaption>
                </figure>
            <?endif;?>
        <?endforeach?>
    </section>
<?endif?>