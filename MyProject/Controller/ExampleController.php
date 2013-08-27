<?php
		
	class ExampleController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->setAlert(new Alert("Attention:","Example Message Danger!",Alert::$DANGER));
			$this->setAlert(new Alert("Attention:","Example Message Warning!",Alert::$WARNING));
			$this->setAlert(new Alert("Attention:","Example Message Info!",Alert::$INFO));

			$this->setView("Example");			
		}
	}

?>  