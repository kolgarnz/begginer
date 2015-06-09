<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav>
	<ul class="left_menu">
		<li>
			<span><?=GetMessage('MENU_INFORMATION')?></span>
			<ul>
                <?
                foreach($arResult as $arItem):
                    if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) {
                        continue;
                    }
                ?>
	                <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endforeach?>
			</ul>
		</li>
	</ul>
</nav>
<?endif?>