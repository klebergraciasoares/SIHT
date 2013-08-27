<?php
/**
* Configuration file of the project.
* Here you define the constants that will be used in the core of the project.
* 
* @package 		Config
* @author 		getsiht <www.getsiht.com>
* @version 		1.0
* @link        	http://getsiht.com Siht Project
* @copyright 	getsiht project 2013
*/
	
	/**
	* define SH_HTA_PARAM_NAME constant for use in .htaccess
	* default value: HTA_PARAM
	* required : no
	* example: URL: http://www/Client/list/1 : defined constants: {SH_HTA_PARAM_NAME}1 = Client; {SH_HTA_PARAM_NAME}2 = list; {SH_HTA_PARAM_NAME}3 = 1;
	*/
	define("SH_HTA_PARAM_NAME", "HTA_PARAM");

	/**
	* define SH_HTA_USE constant for use the .htaccess
	* default value: true
	* required : no
	* example TRUE: URL  = http://www/Client/list/1
	* example FALSE: URL = http://www/index.php?{SH_GET_CLASS_NAME}=Client&{SH_GET_METHOD_NAME}=list&pg=1
	*/
	define("SH_HTA_USE", true);

	/**
	* define SH_HTA_URI constant for use in archive .htaccess
	* default value: uri
	* required : no
	* example: URL = http://www/index.php?uri=Client/list/1
	*/
	define("SH_HTA_URI", "uri");
		
	/**
	* define SH_GET_CLASS_NAME constant for use with SH_HTA_USE = false;
	* default value: class
	* required : no
	* example: URL = http://www/index.php?{SH_GET_CLASS_NAME}=Client&{SH_GET_METHOD_NAME}=list
	*/	
	define("SH_GET_CLASS_NAME",  "class");

	/**
	* define SH_GET_METHOD_NAME constant for use with SH_HTA_USE = false;
	* default value: method
	* required : no
	* example: URL = http://www/index.php?{SH_GET_CLASS_NAME}=Client&{SH_GET_METHOD_NAME}=list
	*/	
	define("SH_GET_METHOD_NAME", "method");

	/**
	* define SH_WWW_ROOT_SIHT constant: where is the project folder siht;
	* default value: (void)
	* required : yes
	* example: ./Siht
	*/
	define("SH_WWW_ROOT_SIHT", "../Siht");

	/**
	* define SH_WWW_ROOT_APP constant: where is the application folder;
	* default value: (void)
	* required : yes
	* example: /var/www/appX/
	*/
	define("SH_WWW_ROOT_APP", dirname(dirname(__FILE__)));

	/**
	* define SH_WEB_ROOT_APP constant: where is the application folder;
	* default value: (void)
	* required : yes
	* example: http://mydomain.com/APP
	*/
	define("SH_WEB_ROOT_APP", "http://{$_SERVER["HTTP_HOST"]}/SIHT/MyProject/Pedido");

	/**
	* define SH_WEB_ROOT_LIB constant: where is the Lib application folder;
	* default value: (void)
	* required : yes
	* example: http://mydomain.com/APP/Lib
	*/
	define("SH_WEB_ROOT_LIB", "http://{$_SERVER["HTTP_HOST"]}/SIHT/MyProject/Lib");
	
	/**
	* define SH_INIT_CLASS constant: defines the class that will be executed when there is no parameter {SH_HTA_PARAM_NAME}1
	* default value: (void)
	* required : no	
	*/
	define("SH_INIT_CLASS", "Example");

	/**
	* define SH_INIT_METHOD constant: defines the method that will be executed when there is no parameter {SH_HTA_PARAM_NAME}2
	* default value: index
	* required : no	
	*/
	define("SH_INIT_METHOD", "index"); 
?>  