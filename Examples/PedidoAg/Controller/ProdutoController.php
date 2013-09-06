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

    public function RequestEdit()
    {
      $retorno = new stdClass();
      $retorno->alerts = array();

      $produtoDAO = new ProdutoDAO();

      if(!(defined('HTA_PARAM3') && is_numeric(HTA_PARAM3) && $retorno->produto = $produtoDAO->bind(HTA_PARAM3)))
      {
        AlertController::setAlert(new Alert("ATENÇÃO:","Produto não encontrado!",Alert::$DANGER));        
      }

      echo json_encode($retorno);
    }

    public function RequestDelete()
    { 
      $retorno = new stdClass();
      $produto = isset($_POST["produto"]) ? (object) $_POST["produto"]  : new stdClass();

      $produtoDAO = new ProdutoDAO();
      $retorno->sucess = $produtoDAO->delete($produto->idProduto);
            
      if($retorno->sucess)
          AlertController::setAlert(new Alert("ATENÇÃO:","Produto excluido com sucesso!",Alert::$SUCESS));
      else
          AlertController::setAlert(new Alert("ATENÇÃO:","Erro ao excluir produto!",Alert::$DANGER));          

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
      $retorno->alerts = array();

      $object = isset($_POST["produto"]) ? (object) $_POST["produto"]  : new stdClass();

      $produto = new Produto();
      if(isset($object->idProduto)) $produto->setIdProduto($object->idProduto);
      if(isset($object->subGrupo))  $produto->setSubGrupo($object->subGrupo);
      if(isset($object->nome))      $produto->setNome($object->nome);
      if(isset($object->preco))     $produto->setPreco($object->preco);
      if(isset($object->detalhes))  $produto->setDetalhes($object->detalhes);

      //validar campos obrigatórios

      $produtoDAO = new ProdutoDAO();
      $retorno->sucess = $produtoDAO->save($produto);

      if($retorno->sucess)         
          AlertController::setAlert(new Alert("ATENÇÃO:","Produto registrado com sucesso!",Alert::$SUCESS));
      else          
          AlertController::setAlert(new Alert("ATENÇÃO:","Erro ao salvar produto!",Alert::$SUCESS));
      echo json_encode($retorno);
    }
  }
?>