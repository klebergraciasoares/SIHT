<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Project Name</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/local.css" rel="stylesheet">

    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular-route.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.locale.pt-br.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.tablesorter.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.maskedinput.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.validate.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/bootstrap.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/local.js"></script>

  </head>
  <body>

    <nav id="navbar-example" role="navigation" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <?php
                  if(Session::getValue("S_LOGADO"))
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
            <a class="navbar-brand" href="<?php echo SH_WEB_ROOT_APP ?>/Principal/inicio"><i class="glyphicon glyphicon-globe"></i> Project Name</a>
          </div>

            <?php
                  if(Session::getValue("S_LOGADO"))
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
                    <li><a tabindex="-1" href="<?php echo SH_WEB_ROOT_APP ?>/Sobre"><i class="glyphicon glyphicon-info-sign"></i> Sobre</a></li>                  
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
        echo AlertController::showAlerts();
        echo PanelController::showPanels();
      ?>