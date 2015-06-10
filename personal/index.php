<?
define("NEED_AUTH", true);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мой кабинет");
?> <blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"> 
  <p><span style="color: rgb(0, 0, 0); font-family: Verdana, Arial, helvetica, sans-serif; font-size: 11.1999998092651px; line-height: normal; background-color: rgb(255, 255, 255);">В личном кабинете Вы можете проверить текущее состояние корзины, ход выполнения Ваших заказов, </span></p>
 
  <p><span style="color: rgb(0, 0, 0); font-family: Verdana, Arial, helvetica, sans-serif; font-size: 11.1999998092651px; line-height: normal; background-color: rgb(255, 255, 255);"> просмотреть или изменить личную информацию.</span></p>
 </blockquote> 
<div><font color="#000000" face="Verdana, Arial, helvetica, sans-serif"><span style="font-size: 11.1999998092651px; line-height: normal;"> 
      <br />
     </span></font> 
  <p></p>
 </div>
 <blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"> 
  <div> 
    <div><span style="color: rgb(0, 0, 0); font-family: Verdana, Arial, helvetica, sans-serif; line-height: normal; background-color: rgb(255, 255, 255);"><font size="5">Личная информация</font></span></div>
   </div>
 </blockquote><blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"> 
  <div> 
    <div><a href="/personal/profile/" >Изменить регистрационные данные</a></div>
   </div>
 </blockquote> 
<div> 
  <br />
 </div>
 <blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"> 
  <div><span style="color: rgb(0, 0, 0); font-family: Verdana, Arial, helvetica, sans-serif; line-height: normal; background-color: rgb(255, 255, 255);"><font size="5">Заказы</font></span></div>
 </blockquote> <blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"> 
  <div><a href="/personal/cart/" >Посмотреть содержимое корзины</a></div>
 </blockquote> <blockquote style="margin: 0px 0px 0px 40px; border: none; padding: 0px;"> 
  <div><a href="/personal/order/" >Посмотреть историю заказов</a></div>
 </blockquote> <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>