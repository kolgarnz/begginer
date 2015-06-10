<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(count($arResult["ITEMS"]) > 0):?>
<section class="news_block inverse">

    <h2 class="inline-block">
        <?=GetMessage('NEWS_TITLE')?>
    </h2>
    <?if(strlen($arResult['LIST_PAGE_URL']) > 0):?>
        <span class="all_list">
            &nbsp;/&nbsp;
            <a href="<?=$arResult['LIST_PAGE_URL']?>" class="text_decor_none">
                <b><?=GetMessage("ALL")?></b>
            </a>
        </span>
	<?endif?>
    <div>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<figure class="news_item">
				<a href="<?=$arItem["DETAIL_PAGE_URL"]?>">
                    <img src="<?=$arItem["PICTURE"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
                </a>
				<figcaption class="news_item_description">
					<?if($arItem["NAME"]):?>
						<h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news_name"><?=$arItem["NAME"]?></a></h3>
					<?endif;?>
					<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
						<div class="news_item_anons">
							<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="text_decor_none">
							<?=$arItem["PREVIEW_TEXT"];?>
							</a>
						</div>
					<?endif;?>
					<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
						<div class="news_item_date grey"><?=$arItem["DISPLAY_ACTIVE_FROM"]?></div>
					<?endif?>
				</figcaption>	
			</figure>
			</div>
		<?endforeach;?>
	</div>
</section>
<?endif?>