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
			Session::setValue("S_LOGADO",false);
			$this->setView("LoginForm");
		}

		public function sair()
		{			
			AlertController::setAlert(new Alert("ATENÇÃO:","Logout realizado!",Alert::$INFO));
			$this->acessar();
		}

		public function expirou()
		{			
			AlertController::setAlert(new Alert("ATENÇÃO:","Sessão expirou!",Alert::$WARNING));
			$this->acessar();
		}

		public function validar()
		{			
			if($this->post["usuario"] == "admin" && $this->post["senha"] == "admin")
			{
				Session::setValue("S_LOGADO",true);
				$this->redirectView("Principal");
			}else{
				AlertController::setAlert(new Alert("ATENÇÃO:","Usuário ou senha inválidos!",Alert::$DANGER));
				$this->acessar();
			}
		}
	}

?>  