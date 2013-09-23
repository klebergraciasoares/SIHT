<?php

	class NumberValidator extends Validator{

		public static $DOMAIN_INTEGER 	= 1;
		public static $DOMAIN_REAL 		= 2;
		
		private $allowNegative		= true;
		private $decimalSeparator	= ".";
		private $thousandsSeparator	= ",";
		private $precision			= null;
		private $domain				= null;
		private $maxValue			= null;
		private $minValue			= null;
				
		private $integerError			= "The number must be an integer.";
		private $realError				= "The number must be an real.";		
		private $precisionError			= "The amount entered has too many digits beyond the decimal point.";
		private $maxError				= "The number entered is too large. Max value: {0}";
		private $minError				= "The amount entered is too small. Min value: {0}";
		private $invalidError			= "The input contains invalid characters.";		
		private $negativeError			= "The amount may not be negative.";

		public function __construct($value = null,$required = true, $requiredError = null, $options = array()){			
			parent::__construct($value, $required, $requiredError, $options);
		}

		public function setAllowNegative($allowNegative){
	        $this->allowNegative = $allowNegative;
	    }

	    public function getAllowNegative(){
	        return $this->allowNegative;
	    }

	    public function setDecimalSeparator($decimalSeparator){
	        $this->decimalSeparator = $decimalSeparator;
	    }

	    public function getDecimalSeparator(){
	        return $this->decimalSeparator;
	    }

	    public function setThousandsSeparator($thousandsSeparator){
	        $this->thousandsSeparator = $thousandsSeparator;
	    }

	    public function getThousandsSeparator(){
	        return $this->thousandsSeparator;
	    }

	    public function setPrecision($precision){
	        $this->precision = $precision;
	    }

	    public function getPrecision(){
	        return $this->precision;
	    }

		public function setDomain($domain){
			switch ($domain){
				case NumberValidator::$DOMAIN_INTEGER:
					$this->domain = $domain;
				break;

				case NumberValidator::$DOMAIN_REAL:
					$this->domain = $domain;
				break;
			}	        
	    }

	    public function getDomain(){
	        return $this->domain;
	    }

		public function setMaxValue($maxValue){
	    	$this->maxValue = $maxValue;
	    }

	    public function getMaxValue(){
	    	return $this->maxValue;
	    }

	    public function setMinValue($minValue){
	    	$this->minValue = $minValue;
	    }

	    public function getMinValue(){
	    	return $this->minValue;
	    }

	    public function setRealError($realError){
	        $this->realError = $realError;
	    }

	    public function getRealError(){
	        return $this->realError;
	    }

	    public function setPrecisionError($precisionError){
	    	$this->precisionError = $precisionError;
	    }

	    public function getPrecisionError(){
	    	return $this->precisionError;
	    }

		public function setIntegerError($integerError){
	        $this->integerError = $integerError;
	    }

	    public function getIntegerError(){
	        return $this->integerError;
	    }

	    public function setMaxError($maxError){
	        $this->maxError = $maxError;
	    }

	    public function getMaxError(){
	        return $this->maxError;
	    }

	    public function setMinError($minError){
	        $this->minError = $minError;
	    }

	    public function getMinError(){
	        return $this->minError;
	    }

	    public function setInvalidError($invalidError){
	        $this->invalidError = $invalidError;
	    }

	    public function getInvalidError(){
	        return $this->invalidError;
	    }

	    public function setNegativeError($negativeError){
	        $this->negativeError = $negativeError;
	    }

	    public function getNegativeError(){
	        return $this->negativeError;
	    }

	    //methods

	    private function toValueFormat($value){	    	
	    	$value = str_replace($this->getThousandsSeparator(), "", $value);
	    	$value = str_replace($this->getDecimalSeparator(), ".", $value);	    		    	
	    	return $value;
	    }

		public function validate(){			

			$_value 	= $this->toValueFormat($this->getValue());
			$_maxValue 	= $this->toValueFormat($this->getMaxValue());
			$_minValue 	= $this->toValueFormat($this->getMinValue());

			if(!parent::validate())
				return false;

			if($this->hasValue() && !is_numeric($_value)){
				$this->setError($this->getInvalidError());
				return false;
			}

			if($this->hasValue() && !$this->getAllowNegative() && $_value < 0){
				$this->setError($this->getNegativeError());
				return false;
			}

			if(!is_null($this->getPrecision())){
				if(!preg_match("/^[0-9]+(?:\.[0-9]{1,".$this->getPrecision()."})?$/im", $_value)){
					$this->setError($this->getPrecisionError());
					return false;
				}
			}

			if(!is_null($this->getMaxValue()) && $_value > $_maxValue){
				$this->setMaxError($this->setErrorParam($this->getMaxError(),0,$this->getMaxValue()));
				$this->setError($this->getMaxError());
				return false;
			}

			if(!is_null($this->getMinValue()) && $_value < $_minValue){
				$this->setMinError($this->setErrorParam($this->getMinError(),0,$this->getMinValue()));
				$this->setError($this->getMinError());
				return false;
			}
			
			if(!is_null($this->getDomain()) && $this->getDomain() == NumberValidator::$DOMAIN_INTEGER){
				if(!preg_match("/^\d+$/", $_value)){
					$this->setError($this->getIntegerError());
					return false;
				}
			}

			if(!is_null($this->getDomain()) && $this->getDomain() == NumberValidator::$DOMAIN_REAL){
				if(!preg_match("/^\d+\.?\d*$/", $_value)){
					$this->setError($this->getRealError());
					return false;
				}				
			}		

			return true;
		}
	}

?>