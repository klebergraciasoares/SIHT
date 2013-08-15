<?php
	
	class ClienteDAO extends Connection
	{	
		public function __construct()
		{
			$this->connect();
		}

		public function salvar(Cliente $cliente)
		{
			if(!$cliente->getIdCliente())
			{
				$sql =
					"INSERT INTO cliente (nome, email, cpf, rg, dataExpedicao, orgaoEmissor, dataNascimento, cep, logradouro, numero, complemento, bairro, estado, cidade, telefone, celular, status) 
					VALUES(
							'" . $cliente->getNome() 			. "',
							'" . $cliente->getEmail() 			. "',
							'" . $cliente->getCpf() 			. "',
							'" . $cliente->getRg() 				. "',
							'" . $cliente->getDataExpedicao() 	. "',
							'" . $cliente->getOrgaoEmissor() 	. "',
							'" . $cliente->getDataNascimento() 	. "',
							'" . $cliente->getCep() 			. "',
							'" . $cliente->getLogradouro() 		. "',
							'" . $cliente->getNumero() 			. "',
							'" . $cliente->getComplemento() 	. "',
							'" . $cliente->getBairro() 			. "',
							'" . $cliente->getEstado() 			. "',
							'" . $cliente->getCidade() 			. "',
							'" . $cliente->getTelefone() 		. "',
							'" . $cliente->getCelular() 		. "',
							'" . $cliente->getStatus() 			. "'
						)";
			}else{
				$sql = 
					"UPDATE cliente SET					
						nome='" . $cliente->getNome() 			. "',
						email='" . $cliente->getEmail() 			. "',
						cpf='" . $cliente->getCpf() 			. "',
						rg='" . $cliente->getRg() 				. "',
						dataExpedicao='" . $cliente->getDataExpedicao() 	. "',
						orgaoEmissor='" . $cliente->getOrgaoEmissor() 	. "',
						dataNascimento='" . $cliente->getDataNascimento() 	. "',
						cep='" . $cliente->getCep() 			. "',
						logradouro='" . $cliente->getLogradouro() 		. "',
						numero='" . $cliente->getNumero() 			. "',
						complemento='" . $cliente->getComplemento() 	. "',
						bairro='" . $cliente->getBairro() 			. "',
						estado='" . $cliente->getEstado() 			. "',
						cidade='" . $cliente->getCidade() 			. "',
						telefone='" . $cliente->getTelefone() 		. "',
						celular='" . $cliente->getCelular() 		. "',
						status='" . $cliente->getStatus() 			. "'
					WHERE idCliente = " . $cliente->getIdCliente();


			}			

			return $this->pdo->exec($sql) == 1;
		}

		public function excluir($idCliente)
		{
			$sql = "DELETE FROM cliente WHERE idCliente={$idCliente}";	
			return $this->pdo->exec($sql) == 1;
		}

		public function recuperar($idCliente)
		{
			$sql = "SELECT * FROM cliente WHERE idCliente={$idCliente}";
			$dados = $this->pdo->query($sql)->fetchObject();

			if($dados)
			{
				$cliente = new Cliente();
				$cliente->setIdCliente($dados->idCliente);
				$cliente->setNome($dados->nome);
				$cliente->setCpf($dados->cpf);
				$cliente->setRg($dados->rg);
				$cliente->setEmail($dados->email);
				$cliente->setDataExpedicao($dados->dataExpedicao);
				$cliente->setOrgaoEmissor($dados->orgaoEmissor);
				$cliente->setDataNascimento($dados->dataNascimento);
				$cliente->setCep($dados->cep);
				$cliente->setLogradouro($dados->logradouro);
				$cliente->setNumero($dados->numero);
				$cliente->setBairro($dados->bairro);
				$cliente->setEstado($dados->estado);
				$cliente->setCidade($dados->cidade);
				$cliente->setTelefone($dados->telefone);
				$cliente->setCelular($dados->celular);
				$cliente->setStatus($dados->status);

				return $cliente;
			}else{
				return false;
			}
		}

		public function listar($filtros = array())
		{
			$clientes = array();

			$sql = 
				"SELECT * 
				FROM cliente 
				WHERE 1=1
					" . ($filtros["filNome"] 	? "AND nome like '%{$filtros["filNome"]}%'" : "") . "
					" . ($filtros["filCpf"] 	? "AND cpf = '{$filtros["filCpf"]}'" 		: "") . "
				ORDER BY nome";
			$fetch = $this->pdo->query($sql)->fetchAll(PDO::FETCH_CLASS);

			foreach ($fetch as $dados) 
			{			
				$cliente = new Cliente();
				$cliente->setIdCliente($dados->idCliente);
				$cliente->setNome($dados->nome);
				$cliente->setCpf($dados->cpf);
				$cliente->setRg($dados->rg);
				$cliente->setEmail($dados->email);
				$cliente->setDataExpedicao($dados->dataExpedicao);
				$cliente->setOrgaoEmissor($dados->orgaoEmissor);
				$cliente->setDataNascimento($dados->dataNascimento);
				$cliente->setCep($dados->cep);
				$cliente->setLogradouro($dados->logradouro);
				$cliente->setNumero($dados->numero);
				$cliente->setBairro($dados->bairro);
				$cliente->setEstado($dados->estado);
				$cliente->setCidade($dados->cidade);
				$cliente->setTelefone($dados->telefone);
				$cliente->setCelular($dados->celular);
				$cliente->setStatus($dados->status);

				$clientes[] = $cliente;
			}
			
			return $clientes;
		}
	}

?>  