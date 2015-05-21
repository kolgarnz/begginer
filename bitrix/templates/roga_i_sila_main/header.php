<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
<!DOCTYPE>
<!--[if IE 7]>    <html class="ie7"> <![endif]-->
<!--[if IE 8]>    <html class="ie8> <![endif]-->
<!--[if IE 9]>    <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
	<head>
		<?$APPLICATION->ShowHead()?>
		<title><?$APPLICATION->ShowTitle()?></title>
		<link href="/bitrix/templates/.default/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="/bitrix/templates/.default/css/base.css"/>
		<link href="/bitrix/templates/.default/js/bxslider/jquery.bxslider.css" rel="stylesheet" />
		<script type="text/javascript" src="/bitrix/templates/.default/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="/bitrix/templates/.default/js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="/bitrix/templates/.default/js/bxslider/jquery.bxslider.js"></script>
		<script type="text/javascript" src="/bitrix/templates/.default/js/default_script.js"></script>

		<link type="text/css" href="/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.core.css" rel="stylesheet" />
		<link type="text/css" href="/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.theme.css" rel="stylesheet" />
		<link type="text/css" href="/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.selectmenu.css" rel="stylesheet" />
		<script type="text/javascript" src="/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.core.js"></script>
		<script type="text/javascript" src="/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.widget.js"></script>
		<script type="text/javascript" src="/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.position.js"></script>
		<script type="text/javascript" src="/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js"></script>
		<!--[if lt IE 9]>
			<script src="/bitrix/templates/.default/js/html5shiv.js"></script>
		<![endif]-->
	</head>
	<body>
		<?$APPLICATION->ShowPanel();?>
		<div class="wrapper">
			<div class="base_layer"></div>
			<header class="header">
				<div class="width_960">
					<div class="inline-block">
						<span class="logo inline-block"></span>
					</div>
					<nav class="top_menu grey inline-block">
						<a href="#" class="register">Регистрация</a>
						<a href="#" class="auth">Авторизация</a>
					</nav>
					<div class="basket_block inline-block">
						<a href="#" class="basket_product_count inline-block">0</a>
						<a href="#" class="order_button pie">Оформить заказ</a>
					</div>
				</div>
			</header>
			<section class="fixed_block">
				<div class="width_960">
					<form name="search_form" class="search_form pie">
							<div class="search_form_wrapper">
								<input type="text" placeholder="Поиск по сайту"/>
								<input type="submit" value=""/>
							</div>
					</form>
					<nav class="main_menu">
						<ul>
							<li class="submenu pie">
								<span>Легковые</span>
								<div class="submenu_border"></div>
								<ul>
									<li><a href="#">Седаны</a></li>
									<li><a href="#">Хетчбеки</a></li>
									<li><a href="#">Универсалы</a></li>
									<li><a href="#">Купе</a></li>
									<li><a href="#">Родстеры</a></li>
								</ul>
							<li class="submenu pie">
								<span>Внедорожники</span>
								<div class="submenu_border"></div>
								<ul>
									<li><a href="#">Рамные</a></li>
									<li><a href="#">Пикапы</a></li>
									<li><a href="#">Кроссоверы</a></li>
								</ul>
							</li>
							<li><a href="#">Раритетные</a></li>
							<li><a href="#">Распродажа</a></li>
							<li><a href="#">Новинки</a></li>
					</ul>
					</nav>
				</div>
			</section>
			<section class="content">
				<div class="work_area width_960">