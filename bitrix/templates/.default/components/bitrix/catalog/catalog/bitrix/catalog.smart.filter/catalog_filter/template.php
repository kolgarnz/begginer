<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<form name="<?=$arResult["FILTER_NAME"]."_form"?>" action="<?=$arResult["FORM_ACTION"]?>" method="get" class="smartFilterQ">
    <?foreach($arResult["HIDDEN"] as $arItem):?>
        <input
            type="hidden"
            name="<?=$arItem["CONTROL_NAME"]?>"
            id="<?=$arItem["CONTROL_ID"]?>"
            value="<?=$arItem["HTML_VALUE"]?>"
            />
    <?endforeach;?>
    <div class="filter pie">
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <?if($arItem["PROPERTY_TYPE"] == "N" || isset($arItem["PRICE"])):?>
                <div class="b-slider">
                    <h3><?=GetMessage('CT_BCSF_PRICE')?>:</h3>
                    <div>
                        <input
                            type="text"
                            id="price-start"
                            <?if($arItem["VALUES"]["MIN"]["HTML_VALUE"] > 0):?>
                                value="<?=$arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
                            <?else:?>
                                placeholder="<?=GetMessage("CT_BCSF_FILTER_FROM")?> <?=CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"], 'RUB', true)?>"
                            <?endif?>
                            class="pie"
                            name="<?=$arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
                            />
                        <input
                            type="text"
                            id="price-end"
                            <?if($arItem["VALUES"]["MAX"]["HTML_VALUE"] > 0):?>
                                value="<?=$arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
                            <?else:?>
                                placeholder="<?=GetMessage("CT_BCSF_FILTER_TO")?> <?=CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], 'RUB', true)?>"
                            <?endif?>
                            class="pie"
                            name="<?=$arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
                            />
                    </div>
                    <div id="slider-range"></div>
                </div>
            <?elseif(!empty($arItem["VALUES"])):?>
                <?if('KPP' == $arItem['CODE']):?>
                    <div class="b-trans-type">
                        <h3><?=$arItem["NAME"]?>:</h3>
                        <?foreach($arItem["VALUES"] as $val => $ar):?>

                            <div class="b-trans-type__wrapper">
                                <input
                                    id="<?=$ar["CONTROL_ID"]?>"
                                    name="<?=$ar["CONTROL_NAME"]?>"
                                    value="<?=$ar["HTML_VALUE"]?>"
                                    <?=$ar["CHECKED"]? 'checked="checked"': ''?>
                                    <?=$ar['DISABLED']? 'disabled' : '' ?>
                                    class="filter-type"
                                    type="checkbox"
                                    onclick="$( '.smartFilterQ' ).submit();"
                                    />
                                <label class="filter-type-label" for="<?=$ar["CONTROL_ID"]?>"><?=$ar["VALUE"];?></label>
                            </div>
                        <?endforeach;?>
                    </div>
                <?elseif('COLOR' == $arItem['CODE']):?>
                    <div class="b-color">
                        <h3><?=$arItem["NAME"]?>:</h3>
                        <?foreach($arItem["VALUES"] as $val => $ar):?>
                            <div class="b-color__wrapper">
                                <input
                                    id="<?=$ar["CONTROL_ID"]?>"
                                    name="<?=$ar["CONTROL_NAME"]?>"
                                    value="<?=$ar["HTML_VALUE"]?>"
                                    <?=$ar["CHECKED"]? 'checked="checked"': ''?>
                                    <?=$ar['DISABLED']? 'disabled' : '' ?>
                                    class="filter-type"
                                    type="checkbox"
                                    onclick="$( '.smartFilterQ' ).submit();"
                                    />
                                <label class="filter-type-label" for="<?=$ar["CONTROL_ID"]?>"><?=$ar["VALUE"];?></label>
                            </div>
                        <?endforeach;?>
                    </div>
                <?endif?>
            <?endif;?>
        <?endforeach?>
    </div>
    <input name="set_filter" value="true" type="hidden" />
</form>
<script>
    window.onload = function() {
        $("#slider-range").slider({

            animate: "slow",
            range: true,
            min: <?=intval($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"])?>,
            max: <?=intval($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"])?>,
            step: 50000,
            values: [
                <?php
                    if($arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"] > 0) {
                        echo $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["HTML_VALUE"].',';
                    } else {
                        echo $arResult["ITEMS"]["BASE"]["VALUES"]["MIN"]["VALUE"].',';
                    }

                    if($arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"] > 0) {
                        echo $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["HTML_VALUE"];
                    } else {
                        echo $arResult["ITEMS"]["BASE"]["VALUES"]["MAX"]["VALUE"];
                    }
                ?>
            ],
            slide: function( event, ui ) {
                $( "#price-start" ).val(ui.values[ 0 ]);
                $( "#price-end" ).val(ui.values[ 1 ]);
            },
            stop: function( event, ui ){
                $( ".smartFilterQ" ).submit();
            }

        });
    }
</script>