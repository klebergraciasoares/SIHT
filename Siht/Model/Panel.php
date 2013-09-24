<?php
/**
* ....
* 
* @package Model
* @author getsiht <www.getsiht.com>
* @version 1.0
* @copyright getsiht project 2013 
*/	
 	class Panel implements JsonSerializable
 	{
 		public static $DEFAULT 	= "default";
 		public static $PRIMARY 	= "primary";
 		public static $DANGER 	= "danger";
 		public static $SUCESS 	= "success";
 		public static $INFO 	= "info";
 		public static $WARNING 	= "warning"; 		

		private $title;
 		private $text;
 		private $type;
 		private $footer;

 		public function __construct($title = false, $text = false, $footer = false, $type = false)
 		{
 			$this->setTitle($title);
 			$this->setText($text);
 			$this->setFooter($footer); 		
 			$this->setType($type); 		
 		}

 		public function jsonSerialize()
	    {
	        return get_object_vars($this);
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

 		public function setFooter($footer){
	        $this->footer = $footer;
	    }

	    public function getFooter(){
	        return $this->footer;
	    }

 		public function setType($type){
 			switch ($type) {
 				case self::$DEFAULT:
 				case self::$PRIMARY:
 				case self::$DANGER:
 				case self::$SUCESS:
 				case self::$INFO:
 				case self::$WARNING:
 					$this->type = $type;
 				break;
 				
 				default:
 					$this->type = self::$DEFAULT;
 				break;
 			} 			
 		}

 		public function getType(){
 			return $this->type;
 		}

 		public function getHtml()
 		{
 			return
 				"<div class=\"panel".($this->getType() ? " panel-".($this->getType())."" : "")."\"> 					
		          	".( $this->getTitle() 	? "<div class=\"panel-heading\"><h3 class=\"panel-title\">" . ($this->getTitle()). "</h3></div>" : "")."
		          	".( $this->getText() 	? "<div class=\"panel-body\">" 	 . ($this->getText())		. "</div>" : "")."
		          	".( $this->getFooter() 	? "<div class=\"panel-footer\">" . ($this->getFooter())	. "</div>" : "")."				 
				</div>";
 		}
 	}
?>  