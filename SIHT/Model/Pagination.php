<?php

	class Pagination{
		
		private $list;
		private $urlPg;
 		private $regPg;
 		private $curPg;

 		private $iniPg;
 		private $endPg;
 		private $totPg;

 		public function __construct($urlPg, $list,$regPg = 10,$curPg = 1){
 			$this->urlPg 	= $urlPg;
 			$this->list 	= $list;
 			$this->regPg 	= $regPg;
 			$this->curPg 	= $curPg;
 			$this->totPg 	= ceil(count($this->list) / $this->regPg);
 		}
 		
 		public function getHtml()
 		{
 			$html="";

 			if($this->totPg > 1)
 			{
	 			$html= "<ul class=\"pagination pagination\">";

	 			$this->iniPg = 1;
				$this->endPg = $this->totPg;

				if($this->curPg == 1){
					$html.= "<li class='disabled'><a >&laquo;</a></li>";
					$html.= "<li class='disabled'><a>&lsaquo;</a></li>";
				}else{
					$html.= "<li><a href='{$this->urlPg}/1'>&laquo;</a></li>";
					$html.= "<li><a href='{$this->urlPg}/".($this->curPg-1)."'>&lsaquo;</a></li>";
				}

				/*$pageLinks = 3;
				$this->iniPg 	= $pageLinks-$this->curPg;
				$this->iniPg 	= ($this->iniPg < 1) ? $pageLinks : $pageLinks+$this->iniPg;				
				$this->endPg 	= $this->totPg+($pageLinks-$this->curPg+1);
				$this->curPg 	= ($this->curPg > ($this->totPg - $pageLinks)) ? $this->totPg-($pageLinks*2) : $this->curPg-$pageLinks;							
				//echo $this->iniPg."<br>";
				//echo $this->curPg + $this->endPg;
				for($i=$this->iniPg;$i<=$this->curPg + $this->endPg;$i++)
				*/
				
				for($i=$this->iniPg;$i<=$this->endPg;$i++)
				{
					if ( $i < 1 ) continue;
					if ( $i > $this->totPg ) break;

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
 			}

 			return $html;
 		}
	
	}

?>