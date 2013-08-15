<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Project Name</title>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content=""> 

    <!-- Bootstrap core CSS -->
    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/Lib/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/Lib/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/Lib/css/local.css" rel="stylesheet">

    <script src="<?php echo SH_WEB_ROOT_LIB ?>/Lib/js/jquery.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/Lib/js/jquery.tablesorter.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/Lib/js/jquery.maskedinput.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/Lib/js/jquery.validate.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/Lib/js/bootstrap.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/Lib/js/local.js"></script>

  </head>
  <body>

    <nav  id="navbar-example" role="navigation" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <?php
                  if($this->getSession("S_LOGADO"))
                  {
            ?>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">            
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            <?php
                  }
            ?>
            <a class="navbar-brand" href="<?php echo SH_WEB_ROOT_APP ?>/Principal/inicio">Project Name</a>
          </div>

            <?php
                  if($this->getSession("S_LOGADO"))
                  {
            ?>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav">              
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastros <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Cliente/listar">Cliente</a></li>
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Produto/listar">Produto</a></li>
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Grupo/listar">Grupo</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Processos <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Cliente/listar">Pedido</a></li>
                   
                  </ul>
                </li>
              </ul>            
              <ul class="nav navbar-nav navbar-right">              
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Configuracao/config"><i class="glyphicon glyphicon-cog"></i> Configurações</a></li>
                    <li><a tabindex="-1" href="<?php echo SH_WEB_ROOT_APP ?>/Sobre/sobre"><i class="glyphicon glyphicon-info-sign"></i> Sobre</a></li>                  
                    <li class="divider"></li>                  
                    <li><a tabindex="-1" href="<?php echo SH_WEB_ROOT_APP ?>/Login/sair"><i class="glyphicon glyphicon-off"></i> Sair</a></li>                  
                  </ul>                
                </li>
              </ul>
            </div>
           
            <?php
              }
            ?>
        </div>        
      </nav>

      <div class="container">

      <?php
        $this->showAlerts();
      ?>