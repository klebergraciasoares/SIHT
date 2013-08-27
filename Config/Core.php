<?php
	include_once("Load.php");

	Load::defineDefault();
	Load::defineAutoLoad();	
	Load::defineDirLoad();
	Load::defineUriLoad($_GET);
	Load::start();
?>  