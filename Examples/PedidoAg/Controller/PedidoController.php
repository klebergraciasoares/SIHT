<?php
/**
* Controller for Class Pedido
* @package       Controller
*/
  class PedidoController extends Controller
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function cadastrar()
    {
      $this->setView("PedidoForm");
    }

    public function salvar()
    {
      $prodPedidos=json_decode($_POST["prodPedidos"]);

      if(is_array($prodPedidos))
      {
        foreach ($prodPedidos as $produto) {
            echo "<pre>";
            print_r($produto);
            echo "</pre>";
        }
      }

      

    }
  }
?>