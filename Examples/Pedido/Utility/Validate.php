<?php

	class Validate{

		public static $CPF_OPTIONS = array(
										"regex"=>"/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/",
										"regexError"=>"CPF Inválido!"
									);
		
		public static function isValid($validators = array()){
			$valid = true;
			foreach ($validators as $validador) {
				if(!$validador->validate()){
					$valid = false;
					AlertController::setAlert(new Alert("ATENÇÃO:",$validador->getError(),Alert::$DANGER));						
				}
			}

			return $valid;
		}
	}


?>