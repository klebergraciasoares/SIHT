<?php 
	
	class ClienteController extends Controller
	{	
		protected $cliente;
		protected $clientes = array();

		public function __construct()
		{
			parent::__construct();

			$this->cliente = new Cliente();

			if(!Session::getValue("S_LOGADO"))
				$this->redirectView("Login/expirou");

			if(false) //Permissão do Módulo
			{
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("ATENÇÃO:","Acesso Negado ao Módulo de CLIENTE!",Alert::$DANGER));
				$errorController->show();
				exit();							
			}	
		}

		public function index()
		{
			$this->listar();
		}

		public function listar()
		{	
			$clienteDAO = new ClienteDAO();
			$this->clientes = $clienteDAO->listar($this->post);
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
				if($this->cliente->getStatus() == "I")
				{
					AlertController::setAlert(new Alert("ATENÇÃO:","Cliente está inativo!",Alert::$DANGER));
				}
				$this->cadastrar();
			}else{
				AlertController::setAlert(new Alert("ATENÇÃO:","Cliente não encontrado!",Alert::$DANGER));
				$this->redirectView("Cliente/listar");
			}			
		}

		public function salvar()
		{			
			if(!$this->post)
			{
				AlertController::setAlert(new Alert("ATENÇÃO:","Dados não enviados!",Alert::$DANGER));
				$this->cadastrar();
			}else{

				$clienteDAO = new ClienteDAO();				
					
				$this->cliente->setIdCliente($this->post["idCliente"]);
				$this->cliente->setNome($this->post["nome"]);
				$this->cliente->setCpf($this->post["cpf"]);
				$this->cliente->setRg($this->post["rg"]);
				$this->cliente->setEmail($this->post["email"]);
				$this->cliente->setDataExpedicao("2013-01-01");
				$this->cliente->setOrgaoEmissor($this->post["orgaoEmissor"]);
				$this->cliente->setDataNascimento("1985-10-06");
				$this->cliente->setCep($this->post["cep"]);
				$this->cliente->setLogradouro($this->post["logradouro"]);
				$this->cliente->setNumero($this->post["numero"]);
				$this->cliente->setBairro($this->post["bairro"]);
				$this->cliente->setEstado($this->post["estado"]);
				$this->cliente->setCidade($this->post["cidade"]);
				$this->cliente->setTelefone($this->post["telefone"]);
				$this->cliente->setCelular($this->post["celular"]);
				$this->cliente->setStatus($this->post["status"]);

				if($clienteCPF = $clienteDAO->buscaCpf($this->cliente->getCpf()))
				{
					AlertController::setAlert(new Alert("ATENÇÃO:","CPF já cadastrado para o cliente: '".$clienteCPF->getNome()."'!",Alert::$DANGER));	
					$this->cadastrar();
				}else{					

					if($clienteDAO->salvar($this->cliente))
					{
						AlertController::setAlert(new Alert("ATENÇÃO:","Cliente '".$this->cliente->getNome()."' foi salvo com sucesso!",Alert::$SUCESS));
						$this->redirectView("Cliente/listar");
					}else{
						AlertController::setAlert(new Alert("ATENÇÃO:","Erro ao salvar cliente!",Alert::$DANGER));	
						$this->cadastrar();
					}
				}
				
			}
		}

		public function excluir()
		{
			$clienteDAO = new ClienteDAO();

			if(defined('HTA_PARAM3') && is_numeric(HTA_PARAM3) && $clienteDAO->excluir(HTA_PARAM3))
			{
				AlertController::setAlert(new Alert("ATENÇÃO:","Cliente excluido com sucesso!",Alert::$SUCESS));
			}else{	
				AlertController::setAlert(new Alert("ATENÇÃO:","Erro ao excluir cliente!",Alert::$DANGER));
			}

			$this->redirectView("Cliente/listar");
		}
	}

?>  