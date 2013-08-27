<?php
		
	class GeneratorController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			echo $this->setView("Generator");			
		}
	}

?>  