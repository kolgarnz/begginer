<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(!empty($arResult)):?>
    <figure class="product_detail">
        <figcaption>
            <div class="b-product-photo">
                <ul class="b-product-photo__list">
                    <?foreach($arResult['TO_SHOW'] as $img):?>
                        <li class="b-product-photo__list-item">
                            <img class="b-product-photo__list-item__content" src="<?=$img?>" alt="<?=$arResult["NAME"]?>">
                        </li>
                    <?endforeach?>
                </ul>

                <?$i=0?>
                <div class="b-product-photo__thumbnail">
                    <?foreach($arResult['TO_SHOW'] as $img):?>
                        <a data-slide-index="<?=$i++?>" href="" class="b-product-photo__thumbnail-item">
                            <img class="b-product-photo__thumbnail-item__content" src="<?=$img?>" alt="<?=$arResult["NAME"]?> Thumbnail">
                        </a>
                    <?endforeach?>
                </div>
            </div>
            <div class="price_block">
                <?if($arResult["PRICES"]["BASE"]["CAN_ACCESS"]):?>
                    <?
                    $currencyData = CCurrencyLang::GetCurrencyFormat($arResult["PRICES"]["BASE"]['CURRENCY']);
                    $currencyStr = str_replace('#','',$currencyData['FORMAT_STRING']);
                    ?>
                    <?if($arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"] < $arResult["PRICES"]["BASE"]["VALUE"]):?>
                        <span class="old_price"><?=$arResult["PRICES"]["BASE"]["PRINT_VALUE"]?></span>
                        <p class="current_price dark_grey">
                            <b class="orange">
                                <?=number_format($arResult["PRICES"]["BASE"]["DISCOUNT_VALUE"],2,'.',' ')?>
                            </b>
                            <?=$currencyStr?>
                        </p>
                    <?else:?>
                        <p class="current_price dark_grey">
                            <b class="orange">
                                <?=number_format($arResult["PRICES"]["BASE"]["VALUE"],2,'.',' ')?>
                            </b>
                            <?=$currencyStr?>
                        </p>
                    <?endif?>
                <?endif;?>

                <?if($arResult["CAN_BUY"] && $arResult['CATALOG_QUANTITY'] && $arResult["PRICES"]["BASE"]["VALUE"] > 0):?>
                    <a class="buy_button inverse" href="<?=$arResult['ADD_URL']?>"><?=GetMessage('CT_BCE_CATALOG_ADD')?></a>
                <?else:?>
                    <?=GetMessage('CATALOG_NOT_AVAILABLE')?>
                <?endif?>
            </div>
            <div class="slide_box">
                <h3 class=" slide_panel show"><?=GetMessage('CATALOG_PARAMETERS')?>
                    <div class="slide_button"></div>
                </h3>
                <div class="slide_block" style="display:block">
                    <table class="features">
                        <?foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
                            <tr>
                                <td><div><span><?=$arProperty["NAME"]?>:</span></div></td>
                                <?if(strlen($arProperty["DISPLAY_VALUE"]) > 0):?>
                                    <?='<td>'.$arProperty["DISPLAY_VALUE"].'</td>';?>
                                <?endif?>
                            </tr>
                        <?endforeach?>
                    </table>
                </div>
            </div>
            <?if($arResult["DETAIL_TEXT"]):?>
                <div class="slide_box">
                    <h3 class="slide_panel show"><?=GetMessage('CATALOG_TEXT')?>
                        <div class="slide_button"></div>
                    </h3>
                    <div class="slide_block" style="display:block">
                        <?=$arResult["DETAIL_TEXT"]?>
                    </div>
                </div>
            <?endif;?>
        </figcaption>
    </figure>
<?endif?>