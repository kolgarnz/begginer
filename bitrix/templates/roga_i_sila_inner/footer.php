<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>

					</section>
					<hr class="bottom_line"/>
				</div>
			</section>
			<div class="d_footer width_960"></div>
			<div class="clear"></div>
		</div>
		<footer class="footer width_960">
			<section class="float_inner">
<?$APPLICATION->IncludeComponent(
	"qsoft:stores.list",
	"",
	Array(
		"IBLOCK_TYPE" => "salon",
		"IBLOCK_ID" => "23",
		"PARENT_SECTION" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"ELEMENT_SORT_FIELD" => "RAND",
		"ELEMENT_SORT_ORDER" => "asc",
		"IBLOCK_ELEMENT_COUNT" => "2",
		"IBLOCK_SHOW_MAP" => "N",
		"IBLOCK_ALL_URL" => "/company/stores/"
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
				<a href="http://www.qsoft.ru" target="_blank" class="qsoft grey inline-block">Сделано в</a>
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