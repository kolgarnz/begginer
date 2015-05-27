<section class="shops_block">
	<div>
	<?foreach($arResult as $store):?>
		<figure class="shops_block_item">
			<a href="<?=$arParams['IBLOCK_ALL_URL']?><?=$store['ID']?>"><img src="<?=$store["PICTURE"]["SRC"]?>" alt="<?=$store['NAME']?>" title="<?=$store['NAME']?>"></a>
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