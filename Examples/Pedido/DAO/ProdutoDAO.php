<?php
/**
* Data Access Object for Produto
* @package       DAO
*/
  class ProdutoDAO extends Connection
  {
    public function __construct()
    {
      $this->connect();  
    }

    public function save(Produto $produto)
    {
      if(!$produto->getIdProduto())
      {
        $sql = "INSERT INTO produto(idSubGrupo,nome,preco,detalhes) 
                VALUES(:idSubGrupo,:nome,:preco,:detalhes)";
        $query = $this->pdo->prepare($sql);
      }else{
          $sql = 
            "UPDATE produto SET idSubGrupo=:idSubGrupo,nome=:nome,preco=:preco,detalhes=:detalhes
            WHERE idProduto = :idProduto";
          $query = $this->pdo->prepare($sql);
          $query->bindParam(":idProduto", $produto->getIdProduto(),PDO::PARAM_INT);
      }

      //$query->bindParam(":idSubGrupo", $produto->getIdSubGrupo(),PDO::PARAM_INT);
      $idSubGrupo = 1;
      $query->bindParam(":idSubGrupo",$idSubGrupo,PDO::PARAM_INT);
      $query->bindParam(":nome", $produto->getNome(),PDO::PARAM_STR);
      $query->bindParam(":preco", $produto->getPreco(),PDO::PARAM_STR);
      $query->bindParam(":detalhes", $produto->getDetalhes(),PDO::PARAM_STR);

      return $query->execute();
    }

    public function bind($idProduto)
    {
      $produto = new Produto();
    
      $sql = 
        "SELECT a.idProduto,a.nome,a.preco,a.detalhes 
        FROM 
          produto as a
        WHERE a.idProduto = :idProduto";

      $query = $this->pdo->prepare($sql);
   
      $query->bindParam(":idProduto", $idProduto,PDO::PARAM_INT);

      $query->execute();
      $fetch = $query->fetch(PDO::FETCH_OBJ);

      if($fetch)
      {
        $produto = new Produto();
        $produto->setIdProduto($fetch->idProduto);
        //$produto->setSubGrupo($fetch["idSubGrupo"]);
        $produto->setNome($fetch->nome);
        $produto->setPreco($fetch->preco);
        $produto->setDetalhes($fetch->detalhes);
        
        return $produto;
      }else{        
        return false;
      }
    }

    public function delete($idProduto)
    {
      $sql = "DELETE FROM produto WHERE idProduto = :idProduto";
      $query = $this->pdo->prepare($sql);
      $query->bindParam(":idProduto", $idProduto,PDO::PARAM_INT);
      $query->execute();

      return $query->rowCount() == 1;
    }

    public function lista($filtros)
    {
      $produtos = array();

      $sql = 
        "SELECT idProduto,idSubGrupo,nome,preco,detalhes 
        FROM produto
        WHERE 1=1 
          " . ( isset($filtros->idProduto)  ? " AND idProduto = :idProduto " : "" ). "
          " . ( isset($filtros->nome)       ? " AND nome like :nome " : "" ). "
        ORDER BY nome";

      $query = $this->pdo->prepare($sql);

      if(isset($filtros->idProduto))
        $query->bindParam(":idProduto", $filtros->idProduto,PDO::PARAM_INT);

      if(isset($filtros->nome))
        $query->bindParam(":nome", $filtros->nome,PDO::PARAM_STR);

      $query->execute();

      while($fetch = $query->fetch(PDO::FETCH_OBJ))
      {
        $produto = new Produto();
        $produto->setIdProduto($fetch->idProduto);
        //$produto->setSubGrupo($fetch["idSubGrupo"]);
        $produto->setNome($fetch->nome);
        $produto->setPreco($fetch->preco);
        $produto->setDetalhes($fetch->detalhes);

        $produtos[] = $produto;
      }

      return $produtos;
    }
  }
?>