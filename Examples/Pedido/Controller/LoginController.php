<?php
	
	class LoginController extends Controller
	{	
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$this->acessar();
		}

		public function acessar()
		{
			$this->setSession("S_LOGADO",false);
			$this->setView("LoginForm");
		}

		public function sair()
		{			
			$this->setAlert(new Alert("ATEN��O:","Logout realizado!",Alert::$INFO));
			$this->acessar();
		}

		public function expirou()
		{			
			$this->setAlert(new Alert("ATEN��O:","Sess�o expirou!",Alert::$WARNING));
			$this->acessar();
		}

		public function validar()
		{			
			if($this->post["usuario"] == "admin" && $this->post["senha"] == "admin")
			{
				$this->setSession("S_LOGADO",true);
				$this->redirectView("Principal");
			}else{
				$this->setAlert(new Alert("ATEN��O:","Usu�rio ou senha inv�lidos!",Alert::$DANGER));
				$this->acessar();
			}
		}
	}

?>  