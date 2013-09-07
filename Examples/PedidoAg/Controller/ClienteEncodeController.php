<?php

	class ClienteEncodeController{

		public function lista(){
			$clienteDAO = new ClienteDAO();
			echo json_encode($clienteDAO->listar(array()));
		}

	}

?>