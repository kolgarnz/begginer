<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?IncludeTemplateLangFile(__FILE__);?>
				</div>
			</section>
			<div class="d_footer width_960"></div>
			<div class="clear"></div>
		</div>
		<footer class="footer width_960">
			<section class="float_inner bottom_block">
<?$APPLICATION->IncludeComponent(
	"qsoft:stores.list",
	"",
	Array(
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "23",
		"PARENT_SECTION" => "",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"IBLOCK_ELEMENT_COUNT" => "2",
		"IBLOCK_SHOW_MAP" => "N",
		"IBLOCK_ALL_URL" => "/company/stores/"
	)
);?>
				<section class="info_block left_block_shadow">
					<h2>Информация</h2>
					<nav class="grey">
						<ul>
							<li><a href="#">О компании</a></li>
							<li><a href="#">Контактная информация</a></li>
							<li><a href="#">Условия продаж</a></li>
							<li><a href="#">Финансовый отдел</a></li>
							<li><a href="#">Для клиентов</a></li>
						</ul>
					</nav>
				</section>
			</section>
			<div class="footer_inner">
				<a href="http://www.qsoft.ru" target="_blank" class="qsoft grey inline-block">Сделано в</a>
				<div class="copy">&copy; 2013 Рога &amp; Сила. Продажа автомобилей.</div>
			</div>
		</footer>
	</body>
</html>