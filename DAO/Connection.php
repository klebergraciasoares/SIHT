<?php
	
	class Connection
	{	
		protected $pdo = false;

		public function __construct()
		{
			
		}

		protected function connect()
		{
			$host 		= "localhost";
			$dbname 	= "sample";
			$user 		= "root";
			$password 	= "";

			$this->pdo = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);	

			if(!$this->pdo)
			{
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("ATENÇÃO:","Erro ao connectar no banco de dados!",Alert::$DANGER));
				$errorController->show();
				exit();					
			}

		}
	}

?>  