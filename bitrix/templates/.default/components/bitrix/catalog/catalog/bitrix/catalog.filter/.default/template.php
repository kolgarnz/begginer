<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="filter pie">
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