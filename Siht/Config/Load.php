<?php
/**
* Classe Load para realizar o Load das pastas de declaração das classes,processar a URI e acessar Classe/Método do Controller
* 
* @package 		Siht.Config
* @author 		getsiht <www.getsiht.com>
* @version 		1.0
* @link        	http://getsiht.com Siht Project
* @copyright 	getsiht project 2013
*/
	class Load{
		
		/** 
		* Verifica os parametros enviado pela URI e faz a instância da classe e do método
		* 
		* @access public
		* @static
		* @return void
		*/
		public static function run(){
			if(defined(constant("SH_HTA_PARAM_NAME")."1"))	$class 	= constant(constant("SH_HTA_PARAM_NAME")."1")."Controller";
			if(defined(constant("SH_HTA_PARAM_NAME")."2"))	$method = constant(constant("SH_HTA_PARAM_NAME")."2");

			if(defined("SH_HTA_USE") && constant("SH_HTA_USE") && !in_array('mod_rewrite', apache_get_modules())){
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("WARNING: ","Active module \"rewrite_module\" in apache!",Alert::$DANGER));
				$errorController->show();
			}else if(!defined(constant("SH_HTA_PARAM_NAME")."1")){
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("WARNING: ","Class not sent!",Alert::$DANGER));
				$errorController->show();
			}elseif(!class_exists($class)){	
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("WARNING: ","Class '{$class}' does not exist!",Alert::$DANGER));		
				$errorController->show();		
			}/*elseif(!method_exists($class, $method))
			{
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("WARNING: ","Method '{$method}' does not exist!",Alert::$DANGER));
				$errorController->show();		
			}*/else{
				$obj = new $class();
				$obj->$method();
			}
		}

		/** 
		* Autoload function classes: Attempt to load undefined class 
		* Traverses the constant SH_CLASS_FOLDER_LOAD that contains the folders to perform the auto load, So there is no requirement to include
		* 
		* @access public
		* @param string $class Name of the class to load
		* @return void 
		*/

		public static function defineAutoLoad(){
				function __autoload($class){
					if(defined("SH_CLASS_FOLDER_LOAD"))
						if(is_array(unserialize(SH_CLASS_FOLDER_LOAD)))
							foreach (unserialize(SH_CLASS_FOLDER_LOAD) as $folder)
								if(file_exists("{$folder}/{$class}.php"))
									include_once "{$folder}/{$class}.php";
				}
		}

		/** 
		* Load default constants for siht project
		* 
		* @access public
		* @static 
		* @return void 
		*/
		public static function defineDefault(){
			if(!defined("SH_HTA_USE")) 			define("SH_HTA_USE", true);
			if(!defined("SH_HTA_PARAM_NAME")) 	define("SH_HTA_PARAM_NAME", "HTA_PARAM");
			if(!defined("SH_HTA_URI")) 			define("SH_HTA_URI", "uri");;
			if(!defined("SH_GET_CLASS_NAME")) 	define("S H_GET_CLASS_NAME",  "class");
			if(!defined("SH_GET_METHOD_NAME")) 	define("SH_GET_METHOD_NAME",  "method");	
			if(!defined("SH_INIT_METHOD")) 		define("SH_INIT_METHOD", "index");
		}

		/** 
		* percorre as pastas para realizar o auto load e armazena as pastas em uma constante: SH_CLASS_FOLDER_LOAD serializado,
		* utiliza a função recursiva para percorrer as pastas do projeto e do siht
		* 
		* @access public 
		* @static
		* @return void 
		*/		
		public static function defineDirLoad(){
			$_folders = array();

			if(defined("SH_WWW_ROOT_APP"))
				foreach(self::getDirRec(SH_WWW_ROOT_APP) as $dir)
					$_folders[] = $dir;

			if(defined("SH_WWW_ROOT_SIHT"))		
				foreach(self::getDirRec(SH_WWW_ROOT_SIHT) as $dir)
					$_folders[] = $dir;

			if(count($_folders))
				define("SH_CLASS_FOLDER_LOAD", serialize($_folders));
		}

		/** 
		* ....
		* 
		* @access public 
		* @param string $get use var $_GET
		* @static
		* @return void 
		*/		
		public static function defineUriLoad($get)
		{		
			if(defined("SH_HTA_USE") && constant("SH_HTA_USE")){
				$uri 	= isset($get[constant("SH_HTA_URI")]) && !empty($get[constant("SH_HTA_URI")])	? $get[constant("SH_HTA_URI")] 	: "";
				$uri 	= explode("/", $uri);

				for($i=0;$i<count($uri);$i++)
					if(isset($uri[$i]) && !empty($uri[$i]))
						define(constant("SH_HTA_PARAM_NAME") . ($i+1), $uri[$i]);
			}else{
				if(defined("SH_GET_CLASS_NAME"))
					if(isset($get[constant("SH_GET_CLASS_NAME")]) && !empty($get[constant("SH_GET_CLASS_NAME")]))						
						define(constant("SH_HTA_PARAM_NAME"). "1",$get[constant("SH_GET_CLASS_NAME")]);
				if(defined("SH_GET_CLASS_NAME"))	
					if(isset($get[constant("SH_GET_METHOD_NAME")]) && !empty($get[constant("SH_GET_METHOD_NAME")]))	
						define(constant("SH_HTA_PARAM_NAME"). "2",$get[constant("SH_GET_METHOD_NAME")]);
			}

			if(!defined(constant("SH_HTA_PARAM_NAME")."1"))
				if(defined("SH_INIT_CLASS"))
					define(constant("SH_HTA_PARAM_NAME") . "1", constant("SH_INIT_CLASS"));				

			if(defined(constant("SH_HTA_PARAM_NAME")."1") && !defined(constant("SH_HTA_PARAM_NAME")."2"))
				if(defined("SH_INIT_METHOD"))
					define(constant("SH_HTA_PARAM_NAME") . "2", constant("SH_INIT_METHOD"));				
		}

		/** 
		* recursive function to return a list of directory from a different directory
		* 
		* @access public 
		* @param string $dir: directory for recursive
		* @return all directories the directory $dir 
		*/
		public static function getDirRec($dir){
			$folders = array();

			if(is_dir($dir)){
				foreach(scandir($dir) as $object){
					if(is_dir($dir ."/". $object)  && $object!="." && $object!=".."){				
						foreach (self::getDirRec($dir ."/". $object) as $folder)
							$folders[] = $folder;					

						$folders[] = $dir ."/". $object;
					}
				}
			}
			return $folders;
		}
	}

?>  