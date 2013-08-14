<?php
	
	class Controller
	{	
		private $alerts = array();

		public function __construct()
		{
			if(!session_id())
				session_start();
		}

		public function setView($view)
		{
			if(file_exists(SH_WWW_ROOT_APP . "/View/{$view}.php"))
				include_once(SH_WWW_ROOT_APP . "/View/{$view}.php");
			else if(file_exists(SH_WWW_ROOT_SIHT . "/View/{$view}.php"))
				include_once(SH_WWW_ROOT_SIHT . "/View/{$view}.php");
			else{
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("WARNING:","View {$view} does not exist in folder View!",Alert::$DANGER));
				$errorController->show();
				exit();
			}
		}

		public function redirectView($view)
		{
			header("location:" . SH_WEB_ROOT_APP . "/" . $view);
			exit();
		}

		public function setSession($index, $value){
 			$_SESSION[$index] = $value;
 		}

 		public function getSession($index){
 			return isset($_SESSION[$index]) ? $_SESSION[$index] : null;
 		}

		public function setAlert(Alert $alert){
 			$this->alerts[] = $alert;
 		}

 		public function getAlerts(){
 			return $this->alerts;
 		}
	}

?>  