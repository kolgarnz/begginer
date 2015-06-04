<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="id-cart-list">
<?$numCells = 0;?>
<table class="customized" rules="rows">
	<thead>
		<tr>
            <?if (in_array("NUMBER", $arParams["COLUMNS_LIST"])):?>
                <td><?=GetMessage('SALE_NUMBER')?></td>
                <?$numCells++;?>
            <?endif?>
            <?if (in_array("PICTURE", $arParams["COLUMNS_LIST"])):?>
                <td><?= GetMessage("SALE_PICTURE")?></td>
            <?endif?>
			<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
				<td><?= GetMessage("SALE_NAME")?></td>
				<?$numCells++;?>
			<?endif;?>
            <?if (count($arParams['PROPERTY_LIST']) > 0):?>
                <td><?=GetMessage('SALE_PROPERTY')?></td>
                <?$numCells++;?>
            <?endif?>
            <?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
                <td class="cart-item-price"><?= GetMessage("SALE_PRICE")?></td>
                <?$numCells++;?>
            <?endif;?>
			<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
				<td class="cart-item-quantity"><?= GetMessage("SALE_QUANTITY")?></td>
				<?$numCells++;?>
			<?endif;?>
            <?if (in_array("DELETE", $arParams["COLUMNS_LIST"])):?>
                <td></td>
                <?$numCells++;?>
            <?endif?>
		</tr>
	</thead>
<?if(count($arResult["ITEMS"]["AnDelCanBuy"]) > 0):?>
	<tbody>
	<?
	$i=0;
	foreach($arResult["ITEMS"]["AnDelCanBuy"] as $arBasketItems)
	{
		?>
		<tr>
            <?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
                <td><?=($i+1)?></td>
            <?endif?>
            <?if (in_array("PICTURE", $arParams["COLUMNS_LIST"])):?>
                <td>
                    <?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
                    <a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
                    <?endif;?>
                    <?if (strlen($arBasketItems["DETAIL_PICTURE"]["SRC"]) > 0) :?>
                        <img src="<?=$arBasketItems["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arBasketItems["NAME"] ?>"/>
                    <?else:?>
                        <img src="/bitrix/components/qsoft/eshop.sale.basket.basket/templates/basket/images/no-photo.png" alt="<?=$arBasketItems["NAME"] ?>"/>
                    <?endif?>
                    <?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
                    </a>
                    <?endif;?>
                </td>
            <?endif?>
			<?if (in_array("NAME", $arParams["COLUMNS_LIST"])):?>
				<td>
					<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
						<a href="<?=$arBasketItems["DETAIL_PAGE_URL"]?>">
					<?endif;?>
						<?=$arBasketItems["NAME"] ?>
					<?if (strlen($arBasketItems["DETAIL_PAGE_URL"])>0):?>
						</a>
					<?endif;?>
					<?if (in_array("PROPS", $arParams["COLUMNS_LIST"]))
					{
						foreach($arBasketItems["PROPS"] as $val)
						{
							echo "<br />".$val["NAME"].": ".$val["VALUE"];
						}
					}?>
				</td>
			<?endif;?>
            <?if (count($arParams['PROPERTY_LIST']) > 0):?>
                <td>
                    <?
                    foreach($arParams['PROPERTY_LIST'] as $property) {
                        if(is_array($arBasketItems['PROPERTY_LIST'][$property]) && !empty($arBasketItems['PROPERTY_LIST'][$property])) {
                            echo '<b>'.$arBasketItems['PROPERTY_LIST'][$property]['NAME'].'</b>: '.$arBasketItems['PROPERTY_LIST'][$property]['VALUE'].'<br>';
                        }
                    }
                    ?>
                </td>
            <?endif?>
            <?if (in_array("PRICE", $arParams["COLUMNS_LIST"])):?>
                <td class="cart-item-price">
                    <?if(doubleval($arBasketItems["FULL_PRICE"]) > 0):?>
                        <div class="orange"><?=$arBasketItems["PRICE_FORMATED"]?></div>
                        <div class="old-price"><s><?=$arBasketItems["FULL_PRICE_FORMATED"]?></s></div>
                    <?else:?>
                        <div class="orange"><?=$arBasketItems["PRICE_FORMATED"];?></div>
                    <?endif?>
                    <?if (in_array("TOTAL_PRICE", $arParams["COLUMNS_LIST"])):?>
                        <hr>
                        <div class="total-price"><?=CurrencyFormat(($arBasketItems["PRICE"]*$arBasketItems["QUANTITY"]),$arBasketItems['CURRENCY']);?></div>
                    <?endif?>
                </td>
            <?endif;?>

			<?if (in_array("QUANTITY", $arParams["COLUMNS_LIST"])):?>
				<td>
					<input maxlength="3" class="count" type="text" name="QUANTITY_<?=$arBasketItems["ID"]?>" value="<?=$arBasketItems["QUANTITY"]?>" size="2" id="QUANTITY_<?=$arBasketItems["ID"]?>">
					<div class="count_nav">
						<a href="javascript:void(0)" class="plus" onclick="BX('QUANTITY_<?=$arBasketItems["ID"]?>').value++;"></a>
						<a href="javascript:void(0)" class="minus" onclick="if (BX('QUANTITY_<?=$arBasketItems["ID"]?>').value > 1) BX('QUANTITY_<?=$arBasketItems["ID"]?>').value--;"></a>
					</div>
				</td>
			<?endif;?>
            <?if (in_array("DELETE", $arParams["COLUMNS_LIST"])):?>
                <td>
                    <a class="deleteitem" href="<?=str_replace("#ID#", $arBasketItems["ID"], $arUrlTempl["delete"])?>" onclick="//return DeleteFromCart(this);" title="<?=GetMessage("SALE_DELETE_PRD")?>"><?=GetMessage("SALE_DELETE_BUTTON")?></a>
                </td>
            <?endif;?>


		</tr>
		<?
		$i++;
	}
	?>
	</tbody>
</table>
    <hr>
<table>
	<tbody>
		<tr>
			<td><?= GetMessage("SALE_ITOGO")?>:</td>
			<td><?=$arResult["allSum_FORMATED"]?></td>
		</tr>
	</tbody>
</table>
<br/>
<table class="w100p" style="border-top:1px solid #d9d9d9;margin-bottom:40px;">
	<tr>
		<td style="padding:30px 2px;" class="tal"><input type="submit" value="<?echo GetMessage("SALE_UPDATE")?>" name="BasketRefresh" class="bt2"></td>
		<td style="padding:30px 2px;" class="tar"><input type="submit" value="<?echo GetMessage("SALE_ORDER")?>" name="BasketOrder"  id="basketOrderButton2" class="bt3"></td>
	</tr>
</table>
<?else:?>
	<tbody>
		<tr>
			<td colspan="<?=$numCells?>" style="text-align:center">
				<div class="cart-notetext"><?=GetMessage("SALE_NO_ACTIVE_PRD");?></div>
				<a href="<?=SITE_DIR?>" class="bt3"><?=GetMessage("SALE_NO_ACTIVE_PRD_START")?></a><br><br>
			</td>
		</tr>
	</tbody>
</table>
<?endif;?>
</div>
<?