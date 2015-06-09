<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if(count($arResult['BANNERS']) > 0):?>
	<div class="slider">
		<ul class="bxslider">
		<?foreach($arResult['BANNERS'] as $banner):?>
            <li>
                <div class="banner">
                    <a href="<?=$banner['URL']?>"><img src="<?=$banner['IMG']?>" alt="<?=$banner['NAME']?>" title="<?=$banner['NAME']?>" /></a>
                    <?if(strlen($banner['CODE']) > 0):?>
                        <div class="banner_content">
                            <?=$banner['CODE']?>
                        </div>
                    <?endif?>
                </div>
            </li>
		<?endforeach?>
		</ul>
	</div>
<?endif?>