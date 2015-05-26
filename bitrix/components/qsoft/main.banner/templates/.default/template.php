<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if(count($arResult) > 0):?>
	<div class="slider">
		<ul class="bxslider">
		<?foreach($arResult as $banner):?>
		<li>
			<div class="banner">
				<a href="<?=$banner['URL']?>"><img src="<?=$banner['IMG_URL']?>" alt="" title="" /></a>
				<div class="banner_content">
					<h1>Это просто тестовое сообщение</h1>
				</div>
			</div>
		</li>
		<?endforeach?>
		</ul>
	<div class="slider">
<?endif?>