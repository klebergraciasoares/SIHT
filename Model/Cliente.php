<?php
	
	class Cliente
	{		
		private $idCliente;
		private $nome;
		private $email;		
		private $cpf;
		private $rg;
		private $dataExpedicao;
		private $orgaoEmissor;
		private $dataNascimento; 
		private $cep;
		private $logradouro;
		private $numero;
		private $complemento;
		private $bairro;
		private $estado;
		private $cidade;
		private $telefone;
		private $celular;
		private $status;

		function __construct()
		{
			$this->setStatus("A");
		}

		public function setIdCliente($idCliente)
		{
			$this->idCliente = $idCliente;
		}

		public function getIdCliente()
		{
			return $this->idCliente;
		}

		public function setNome($nome)
		{
			$this->nome = $nome;
		}

		public function getNome()
		{
			return $this->nome;
		}

		public function setEmail($email)
		{
			$this->email = $email; 
		}
		
		public function getEmail()
		{
			return $this->email;
		}

		public function setCpf($cpf)
		{
			$this->cpf = $cpf;
		}
		
		public function getCpf()
		{
			return $this->cpf;
		}

		public function setRg($rg)
		{
			$this->rg = $rg;
		}
		
		public function getRg()
		{
			return $this->rg;
		}

		public function setDataExpedicao($dataExpedicao)
		{
			$this->dataExpedicao = $dataExpedicao;
		}
		
		public function getDataExpedicao()
		{
			return $this->dataExpedicao;
		}

		public function setOrgaoEmissor($orgaoEmissor)
		{
			$this->orgaoEmissor = $orgaoEmissor;
		}
		
		public function getOrgaoEmissor()
		{
			return $this->orgaoEmissor;
		}

		public function setDataNascimento($dataNascimento)
		{
			$this->dataNascimento = $dataNascimento;
		}
		
		public function getDataNascimento()
		{
			return $this->dataNascimento;
		}

		public function setCep($cep)
		{
			$this->cep = $cep;
		}
		
		public function getCep()
		{
			return $this->cep;
		}

		public function setLogradouro($logradouro)
		{
			$this->logradouro = $logradouro;
		}
		
		public function getLogradouro()
		{
			return $this->logradouro;
		}

		public function setNumero($numero)
		{
			$this->numero = $numero;
		}
		
		public function getNumero()
		{
			return $this->numero;
		}

		public function setComplemento($complemento)
		{
			$this->complemento = $complemento;
		}
		
		public function getComplemento()
		{
			return $this->complemento;
		}

		public function setBairro($bairro)
		{
			$this->bairro = $bairro;
		}
		
		public function getBairro()
		{
			return $this->bairro;
		}

		public function setEstado($estado)
		{
			$this->estado = $estado;
		}
		
		public function getEstado()
		{
			return $this->estado;
		}

		public function setCidade($cidade)
		{
			$this->cidade = $cidade;
		}
		
		public function getCidade()
		{
			return $this->cidade;
		}

		public function setTelefone($telefone)
		{
			$this->telefone = $telefone;
		}
		
		public function getTelefone()
		{
			return $this->telefone;
		}

		public function setCelular($celular)
		{
			$this->celular = $celular;
		}
		
		public function getCelular()
		{
			return $this->celular;
		}

		public function setStatus($status)
		{
			$this->status = $status;
		}

		public function getStatus()
		{
			return $this->status;
		}

		public function setAllObj($object)
		{			
			$this->setIdCliente($object->idCliente);
			$this->setNome($object->nome);
			$this->setCpf($object->cpf);
			$this->setRg($object->rg);
			$this->setEmail($object->email);
			$this->setDataExpedicao($object->dataExpedicao);
			$this->setOrgaoEmissor($object->orgaoEmissor);
			$this->setDataNascimento($object->dataNascimento);
			$this->setCep($object->cep);
			$this->setLogradouro($object->logradouro);
			$this->setNumero($object->numero);
			$this->setBairro($object->bairro);
			$this->setEstado($object->estado);
			$this->setCidade($object->cidade);
			$this->setTelefone($object->telefone);
			$this->setCelular($object->celular);
			$this->setStatus($object->status);
		}
	}

?>  