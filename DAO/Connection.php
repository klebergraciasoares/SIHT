<?php
	
	class Connection
	{	
		protected $connection = false;

		public function __construct()
		{
			
		}

		protected function connect()
		{
			//$this->connection = new PDO('mysql:host=localhost;dbname=<SOMEDB>', '<USERNAME>', 'PASSWORD');	
		}
	}

?>  