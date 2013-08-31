<?php
/**
* Model Class Produto
* @package       Model
*/
  class Produto implements JsonSerializable
  {
    private $idProduto;
    private $subGrupo;
    private $nome;
    private $preco;
    private $detalhes;

    public function __construct()
    {

    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    public function setIdProduto($idProduto)
    {
      $this->idProduto = $idProduto;
    }

    public function getIdProduto()
    {
      return $this->idProduto;
    }

    public function setSubGrupo($subGrupo)
    {
      $this->subGrupo = $subGrupo;
    }

    public function getSubGrupo()
    {
      return $this->subGrupo;
    }

    public function setNome($nome)
    {
      $this->nome = $nome;
    }

    public function getNome()
    {
      return $this->nome;
    }

    public function setPreco($preco)
    {
      $this->preco = $preco;
    }

    public function getPreco()
    {
      return $this->preco;
    }

    public function setDetalhes($detalhes)
    {
      $this->detalhes = $detalhes;
    }

    public function getDetalhes()
    {
      return $this->detalhes;
    }

  }
?>