<?php
/**
* ....
* 
* @package Controller
* @author getsiht <www.getsiht.com>
* @version 1.0
* @copyright getsiht project 2013 
*/			
	class ErrorController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}		

		public function show()
		{
			$this->setView("ErrorView");
		}
	}

?>  