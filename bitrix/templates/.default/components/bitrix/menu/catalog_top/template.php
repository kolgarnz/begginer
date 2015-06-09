<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
    <nav class="main_menu">
        <ul>
        <?
        $previousLevel = 0;
        foreach($arResult as $arItem):?>
            <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
            <?endif?>
            <?if ($arItem["IS_PARENT"]):?>
                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                    <li class="submenu<?=$arItem["SELECTED"]? ' current' : ' pie'?>">
                        <span><?=$arItem["TEXT"]?></span>
                        <div class="submenu_border"></div>
                         <ul>
                <?else:?>
                    <li<?=$arItem["SELECTED"]? ' class="current"' : ''?>>
                    <?=$arItem["TEXT"]?>
                        <ul>
                <?endif?>
            <?else:?>
                <?if ($arItem["PERMISSION"] > "D"):?>
                    <?if($arItem["SELECTED"]):?>
                        <li class="current">
                            <span><?=$arItem["TEXT"]?></span>
                        </li>
                    <?else:?>
                        <li>
                            <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                        </li>
                    <?endif?>
                <?else:?>
                    <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                        <li><a href="" class="<?if ($arItem["SELECTED"]):?>current<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                    <?else:?>
                        <li><a href="" class="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
                    <?endif?>
                <?endif?>
            <?endif?>
            <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
        <?endforeach?>
        <?if ($previousLevel > 1):s?>
            <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
        <?endif?>
        </ul>
    </nav>
<?endif?>