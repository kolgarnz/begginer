<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<section class="shops_block">
	<div>
	
	<?foreach($arResult['ITEMS'] as $store):?>
		
		<?
		$this->AddEditAction($store['ID'], $store['EDIT_LINK'], CIBlock::GetArrayByID($store["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($store['ID'], $store['DELETE_LINK'], CIBlock::GetArrayByID($store["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<figure class="shops_block_item" id="<?=$this->GetEditAreaId($store['ID']);?>">
			<?if(is_array($store["PICTURE"])):?>
				<img src="<?=$store["PICTURE"]["SRC"]?>" alt="<?=$store['NAME']?>" title="<?=$store['NAME']?>">
			<?else:?>
				<img src="/bitrix/templates/.default/images/no-image.jpg" alt="<?=$store['NAME']?>" title="<?=$store['NAME']?>">
			<?endif?>
			<figcaption class="shops_block_item_description">
				<h3 class="shops_block_item_name"><?=$store['NAME']?></h3>
				<p class="dark_grey" id="shops_block_item_adress"><?=$store['PROPERTY_ADDRESS_VALUE']?></p>
				<p class="black"><?=$store['PROPERTY_PHONE_VALUE']?></p>
				<p><?=GetMessage('WORK_TIME')?>:<br><?=$store['PROPERTY_WORK_HOURS_VALUE']?></p>
			</figcaption>
		</figure>
	<?endforeach?>

	</div>
</section>
<div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>