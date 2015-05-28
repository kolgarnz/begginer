<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>

<section>
<?$added=0;?>
	<?foreach($arResult["ITEMS"] as $arElement):?>
		<?if(intval($arElement['CATALOG_PRICE_1']) <= 0):?>
			<?continue;?>
		<?endif?>
		<?$added++?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
		
		<figure class="product_item" id="<?=$this->GetEditAreaId($arElement['ID']);?>">
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
			<?else:?>
				<div class="product_item_pict">
					<a href="<?=$arElement["DETAIL_PAGE_URL"]?>">
						<img src="/bitrix/templates/.default/images/no-image.jpg" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>"/>
					</a>
				</div>	
			<?endif?>
			<figcaption>
				<h3><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h3>
				<?foreach($arElement["PRICES"] as $code=>$arPrice):?>
					<?if($arPrice["CAN_ACCESS"]):?>
						<p class="product_item_price dark_grey">
						<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
							<s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
						<?else:?>
							<?=$arPrice["PRINT_VALUE"]?>
						<?endif;?>
						</p>
					<?endif;?>
				<?endforeach;?>
				<?if($arElement["CATALOG_QUANTITY"]):?>
						<a class="buy_button inverse inline-block pie" href="<?=$arElement["ADD_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_ADD")?></a>
				<?else:?>
					<b><?=GetMessage("CATALOG_NOT_AVAILABLE")?></b>
				<?endif?>
			</figcaption>

		</figure>
	<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
	<?if($added % $arParams['LINE_ELEMENT_COUNT']):?>
		<?for($i = 0; $i < (4 - ($added % $arParams['LINE_ELEMENT_COUNT'])); $i++):?>
			<figure class="product_item">
			</figure>
		<?endfor?>
	<?endif?>
	
<div class="clear"></div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>	
</section>

