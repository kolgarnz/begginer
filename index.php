<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?><?$APPLICATION->IncludeComponent("qsoft:main.banner", ".default", array(
	"TYPE" => "MAIN_PAGE",
	"NOINDEX" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600"
	),
	false
);?>
<h2 class="push_right">Модели недели</h2>
<?
$arrFilter = array('PROPERTY_MODEL_WEEKS_VALUE' => 'TRUE', '!=CATALOG_PRICE_1' => '0');
$APPLICATION->IncludeComponent("qsoft:catalog.models.week", "models_main", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "25",
	"SECTION_ID" => $_REQUEST["SECTION_ID"],
	"SECTION_CODE" => "",
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"ELEMENT_SORT_FIELD" => "RAND",
	"ELEMENT_SORT_ORDER" => "asc",
	"FILTER_NAME" => "arrFilter",
	"INCLUDE_SUBSECTIONS" => "Y",
	"SHOW_ALL_WO_SECTION" => "Y",
	"PAGE_ELEMENT_COUNT" => "4",
	"LINE_ELEMENT_COUNT" => "4",
	"PROPERTY_CODE" => array(
		0 => "MODEL_WEEKS",
		1 => "NEW",
		2 => "SALE",
		3 => "",
	),
	"OFFERS_LIMIT" => "4",
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "/personal/cart/",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"META_KEYWORDS" => "-",
	"META_DESCRIPTION" => "-",
	"BROWSER_TITLE" => "-",
	"ADD_SECTIONS_CHAIN" => "N",
	"DISPLAY_COMPARE" => "N",
	"SET_TITLE" => "N",
	"SET_STATUS_404" => "N",
	"CACHE_FILTER" => "Y",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>
					<section class="news_block inverse">
						<h2 class="inline-block">Новости</h2><span class="all_list">&nbsp;/&nbsp;<a href="#" class="text_decor_none"><b>Все</b></a></span>
						<div>
							<figure class="news_item">
								<a href="#"><img src="/bitrix/templates/.default/images/test_news_1.png" alt="" title="" /></a>
								<figcaption class="news_item_description">
									<h3><a href="#">Парадигма просветляет архетип</a></h3>
									<div class="news_item_anons">
										<a href="#" class="text_decor_none">
											Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку
										</a>
									</div>
									<div class="news_item_date grey">01 Янв 2013</div>
								</figcaption>
							</figure>
							<figure class="news_item">
								<a href="#"><img src="/bitrix/templates/.default/images/test_news_2.png" alt="" title="" /></a>
								<figcaption class="news_item_description">
									<h3><a href="#">Парадигма просветляет архетип</a></h3>
									<div class="news_item_anons">
										<a href="#" class="text_decor_none">
											Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку
										</a>
									</div>
									<div class="news_item_date grey">01 Янв 2013</div>
								</figcaption>
							</figure>
							<figure class="news_item">
								<a href="#"><img src="/bitrix/templates/.default/images/test_news_3.png" alt="" title="" /></a>
								<figcaption class="news_item_description">
									<h3><a href="#">Парадигма просветляет архетип</a></h3>
									<div class="news_item_anons">
										<a href="#" class="text_decor_none">
											Парадигма просветляет архетип, таким образом, стратегия поведения, выгодная отдельному человеку
										</a>
									</div>
									<div class="news_item_date grey">01 Янв 2013</div>
								</figcaption>
							</figure>
						</div>
					</section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>