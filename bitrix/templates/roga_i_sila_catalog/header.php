<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!DOCTYPE>
<!--[if IE 7]>    <html class="ie7"> <![endif]-->
<!--[if IE 8]>    <html class="ie8> <![endif]-->
<!--[if IE 9]>    <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html> <!--<![endif]-->
    <head>

        <title><?$APPLICATION->ShowTitle()?></title>
        <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />

        <?$APPLICATION->AddHeadScript("//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js")?>
        <?$APPLICATION->AddHeadScript("//cdnjs.cloudflare.com/ajax/libs/jquery-placeholder/2.0.7/jquery.placeholder.min.js")?>

        <?$APPLICATION->SetAdditionalCSS('/bitrix/templates/.default/css/base.css')?>
        <?$APPLICATION->AddHeadScript("/bitrix/templates/.default/js/default_script.js")?>

        <?$APPLICATION->AddHeadScript("/bitrix/templates/.default/js/masonry.min.js")?>

        <?$APPLICATION->SetAdditionalCSS('/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.core.css')?>
        <?$APPLICATION->SetAdditionalCSS('/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.theme.css')?>
        <?$APPLICATION->SetAdditionalCSS('/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.selectmenu.css')?>

        <?$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.core.js')?>
        <?$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.widget.js')?>
        <?$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.position.js')?>
        <?$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/jquery.ui.selectmenu/jquery.ui.selectmenu.js')?>

        <?$APPLICATION->AddHeadScript("/bitrix/templates/.default/js/jquery-ui-1.10.3.custom.min.js")?>

        <!--[if lt IE 9]>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
        <![endif]-->
        <?$APPLICATION->ShowHead()?>
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
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "catalog_top",
                        Array(
                            "ROOT_MENU_TYPE" => "top",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => "",
                            "MAX_LEVEL" => "2",
                            "CHILD_MENU_TYPE" => "",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                        )
                    );?>
                </div>
            </section>
            <div class="clear"></div>
            <section class="content">
                <div class="work_area width_960">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb",
                        "breadcrumbs_qsoft",
                        Array(
                            "START_FROM" => "0",
                            "PATH" => "",
                            "SITE_ID" => "-"
                        )
                    );?>
                    <h1 class="push_right"><?$APPLICATION->ShowTitle()?></h1>