<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Project Name</title>
    
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/local.css" rel="stylesheet">

    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.locale.pt-br.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.tablesorter.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.maskedinput.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.validate.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/bootstrap.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/local.js"></script>

  </head>
  <body>

    <nav  id="navbar-example" role="navigation" class="navbar navbar-inverse navbar-static-top">
        <div class="container">
          <div class="navbar-header">            
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">            
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>            
            <a class="navbar-brand" href="<?php echo SH_WEB_ROOT_APP ?>/Principal/inicio"><i class="glyphicon glyphicon-globe"></i> Project Name</a>
          </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <ul class="nav navbar-nav">              
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastre <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Client/list">Client</a></li>
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Product/list">Product</a></li>
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Group/list">Groups</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Process <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Sale/list">Sale</a></li>                   
                  </ul>
                </li>
              </ul>            
              <ul class="nav navbar-nav navbar-right">              
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo SH_WEB_ROOT_APP ?>/Configuration/index"><i class="glyphicon glyphicon-cog"></i> Configuration</a></li>
                    <li><a tabindex="-1" href="<?php echo SH_WEB_ROOT_APP ?>/About/index"><i class="glyphicon glyphicon-info-sign"></i> About</a></li>                  
                    <li class="divider"></li>                  
                    <li><a tabindex="-1" href="<?php echo SH_WEB_ROOT_APP ?>/Login/exit"><i class="glyphicon glyphicon-off"></i> Exit</a></li>                  
                  </ul>                
                </li>
              </ul>
            </div>          
           
        </div>        
      </nav>

      <div class="container">

      <?php
        echo $this->showAlerts();
      ?>