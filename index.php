<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
?><?$APPLICATION->IncludeComponent(
	"qsoft:main.banner",
	"",
	Array(
		"TYPE" => "MAIN_PAGE",
		"NOINDEX" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0"
	)
);?>
					<h2 class="push_right">Модели недели</h2>
					<section class="product_line">
						<figure class="product_item">
							<div class="product_item_pict">
								<a href="#">
									<img src="/bitrix/templates/.default/images/test_top_week_1.png" alt="BMW X3 2.0d" title="BMW X3 2.0d"/>
								</a>
							</div>
							<figcaption>
								<h3><a href="#">BMW X3 2.0d</a></h3>
								<p class="product_item_price dark_grey">2 230 000 руб.</p>
								<a class="buy_button inverse inline-block pie" href="#">В корзину</a>
							</figcaption>
						</figure>
						<figure class="product_item">
							<div class="product_item_label new"></div>
							<div class="product_item_pict">
								<a href="#">
									<img src="/bitrix/templates/.default/images/test_top_week_2.png" alt="AUDI A6 3.0 TFSI" title="AUDI A6 3.0 TFSI"/>
								</a>
							</div>
							<figcaption>
								<h3><a href="#">AUDI A6 3.0 TFSI</a></h3>
								<p class="product_item_price dark_grey">2 870 000 руб.</p>
								<a class="buy_button inverse inline-block pie" href="#">В корзину</a>
							</figcaption>
						</figure>
						<figure class="product_item">
							<div class="product_item_label sale"></div>
							<div class="product_item_pict">
								<a href="#">
									<img src="/bitrix/templates/.default/images/test_top_week_3.png" alt="Mercedes-Benz A200" title="Mercedes-Benz A200"/>
								</a>
							</div>
							<figcaption>
								<h3><a href="#">Mercedes-Benz A200</a></h3>
								<p class="product_item_price dark_grey">1 310 000 руб.</p>
								<a class="buy_button inverse inline-block pie" href="#">В корзину</a>
							</figcaption>
						</figure>
						<figure class="product_item">
							<div class="product_item_pict">
								<a href="#">
									<img src="/bitrix/templates/.default/images/no-image.jpg" alt="BMW Z4 sDrive35i" title="BMW Z4 sDrive35i"/>
								</a>
							</div>
							<figcaption>
								<h3><a href="#">BMW Z4 sDrive35i</a></h3>
								<p class="product_item_price">3 532 000 руб.</p>
								<a class="buy_button inverse inline-block pie" href="#">В корзину</a>
							</figcaption>
						</figure>
					</section>
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