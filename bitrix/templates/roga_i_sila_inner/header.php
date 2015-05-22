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
						<a href="/" class="logo inline-block"></a>
					</div>
<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth_form_header", array(
	"REGISTER_URL" => "/auth/",
	"FORGOT_PASSWORD_URL" => "",
	"PROFILE_URL" => "/personal/",
	"SHOW_ERRORS" => "Y"
	),
	false
);?>
<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "basket_line_header", Array(
	"PATH_TO_BASKET" => "/personal/cart/",
	"PATH_TO_PERSONAL" => "/personal/",
	"SHOW_PERSONAL_LINK" => "N",
	),
	false
);?>
				</div>
			</header>
			<section class="fixed_block">
				<div class="width_960">
<?$APPLICATION->IncludeComponent("bitrix:search.form", "search_form_header", array(
	"PAGE" => "/search/",
	"USE_SUGGEST" => "N"
	),
	false
);?>
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
							</li>
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
					<nav class="nav_chain">
							<a href="/">Главная</a>
							<span class="nav_arrow inline-block"></span>
							<span>Легковые</span>
					</nav>
					<section class="content_area">
						<aside class="left_block">
<?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"menu_left",
	Array(
		"ROOT_MENU_TYPE" => "bottom",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(),
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N"
	)
);?>
					</aside>
						<h1><?$APPLICATION->ShowTitle()?></h1>