<?php
 	class Alert
 	{
 		public static $DANGER 	= "danger";
 		public static $SUCESS 	= "success";
 		public static $INFO 	= "info";
 		public static $WARNING 	= "warning"; 		

		private $title;
 		private $text;
 		private $type;
 		private $close;

 		public function __construct($title = "", $text = "", $type = "", $close = true)
 		{
 			$this->setTitle($title);
 			$this->setText($text);
 			$this->setType($type);
 			$this->setClose($close);
 		}

 		public function setTitle($title){
 			$this->title = $title;
 		}

 		public function getTitle(){
 			return $this->title;
 		}

 		public function setText($text){
 			$this->text = $text;
 		}

 		public function getText(){
 			return $this->text;
 		}

 		public function setType($type){
 			switch ($type) {
 				case self::$DANGER:
 				case self::$SUCESS:
 				case self::$INFO:
 				case self::$WARNING:
 					$this->type = $type;
 				break;
 				
 				default:
 					$this->type = self::$WARNING;
 				break;
 			} 			
 		}

 		public function getType(){
 			return $this->type;
 		}

 		public function setClose($close){
 			$this->close = is_bool($close) ? $close : $this->close;
 		}

 		public function getClose(){
 			return $this->close;
 		}

 		public function getHtml()
 		{
 			return
 				"<div class=\"alert".($this->getClose() ? " alert-dismissable" : "")." ".($this->getType() ? " alert-".($this->getType())."" : "")."\">
 					".($this->getClose() ? "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" : "")."
 					".($this->getTitle() ? "<strong>" . ($this->getTitle()). "</strong>" : "")."
 					".($this->getText() ? $this->getText() : "")."  					 
				</div>";
 		}
 	}
?>  