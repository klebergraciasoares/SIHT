<?php
	
	class ClienteDAO extends Connection
	{	
		public function __construct()
		{
			$this->connect();
		}

		public function salvar(Cliente $cliente)
		{
			return true;
		}

		public function excluir($idCliente)
		{
			return true;
		}

		public function recuperar($idCliente)
		{
			//return false;

			$cliente = new Cliente();
			$cliente->setIdCliente($idCliente);
			$cliente->setNome("Luiz Henrique de Angeli");
			$cliente->setCpf("111.111.111-11");
			$cliente->setRg("1.111.555-20");
			$cliente->setEmail("luizdeangeli@gmail.com");
			$cliente->setDataExpedicao("2013-01-01");
			$cliente->setOrgaoEmissor("SSP/PR");
			$cliente->setDataNascimento("1985-10-06");
			$cliente->setCep("87005-250");
			$cliente->setLogradouro("Rua XYZ");
			$cliente->setNumero("123456");
			$cliente->setBairro("Centro");
			$cliente->setEstado("PR");
			$cliente->setCidade("Maringá");
			$cliente->setTelefone("44-3333-4444");
			$cliente->setCelular("44-9999-4444");
			$cliente->setStatus("A");

			return $cliente;
		}

		public function listar($filtros = array())
		{
			$clientes = array();
			for($i=0;$i<50;$i++)
			{
				$cliente = new Cliente();
				$cliente->setIdCliente($i+1);
				$cliente->setNome("Luiz Henrique de Angeli");
				$cliente->setCpf("111.111.111-11");
				$cliente->setEstado("PR");
				$cliente->setCidade("Maringá");
				$cliente->setStatus("A");

				$clientes[] = $cliente;
			}
			return $clientes;
		}
	}

?>  