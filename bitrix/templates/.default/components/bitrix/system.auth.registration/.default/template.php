<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<div class="bx-auth">
    <?
    ShowMessage($arParams["~AUTH_RESULT"]);
    ?>
    <?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y" && is_array($arParams["AUTH_RESULT"]) &&  $arParams["AUTH_RESULT"]["TYPE"] === "OK"):?>
        <p>
            <?=GetMessage("AUTH_EMAIL_SENT")?>
        </p>
    <?else:?>

    <?if($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):?>
        <p><?=GetMessage("AUTH_EMAIL_WILL_BE_SENT")?></p>
    <?endif?>
        <noindex>
            <form method="post" action="<?=$arResult["AUTH_URL"]?>" name="bform">
                <?if(strlen($arResult["BACKURL"]) > 0):?>
                    <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
                <?endif?>
                <input type="hidden" name="AUTH_FORM" value="Y" />
                <input type="hidden" name="TYPE" value="REGISTRATION" />

                <table class="data-table bx-registration-table">
                    <thead>
                    <tr>
                        <td colspan="2"><b><?=GetMessage("AUTH_REGISTER")?></b></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?=GetMessage("AUTH_NAME")?></td>
                        <td><input type="text" name="USER_NAME" maxlength="50" value="<?=$arResult["USER_NAME"]?>" class="bx-auth-input" /></td>
                    </tr>
                    <tr>
                        <td><?=GetMessage("AUTH_LAST_NAME")?></td>
                        <td><input type="text" name="USER_LAST_NAME" maxlength="50" value="<?=$arResult["USER_LAST_NAME"]?>" class="bx-auth-input" /></td>
                    </tr>
                    <tr>
                        <td><span class="starrequired">*</span><?=GetMessage("AUTH_LOGIN_MIN")?></td>
                        <td><input type="text" name="USER_LOGIN" maxlength="50" value="<?=$arResult["USER_LOGIN"]?>" class="bx-auth-input" /></td>
                    </tr>
                    <tr>
                        <td><span class="starrequired">*</span><?=GetMessage("AUTH_PASSWORD_REQ")?></td>
                        <td><input type="password" name="USER_PASSWORD" maxlength="50" value="<?=$arResult["USER_PASSWORD"]?>" class="bx-auth-input" /></td>
                        <td style="font-size:11px;"><?=$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></td>
                    </tr>
                    <tr>
                        <td><span class="starrequired">*</span><?=GetMessage("AUTH_CONFIRM")?></td>
                        <td><input type="password" name="USER_CONFIRM_PASSWORD" maxlength="50" value="<?=$arResult["USER_CONFIRM_PASSWORD"]?>" class="bx-auth-input" /></td>
                    </tr>
                    <tr>
                        <td><span class="starrequired">*</span><?=GetMessage("AUTH_EMAIL")?></td>
                        <td><input type="text" placeholder="name@site.domain" name="USER_EMAIL" maxlength="255" value="<?=$arResult["USER_EMAIL"]?>" class="bx-auth-input" /></td>
                    </tr>

                    <?if($arResult["USE_CAPTCHA"] == "Y"):?>
                        <tr>
                            <td colspan="2"><b><?=GetMessage("CAPTCHA_REGF_TITLE")?></b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
                                <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
                            </td>
                        </tr>
                        <tr>
                            <td><span class="starrequired">*</span><?=GetMessage("CAPTCHA_REGF_PROMT")?>:</td>
                            <td><input type="text" name="captcha_word" maxlength="50" value="" /></td>
                        </tr>
                    <?endif?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="Register" value="<?=GetMessage("AUTH_REGISTER")?>" /></td>
                    </tr>
                    </tfoot>
                </table>
                <p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

                <p>
                    <a href="<?=$arResult["AUTH_AUTH_URL"]?>" rel="nofollow"><b><?=GetMessage("AUTH_AUTH")?></b></a>
                </p>

            </form>
        </noindex>
        <script type="text/javascript">
            document.bform.USER_NAME.focus();
        </script>

    <?endif?>
</div>