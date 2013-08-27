<?php
		
	class StructureController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			echo $this->setView("Structure");			
		}
	}

?>  