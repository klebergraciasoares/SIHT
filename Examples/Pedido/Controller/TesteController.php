<?php 
	
	class TesteController extends Controller
	{
		private $validators = array();

		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{

			$stringValidator = new StringValidator();
			$stringValidator->setName("Teste");			
			$stringValidator->setFunction("Util::teste");			
			$stringValidator->setFunctionError("CPF inválido!");			
			$stringValidator->setValue("aaa");

			$this->validators [] = $stringValidator;

			$stringValidator = new StringValidator("a",false);
			$stringValidator->setName("Nome");
			$stringValidator->setRequiredError("Campo X Obrigatório");
			$stringValidator->setMaxLengthError("O texto deve contér no máximo {0} caracteres!");
			$stringValidator->setMinLengthError("O texto deve contér no mínimo {0} caracteres!");
			$stringValidator->setMaxLength(10);
			$stringValidator->setMinLength(2);			

			$this->validators [] = $stringValidator;

			//$this->validators [] = new StringValidator("",true,null);
			/*
			$stringValidator = new StringValidator();
			$stringValidator->setRequiredError("Campo Field X Obrigatório");			
			$stringValidator->setValue("");

			$this->validators [] = $stringValidator;

			$stringValidator = new StringValidator();
			$stringValidator->setRequiredError("Campo X Obrigatório");
			$stringValidator->setMaxLengthError("O texto deve contér no máximo {0} caracteres!");
			$stringValidator->setMinLengthError("O texto deve contér no mínimo {0} caracteres!");
			$stringValidator->setMaxLength(10);
			$stringValidator->setMinLength(2);
			$stringValidator->setValue("a");

			$this->validators [] = $stringValidator;


			$stringValidator = new StringValidator();
			$stringValidator->setRequiredError("Campo Y Obrigatório");
			$stringValidator->setMaxLengthError("O texto deve contér no máximo {0} caracteres!");
			$stringValidator->setMinLengthError("O texto deve contér no mínimo {0} caracteres!");
			$stringValidator->setMaxLength(10);
			$stringValidator->setMinLength(2);
			$stringValidator->setValue("yyyyyyyyyyyyyyyy");

			$this->validators [] = $stringValidator;

			$stringValidator = new StringValidator();
			$stringValidator->setRequiredError("Campo Z Obrigatório");
			$stringValidator->setExpectedError("O valor esperado é {0}!");			
			$stringValidator->setExpected("ABC");
			$stringValidator->setValue("ABCD");

			$this->validators [] = $stringValidator;

			$emailValidator = new EmailValidator();
			$emailValidator->setRequired(false);			
			$emailValidator->setInvalidEmailError("Email inválido!");			
			$emailValidator->setValue("luiz.henrique@cesumar");

			$this->validators [] = $emailValidator;
		
			$numberValidator = new NumberValidator();
			$numberValidator->setRequiredError("Campo Number X Obrigatório");			
			//$numberValidator->setMaxValue(10);
			$numberValidator->setMinValue("5.000,00");
			$numberValidator->setAllowNegative(false);
			$numberValidator->setDecimalSeparator(",");
			$numberValidator->setThousandsSeparator(".");
			$numberValidator->setPrecision("2");
			$numberValidator->setValue("1.000.000,80");
			$numberValidator->setDomain(NumberValidator::$DOMAIN_REAL);

			$this->validators [] = $numberValidator;
			*/

			Validate::validatePanel($this->validators);

			$this->setView("Teste");


			
			
		}		
	}

?>  