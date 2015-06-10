<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<section class="info_block left_block_shadow">
	<h2><?=GetMessage('MENU_INFORMATION')?></h2>
		<nav class="grey">
			<ul>
                <?
                foreach($arResult as $arItem):
                    if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                        continue;
                ?>
		            <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endforeach?>
			</ul>
		</nav>
</section>
<?endif?>