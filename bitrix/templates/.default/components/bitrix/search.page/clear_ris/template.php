<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>

<div class="search-page">
	<form action="" method="get">
		<input type="hidden" name="how" value="<?=$arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tbody><tr>
				<td style="width: 100%;">
					<input placeholder="<?=GetMessage('SEARCH_QUERY_PLACEHOLDER')?>" class="search-query" type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" />
				</td>
				<td style="padding: 5px;">
				<select class="select-field" name="where" style="padding: 0px; width: 120px; height: 100px">
					<option value=""><?=GetMessage("CT_BSP_ALL")?></option>
						<?foreach($arResult["DROPDOWN"] as $key=>$value):?>
							<option value="<?=$key?>"<?if($arResult["REQUEST"]["WHERE"]==$key) echo " selected"?>><?=$value?></option>
						<?endforeach?>
				</select>
				</td>
				<td>
					<input class="search-button" type="submit" value="<?=GetMessage("CT_BSP_GO")?>" />
				</td>
			</tr>
		</tbody></table>
	</form>

    <?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
        ?>
        <div class="search-language-guess">
            <?=GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
        </div><br />
    <?endif;?>

	<div class="search-result">
	<?if($arResult["ERROR_CODE"]!=0):?>
		<p><?=GetMessage("CT_BSP_ERROR")?></p>
		<?ShowError($arResult["ERROR_TEXT"]);?>
		<p><?=GetMessage("CT_BSP_CORRECT_AND_CONTINUE")?></p>
		<br /><br />
		<p><?=GetMessage("CT_BSP_SINTAX")?><br /><b><?=GetMessage("CT_BSP_LOGIC")?></b></p>
		<table border="0" cellpadding="5">
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OPERATOR")?></td><td valign="top"><?=GetMessage("CT_BSP_SYNONIM")?></td>
				<td><?=GetMessage("CT_BSP_DESCRIPTION")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_AND")?></td><td valign="top">and, &amp;, +</td>
				<td><?=GetMessage("CT_BSP_AND_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_OR")?></td><td valign="top">or, |</td>
				<td><?=GetMessage("CT_BSP_OR_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top"><?=GetMessage("CT_BSP_NOT")?></td><td valign="top">not, ~</td>
				<td><?=GetMessage("CT_BSP_NOT_ALT")?></td>
			</tr>
			<tr>
				<td align="center" valign="top">( )</td>
				<td valign="top">&nbsp;</td>
				<td><?=GetMessage("CT_BSP_BRACKETS_ALT")?></td>
			</tr>
		</table>
	<?elseif(count($arResult["SEARCH"])>0):?>
		<?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
		<?foreach($arResult["SEARCH"] as $arItem):?>
			<div class="search-item">
				<h4><a href="<?=$arItem["URL"]?>"><?=$arItem["TITLE_FORMATED"]?></a></h4>
				<div class="search-preview"><?=$arItem["BODY_FORMATED"]?></div>

				<?if($arParams["SHOW_ITEM_DATE_CHANGE"] != "N"):?>
				<div class="search-item-meta">
					<div class="search-item-date"><label><?=GetMessage("CT_BSP_DATE_CHANGE")?>: </label><span><?=$arItem["DATE_CHANGE"]?></span></div>
				</div>
				<?endif?>
			</div>
		<?endforeach;?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
		<?if($arParams["SHOW_ORDER_BY"] != "N"):?>
			<div class="search-sorting"><label><?=GetMessage("CT_BSP_ORDER")?>:</label>&nbsp;
                <?if($arResult["REQUEST"]["HOW"]=="d"):?>
                    <a href="<?=$arResult["URL"]?>&amp;how=r"><?=GetMessage("CT_BSP_ORDER_BY_RANK")?></a>&nbsp;<b><?=GetMessage("CT_BSP_ORDER_BY_DATE")?></b>
                <?else:?>
                    <b><?=GetMessage("CT_BSP_ORDER_BY_RANK")?></b>&nbsp;<a href="<?=$arResult["URL"]?>&amp;how=d"><?=GetMessage("CT_BSP_ORDER_BY_DATE")?></a>
                <?endif;?>
			</div>
		<?endif;?>
	<?else:?>
		<?ShowNote(GetMessage("CT_BSP_NOTHING_TO_FOUND"));?>
	<?endif;?>
	</div>
</div>