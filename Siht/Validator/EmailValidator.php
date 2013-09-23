<?php

	class EmailValidator extends Validator{
		
		private $invalidEmailError	= "Your e-mail address is invalid.";
			   
		public function __construct($value = null,$required = true, $requiredError = null, $options = array()){		
			parent::__construct($value, $required, $requiredError, $options);
		}

		public function setInvalidEmailError($invalidEmailError){
	        $this->invalidEmailError = $invalidEmailError;
	    }

	    public function getInvalidEmailError(){
	        return $this->invalidEmailError;
	    }

		public function validate(){

			if(!parent::validate())
				return false;

			if(!filter_var($this->getValue(), FILTER_VALIDATE_EMAIL)){
				$this->setError($this->getInvalidEmailError());
				return false;
			}

			return true;
		}
	}

?>