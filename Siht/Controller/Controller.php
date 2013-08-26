<?php	
/**
* ....
* 
* @package 		Siht.Controller
* @author 		getsiht <www.getsiht.com>
* @version 		1.0
* @copyright 	getsiht project 2013
* @link        	http://getsiht.com Siht Project
*/	
	class Controller
	{	
		/**
		* Atores the variable global $_GET
		* @access protected
		* @var array
		*/
		protected $get 	= false;
		
		/**
		* Atores the variable global $_POST
		* @access protected
		* @var array
		*/
		protected $post = false;
		
		/**
		* Class stores the alerts Alert
		* @access protected
		* @var array
		*/
		private $alerts = array();

		/** 
		* ....
		* 
		* @access public 
		* @return void 
		*/
		public function __construct(){
			if(!session_id())
				session_start();

			$this->getPost();
			$this->getGet();
		}

		/** 
		* ....
		* 
		* @access public 
		* @return void 
		*/
		public function getPost()
		{		
			//**verificar se o POST está vindo da mesma página

			if(is_array($_POST))
				foreach ($_POST as $key => $value) 					
					$this->post[$key] = $value;	
		}

		/** 
		* ....
		* 
		* @access public 
		* @return void 
		*/
		public function getGet()
		{
			if(is_array($_GET))
				foreach ($_GET as $key => $value) 					
					$this->get[$key] = $value;	
		}

		/** 
		* open view in folder View
		* 
		* @access public 
		* @param string $view		
		* @return void 
		*/
		public function setView($view){
			if(file_exists(SH_WWW_ROOT_SIHT . "/View/{$view}.php"))
				include_once(SH_WWW_ROOT_SIHT . "/View/{$view}.php");
			else if(file_exists(SH_WWW_ROOT_APP . "/View/{$view}.php"))
				include_once(SH_WWW_ROOT_APP . "/View/{$view}.php");
			else{
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("WARNING:","View {$view} does not exist in folder View!",Alert::$DANGER));
				$errorController->show();
				exit();
			}
		}

		/** 
		* redirect page for view
		* 
		* @access public 
		* @param string $view class/method		
		* @return void 
		*/		
		public function redirectView($view){
			if(defined("SH_HTA_USE") && constant("SH_HTA_USE")){
				$url = $view;
			}else{
				$classMethod = explode("/", $view);
				if(isset($classMethod[0]))
					$url = "index.php?c={$classMethod[0]}";		
				if(isset($classMethod[1]))				
					$url.= "&m={$classMethod[1]}"; 	
			}
			header("location:" . SH_WEB_ROOT_APP . "/" . $url);
			exit();
		}

		public function setSession($index, $value){
 			$_SESSION[$index] = $value;
 		}

 		public function getSession($index){
 			return isset($_SESSION[$index]) ? $_SESSION[$index] : null;
 		}

		public function setAlert(Alert $alert){
 			$_SESSION["SH_ALERTS"][] = $alert;
 		}

 		public function getAlerts(){ 			
 			return isset($_SESSION["SH_ALERTS"]) ? $_SESSION["SH_ALERTS"] : array();;
 		}

 		public function clearAlerts(){ 			
 			$_SESSION["SH_ALERTS"] = array();
 		}		

 		public function showAlerts(){ 			
 			$html="";
			if(is_array($this->getAlerts()))
            	foreach ($this->getAlerts() as $alert)
              		$html.=$alert->getHtml();
	            
	        $this->clearAlerts();

	        return $html;
 		}
	}

?>  