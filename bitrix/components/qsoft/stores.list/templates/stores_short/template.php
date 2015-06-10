<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult['ITEMS']) > 0):?>
    <section class="shops_block">
        <h2 class="inline-block"><?=GetMessage('OUR_STORES')?></h2>
        <?if(strlen($arParams['IBLOCK_ALL_URL']) > 0):?>
            <span class="dark_grey all_list">&nbsp;/&nbsp;<a href="<?=$arParams['IBLOCK_ALL_URL']?>" class="text_decor_none"><b><?=GetMessage('ALL')?></b></a></span>
        <?endif?>
        <div>
        <?foreach($arResult['ITEMS'] as $store):?>
            <figure class="shops_block_item">
                <?if(strlen($store["PICTURE"]) > 0):?>
                    <img src="<?=$store["PICTURE"]?>" alt="<?=$store['NAME']?>" title="<?=$store['NAME']?>"/>
                <?endif?>
                <figcaption class="shops_block_item_description">
                    <h3 class="shops_block_item_name"><?=$store['NAME']?></h3>
                    <p class="dark_grey"><?=$store['PROPERTY_ADDRESS_VALUE']?></p>
                    <p class="black"><?=$store['PROPERTY_PHONE_VALUE']?></p>
                    <p><?=GetMessage('WORK_TIME')?>:<br><?=$store['PROPERTY_WORK_HOURS_VALUE']?></p>
                </figcaption>
            </figure>
        <?endforeach?>
        </div>
    </section>
<?endif?>