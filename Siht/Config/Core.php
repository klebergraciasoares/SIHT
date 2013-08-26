<?php

	include_once("Load.php");

	Load::defineDefault();
	Load::defineDirLoad();
	Load::defineUriLoad($_GET);
	Load::start();
	
	/** 
	* Autoload function classes: Attempt to load undefined class 
	* Traverses the constant SH_CLASS_FOLDER_LOAD that contains the folders to perform the auto load, So there is no requirement to include
	* 
	* @access public
	* @param string $class Name of the class to load
	* @return void 
	*/ 
	function __autoload($class)
	{
		if(defined("SH_CLASS_FOLDER_LOAD"))
			if(is_array(unserialize(SH_CLASS_FOLDER_LOAD)))
				foreach (unserialize(SH_CLASS_FOLDER_LOAD) as $folder)
					if(file_exists("{$folder}/{$class}.php"))
						include_once "{$folder}/{$class}.php";
	}
?>  