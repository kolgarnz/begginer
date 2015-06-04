<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arYesNo = Array(
	"Y" => GetMessage("SBB_DESC_YES"),
	"N" => GetMessage("SBB_DESC_NO"),
);




$arComponentParameters = Array(
	"PARAMETERS" => Array(
        	"PATH_TO_ORDER" => Array(
			"NAME" => GetMessage("SBB_PATH_TO_ORDER"),
			"TYPE" => "STRING",
			"MULTIPLE" => "N",
			"DEFAULT" => "/personal/order.php",
			"COLS" => 25,
			"PARENT" => "ADDITIONAL_SETTINGS",
		),

		"HIDE_COUPON" => Array(
			"NAME"=>GetMessage("SBB_HIDE_COUPON"),
			"TYPE"=>"LIST", "MULTIPLE"=>"N",
			"VALUES"=>array(
					"N" => GetMessage("SBB_DESC_NO"),
					"Y" => GetMessage("SBB_DESC_YES")
				),
			"DEFAULT"=>"N",
			"COLS"=>25,
			"ADDITIONAL_VALUES"=>"N",
			"PARENT" => "ADDITIONAL_SETTINGS",
		),
		"COLUMNS_LIST" => Array(
			"NAME"=>GetMessage("SBB_COLUMNS_LIST"),
			"TYPE"=>"LIST",
			"MULTIPLE"=>"Y",
			"VALUES"=>array(
                "NUMBER" => GetMessage('SBB_NUMBER'),
				"NAME" => GetMessage("SBB_BNAME"),
                "PICTURE" => GetMessage('SBB_PICTURE'),
				"PROPS" => GetMessage("SBB_BPROPS"),
				"PRICE" => GetMessage("SBB_BPRICE"),
                "TOTAL_PRICE" => GetMessage('SBB_TOTAL_PRICE'),
				"TYPE" => GetMessage("SBB_BTYPE"),
				"QUANTITY" => GetMessage("SBB_BQUANTITY"),
				"DELETE" => GetMessage("SBB_BDELETE"),
				"DELAY" => GetMessage("SBB_BDELAY"),
				"WEIGHT" => GetMessage("SBB_BWEIGHT"),
				"DISCOUNT" => GetMessage("SBB_BDISCOUNT"),
				"VAT" => GetMessage("SBB_BVAT"),
				),
				"DEFAULT"=>array("NAME", "PRICE", "TYPE", "DISCOUNT", "QUANTITY", "DELETE", "DELAY", "WEIGHT", "NUMBER",'TOTAL_PRICE','PICTURE'),
				"COLS"=>25,
			"ADDITIONAL_VALUES"=>"N",
			"PARENT" => "VISUAL",
		),

		"QUANTITY_FLOAT" => array(
			"NAME" => GetMessage('SBB_QUANTITY_FLOAT'),
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "N",
			"ADDITIONAL_VALUES"=>"N",
			"PARENT" => "ADDITIONAL_SETTINGS",
		),
/*
		"PRICE_VAT_INCLUDE" => array(
			"NAME" => GetMessage('SBB_VAT_INCLUDE'),
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "Y",
			"ADDITIONAL_VALUES"=>"N",
			"PARENT" => "ADDITIONAL_SETTINGS",
		),
*/
		"PRICE_VAT_SHOW_VALUE" => array(
			"NAME" => GetMessage('SBB_VAT_SHOW_VALUE'),
			"TYPE" => "CHECKBOX",
			"MULTIPLE" => "N",
			"DEFAULT" => "N",
			"ADDITIONAL_VALUES"=>"N",
			"PARENT" => "ADDITIONAL_SETTINGS",
		),
		"COUNT_DISCOUNT_4_ALL_QUANTITY" => Array(
			"NAME"=>GetMessage("SBB_COUNT_DISCOUNT_4_ALL_QUANTITY"), 
			"TYPE"=>"LIST", "MULTIPLE"=>"N", 
			"VALUES"=>array(
					"N" => GetMessage("SBB_DESC_NO"), 
					"Y" => GetMessage("SBB_DESC_YES")
				), 
			"DEFAULT"=>"N", 
			"COLS"=>25, 
			"ADDITIONAL_VALUES"=>"N",
			"PARENT" => "BASE",
		),


		"SET_TITLE" => Array(),
		"AJAX_MODE" => Array(),
        //custom fields
        "PROPERTY_LIST" => array(
            "NAME" => GetMessage('SBB_PROPERTY_LIST'),
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES"=>array(
                "KPP" => GetMessage("SBB_KPP"),
                "SALON" => GetMessage("SBB_SALON"),
                "CLASS" => GetMessage("SBB_CLASS"),
                "YEAR" => GetMessage("SBB_YEAR"),
                "BODY" => GetMessage("SBB_BODY"),
                "ENGINE" => GetMessage("SBB_ENGINE"),
                "COLOR" => GetMessage("SBB_COLOR"),
            ),
            "DEFAULT"=>array(
                "KPP",
                "SALON",
                "CLASS",
                "YEAR",
                "BODY",
                "ENGINE",
                "COLOR"
            ),
            "COLS"=>25,
            "ADDITIONAL_VALUES"=>"N",
            "PARENT" => "VISUAL",
        ),
	)
);
?>