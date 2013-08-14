<?php

	dirClassLoad();
	
	uriProcess(isset($_GET["uri"]) ? $_GET["uri"] : "");
	
	if(defined(constant("SH_HTA_PARAM_NAME")."1"))	$class 	= constant(constant("SH_HTA_PARAM_NAME")."1")."Controller";
	if(defined(constant("SH_HTA_PARAM_NAME")."2"))	$method = constant(constant("SH_HTA_PARAM_NAME")."2");
	
	if(!defined(constant("SH_HTA_PARAM_NAME")."1"))
	{
		$errorController = new ErrorController();
		$errorController->setAlert(new Alert("WARNING: ","Class not sent!",Alert::$DANGER));
		$errorController->show();
	}elseif(!defined(constant("SH_HTA_PARAM_NAME")."2"))
	{
		$errorController = new ErrorController();
		$errorController->setAlert(new Alert("WARNING: ","Method not sent!",Alert::$DANGER));
		$errorController->show();
	}elseif(!class_exists($class))
	{	
		$errorController = new ErrorController();
		$errorController->setAlert(new Alert("WARNING: ","Class '{$class}' does not exist!",Alert::$DANGER));		
		$errorController->show();		
	}elseif(!method_exists($class, $method))
	{
		$errorController = new ErrorController();
		$errorController->setAlert(new Alert("WARNING: ","Method '{$method}' does not exist!",Alert::$DANGER));
		$errorController->show();		
	}else{
		$obj = new $class();
		$obj->$method();
	}

	/* ##### functions local ##### */

	function __autoload($className)
	{
		if(defined("CLASS_FOLDER_LOAD"))
			if(is_array(unserialize(CLASS_FOLDER_LOAD)))
				foreach (unserialize(CLASS_FOLDER_LOAD) as $folder)
					if(file_exists("{$folder}/{$className}.php"))
						include_once "{$folder}/{$className}.php";
	}

	function dirClassLoad()
	{
		$_folders = array();

		if(defined("SH_WWW_ROOT_APP"))
			foreach(getDirRec(SH_WWW_ROOT_APP) as $dir)
				$_folders[] = $dir;

		if(defined("SH_WWW_ROOT_SIHT"))		
			foreach(getDirRec(SH_WWW_ROOT_SIHT) as $dir)
				$_folders[] = $dir;

		if(count($_folders))
			define("CLASS_FOLDER_LOAD", serialize($_folders));
	}

	function uriProcess($uri)
	{		
		$SH_CLASS_METHOD_INIT = defined("SH_CLASS_METHOD_INIT") ? SH_CLASS_METHOD_INIT : "";

		$uri 	= isset($uri) && !empty($uri)	? $uri 	: $SH_CLASS_METHOD_INIT;
		$uri 	= explode("/", $uri);

		for($i=0;$i<count($uri);$i++)
			if(isset($uri[$i]) && !empty($uri[$i]))
				define(constant("SH_HTA_PARAM_NAME") . ($i+1), $uri[$i]);
	}

	//recursive function for list directory
	function getDirRec($dir)
	{
		$_folders = array();

		if(is_dir($dir))
		{
			foreach(scandir($dir) as $object)
			{
				if(is_dir($dir ."/". $object)  && $object!="." && $object!="..")
				{				
					foreach (getDirRec($dir ."/". $object) as $folder)
						$_folders[] = $folder;					

					$_folders[] = $dir ."/". $object;
				}
			}
		}

		return $_folders;
	}
?>  