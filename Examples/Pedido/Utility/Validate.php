<?php

	class Validate{

		public static $CPF_OPTIONS = array(
										"regex"=>"/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/",
										"regexError"=>"CPF Inválido!"
									);
		
		public static function validateAlert($validators = array()){
			$valid = true;
			foreach ($validators as $validador) {
				if(!$validador->validate()){
					$valid = false;
					AlertController::setAlert(new Alert("Atenção:",$validador->getError(),Alert::$DANGER));
					//PanelController::setPanel(new Panel("Atenção:",$validador->getError(),false,Panel::$DANGER));				
				}
			}

			return $valid;
		}

		public static function validatePanel($validators = array()){
			$valid = true;
			$errorText = array();

			foreach ($validators as $validador) {
				if(!$validador->validate()){
					$valid = false;					
					$errorText[] = "<li><b>".$validador->getName() . "</b>: " . $validador->getError();			
				}
			}
			if(!$valid)
				PanelController::setPanel(new Panel("Atenção",implode("<br>", $errorText),false,Panel::$DANGER));	

			return $valid;
		}
	}


?>