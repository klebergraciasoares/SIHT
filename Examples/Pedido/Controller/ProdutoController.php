<?php
/**
* Controller for Class Produto
* @package       Controller
*/
  class ProdutoController extends Controller
  {
    protected $produto;
    protected $produtos = array();    

    public function __construct()
    {
      parent::__construct();

      $this->produto = new Produto();
    }

    public function index()
    {
      $this->setView("ProdutoForm");
    }

    public function cadastrar()
    {
      $this->setView("ProdutoForm");
    }

    public function listar()
    {
      //file("http://127.0.0.1/SIHT/Examples/Pedido/Produto/JSONList");
      $this->setView("ProdutoLista");
    }

    public function RequestExcluir()
    {      
      $produto = isset($_POST["produto"]) ? (object) $_POST["produto"]  : new stdClass();

      $produtoDAO = new ProdutoDAO();
      $sucess = $produtoDAO->delete($produto->idProduto);

      $retorno = new stdClass();

      if($sucess)
          $alert = array("type"=>"success","title"=>"Atenção:","text"=>"Produto excluido com sucesso!","close"=>true);
      else
          $alert = array("type"=>"warning","title"=>"Atenção:","text"=>"Erro ao excluir produto: {$produto->idProduto}!","close"=>true);

      $retorno->sucess = true;  
      $retorno->alerts[] = $alert;  

      echo json_encode($retorno);
    }

    public function RequestList()
    {
      //if(!$_POST) exit();

      $filter = isset($_POST["filter"]) ? (object) $_POST["filter"]  : new stdClass();
      
      $produtos = array();

      $produtoDAO = new ProdutoDAO();
      $produtos = $produtoDAO->lista($filter);

      $retorno = array(
          "sucess"  => true,
          "produtos"=> $produtos,
          "alerts"  => array(
              //array("type"=>"danger","title"=>"teste","text"=>"olá mundo","close"=>true),
              //array("type"=>"warning","title"=>"teste","text"=>"olá mundo","close"=>true)
              //array("type"=>"warning","title"=>"teste","text"=>print_r($filter,true),"close"=>true)
          )
      );

      echo json_encode($retorno);
      
    }
  }
?>