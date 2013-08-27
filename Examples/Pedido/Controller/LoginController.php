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
			$this->setAlert(new Alert("ATENÇÃO:","Logout realizado!",Alert::$INFO));
			$this->acessar();
		}

		public function expirou()
		{			
			$this->setAlert(new Alert("ATENÇÃO:","Sessão expirou!",Alert::$WARNING));
			$this->acessar();
		}

		public function validar()
		{			
			if($this->post["usuario"] == "admin" && $this->post["senha"] == "admin")
			{
				$this->setSession("S_LOGADO",true);
				$this->redirectView("Principal");
			}else{
				$this->setAlert(new Alert("ATENÇÃO:","Usuário ou senha inválidos!",Alert::$DANGER));
				$this->acessar();
			}
		}
	}

?>  