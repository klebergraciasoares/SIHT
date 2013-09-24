<?php

	class Validator{
		private $name				= null;
		private $value				= null;
		private $required 			= true;		
		private $expected			= null;
		private $regex				= null;
		private $function			= null;

		private $error 				= "";
		private $requiredError 		= "This field is required.";
		private $expectedError 		= "Value expected is {0}.";
		private $regexError 		= "Regex Error.";
		private $functionError 		= "";
		
		protected function __construct($name = null, $value = null, $required = true, $requiredError = null, $options = array()){
			if(!is_null($name))
				$this->setName($name);

			if(!is_null($value))
				$this->setValue($value);

			$this->setRequired($required);

			if(!is_null($requiredError))
				$this->setRequiredError($requiredError);

			$this->setOptions($options);
		}

		protected function setOptions($options = array()){
			foreach ($options as $config=>$value) {
				$method = "set" . ucfirst($config);
				$this->$method($value);
			}
		}

		public function setName($name){
	    	$this->name = $name;
	    }

	    public function getName(){
	    	return $this->name;
	    }

		public function setValue($value){
			if(is_string($value))
	    		$value = trim($value);
	    	$this->value = $value;
	    }

	    protected function getValue(){
	    	return $this->value;
	    }

	    public function setRequired($required){
	    	$this->required = $required;
	    }

	    public function getRequired(){
	    	return $this->required;
	    }

	    public function setExpected($expected){
	    	$this->expected = $expected;
	    }

	    public function getExpected(){
	    	return $this->expected;
	    }

	    public function setRegex($regex){
	        $this->regex = $regex;
	    }

	    public function getRegex(){
	        return $this->regex;
	    }

	     public function setFunction($function){
	        $this->function = $function;
	    }

	    public function getFunction(){
	        return $this->function;
	    }

	    protected function setError($error){
	    	$this->error = $error;
	    }

	    public function getError(){
	    	return $this->error;
	    }

	    public function setRequiredError($requiredError){
	    	$this->requiredError = $requiredError;
	    }

	    protected function getRequiredError(){
	    	return $this->requiredError;
	    }

	    public function setExpectedError($expectedError){
	    	$this->expectedError = $expectedError;
	    }

	    public function getExpectedError(){
	    	return $this->expectedError;
	    }

	    public function setRegexError($regexError){
	        $this->regexError = $regexError;
	    }

	    public function getRegexError(){
	        return $this->regexError;
	    }

	    public function setFunctionError($functionError){
	        $this->functionError = $functionError;
	    }

	    public function getFunctionError(){
	        return $this->functionError;
	    }

	    public function hasValue(){
			return !is_null($this->getValue()) && strlen(trim($this->getValue())) > 0;	    	
	    }

	    protected function validate(){
	    	
			if($this->getRequired() && is_null($this->getValue())){
				$this->setError($this->getRequiredError());
				return false;
			}

			if($this->getRequired() && strlen($this->getValue()) == 0){
				$this->setError($this->getRequiredError());
				return false;
			}

			if(!is_null($this->getRegex()) && $this->hasValue()){
				if(!preg_match($this->getRegex(), $this->getValue())){
					$this->setError($this->getRegexError());
					return false;
				}
			}

			if(!is_null($this->getFunction()) && $this->hasValue()){				
				if(!call_user_func($this->getFunction(),$this->getValue())){
					$this->setError($this->getFunctionError());
					return false;
				}			
			}

			return true;
	    }

	    protected function setErrorParam($error, $param, $value)
	    {
	    	return str_replace("{{$param}}", $value, $error);
	    }
	}

?>