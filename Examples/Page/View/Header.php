<!DOCTYPE html>
<html ng-app lang="pt">
  <head>
    <title>Project Name X</title>
    
    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo SH_WEB_ROOT_LIB ?>/css/local.css" rel="stylesheet">

    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/jquery.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/bootstrap.min.js"></script>    
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/angular.locale.pt-br.min.js"></script>
    <script src="<?php echo SH_WEB_ROOT_LIB ?>/js/local.js"></script>

  </head>

  <body>   
    
    <nav id="navbar-example" role="navigation" class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" style="padding:7px" href="./"><img src="<?php echo SH_WEB_ROOT_LIB ?>/img/logo.png" style="height:35px;"></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">            
            <li class="<?php echo $this instanceof StartController ? "active" : "" ?>"><a href="./Start">Start</a></li>
            <li class="<?php echo $this instanceof StructureController ? "active" : "" ?>"><a href="./Structure">Structure</a></li>
            <li class="disabled"><a href="Download.php">Download</a></li>
            <li class="disabled"><a href="#">Docs</a></li>
            <li class="disabled"><a href="#">Demo</a></li>
            <li class="<?php echo $this instanceof GeneratorController ? "active" : "" ?>"><a href="./Generator">Generator</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">            
            <li class="disabled"><a href="./">Contact</a></li>
          </ul>
        </div>      
      </div>
    </nav>

    <div class="container">          
    