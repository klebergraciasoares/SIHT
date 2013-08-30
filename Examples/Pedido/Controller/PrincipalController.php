<?php	
	
	class PrincipalController extends Controller
	{	

		public function __construct()
		{
			parent::__construct();
		}
		
		public function index()
		{			
			if(Session::getValue("S_LOGADO"))
			if(Session::getValue("S_LOGADO"))
				$this->setView("Principal");
			else
				$this->redirectView("Login/acessar");
		}
	}

?>  