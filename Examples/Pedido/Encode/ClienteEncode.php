<?php

	class ClienteEncode extends Encode{

		public function list(){
			$clienteDAO = new ClienteDAO();
			return json_encode($clienteDAO->listar($this->post));
		}

	}

?>