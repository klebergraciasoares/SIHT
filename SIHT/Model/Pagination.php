<?php

	class Pagination{
		
		private $list;
		private $urlPg;
 		private $regPg;
 		private $curPg;

 		private $iniPg;
 		private $endPg;

 		public function __construct($urlPg, $list,$regPg,$curPg){
 			$this->urlPg 	= $urlPg;
 			$this->list 	= $list;
 			$this->regPg 	= $regPg;
 			$this->curPg 	= $curPg;
 		}
 		
 		public function getHtml(){
 			$html= "<ul class=\"pagination pagination\">";

 			$this->iniPg = 1;
			$this->endPg = ceil(count($this->list) / $this->regPg);

			if($this->curPg == 1){
				$html.= "<li class='disabled'><a >&laquo;</a></li>";
				$html.= "<li class='disabled'><a>&lsaquo;</a></li>";
			}else{
				$html.= "<li><a href='{$this->urlPg}/1'>&laquo;</a></li>";
				$html.= "<li><a href='{$this->urlPg}/".($this->curPg-1)."'>&lsaquo;</a></li>";
			}

			for($i=$this->iniPg;$i<=$this->endPg;$i++)
			{
				if($i == $this->curPg)
					$html.= "<li class='disabled'><a>".($i)."</a></li>";
				else
					$html.= "<li><a href='{$this->urlPg}/".($i)."'>".($i)."</a></li>";
			}

			if($this->curPg == $this->endPg){
				$html.= "<li class='disabled'><a>&rsaquo;</a></li>";		        		
				$html.= "<li class='disabled'><a>&raquo;</a></li>";
			}else{
				$html.= "<li><a href='{$this->urlPg}/".($this->curPg + 1)."'>&rsaquo;</a></li>";
				$html.= "<li><a href='{$this->urlPg}/".($this->endPg)."'>&raquo;</a></li>";
			}	

 			$html.= "</ul>";

 			return $html;
 		}
	
	}

?>