<?php
	include_once("Load.php");

	Load::defineDefault();
	Load::defineAutoLoad();	
	Load::defineErrorHandler();
	Load::defineDirLoad();
	Load::defineUriLoad($_GET);
	Load::run();
?>  