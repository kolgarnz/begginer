<section class="shops_block">
	<div>
	
	<?foreach($arResult['ITEMS'] as $store):?>
		
		<?
		$this->AddEditAction($store['ID'], $store['EDIT_LINK'], CIBlock::GetArrayByID($store["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($store['ID'], $store['DELETE_LINK'], CIBlock::GetArrayByID($store["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<figure class="shops_block_item" id="<?=$this->GetEditAreaId($store['ID']);?>">
			<?if(is_array($store["PICTURE"])):?>
				<a href="<?=$arParams['IBLOCK_ALL_URL']?><?=$store['ID']?>"><img src="<?=$store["PICTURE"]["SRC"]?>" alt="<?=$store['NAME']?>" title="<?=$store['NAME']?>"></a>
			<?else:?>
				<a href="<?=$arParams['IBLOCK_ALL_URL']?><?=$store['ID']?>"><img src="/bitrix/templates/.default/images/no-image.jpg" alt="<?=$store['NAME']?>" title="<?=$store['NAME']?>"></a>
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