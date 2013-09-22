<?php

	class NumberValidator extends Validator{
		
		private $allowNegative		= true;
		private $decimalSeparator	= ".";
		private $thousandsSeparator	= ".";
		private $domain				= null;
		private $maxValue			= null;
		private $minValue			= null;
		
		private $integerError			= "";
		private $decimalPointCountError	= "";
		private $exceedsMaxError		= "";
		private $invalidCharError		= "";
		private $invalidFormatCharsError= "";
		private $lowerThanMinError		= "";
		private $negativeError			= "";
		private $separationError		= "";
		
		public function __construct(){
			parent::__construct();
		}

		public function validate(){

			$this->value = trim($this->value);

			return true;
		}
	}

?>