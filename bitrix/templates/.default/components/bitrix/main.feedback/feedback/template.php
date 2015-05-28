<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>


<?if(!empty($arResult["ERROR_MESSAGE"])):?>

	<?foreach($arResult["ERROR_MESSAGE"] as $v):?>
		<span><?ShowError($v);?></span>
	<?endforeach?>
		
		
<?endif?>
<?if(strlen($arResult["OK_MESSAGE"]) > 0):?>
	<div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
	<a href="<?=$APPLICATION->GetCurPage(false);?>"><?=GetMessage('MFT_SEND_ONE_MORE')?></a>
<?else:?>
	<form action="<?=$APPLICATION->GetCurPage()?>" method="POST">
	<?=bitrix_sessid_post()?>
		<div class="field_row">
			<p class="form_label">
				<span><?=GetMessage("MFT_NAME")?></span>
				<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])):?>
					<span class="required">*</span>
				<?endif?>
			</p>
			<input type="text" name="user_name" value="<?=$arResult["AUTHOR_NAME"]?>"/>
		</div>
		<div class="field_row">
			<p class="form_label">
				<span><?=GetMessage("MFT_EMAIL")?></span>
				<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])):?>
					<span class="required">*</span>
				<?endif?>	
			</p>
			<input type="text" name="user_email" value="<?=$arResult["AUTHOR_EMAIL"]?>">
		</div>

		<div class="field_row">
			<p class="form_label">
				<span><?=GetMessage("MFT_MESSAGE")?></span>
				<?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])):?>
					<span class="required">*</span>
				<?endif?>
			</p>	
			<textarea name="MESSAGE"></textarea>
		</div>
		
		
		<?if($arParams["USE_CAPTCHA"] == "Y"):?>
		<div class="field_row">
			<p class="form_label">
				<span><?=GetMessage("MFT_CAPTCHA")?></span>
			<p>
			<input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
			<span><img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" alt="CAPTCHA"></span>
		</div>
		<div class="field_row"  id="captcha_word">
			<p class="form_label">
				<span><?=GetMessage("MFT_CAPTCHA_CODE")?></span>
				<span class="required">*</span>
			<p>
			<input type="text" name="captcha_word" size="30" maxlength="50" value="">
		</div>
		<?endif;?>
		<div class="field_row">
			<div class="buttons_block" >
				<p class="form_label">
				<input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
				<input type="submit" class="pie" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>">
				</p>
			</div>
		</div>
	</form>
<?endif?>