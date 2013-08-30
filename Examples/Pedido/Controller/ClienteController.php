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

			if(false) //Permiss�o do M�dulo
			{
				$errorController = new ErrorController();
				$errorController->setAlert(new Alert("ATEN��O:","Acesso Negado ao M�dulo de CLIENTE!",Alert::$DANGER));
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
					$this->setAlert(new Alert("ATEN��O:","Cliente est� inativo!",Alert::$DANGER));
				}
				$this->cadastrar();
			}else{
				$this->setAlert(new Alert("ATEN��O:","Cliente n�o encontrado!",Alert::$DANGER));
				$this->redirectView("Cliente/listar");
			}			
		}

		public function salvar()
		{			
			if(!$this->post)
			{
				$this->setAlert(new Alert("ATEN��O:","Dados n�o enviados!",Alert::$DANGER));
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
					$this->setAlert(new Alert("ATEN��O:","CPF j� cadastrado para o cliente: '".$clienteCPF->getNome()."'!",Alert::$DANGER));	
					$this->cadastrar();
				}else{					

					if($clienteDAO->salvar($this->cliente))
					{
						$this->setAlert(new Alert("ATEN��O:","Cliente '".$this->cliente->getNome()."' foi salvo com sucesso!",Alert::$SUCESS));
						$this->redirectView("Cliente/listar");
					}else{
						$this->setAlert(new Alert("ATEN��O:","Erro ao salvar cliente!",Alert::$DANGER));	
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
				$this->setAlert(new Alert("ATEN��O:","Cliente excluido com sucesso!",Alert::$SUCESS));
			}else{	
				$this->setAlert(new Alert("ATEN��O:","Erro ao excluir cliente!",Alert::$DANGER));
			}

			$this->redirectView("Cliente/listar");
		}
	}

?>  