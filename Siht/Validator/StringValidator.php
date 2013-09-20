<?php

	class StringValidator extends Validator{
		
		private $maxLength = null;
		private $minLength = null;

		public function __construct(){
			parent::__construct();
		}

		public function validate(){

			$this->value = trim($this->value);

			if($this->value == null){
				$this->error = $this->requiredError;
				return false;
			}

			if(strlen($this->value) == 0){
				$this->error = $this->requiredError;
				return false;
			}

			if(is_numeric($this->maxLength) && strlen($this->value) > $this->maxLength){
				$this->error = $this->tooLongError;
				return false;
			}

			if(is_numeric($this->minLength) && strlen($this->value) < $this->minLength){
				$this->error = $this->tooShortError;
				return false;
			}

			return true;
		}
	}

?>