<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?$dir = parse_url($_GET['backurl'],PHP_URL_PATH);?>
<?if($_GET['register'] == 'yes'):?>
	<?$APPLICATION->SetTitle('Благодарим Вас за регистрацию в интернет-магазине «Рога и сила»!')?>
	<p>Добро пожаловать!</p>
	<p>Пожалуйста, проверьте Ваш e-mail – мы отправили Вам приветственное письмо.</p> 
	<p>
		Теперь у Вас есть возможность:
		<ul>
			<li>Сохранять в Личном кабинете персональные данные</li>
			<li>Легко отслеживать статус Вашего заказа в режиме online</li>
			<li>В любой момент просмотреть историю Ваших заказов</li>
		</ul>
		Что Вы хотите сделать прямо сейчас?
	</p>
<?elseif(strlen($dir) > 0):?>
	<?LocalRedirect($dir);?>
<?else:?>
<?LocalRedirect("/")?>
<?endif?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>