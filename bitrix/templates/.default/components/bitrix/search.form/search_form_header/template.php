<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<form name="search_form" class="search_form pie" action="<?=$arResult["FORM_ACTION"]?>">
	<div class="search_form_wrapper">
		<input name="q" type="text" placeholder="<?=GetMessage('BSF_T_PLACEHOLDER')?>">
		<input name="s" type="submit" value="">
	</div>
</form>