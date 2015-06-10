<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
                </div>
            </section>
            <div class="d_footer width_960"></div>
            <div class="clear"></div>
        </div>
        <footer class="footer width_960">
            <section class="float_inner bottom_block">
                <?$APPLICATION->IncludeComponent("qsoft:stores.list", "stores_short", array(
	"IBLOCK_TYPE" => "salon",
	"IBLOCK_ID" => "23",
	"ELEMENT_SORT_FIELD" => "RAND",
	"ELEMENT_SORT_ORDER" => "asc",
	"IBLOCK_ELEMENT_COUNT" => "2",
	"IBLOCK_NO_IMAGE" => "/bitrix/templates/.default/images/no-image.jpg",
	"IBLOCK_ALL_URL" => "/company/stores/",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "3600",
	"CACHE_GROUPS" => "Y",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Салоны",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => ""
	),
	false
);?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "menu_footer",
                    Array(
                        "ROOT_MENU_TYPE" => "bottom",
                        "MAX_LEVEL" => "1",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "N",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "MENU_CACHE_TYPE" => "N",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => ""
                    )
                );?>
            </section>
            <div class="footer_inner">
                <a href="http://www.qsoft.ru" target="_blank" class="qsoft grey inline-block"><?=GetMessage('CREATED_IN_QSOFT')?></a>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => "/bitrix/templates/.default/include_areas/copyright.php",
                        "EDIT_TEMPLATE" => "copyright.php"
                    )
                );?>
            </div>
        </footer>
    </body>
</html>