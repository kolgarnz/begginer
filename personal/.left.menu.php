<?
$aMenuLinks = Array(
	Array(
		"Корзина", 
		"/personal/cart/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Оформление заказа", 
		"/personal/order/make/", 
		Array(), 
		Array(), 
		"" 
	),
	Array(
		"Профиль пользователя", 
		"/personal/profile/", 
		Array(), 
		Array(), 
		"\$USER->IsAuthorized()" 
	),
	Array(
		"Посмотреть историю заказов", 
		"/personal/order/", 
		Array(), 
		Array(), 
		"\$USER->IsAuthorized()" 
	)
);
?>