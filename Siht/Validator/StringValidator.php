<?php

	class StringValidator extends Validator{
		
		private $maxLength 		= null;
		private $minLength 		= null;
		
		private $maxLengthError 	= "This string is longer than the maximum allowed length. This must be less than {0} characters long.";
		private $minLengthError 	= "This string is shorter than the minimum allowed length. This must be at least {0} characters long.";

		public function __construct($name = null,$value = null,$required = true, $requiredError = null, $options = array()){			
			parent::__construct($name, $value, $required, $requiredError, $options);
		}

		public function setMaxLength($maxLength){
			if(is_numeric($maxLength))
	    		$this->maxLength = $maxLength;
	    }

	    public function getMaxLength(){
	    	return $this->maxLength;
	    }

	    public function setMinLength($minLength){
	    	if(is_numeric($minLength))
	    		$this->minLength = $minLength;
	    }

	    public function getMinLength(){
	    	return $this->minLength;
	    }

	    public function setMaxLengthError($maxLengthError){
	    	$this->maxLengthError = $maxLengthError;
	    }

	    public function getMaxLengthError(){
	    	return $this->maxLengthError;
	    }

	    public function setMinLengthError($minLengthError){
	    	$this->minLengthError = $minLengthError;
	    }

	    public function getMinLengthError(){
	    	return $this->minLengthError;
	    }

		public function validate(){

			if(!parent::validate())
				return false;

			if(!is_null($this->getExpected()) && $this->getValue() != $this->getExpected()){
				$this->setExpectedError($this->setErrorParam($this->getExpectedError(),0,$this->getExpected()));
				$this->setError($this->getExpectedError());
				return false;
			}

			if(is_numeric($this->maxLength) && strlen($this->getValue()) > $this->getMaxLength()){
				$this->setMaxLengthError($this->setErrorParam($this->getMaxLengthError(),0,$this->getMaxLength()));
				$this->setError($this->getMaxLengthError());
				return false;
			}

			if(is_numeric($this->minLength) && strlen($this->getValue()) < $this->getMinLength()){
				$this->setMinLengthError($this->setErrorParam($this->getMinLengthError(),0,$this->getMinLength()));
				$this->setError($this->getMinLengthError());
				return false;
			}

			return true;
		}
	}

?>