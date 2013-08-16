<?php	

	class Configure{

		public static function write($param,$value)
		{
			define($param, serialize($value));
		} 

		public static function read($param)
		{
			if(defined($param))
				return unserialize(constant($param));
			else
				return null;
		} 

	}

?>  