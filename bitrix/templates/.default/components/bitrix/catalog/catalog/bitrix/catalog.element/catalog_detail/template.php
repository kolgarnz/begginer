<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
$toShow = array();

if(is_array($arResult["DETAIL_PICTURE"])) {
    $toShow[] = $arResult['DETAIL_PICTURE'];
}
if(
    is_array($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"])
    && !empty($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"])
) {
    foreach($arResult["PROPERTIES"]["ADDITIONAL_PICTURES"]["VALUE"] as $imgId) {
        if(count($toShow) >= 3) {
            break;
        }
       $img = CFile::GetFileArray($imgId);
        if(is_array($img)) {
            $toShow[] = $img;
        }
        unset($img);
    }
}
?>


<figure class="product_detail">
    <figcaption>
        <div class="b-product-photo">
            <ul class="b-product-photo__list">
                <?foreach($toShow as $img):?>
                    <li class="b-product-photo__list-item">
                        <img class="b-product-photo__list-item__content" src="<?=$img["SRC"]?>" alt="<?=$arResult["NAME"]?>">
                    </li>
                <?endforeach?>
            </ul>

            <?$i=0?>
            <div class="b-product-photo__thumbnail">
                <?foreach($toShow as $img):?>
                    <a data-slide-index="<?=$i++?>" href="" class="b-product-photo__thumbnail-item">
                        <img class="b-product-photo__thumbnail-item__content" src="<?=$img["SRC"]?>" alt="<?=$arResult["NAME"]?> Thumbnail">
                    </a>
                <?endforeach?>
            </div>
        </div>
        <div class="price_block">
            <?foreach($arResult["PRICES"] as $code=>$arPrice):?>
                <?if($arPrice["CAN_ACCESS"]):?>
                    <?
                    $currencyData = CCurrencyLang::GetCurrencyFormat($arPrice['CURRENCY']);
                    $currencyStr = str_replace('#','',$currencyData['FORMAT_STRING']);
                    ?>
                    <?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
                        <span class="old_price"><?=$arPrice["PRINT_VALUE"]?></span>
                        <p class="current_price dark_grey"><b class="orange"><?=number_format($arPrice["DISCOUNT_VALUE"],2,'.',' ')?></b><?=$currencyStr?></p>
                    <?else:?>
                        <p class="current_price dark_grey"><b class="orange"><?=number_format($arPrice["VALUE"],2,'.',' ')?></b><?=$currencyStr?></p>
                    <?endif?>
                <?endif;?>
            <?endforeach;?>
            <?if($arResult["CAN_BUY"] && $arResult['CATALOG_QUANTITY']):?>
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
                            <?
                            if(is_array($arProperty["DISPLAY_VALUE"])):
                                echo '<td>'.implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]).'</td>';
                            elseif($pid=="MANUAL"):
                                ?><td><a href="<?=$arProperty["VALUE"]?>"><?=GetMessage("CATALOG_DOWNLOAD")?></a></td><?
                            else:
                                echo '<td>'.$arProperty["DISPLAY_VALUE"].'</td>';?>
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