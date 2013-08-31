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

    public function alterar()
    {
      $this->cadastrar();
    }

    public function listar()
    {
      //file("http://127.0.0.1/SIHT/Examples/Pedido/Produto/JSONList");
      $this->setView("ProdutoLista");
    }

    public function RequestExcluir()
    { 
      $retorno = new stdClass();

      $produto = isset($_POST["produto"]) ? (object) $_POST["produto"]  : new stdClass();

      $produtoDAO = new ProdutoDAO();
      $retorno->sucess = $produtoDAO->delete($produto->idProduto);
            
      if($retorno->sucess)
          $retorno->alerts[] = new Alert("ATENÇÃO:","Produto excluido com sucesso!",Alert::$SUCESS);
      else
          $retorno->alerts[] = new Alert("ATENÇÃO:","Erro ao excluir produto!",Alert::$DANGER);          

      echo json_encode($retorno);
    }

    public function RequestList()
    {      
      $retorno = new stdClass();

      $filter = isset($_POST["filter"]) ? (object) $_POST["filter"]  : new stdClass();

      $produtoDAO = new ProdutoDAO();
      $retorno->produtos = $produtoDAO->lista($filter);

      echo json_encode($retorno);

    }

    public function RequestSave()
    {
      $retorno = new stdClass();

      $object = isset($_POST["produto"]) ? (object) $_POST["produto"]  : new stdClass();

      $produto = new Produto();
        if(isset($object->idProduto)) $produto->setIdProduto($object->idProduto);
      $produto->setSubGrupo($object->subGrupo);
      $produto->setNome($object->nome);
      $produto->setPreco($object->preco);
      $produto->setDetalhes($object->detalhes);

      $produtoDAO = new ProdutoDAO();
      $retorno->sucess = $produtoDAO->save($produto);

      if($retorno->sucess)
          $retorno->alerts[] = new Alert("ATENÇÃO:","Produto registrado com sucesso!",Alert::$SUCESS);
      else
          $retorno->alerts[] = new Alert("ATENÇÃO:","Erro ao salvar produto!",Alert::$DANGER);      

      echo json_encode($retorno);
    }
  }
?>