<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>



<?if($arResult["FORM_TYPE"] == "login"):?>

<nav class="top_menu grey inline-block">
	<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" class="register">Регистрация</a>
	<a href="/auth/" class="auth">Авторизация</a>
</nav>

<?
//if($arResult["FORM_TYPE"] == "login")
else:
?>

<nav class="top_menu grey inline-block authorize">
	<span>Здравствуйте,</span>
	<a href="/personal/profile/"><b class="user_name"><?=$arResult["USER_NAME"]?></b></a>
	<a href="<?=$arResult["PROFILE_URL"]?>">Личный кабинет</a>
	<a class="logout" href="<?echo $APPLICATION->GetCurPageParam("logout=yes", array(
     "login",
     "logout",
     "register",
     "forgot_password",
     "change_password"));?>"><?=GetMessage("AUTH_LOGOUT_BUTTON")?></a>
</nav>


<?endif?>