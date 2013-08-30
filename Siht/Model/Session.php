<?php

	class Session{	

		public static function setValue($var = null,$value  = null, $push = false){
			self::startSession();
			if($push)
				$_SESSION[$var][] = $value;
			else
				$_SESSION[$var] = $value;
		}

		public static function getValue($var  = null){
			self::startSession();
			return isset($_SESSION[$var]) ? $_SESSION[$var] : null;
		}

		private static function startSession(){
			if(!session_id())
				session_start();
		}

		public static function destroySession(){	
			self::startSession();		
			$_SESSION = array();
			session_destroy();
		}
	}


?>