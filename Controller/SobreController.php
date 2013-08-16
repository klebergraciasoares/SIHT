<?php
		
	class SobreController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function sobre()
		{
			$this->setView("Sobre");			
		}
	}

?>  