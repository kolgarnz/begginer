<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<div class="bx-auth-profile">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>
<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
$arResult["opened"] = "reg";
echo "'reg'";
?>];
//-->

var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

<div class="profile-block-shown" id="user_div_reg">
<table class="profile-table data-table">
	<thead>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</thead>
	<tbody>

	<tr>
		<td><?=GetMessage('NAME')?></td>
		<td><input type="text" name="NAME" maxlength="50" value="<?=$arResult["arUser"]["NAME"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('LAST_NAME')?></td>
		<td><input type="text" name="LAST_NAME" maxlength="50" value="<?=$arResult["arUser"]["LAST_NAME"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('SECOND_NAME')?></font></td>
		<td><input type="text" name="SECOND_NAME" maxlength="50" value="<?=$arResult["arUser"]["SECOND_NAME"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('EMAIL')?><span class="starrequired">*</span></td>
		<td><input type="text" name="EMAIL" maxlength="50" value="<?=$arResult["arUser"]["EMAIL"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('LOGIN')?><span class="starrequired">*</span></td>
		<td><input type="text" name="LOGIN" maxlength="50" value="<?=$arResult["arUser"]["LOGIN"]?>" /></td>
	</tr>
	<tr>
		<td><?=GetMessage('NEW_PASSWORD_REQ')?></td>
		<td><input type="password" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
	<tr>
		<td><?=GetMessage('NEW_PASSWORD_CONFIRM')?></td>
		<td><input type="password" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" /></td>
	</tr>
	</tbody>
</table>
</div>
    <?if($arResult["IS_ADMIN"]):?>
        <div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('admin')"><?=GetMessage("USER_ADMIN_NOTES")?></a></div>
        <div id="user_div_admin" class="profile-block-<?=strpos($arResult["opened"], "admin") === false ? "hidden" : "shown"?>">
            <table class="data-table profile-table">
                <thead>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?=GetMessage("USER_ADMIN_NOTES")?>:</td>
                    <td><textarea cols="30" rows="5" name="ADMIN_NOTES"><?=$arResult["arUser"]["ADMIN_NOTES"]?></textarea></td>
                </tr>
                </tbody>
            </table>
        </div>
    <?endif;?>
	<p>
        <input type="submit" name="save" value="<?=(($arResult["ID"]>0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD"))?>">
        &nbsp;&nbsp;
        <input type="reset" value="<?=GetMessage('MAIN_RESET');?>">
    </p>
</form>
</div>
