<?php
	
	class Connection
	{	
		protected $pdo = false;

		public function __construct()
		{
			
		}

		public function __destruct()
		{
			$this->pdo = null;
		}

		protected function connect()
		{
			$host 		= "localhost";
			$dbname 	= "sample";
			$user 		= "root";
			$password 	= "";

			try{
				$this->pdo = new PDO("mysql:host={$host};dbname={$dbname}", $user, $password);	
			}catch(Exception $e)
			{
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("ATENÇÃO:","Erro ao connectar no banco de dados!",Alert::$DANGER));
				$errorController->setAlert(new Alert("ATENÇÃO:",$e->getMessage(),Alert::$DANGER));
				$errorController->show();
				exit();	
			}
		}


	}

?>  