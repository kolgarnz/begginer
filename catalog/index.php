<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?><div class="filter pie">
	<div class="b-trans-type">
		<h3>Коробка:</h3>
		<div class="b-trans-type__wrapper">
			<input id="checkbox1" class="filter-type" type="checkbox">
			<label class="filter-type-label" for="checkbox1">АКПП</label>
		</div>
		<div class="b-trans-type__wrapper">
			<input id="checkbox2" class="filter-type" type="checkbox">
			<label class="filter-type-label" for="checkbox2">МКПП</label>
		</div>
	</div>
	<div class="b-slider">
		<h3>Цена:</h3>
		<div>
			<input type="text" id="price-start" placeholder="от 0 руб." class="pie"/>
			<input type="text" id="price-end" placeholder="до 10 000 000 руб." class="pie"/>
		</div>
		<div id="slider-range"></div>
	</div>
	<div class="b-color">
		<h3>Цвет:</h3>
		<div class="b-color__wrapper">
			<input id="color1" class="filter-type" type="checkbox">
			<label class="filter-type-label" for="color1">Красный</label>
		</div>
		<div class="b-color__wrapper">
			<input id="color2" class="filter-type" type="checkbox">
			<label class="filter-type-label" for="color2">Зелёный</label>
		</div>
		<div class="b-color__wrapper">
			<input id="color3" class="filter-type" type="checkbox">
			<label class="filter-type-label" for="color3">Зелёный</label>
		</div>
		<div class="b-color__wrapper">
			<input id="color4" class="filter-type" type="checkbox">
			<label class="filter-type-label" for="color4">Зелёный</label>
		</div>
	</div>
					</div>
					<section>
	<div id="catalog">
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_1.png" alt="BMW X3 2.0d" title="BMW X3 2.0d"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW X3 2.0d</a></h3>
				<p class="product_item_price dark_grey">2 230 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_2.png" alt="AUDI A6 3.0 TFSI" title="AUDI A6 3.0 TFSI"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">AUDI A6 3.0 TFSI</a></h3>
				<p class="product_item_price dark_grey">2 870 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>

		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_3.png" alt="Mercedes-Benz A200" title="Mercedes-Benz A200"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">Mercedes-Benz A200</a></h3>
				<p class="product_item_price dark_grey">1 310 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_4.png" alt="BMW Z4 sDrive35i" title="BMW Z4 sDrive35i"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW Z4 sDrive35i</a></h3>
				<p class="product_item_price">3 532 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>

		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_1.png" alt="BMW X3 2.0d" title="BMW X3 2.0d"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW X3 2.0d</a></h3>
				<p class="product_item_price dark_grey">2 230 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_2.png" alt="AUDI A6 3.0 TFSI" title="AUDI A6 3.0 TFSI"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">AUDI A6 3.0 TFSI</a></h3>
				<p class="product_item_price dark_grey">2 870 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_3.png" alt="Mercedes-Benz A200" title="Mercedes-Benz A200"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">Mercedes-Benz A200</a></h3>
				<p class="product_item_price dark_grey">1 310 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_4.png" alt="BMW Z4 sDrive35i" title="BMW Z4 sDrive35i"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW Z4 sDrive35i</a></h3>
				<p class="product_item_price">3 532 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>

		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_1.png" alt="BMW X3 2.0d" title="BMW X3 2.0d"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW X3 2.0d</a></h3>
				<p class="product_item_price dark_grey">2 230 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_2.png" alt="AUDI A6 3.0 TFSI" title="AUDI A6 3.0 TFSI"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">AUDI A6 3.0 TFSI</a></h3>
				<p class="product_item_price dark_grey">2 870 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_3.png" alt="Mercedes-Benz A200" title="Mercedes-Benz A200"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">Mercedes-Benz A200</a></h3>
				<p class="product_item_price dark_grey">1 310 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_4.png" alt="BMW Z4 sDrive35i" title="BMW Z4 sDrive35i"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW Z4 sDrive35i</a></h3>
				<p class="product_item_price">3 532 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>

		<figure class="product_item last">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_3.png" alt="Mercedes-Benz A200" title="Mercedes-Benz A200"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">Mercedes-Benz A200</a></h3>
				<p class="product_item_price dark_grey">1 310 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item last">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_4.png" alt="BMW Z4 sDrive35i" title="BMW Z4 sDrive35i"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW Z4 sDrive35i</a></h3>
				<p class="product_item_price">3 532 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item last">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_3.png" alt="Mercedes-Benz A200" title="Mercedes-Benz A200"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">Mercedes-Benz A200</a></h3>
				<p class="product_item_price dark_grey">1 310 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
		<figure class="product_item last">
			<div class="product_item_pict">
				<a href="#">
					<img src="/bitrix/templates/.default/images/test_top_week_4.png" alt="BMW Z4 sDrive35i" title="BMW Z4 sDrive35i"/>
				</a>
			</div>
			<figcaption>
				<h3><a href="#">BMW Z4 sDrive35i</a></h3>
				<p class="product_item_price">3 532 000 руб.</p>
				<a class="buy_button inverse inline-block pie" href="#buy_popup" rel="modal:open">В корзину</a>
			</figcaption>
		</figure>
	</div>
	<div class="clear"></div>
	<div class="page_nav">
		<nav>
			<a href="#" class="prev"></a>
			<span class="current">1</span>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<span>...</span>
			<a href="#">87</a>
			<a href="#" class="next"></a>
		</nav>
	</div>
					</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>