<?php

	define("SH_HTA_PARAM_NAME", "HTA_PARAM"); //default HTA_PARAM = /Client/list/number = Constant: HTA_PARAM1/HTA_PARAM2/HTA_PARAM3
	define("SH_HTA_USE", true); //TRUE: for use //Client/list or FALSE: for use index.php?SH_GET_CLASS_NAME=Client&SH_GET_METHOD_NAME=list
	define("SH_HTA_URI", "uri"); //for use in archive .htaccess
		
	define("SH_GET_CLASS_NAME",  "class"); //for use with SH_HTA_USE = true; default value: class
	define("SH_GET_METHOD_NAME", "method"); //or use with SH_HTA_USE = true; default value: method

	define("SH_WWW_ROOT_SIHT", "./Siht");
	define("SH_WWW_ROOT_APP", dirname(dirname(__FILE__)));

	define("SH_WEB_ROOT_APP", "http://{$_SERVER["HTTP_HOST"]}/SIHT");
	define("SH_WEB_ROOT_LIB", "http://{$_SERVER["HTTP_HOST"]}/SIHT");
	
	define("SH_INIT_CLASS", "Principal");
	define("SH_INIT_METHOD", "index"); //default value: index

	define("SY_REG_PAG_GRID", 10);


?>  