<?php
		
	class StartController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			echo $this->setView("Start");			
		}
	}

?>  