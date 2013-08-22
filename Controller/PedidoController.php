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
  }
?>