<?php

	class SHPDO extends PDO{

		private $filters = array();
				
		public function __construct($dsn, $username ,$password , $driver_options = array())
		{
			return parent::__construct($dsn, $username ,$password , $driver_options);
		}

		public function prepare($sql)
		{			
			$prepare =  parent::prepare($sql);

			return $prepare;
		}

		public function setFilter($SHPDOFilter)
		{
			$filters[] = $SHPDOFilter;
		}

		public function getSql()
		{
			$sql = "";
			foreach ($this->filters as $filter)
				$sql.=" {$filter["sql"]} ";
		
			return $sql;
		}

	}


?>