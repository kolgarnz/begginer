<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 ошибка: Страница не найдена");?>
<p>
	К сожалению, такая страница не найдена.</br> 
	Данная страница была удалена с сайта, либо ее никогда не существовало.</br> 
	Вы можете вернуться на <a href="/" class="grey text_decor_none">Главную страницу</a> или воспользоваться <a href="/search/" class="grey text_decor_none">поиском</a>.</br>
	Если Вы хотите что-то сообщить, напишите нам с помощью формы <a href="/company/contacts/" class="grey text_decor_none">Обратная связь</a>.</br>
</p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>