<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if($arResult["FORM_TYPE"] == "login"):?>
    <nav class="top_menu grey inline-block">
        <a href="<?=$arResult["AUTH_REGISTER_URL"]?>" class="register"><?=GetMessage("AUTH_REGISTER")?></a>
        <a
            href="/auth/
            <?if(strlen($arResult['BACKURL']) > 0 && $APPLICATION->GetCurDir() !== '/auth/' && !isset($_REQUEST['backurl'])):?>
                ?backurl=<?=$APPLICATION->GetCurDir();?>
            <? endif?>
            " class="auth">
            <?=GetMessage("AUTH_AUTHORIZATION")?>
        </a>
    </nav>
<?else:?>
    <nav class="top_menu grey inline-block authorize">
        <span><?=GetMessage("AUTH_HELLO")?>,</span>
        <a href="<?=$arParams["PROFILE_URL"]?>profile/"><b class="user_name"><?=$arResult["USER_NAME"]?></b></a>
        <a href="<?=$arParams["PROFILE_URL"]?>"><?=GetMessage("AUTH_PERSONAL_AREA")?></a>
        <a class="logout" href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array(
         "login",
         "logout",
         "register",
         "forgot_password",
         "change_password"));?>"><?=GetMessage("AUTH_LOGOUT_BUTTON")?></a>
    </nav>
<?endif?>