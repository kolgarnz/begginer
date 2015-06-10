<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if(count($arResult['ITEMS']) > 0):?>
<section class="news_block">
    <?if($arParams["DISPLAY_TOP_PAGER"]):?>
        <?=$arResult["NAV_STRING"]?><br />
    <?endif;?>
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <figure class="news_item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <?if(is_array($arItem["PREVIEW_PICTURE"]) && !empty($arItem['PREVIEW_PICTURE'])):?>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"/>
                </a>
            <?elseif(strlen($arParams['LIST_NO_IMAGE']) > 0):?>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <img src="<?=$arParams['LIST_NO_IMAGE']?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>"/>
                </a>
            <?endif?>
            <figcaption class="news_item_description">
                <div class="news_item_anons">
                    <?if($arItem["DETAIL_TEXT"]):?>
                        <h3  class="dark_grey"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h3>
                    <?endif;?>
                    <?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
                        <p><?=$arItem["PREVIEW_TEXT"];?></p>
                    <?endif;?>
                </div>
                <?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
                    <p class="news_item_date grey"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></p>
                <?endif?>
            <figcaption>
        </figure>
    <?endforeach;?>
    <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
    <?endif;?>
</section>
<?endif?>