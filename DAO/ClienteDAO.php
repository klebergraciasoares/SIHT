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
					VALUES(:nome, :email, :cpf, :rg, :dataExpedicao, :orgaoEmissor, :dataNascimento, :cep, :logradouro, :numero, :complemento, :bairro, :estado, :cidade, :telefone, :celular, :status)";

				$query = $this->pdo->prepare($sql);				
						
			}else{
				$sql = 
					"UPDATE cliente SET					
						nome=:nome,
						email=:email,
						cpf=:cpf,
						rg=:rg,
						dataExpedicao=:dataExpedicao,
						orgaoEmissor=:orgaoEmissor,
						dataNascimento=:dataNascimento,
						cep=:cep,
						logradouro=:logradouro,
						numero=:numero,
						complemento=:complemento,
						bairro=:bairro,
						estado=:estado,
						cidade=:cidade,
						telefone=:telefone,
						celular=:celular,
						status=:status
					WHERE idCliente = :idCliente";

				$query = $this->pdo->prepare($sql);
				$query->bindParam(":idCliente", $cliente->getIdCliente(),PDO::PARAM_INT);
			}

			$query->bindParam(":nome", $cliente->getNome(),PDO::PARAM_STR);
			$query->bindParam(":email", $cliente->getEmail(),PDO::PARAM_STR);
			$query->bindParam(":cpf", $cliente->getCpf(),PDO::PARAM_STR);
			$query->bindParam(":rg", $cliente->getRg(),PDO::PARAM_STR);
			$query->bindParam(":dataExpedicao", $cliente->getDataExpedicao(),PDO::PARAM_STR);
			$query->bindParam(":orgaoEmissor", $cliente->getOrgaoEmissor(),PDO::PARAM_STR);
			$query->bindParam(":dataNascimento", $cliente->getDataNascimento(),PDO::PARAM_STR);
			$query->bindParam(":cep", $cliente->getCep(),PDO::PARAM_STR);
			$query->bindParam(":logradouro", $cliente->getLogradouro(),PDO::PARAM_STR);
			$query->bindParam(":numero", $cliente->getNumero(),PDO::PARAM_STR);
			$query->bindParam(":complemento", $cliente->getComplemento(),PDO::PARAM_STR);
			$query->bindParam(":bairro", $cliente->getBairro(),PDO::PARAM_STR);
			$query->bindParam(":estado", $cliente->getEstado(),PDO::PARAM_STR);
			$query->bindParam(":cidade", $cliente->getCidade(),PDO::PARAM_STR);
			$query->bindParam(":telefone", $cliente->getTelefone(),PDO::PARAM_STR);
			$query->bindParam(":celular", $cliente->getCelular(),PDO::PARAM_STR);
			$query->bindParam(":status", $cliente->getStatus(),PDO::PARAM_STR);

			return $query->execute();			
		}

		public function excluir($idCliente)
		{
			$sql = "DELETE FROM cliente WHERE idCliente=:idCliente";
			$query = $this->pdo->prepare($sql);
			$query->bindParam(":idCliente", $idCliente,PDO::PARAM_INT);
			$query->execute();

			return $query->rowCount() == 1;
		}

		public function recuperar($idCliente)
		{
			$sql = "SELECT * FROM cliente WHERE idCliente=:idCliente";
			$query = $this->pdo->prepare($sql);
			$query->bindParam(":idCliente", $idCliente,PDO::PARAM_INT);
			$query->execute();
			$fetch = $query->fetch(PDO::FETCH_OBJ);

			if($fetch)
			{
				$cliente = new Cliente();
				$cliente->setAllObj($fetch);
				return $cliente;
			}else{
				return false;
			}
		}

		public function listar($filtros = array())
		{
			$clientes 	= array();
			$params		= array();
			$where 		= array();

			if(isset($filtros["filIdCliente"]) && !empty($filtros["filIdCliente"]))
			{
			    $params[':idCliente'] = array($filtros["filIdCliente"],PDO::PARAM_INT);
			 	$where[] = " AND idCliente = :idCliente";
			}

			if(isset($filtros["filNome"]) && !empty($filtros["filNome"]))			
			{
			    $params[':nome'] = array("%".$filtros["filNome"]."%",PDO::PARAM_STR);
			 	$where[] = " AND nome like :nome";
			}
			
			if(isset($filtros["filCidade"]) && !empty($filtros["filCidade"]))			
			{
			    $params[':cidade'] = array("%".$filtros["filCidade"]."%",PDO::PARAM_STR);
			 	$where[] = " AND cidade like :cidade";
			}

			if(isset($filtros["filEstado"]) && !empty($filtros["filEstado"]))			
			{
			    $params[':estado'] = array($filtros["filEstado"],PDO::PARAM_STR);
			 	$where[] = " AND estado like :estado";
			}

			if(isset($filtros["filCpf"]) && !empty($filtros["filCpf"]))			
			{
			    $params[':cpf'] = array($filtros["filCpf"],PDO::PARAM_STR);
			 	$where[] = " AND cpf=:cpf";
			}

			$sql = "SELECT * FROM cliente WHERE 1=1 ".(implode(" ",$where))." ORDER BY nome";
			$query = $this->pdo->prepare($sql);

			foreach($params as $param=>$value) $query->bindParam($param, $value[0],$value[1]);			
			
			$query->execute();
			$fetch = $query->fetchAll(PDO::FETCH_CLASS);

			foreach ($fetch as $dados)
			{			
				$cliente = new Cliente();
				$cliente->setAllObj($dados);
				$clientes[] = $cliente;
			}
			
			return $clientes;
		}		
	}

?>  