<?php

	class PDOFilter{

		
		private $filters = array();
					
		public function __construct()
		{
			
		}

		public function setFilter($parameter,$sql, $value, $dataType = PDO::PARAM_STR, $length = false)
		{
			if(isset($value) && !empty($value))
			{
				$this->filters[] = array(
					"parameter"	=> $parameter,
					"sql"		=> $sql,
					"value"		=> $value,
					"dataType"	=> $dataType,
					"length"	=> $length
				);
			}
		}

		public function getSql()
		{
			$sql = "";
			foreach ($this->filters as $filter)
				$sql.=" {$filter["sql"]} ";
		
			return $sql;
		}

		public function bindParamAll(&$query)
		{
			foreach ($this->filters as $filter)
				$query->bindParam($filter["parameter"], $filter["value"],$filter["dataType"],$filter["length"]);
		}
		

	}


?>