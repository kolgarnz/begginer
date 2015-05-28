<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$addedRow=0;?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<section>
<div id="catalog">
	<?foreach($arResult["ROWS"] as $indRow => $arItems):?>
		<?foreach($arItems as $indElement => $arElement):?>
			<?if(is_array($arElement) && intval($arElement['CATALOG_PRICE_1']) > 0):?>
				<?
				$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
				?>
				<figure class="product_item" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
					<?if($arElement['PROPERTIES']['SALE']['VALUE'] == 'TRUE'):?>
						<div class="product_item_label sale"></div>
					<?elseif($arElement['PROPERTIES']['NEW']['VALUE'] == 'TRUE'):?>
						<div class="product_item_label new"></div>
					<?endif?>
					<div class="product_item_pict">
						<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
							<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
								<img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>"/>
							</a>
						<?else:?>
							<a href="/bitrix/templates/.default/images/no-image.jpg">
								<img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>"/>
							</a>
						<?endif?>
					</div>
					<figcaption>
						<h3><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h3>
						<?foreach($arElement["PRICES"] as $code=>$arPrice):?>
							<?if($arPrice["CAN_ACCESS"]):?>
								<p class="product_item_price dark_grey">
									<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
										<s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
									<?else:?>
										<?=$arPrice["PRINT_VALUE"]?>
									<?endif?>
								</p>
							<?endif;?>
						<?endforeach;?>
						<?if($arResult["bDisplayButtons"]):?>
							<tr valign="top">
							<?if(is_array($arElement) && (!is_array($arElement["OFFERS"]) || empty($arElement["OFFERS"]))):?>
								<?if($arElement["CAN_BUY"] && intval($arElement["CATALOG_QUANTITY"]) > 0):?>
									<a class="buy_button inverse inline-block pie" href="<?=$arElement["ADD_URL"]?>" rel="modal:open">
										<?echo GetMessage("CATALOG_ADD")?>
									</a>
								<?elseif((count($arResult["PRICES"]) > 0) || is_array($arElement["PRICE_MATRIX"])):?>
									<?=GetMessage("CATALOG_NOT_AVAILABLE")?>
								<?endif?>
							<?endif;?>
						<?endif;?>						
					</figcaption>
				</figure>
				<?$addedRow++?>
			<?endif?>
		<?endforeach?>
	<?endforeach?>
	<?$countRows = count($arResult["ROWS"]);?>
	<?if($addedRow % $countRows && $countRows > 0):?>
		<?for($i = 0; $i < ($countRows - ($addedRow % $countRows)); $i++):?>
			<figure class="product_item" id="empty">
			</figure>
		<?endfor?>
	<?endif;?>
</div>
</section>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
