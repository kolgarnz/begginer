<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="news_block inverse">
	<h2 class="inline-block"><?=GetMessage('NEWS_TITLE')?></h2><span class="all_list">&nbsp;/&nbsp;<a href="/company/news" class="text_decor_none"><b><?=GetMessage("ALL")?></b></a></span>
	<div>
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<figure class="news_item">			
				<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" /></a>
					<?else:?>
						<img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>" />
					<?endif;?>
				<?endif?>
				<figcaption class="news_item_description">	
				
					
					<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
						<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
							<h3><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="news_name"><?=$arItem["NAME"]?></a></h3>
						<?else:?>
							<h3><?=$arItem["NAME"]?></h3>
						<?endif;?>
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
