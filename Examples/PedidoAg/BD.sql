CREATE TABLE usuario (
  idUsuario INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome VARCHAR(100)  NULL  ,
  email VARCHAR(200)  NULL  ,
  status CHAR(1)  NULL    ,
PRIMARY KEY(idUsuario));



CREATE TABLE grupo (
  idGrupo INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome VARCHAR(50)  NULL    ,
PRIMARY KEY(idGrupo));



CREATE TABLE cliente (
  idCliente INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  nome VARCHAR(100)  NULL  ,
  email VARCHAR(150)  NULL  ,
  cpf VARCHAR(14)  NULL  ,
  rg VARCHAR(30)  NULL  ,
  dataExpedicao DATE  NULL  ,
  orgaoEmissor VARCHAR(10)  NULL  ,
  dataNascimento DATE  NULL  ,
  cep VARCHAR(9)  NULL  ,
  logradouro VARCHAR(100)  NULL  ,
  numero VARCHAR(20)  NULL  ,
  complemento VARCHAR(50)  NULL  ,
  bairro VARCHAR(50)  NULL  ,
  estado CHAR(2)  NULL  ,
  cidade VARCHAR(100)  NULL  ,
  telefone VARCHAR(20)  NULL  ,
  celular VARCHAR(20)  NULL  ,
  status CHAR(1)  NULL    ,
PRIMARY KEY(idCliente));



CREATE TABLE subGrupo (
  idSubGrupo INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  idGrupo INTEGER UNSIGNED  NOT NULL  ,
  descricao VARCHAR(50)  NULL    ,
PRIMARY KEY(idSubGrupo)  ,
INDEX subGrupo_FKIndex1(idGrupo),
  FOREIGN KEY(idGrupo)
    REFERENCES grupo(idGrupo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE pedido (
  idPedido INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  idCliente INTEGER UNSIGNED  NOT NULL  ,
  dataPedido DATETIME  NULL    ,
PRIMARY KEY(idPedido)  ,
INDEX compra_FKIndex1(idCliente),
  FOREIGN KEY(idCliente)
    REFERENCES cliente(idCliente)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE produto (
  idProduto INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  idSubGrupo INTEGER UNSIGNED  NOT NULL  ,
  nome VARCHAR(100)  NULL  ,
  preco DECIMAL(10,2)  NULL  ,
  detalhes TEXT  NULL    ,
PRIMARY KEY(idProduto)  ,
INDEX produto_FKIndex1(idSubGrupo),
  FOREIGN KEY(idSubGrupo)
    REFERENCES subGrupo(idSubGrupo)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE pedidoItem (
  idProduto INTEGER UNSIGNED  NOT NULL  ,
  idPedido INTEGER UNSIGNED  NOT NULL  ,
  preco DECIMAL(10,2)  NULL  ,
  quantidade INTEGER UNSIGNED  NULL    ,
INDEX compraItem_FKIndex1(idPedido)  ,
INDEX compraItem_FKIndex2(idProduto),
  FOREIGN KEY(idPedido)
    REFERENCES pedido(idPedido)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idProduto)
    REFERENCES produto(idProduto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE produtoFoto (
  idFoto INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  idProduto INTEGER UNSIGNED  NOT NULL  ,
  url VARCHAR(100)  NULL    ,
PRIMARY KEY(idFoto)  ,
INDEX produtoFoto_FKIndex1(idProduto),
  FOREIGN KEY(idProduto)
    REFERENCES produto(idProduto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



