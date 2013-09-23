<?php

	class ClienteValidate{

		private $alerts 	= array();
		private $validator 	= array();

		public function config(Cliente $cliente){
			$stringValidator = new StringValidator();
			$stringValidator->value 	= $cliente->getNome();
			$stringValidator->required 	= true;
			$stringValidator->requiredError	= "Campo Nome Obrigatório";
			$this->validator[] = $stringValidator;
		}

		public function validate(){

			
		}
	}

?>