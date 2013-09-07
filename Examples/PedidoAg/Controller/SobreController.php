<?php
		
	class SobreController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->setView("Sobre");			
		}
	}

?>  