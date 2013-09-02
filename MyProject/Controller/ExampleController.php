<?php
		
	class ExampleController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			AlertController::setAlert(new Alert("Attention:","Example Message Danger!",Alert::$DANGER));
			AlertController::setAlert(new Alert("Attention:","Example Message Warning!",Alert::$WARNING));
			AlertController::setAlert(new Alert("Attention:","Example Message Info!",Alert::$INFO));

			$this->setView("Example");			
		}
	}

?>  