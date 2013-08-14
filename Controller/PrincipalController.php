<?php	
	
	class PrincipalController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}

		public function inicio()
		{			
			if($this->getSession("S_LOGADO"))
				$this->setView("Principal");
			else
				$this->redirectView("Login/acessar");
		}
	}

?>  