<?php 
	
	class ClienteController extends Controller
	{	
		protected $cliente;
		protected $clientes = array();
		protected $filtros  = array();

		public function __construct()
		{
			parent::__construct();

			$this->cliente = new Cliente();

			if(!$this->getSession("S_LOGADO")) //Permissão logado
				$this->redirectView("Login/expirou");

			if(false) //Permissão do Módulo
			{				
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("ATENÇÃO:","Acesso Negado ao Módulo de CLIENTE!",Alert::$DANGER));
				$errorController->show();
				exit();							
			}	
		}

		public function listar()
		{	
			$this->filtros["filNome"] = isset($_POST["filNome"]) ? $_POST["filNome"] : false;
			$this->filtros["filCpf"] = isset($_POST["filCpf"]) ? $_POST["filCpf"] : false;			

			$clienteDAO = new ClienteDAO();
			$this->clientes = $clienteDAO->listar($this->filtros);
			$this->setView("ClienteLista");
		}

		public function cadastrar()
		{
			$this->setView("ClienteForm");
		}

		public function alterar()
		{			
			$clienteDAO = new ClienteDAO();

			if(defined('HTA_PARAM3') && is_numeric(HTA_PARAM3) && $this->cliente = $clienteDAO->recuperar(HTA_PARAM3))
			{
				$this->cadastrar();
			}else{
				$this->setAlert(new Alert("ATENÇÃO:","Cliente não encontrado!",Alert::$DANGER));
				$this->redirectView("Cliente/listar");
			}			
		}

		public function salvar()
		{			
			if(!$_POST)
			{
				$this->setAlert(new Alert("ATENÇÃO:","Dados não enviados!",Alert::$DANGER));
				$this->cadastrar();
			}else{
				$clienteDAO = new ClienteDAO();
				//exit(Utility::dateFormat($_POST["dataNascimento"], "d/m/Y"));
				
				$this->cliente->setIdCliente($_POST["idCliente"]);
				$this->cliente->setNome($_POST["nome"]);
				$this->cliente->setCpf($_POST["cpf"]);
				$this->cliente->setRg($_POST["rg"]);
				$this->cliente->setEmail($_POST["email"]);
				$this->cliente->setDataExpedicao("2013-01-01");
				$this->cliente->setOrgaoEmissor($_POST["orgaoEmissor"]);
				$this->cliente->setDataNascimento("1985-10-06");
				$this->cliente->setCep($_POST["cep"]);
				$this->cliente->setLogradouro($_POST["logradouro"]);
				$this->cliente->setNumero($_POST["numero"]);
				$this->cliente->setBairro($_POST["bairro"]);
				$this->cliente->setEstado($_POST["estado"]);
				$this->cliente->setCidade($_POST["cidade"]);
				$this->cliente->setTelefone($_POST["telefone"]);
				$this->cliente->setCelular($_POST["celular"]);
				$this->cliente->setStatus($_POST["status"]);

				if($clienteDAO->salvar($this->cliente))
				{
					$this->setAlert(new Alert("ATENÇÃO:","Cliente '".$this->cliente->getNome()."' cadastrado com sucesso!",Alert::$SUCESS));
					$this->redirectView("Cliente/listar");
				}else{
					$this->setAlert(new Alert("ATENÇÃO:","Erro ao salvar cliente!",Alert::$DANGER));	
					$this->cadastrar();
				}
				
			}
		}

		public function excluir()
		{
			$clienteDAO = new ClienteDAO();

			if(defined('HTA_PARAM3') && is_numeric(HTA_PARAM3) && $clienteDAO->excluir(HTA_PARAM3))
			{
				$this->setAlert(new Alert("ATENÇÃO:","Cliente excluido com sucesso!",Alert::$SUCESS));				
			}else{	
				$this->setAlert(new Alert("ATENÇÃO:","Erro ao excluir cliente!",Alert::$DANGER));
			}		

			$this->redirectView("Cliente/listar");
		}
	}

?>  