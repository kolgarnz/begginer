<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<section class="product_line">
		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<?//var_dump($arResult)?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>

		<figure class="product_item">
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
		<!-- Item Price -->	
		
			<?if(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"])):?>
				<figcaption>
				<h3><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h3>
				<?foreach($arElement["OFFERS"] as $arOffer):?>
					
					<?foreach($arOffer["PRICES"] as $code=>$arPrice):?>
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
					
					<?if($arOffer["CATALOG_QUANTITY"]):?>
						<a class="buy_button inverse inline-block pie" href="<?=$arOffer["ADD_URL"]?>"><?echo GetMessage("CATALOG_ADD")?></a>
					<?else:?>
						<b><?=GetMessage("CATALOG_NOT_AVAILABLE")?></b>
					<?endif?>
					</figcaption>
				<?endforeach;?>
			<?else:?>
				<figcaption>
				<h3><a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a></h3>
				<?foreach($arElement["PRICES"] as $code=>$arPrice):?>
					<?if($arPrice["CAN_ACCESS"]):?>
						<p class="product_item_price dark_grey">
						<?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
							<s><?=$arPrice["PRINT_VALUE"]?></s> <?=$arPrice["PRINT_DISCOUNT_VALUE"]?>
						<?else:?><?=$arPrice["PRINT_VALUE"]?><?endif;?>
						</p>
					<?endif;?>
				<?endforeach;?>

				<?if($arElement["CATALOG_QUANTITY"]):?>
						<a class="buy_button inverse inline-block pie" href="<?=$arElement["ADD_URL"]?>" rel="nofollow"><?echo GetMessage("CATALOG_ADD")?></a>
				<?else:?>
					<b><?=GetMessage("CATALOG_NOT_AVAILABLE")?></b>
				<?endif?>
				</figcaption>
			<?endif?>

		<?$cell++;?>
		</figure>
		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
</section>

